<?php

namespace App\Entity;

use App\Repository\CatalogProductRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CatalogProductRepository::class)]
class CatalogProduct
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: CatalogEvent::class, inversedBy: 'id_catalog')]
    #[ORM\JoinColumn(nullable: false)]
    private $id_catalog;

    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: 'id_product')]
    #[ORM\JoinColumn(nullable: false)]
    private $id_product;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCatalog(): ?CatalogEvent
    {
        return $this->id_catalog;
    }

    public function setIdCatalog(?CatalogEvent $id_catalog): self
    {
        $this->id_catalog = $id_catalog;

        return $this;
    }

    public function getIdProduct(): ?Product
    {
        return $this->id_product;
    }

    public function setIdProduct(?Product $id_product): self
    {
        $this->id_product = $id_product;

        return $this;
    }
}
