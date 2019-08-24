<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class LeadingExercise
{
    public const LEADING_EXERCISE_TYPE_SEMINAR = 'семинарно';
    public const LEADING_EXERCISE_TYPE_LABORATORY = 'лабораторно';
    public const LEADING_EXERCISE_TYPE_LECTURE = 'лекция';
    public const LEADING_EXERCISE_TYPE_COURSE = 'курсова';

    /**
     * @var int
     */
    private $id;

    /**
     * @var Specialty
     */
    private $specialty;

    /**
     * @var Discipline
     */
    private $discipline;

    /**
     * @var Lecturer
     */
    private $lecturer;

    /**
     * @var Exercise[]|ArrayCollection
     */
    private $exercise;

    /**
     * @var string
     */
    private $exerciseType;

    public function getId(): int
    {
        return $this->id;
    }

    public function getSpecialty(): ?Specialty
    {
        return $this->specialty;
    }

    public function setSpecialty(Specialty $specialty): void
    {
        $this->specialty = $specialty;
    }

    public function getLecturer(): ?Lecturer
    {
        return $this->lecturer;
    }

    public function setLecturer(Lecturer $lecturer): void
    {
        $this->lecturer = $lecturer;
    }

    public function getExercise()
    {
        return $this->exercise;
    }

    public function addExercise(Exercise $exercise)
    {
        if (!$this->exercise->contains($exercise)) {
            $this->exercise->add($exercise);
        }
    }

    public function removeExercise(Exercise $exercise)
    {
        $this->exercise->removeElement($exercise);
    }

    public function getDiscipline(): ?Discipline
    {
        return $this->discipline;
    }

    public function setDiscipline(Discipline $discipline): void
    {
        $this->discipline = $discipline;
    }

    public function getExerciseType(): ?string
    {
        return $this->exerciseType;
    }

    public function setExerciseType(string $exerciseType): void
    {
        $this->exerciseType = $exerciseType;
    }

    public function __toString()
    {
        $dateStart = $this->specialty->getStartYear();
        $dateEnd = $this->specialty->getEndYear();

        return
            $this->specialty->getAbbreviation() . " " .
            $dateStart . "/" .
            $dateEnd . " " .
            $this->discipline->getAbbreviation() . " " .
            $this->lecturer->getFirstName() . " " .
            $this->lecturer->getLastName() . ", " .
            $this->getExerciseType()
        ;
    }
}
