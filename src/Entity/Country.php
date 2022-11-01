<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountryRepository::class)]
class Country
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 2, unique: true)]
    private $isocode;

    #[ORM\Column(type: 'string', length: 100)]
    private $sapa;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsocode(): ?string
    {
        return $this->isocode;
    }

    public function setIsocode(string $isocode): self
    {
        $this->isocode = $isocode;

        return $this;
    }

    public function getSapa(): ?string
    {
        return $this->sapa;
    }

    public function setSapa(string $sapa): self
    {
        $this->sapa = $sapa;

        return $this;
    }
}
