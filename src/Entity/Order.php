<?php

namespace App\Entity;

use App\Entity\user\Recipient;
use App\Entity\user\Sender;
use App\Repository\OrderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

	#[ORM\Column(type: 'integer')]
    private $id_product;

    #[ORM\Column(type: 'string', length: 10)]
    private $product_price;

    #[ORM\ManyToOne(targetEntity: Recipient::class, inversedBy: 'orders', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $recipient;

    #[ORM\ManyToOne(targetEntity: Sender::class, inversedBy: 'orders', cascade: ['persist','remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $sender;

    #[ORM\Column(type: 'datetime')]
    private $order_date;

    #[ORM\Column(type: 'string', length: 100)]
    private $total;

    #[ORM\Column(type: 'date')]
    private $delivery_date;

    #[ORM\Column(type: 'time', nullable: true)]
    private $delivery_hour;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProduct(): ?int
    {
        return $this->id_product;
    }

    public function setIdProduct(?int $id_product): self
    {
        $this->id_product = $id_product;

        return $this;
    }

    public function getProductPrice(): ?string
    {
        return $this->product_price;
    }

    public function setProductPrice(string $product_price): self
    {
        $this->product_price = $product_price;

        return $this;
    }

    public function getRecipient(): ?Recipient
    {
        return $this->recipient;
    }

    public function setRecipient(?Recipient $recipient): self
    {
        $this->recipient = $recipient;

        return $this;
    }

    public function getSender(): ?Sender
    {
        return $this->sender;
    }

    public function setSender(?Sender $sender): self
    {
        $this->sender = $sender;

        return $this;
    }

    public function getOrderDate(): ?\DateTimeInterface
    {
        return $this->order_date;
    }

    public function setOrderDate(\DateTimeInterface $order_date): self
    {
        $this->order_date = $order_date;

        return $this;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(string $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getDeliveryDate(): ?\DateTimeInterface
    {
        return $this->delivery_date;
    }

    public function setDeliveryDate(\DateTimeInterface $delivery_date): self
    {
        $this->delivery_date = $delivery_date;

        return $this;
    }

    public function getDeliveryHour(): ?\DateTimeInterface
    {
        return $this->delivery_hour;
    }

    public function setDeliveryHour(?\DateTimeInterface $delivery_hour): self
    {
        $this->delivery_hour = $delivery_hour;

        return $this;
    }
}
