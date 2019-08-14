<?php

namespace App\Repository;

use App\Entity\Lecturer;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class LecturerRepository extends EntityRepository
{
    public function __construct(EntityManager $em)
    {
        parent::__construct($em, $em->getClassMetadata(Lecturer::class));
    }
}
