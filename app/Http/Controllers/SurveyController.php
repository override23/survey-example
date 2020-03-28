<?php

namespace App\Http\Controllers;

use App\Entities\Answer;
use App\Entities\Question;
use App\Repositories\AnswerRepository;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LaravelDoctrine\ORM\Facades\EntityManager;
use App\Http\Requests\Question as QuestionRequest;

class SurveyController extends Controller
{
    private $surveyState, $questionRepository, $answerRepository;
    public function __construct(QuestionRepository $questionRepository, AnswerRepository $answerRepository)
    {
        $this->middleware(function($request, $next) {
            $this->surveyState = app('SurveyState');
            return $next($request);
        });

        $this->questionRepository = $questionRepository;
        $this->answerRepository = $answerRepository;
    }

    public function start()
    {
        $nextQuestion = $this->surveyState->getNextQuestion();
        if(null == $nextQuestion) {
            return redirect(route('survey-done'));
        }

        return view('survey.start', compact('nextQuestion'));
    }

    public function done()
    {
        $nextQuestion = $this->surveyState->getNextQuestion();
        if($nextQuestion) {
            return redirect(route('survey-question', [$nextQuestion->getId()]));
        }

        return view('survey.done');
    }

    public function question($questionID)
    {
        $question = $this->questionRepository->findOrFail($questionID);
        return view('survey.question', compact('question'));
    }

    public function questionSubmit(QuestionRequest $request)
    {
        $question = $request->getQuestion();
        $user = Auth::user();
        $answer = $this->answerRepository->firstByUserAndQuestion($user, $question) ?? new Answer;
        $answer->setUser($user);
        $answer->setQuestion($question);
        $answer->setText($request->input('answer'));
        EntityManager::persist($answer);
        EntityManager::flush();

        $nextQuestion = $this->surveyState->getNextQuestion();
        $redirect = redirect(route('survey-done'));
        if($nextQuestion) {
            $redirect = redirect(route('survey-question', [$nextQuestion->getId()]));
        }

        return $redirect;
    }
}
