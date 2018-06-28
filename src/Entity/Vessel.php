<?php

namespace App\Entity;

use DateTime;

class Vessel
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var int|null
     */
    private $imo;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $country;

    /**
     * @var DateTime|null
     */
    private $built;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImo(): ?int
    {
        return $this->imo;
    }

    public function setImo($imo)
    {
        $this->imo = !$imo ? (int) $imo : null;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->imo = !$name ? (string) $name : null;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry($country): void
    {
        $this->country = !$country ? (string) $country : null;
    }

    public function getBuilt(): ?DateTime
    {
        return $this->built;
    }

    public function setBuilt(?DateTime $built): void
    {
        $this->built = $built;
    }
}
