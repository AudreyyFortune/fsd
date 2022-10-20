<?php

namespace App\Entity;

use App\Repository\CatalogEventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CatalogEventRepository::class)]
class CatalogEvent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $key_translation;

    #[ORM\Column(type: 'boolean')]
    private $enabled;

    #[ORM\ManyToMany(targetEntity: CatalogProduct::class, mappedBy: 'id_catalog')]
    private $catalogProducts;

    #[ORM\OneToMany(mappedBy: 'id_catalog', targetEntity: CatalogProduct::class)]
    private $id_catalog;

    public function __construct()
    {
        $this->catalogProducts = new ArrayCollection();
        $this->id_catalog = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getKeyTranslation(): ?string
    {
        return $this->key_translation;
    }

    public function setKeyTranslation(string $key_translation): self
    {
        $this->key_translation = $key_translation;

        return $this;
    }

    public function isEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * @return Collection<int, CatalogProduct>
     */
    public function getCatalogProducts(): Collection
    {
        return $this->catalogProducts;
    }

    /**
     * @return Collection<int, CatalogProduct>
     */
    public function getIdCatalog(): Collection
    {
        return $this->id_catalog;
    }

    public function addIdCatalog(CatalogProduct $idCatalog): self
    {
        if (!$this->id_catalog->contains($idCatalog)) {
            $this->id_catalog[] = $idCatalog;
            $idCatalog->setIdCatalog($this);
        }

        return $this;
    }

    public function removeIdCatalog(CatalogProduct $idCatalog): self
    {
        if ($this->id_catalog->removeElement($idCatalog)) {
            // set the owning side to null (unless already changed)
            if ($idCatalog->getIdCatalog() === $this) {
                $idCatalog->setIdCatalog(null);
            }
        }

        return $this;
    }
}
