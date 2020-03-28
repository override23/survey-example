<?php


namespace App\Components;


use App\Entities\Answer;
use App\Entities\Question;
use App\Entities\User;
use App\Repositories\QuestionRepository;
use Doctrine\ORM\EntityManager;
use Illuminate\Contracts\Auth\Authenticatable;

class SurveyState
{
    private $user, $entityManager;
    public function __construct(Authenticatable $user, EntityManager $entityManager)
    {
        $this->user = $user;
        $this->entityManager = $entityManager;
    }

    public function getNextQuestion(): ?Question
    {
        $repository = app(QuestionRepository::class);
        $question = $repository->findNextNotAnsweredForTheUser($this->user);

        return $question;
    }
}
