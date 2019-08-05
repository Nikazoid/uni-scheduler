<?php

namespace App\Entity;

class Rooms
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $roomNumber;

    /**
     * @var Faculty
     */
    private $faculty;

    /**
     * @var int
     */
    private $capacity;

    /**
     * @var int
     */
    private $seats;

    public function getId(): int
    {
        return $this->id;
    }

    public function getRoomNumber(): ?int
    {
        return $this->roomNumber;
    }

    public function setRoomNumber(int $roomNumber): void
    {
        $this->roomNumber = $roomNumber;
    }

    public function getFaculty(): ?Faculty
    {
        return $this->faculty;
    }

    public function setFaculty(Faculty $faculty): void
    {
        $this->faculty = $faculty;
    }

    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity): void
    {
        $this->capacity = $capacity;
    }

    public function getSeats(): ?int
    {
        return $this->seats;
    }

    public function setSeats(int $seats): void
    {
        $this->seats = $seats;
    }

    public function __toString() {
        return 'Room '. $this->roomNumber;
    }
}
