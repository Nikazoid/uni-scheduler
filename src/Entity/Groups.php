<?php

namespace App\Entity;

class Groups
{
    public const GROUPS_EDUCATION_TYPE_REGULAR = 'Редовно';
    public const GROUPS_EDUCATION_TYPE_ABSENTIA = 'Задочно';

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
    private $subGroup;

    /**
     * @var Specialty
     */
    private $specialty;

    /**
     * @var int
     */
    private $studentNumber;

    /**
     * @var string
     */
    private $educationType;

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

    public function getSubGroup(): ?string
    {
        return $this->subGroup;
    }

    public function setSubGroup(string $subGroup): void
    {
        $this->subGroup = $subGroup;
    }

    public function getSpecialty(): ?Specialty
    {
        return $this->specialty;
    }

    public function setSpecialty(?Specialty $specialty): void
    {
        $this->specialty = $specialty;
    }

    public function getStudentNumber(): ?int
    {
        return $this->studentNumber;
    }

    public function setStudentNumber(int $studentNumber): void
    {
        $this->studentNumber = $studentNumber;
    }

    public function getEducationType(): ?string
    {
        return $this->educationType;
    }

    public function setEducationType(string $educationType): void
    {
        $this->educationType = $educationType;
    }

    public function __toString()
    {
        return $this->name;
    }
}
