<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    public const FUNERAL_CATEGORY_ID = 8;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 5)]
    private $reference;

    #[ORM\Column(type: 'string', length: 100)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $src_img;

    #[ORM\ManyToOne(targetEntity: ProductSizePrice::class, inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    private $id_price_category;

    #[ORM\OneToMany(mappedBy: 'id_product', targetEntity: ProductTranslation::class)]
    private $productTranslations;

    #[ORM\OneToMany(mappedBy: 'id_product', targetEntity: CatalogProduct::class)]
    private $id_product;

    public $session;

    #[ORM\Column(type: 'boolean')]
    private $isFuneral;

    #[ORM\OneToMany(mappedBy: 'id_product', targetEntity: Order::class)]
    private $orders;

    public function __construct(SessionInterface $session)
    {
        $this->productTranslations = new ArrayCollection();
        $this->id_product = new ArrayCollection();
        $this->session = $session;
        $this->orders = new ArrayCollection();
    }
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
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

    public function getSrcImg(): ?string
    {
        return $this->src_img;
    }

    public function setSrcImg(string $src_img): self
    {
        $this->src_img = $src_img;

        return $this;
    }

    public function getIdPriceCategory(): ?ProductSizePrice
    {
        return $this->id_price_category;
    }

    public function setIdPriceCategory(?ProductSizePrice $id_price_category): self
    {
        $this->id_price_category = $id_price_category;

        return $this;
    }

    /**
     * @return Collection<int, ProductTranslation>
     */
    public function getProductTranslations(): Collection
    {
        return $this->productTranslations;
    }

    public function addProductTranslation(ProductTranslation $productTranslation): self
    {
        if (!$this->productTranslations->contains($productTranslation)) {
            $this->productTranslations[] = $productTranslation;
            $productTranslation->setIdProduct($this);
        }

        return $this;
    }

    public function removeProductTranslation(ProductTranslation $productTranslation): self
    {
        if ($this->productTranslations->removeElement($productTranslation)) {
            // set the owning side to null (unless already changed)
            if ($productTranslation->getIdProduct() === $this) {
                $productTranslation->setIdProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CatalogProduct>
     */
    public function getIdProduct(): Collection
    {
        return $this->id_product;
    }

    public function addIdProduct(CatalogProduct $idProduct): self
    {
        if (!$this->id_product->contains($idProduct)) {
            $this->id_product[] = $idProduct;
            $idProduct->setIdProduct($this);
        }

        return $this;
    }

    public function removeIdProduct(CatalogProduct $idProduct): self
    {
        if ($this->id_product->removeElement($idProduct)) {
            // set the owning side to null (unless already changed)
            if ($idProduct->getIdProduct() === $this) {
                $idProduct->setIdProduct(null);
            }
        }

        return $this;
    }

    public function isIsFuneral(): ?bool
    {
        return $this->isFuneral;
    }

    public function setIsFuneral(bool $isFuneral): self
    {
        $this->isFuneral = $isFuneral;

        return $this;
    }

    /**
     * @return Collection<int, Order>
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
            $order->setIdProduct($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        if ($this->orders->removeElement($order)) {
            // set the owning side to null (unless already changed)
            if ($order->getIdProduct() === $this) {
                $order->setIdProduct(null);
            }
        }

        return $this;
    }

}
