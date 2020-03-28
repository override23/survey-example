<?php


namespace App\Repositories;


use App\Entities\Answer;
use App\Entities\Question;
use App\Entities\User;

class QuestionRepository extends BaseRepository
{
    public function findNextNotAnsweredForTheUser(User $user)
    {
        $query = $this->createQueryBuilder('q')->select(['q'])
            ->leftJoin(Answer::class, 'a', 'WITH', 'a.questionId = q.id AND a.userId = :user_id')
            ->where('a.id IS NULL')
            ->setParameter('user_id', $user->getId())
            ->orderBy('q.sortOrder')
        ;
        return $query->getQuery()->execute()[0] ?? null;
    }
}
