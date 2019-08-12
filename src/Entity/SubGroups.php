<?php

namespace App\Entity;

class SubGroups
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
     * @var int
     */
    private $studentNumber;

    /**
     * @var Groups
     */
    private $groups;

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

    public function getStudentNumber(): ?int
    {
        return $this->studentNumber;
    }

    public function setStudentNumber(int $studentNumber): void
    {
        $this->studentNumber = $studentNumber;
    }

    public function getGroups(): ?Groups
    {
        return $this->groups;
    }

    public function setGroups(Groups $groups): void
    {
        $this->groups = $groups;
    }

    public function __toString()
    {
        return $this->name;
    }
}
