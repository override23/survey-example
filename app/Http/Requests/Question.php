<?php

namespace App\Http\Requests;

use App\Repositories\QuestionRepository;
use Illuminate\Foundation\Http\FormRequest;

class Question extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    private $question;
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $repository = app(QuestionRepository::class);
        $this->question = $repository->findOrFail($this->route('id'));

        return [
            'answer' => $this->question->getRules(),
        ];
    }

    public function getQuestion()
    {
        return $this->question;
    }
}
