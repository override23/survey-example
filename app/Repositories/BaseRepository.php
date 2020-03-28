<?php


namespace App\Repositories;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping;

abstract class BaseRepository extends EntityRepository
{
    public function findOrFail($id)
    {
        return parent::find($id) ?? abort(404);
    }
}
