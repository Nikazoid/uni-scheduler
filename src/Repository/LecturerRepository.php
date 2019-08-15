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

    public function getExercisesByDay($day, $lecturerId): array
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('
                e.dayName,
                e.start,
                g.name AS groupName,
                e.end,
                sg.name AS subGroupName,
                r.roomNumber,
                f.abbreviation AS facultyAbbreviation,
                s.abbreviation AS specAbbriviation,
                s.startYear AS specStartYear,
                s.endYear AS specEndYear,
                d.abbreviation AS disciplineAbbreviation,
                l.firstName,
                l.firstName,
                g.name')
            ->where('e.dayName = :day' , 'l.id = :id')
            ->from('App:Lecturer', 'l')
            ->innerJoin('l.leadingExercises','le')
            ->innerJoin('le.discipline','d')
            ->innerJoin('le.specialty','s')
            ->innerJoin('le.exercise','e')
            ->innerJoin('e.subGroups','sg')
            ->innerJoin('e.rooms','r')
            ->innerJoin('r.faculty','f')
            ->innerJoin('sg.groups','g')
            ->setParameter('day', $day)
            ->setParameter('id', $lecturerId)
            ->orderBy('e.start', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
