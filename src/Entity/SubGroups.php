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
     * @var Groups
     */
    private $groups;

    /**
     * @var int
     */
    private $studentNumber;

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

    public function getGroups(): ?Groups
    {
        return $this->groups;
    }

    public function setGroups(Groups $groups): void
    {
        $this->groups = $groups;
    }

    public function getStudentNumber(): ?int
    {
        return $this->studentNumber;
    }

    public function setStudentNumber(int $studentNumber): void
    {
        $this->studentNumber = $studentNumber;
    }
}
