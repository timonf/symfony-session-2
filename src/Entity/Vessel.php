<?php

namespace App\Entity;

use DateTime;
use Symfony\Component\Validator\Constraints as Assert;

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

    public function getId()
    {
        return $this->id;
    }

    public function getImo()
    {
        return $this->imo;
    }

    public function setImo($imo)
    {
        $this->imo = $imo;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->imo = $name;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function getBuilt()
    {
        return $this->built;
    }

    public function setBuilt($built)
    {
        $this->built = $built;
    }
}
