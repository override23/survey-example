<?php


namespace App\Repositories;


use App\Entities\Question;
use App\Entities\User;

class AnswerRepository extends BaseRepository
{
    public function firstByUserAndQuestion(User $user, Question $question)
    {
        return $this->findBy([
            'userId' => $user->getId(),
            'questionId' => $question->getId(),
        ])[0] ?? null;
    }
}
