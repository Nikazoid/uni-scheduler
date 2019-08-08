<?php

namespace App\Entity;

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
     * @var string|null
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

    public function getExercise(): ?string
    {
        return $this->exercise;
    }

    public function setExercise(?string $exercise): void
    {
        $this->exercise = $exercise;
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
        return $this->specialty->getAbbreviation() . " " . $this->exercise . " " . $this->exerciseType;
    }
}
