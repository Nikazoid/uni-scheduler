<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Faculty
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
     * @var Rooms[]|ArrayCollection
     */
    private $rooms;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAbbreviation(): ?string
    {
        return $this->abbreviation;
    }

    public function setAbbreviation(string $abbreviation): void
    {
        $this->abbreviation = $abbreviation;
    }

    public function getRooms()
    {
        return $this->rooms;
    }

    public function addRooms(Rooms $rooms)
    {
        if (!$this->rooms->contains($rooms)) {
            $this->rooms->add($rooms);
        }
    }

    public function removeRooms(Rooms $rooms)
    {
        $this->rooms->removeElement($rooms);
    }

    public function __toString() {
        return $this->abbreviation;
    }
}
