<?php

namespace App\Entity;

use DateTime;

class Exercise
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Discipline
     */
    private $discipline;

    /**
     * @var Groups
     */
    private $groups;

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
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return Discipline
     */
    public function getDiscipline(): Discipline
    {
        return $this->discipline;
    }

    /**
     * @param Discipline $discipline
     */
    public function setDiscipline(Discipline $discipline): void
    {
        $this->discipline = $discipline;
    }

    /**
     * @return Groups
     */
    public function getGroups(): Groups
    {
        return $this->groups;
    }

    /**
     * @param Groups $groups
     */
    public function setGroups(Groups $groups): void
    {
        $this->groups = $groups;
    }

    /**
     * @return Rooms
     */
    public function getRooms(): Rooms
    {
        return $this->rooms;
    }

    /**
     * @param Rooms $rooms
     */
    public function setRooms(Rooms $rooms): void
    {
        $this->rooms = $rooms;
    }

    /**
     * @return string
     */
    public function getDayName(): string
    {
        return $this->dayName;
    }

    /**
     * @param string $dayName
     */
    public function setDayName(string $dayName): void
    {
        $this->dayName = $dayName;
    }

    /**
     * @return DateTime
     */
    public function getStart(): DateTime
    {
        return $this->start;
    }

    /**
     * @param DateTime $start
     */
    public function setStart(DateTime $start): void
    {
        $this->start = $start;
    }

    /**
     * @return DateTime
     */
    public function getEnd(): DateTime
    {
        return $this->end;
    }

    /**
     * @param DateTime $end
     */
    public function setEnd(DateTime $end): void
    {
        $this->end = $end;
    }
}
