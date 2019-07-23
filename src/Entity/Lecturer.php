<?php

namespace App\Entity;

class Lecturer
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $middleName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string|null
     */
    private $leadingExercises;

    /**
     * @var string|null
     */
    private $academicTitle;

    /**
     * @var string|null
     */
    private $scientificTitle;

    /**
     * @var string|null
     */
    private $contract;

    /**
     * @var int|null
     */
    private $estHours;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    public function getMiddleName(): ?string
    {
        return $this->middleName;
    }

    public function setMiddleName(string $middleName)
    {
        $this->middleName = $middleName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function getLeadingExercises(): ?string
    {
        return $this->leadingExercises;
    }

    public function setLeadingExercises(?string $leadingExercises)
    {
        $this->leadingExercises = $leadingExercises;
    }

    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }

    public function getAcademicTitle(): ?string
    {
        return $this->academicTitle;
    }

    public function setAcademicTitle(?string $academicTitle)
    {
        $this->academicTitle = $academicTitle;
    }

    public function getScientificTitle(): ?string
    {
        return $this->scientificTitle;
    }

    public function setScientificTitle(?string $scientificTitle)
    {
        $this->scientificTitle = $scientificTitle;
    }

    public function getContract(): ?string
    {
        return $this->contract;
    }

    public function setContract(?string $contract)
    {
        $this->contract = $contract;
    }

    public function getEstHours(): ?int
    {
        return $this->estHours;
    }

    public function setEstHours(?int $estHours)
    {
        $this->estHours = $estHours;
    }
}
