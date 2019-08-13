<?php

namespace App\Entity;

use DateTime;

class Specialty
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
     * @var DateTime
     */
    private $startYear;

    /**
     * @var DateTime
     */
    private $endYear;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
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

    public function getStartYear(): ?DateTime
    {
        return $this->startYear;
    }

    public function setStartYear(DateTime $startYear): void
    {
        $this->startYear = $startYear;
    }

    public function getEndYear(): ?DateTime
    {
        return $this->endYear;
    }

    public function setEndYear(DateTime $endYear): void
    {
        $this->endYear = $endYear;
    }

    public function __toString()
    {
        $dateStart = $this->startYear->format('Y');
        $dateEnd = $this->endYear->format('Y');
        return $this->name . " " . $dateStart . "/" . $dateEnd;
    }
}
