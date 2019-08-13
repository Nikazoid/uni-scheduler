<?php

namespace App\Entity;

class Discipline
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $abbreviation;

    /**
     * @var int
     */
    private $lecturesCount;

    /**
     * @var int
     */
    private $semExercisesCount;

    /**
     * @var int
     */
    private $labExercisesCount;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getAbbreviation(): ?string
    {
        return $this->abbreviation;
    }

    public function setAbbreviation(string $abbreviation)
    {
        $this->abbreviation = $abbreviation;
    }

    public function getLecturesCount(): ?int
    {
        return $this->lecturesCount;
    }

    public function setLecturesCount(int $lecturesCount)
    {
        $this->lecturesCount = $lecturesCount;
    }

    public function getSemExercisesCount(): ?int
    {
        return $this->semExercisesCount;
    }

    public function setSemExercisesCount(int $semExercisesCount)
    {
        $this->semExercisesCount = $semExercisesCount;
    }

    public function getLabExercisesCount(): ?int
    {
        return $this->labExercisesCount;
    }

    public function setLabExercisesCount(int $labExercisesCount)
    {
        $this->labExercisesCount = $labExercisesCount;
    }

    public function __toString()
    {
        return $this->name;
    }
}
