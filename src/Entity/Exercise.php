<?php

namespace App\Entity;

use DateTime;

class Exercise
{
    public const EXERCISE_SEMESTER_SPLIT_WINTER = 'зимен';
    public const EXERCISE_SEMESTER_SPLIT_SUMMER = 'летен';

    /**
     * @var int
     */
    private $id;

    /**
     * @var SubGroups
     */
    private $subGroups;

    /**
     * @var Rooms
     */
    private $rooms;

    /**
     * @var string
     */
    private $dayName;

    /**
     * @var DateTime
     */
    private $start;

    /**
     * @var DateTime
     */
    private $end;

    /**
     * @var LeadingExercise
     */
    private $leadingExercise;

    /**
     * @var string
     */
    private $semesterSplit;

    public function getId(): int
    {
        return $this->id;
    }

    public function getRooms(): ?Rooms
    {
        return $this->rooms;
    }

    public function setRooms(Rooms $rooms): void
    {
        $this->rooms = $rooms;
    }

    public function getSubGroups(): ?SubGroups
    {
        return $this->subGroups;
    }

    public function setSubGroups(SubGroups $subGroups): void
    {
        $this->subGroups = $subGroups;
    }

    public function getLeadingExercise(): ?LeadingExercise
    {
        return $this->leadingExercise;
    }

    public function setLeadingExercise(LeadingExercise $leadingExercise): void
    {
        $this->leadingExercise = $leadingExercise;
    }

    public function getDayName(): ?string
    {
        return $this->dayName;
    }

    public function setDayName(string $dayName): void
    {
        $this->dayName = $dayName;
    }

    public function getStart(): ?DateTime
    {
        return $this->start;
    }

    public function setStart(DateTime $start): void
    {
        $this->start = $start;
    }

    public function getEnd(): ?DateTime
    {
        return $this->end;
    }

    public function setEnd(DateTime $end): void
    {
        $this->end = $end;
    }

    public function getSemesterSplit(): ?string
    {
        return $this->semesterSplit;
    }

    public function setSemesterSplit(string $semesterSplit): void
    {
        $this->semesterSplit = $semesterSplit;
    }

    public function __toString()
    {
        return 'Занятие ' . $this->getId();
    }
}
