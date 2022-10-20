<?php

namespace App\Entity;

use App\Repository\ProductSizePriceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductSizePriceRepository::class)]
class ProductSizePrice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 10)]
    private $category_1;

    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $category_2;

    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private $category_3;

    #[ORM\OneToMany(mappedBy: 'id_price_category', targetEntity: Product::class)]
    private $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
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

    public function getCategory1(): ?string
    {
        return $this->category_1;
    }

    public function setCategory1(string $category_1): self
    {
        $this->category_1 = $category_1;

        return $this;
    }

    public function getCategory2(): ?string
    {
        return $this->category_2;
    }

    public function setCategory2(?string $category_2): self
    {
        $this->category_2 = $category_2;

        return $this;
    }

    public function getCategory3(): ?string
    {
        return $this->category_3;
    }

    public function setCategory3(?string $category_3): self
    {
        $this->category_3 = $category_3;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setIdPriceCategory($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getIdPriceCategory() === $this) {
                $product->setIdPriceCategory(null);
            }
        }

        return $this;
    }
}
