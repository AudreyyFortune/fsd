<?php

namespace App\Entity;

use App\Repository\CountryTranslationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountryTranslationRepository::class)]
class CountryTranslation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 2)]
    private $locale;

    #[ORM\ManyToOne(targetEntity: Country::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $id_country;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $name_file;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $title;

    #[ORM\Column(type: 'text', nullable: true)]
    private $meta_description;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $intro_title;

    #[ORM\Column(type: 'text', nullable: true)]
    private $intro_text;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $order_title;

    #[ORM\Column(type: 'text', nullable: true)]
    private $order_text;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $delivery_title;

    #[ORM\Column(type: 'text', nullable: true)]
    private $delivery_text;

    #[ORM\Column(type: 'text', nullable: true)]
    private $delivery_zone_text;

    #[ORM\Column(type: 'text', nullable: true)]
    private $delivery_tarif_text;

    #[ORM\Column(type: 'text', nullable: true)]
    private $delivery_mode_text;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $opportunity_title;

    #[ORM\Column(type: 'text', nullable: true)]
    private $opportunity_text;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    public function getIdCountry(): ?Country
    {
        return $this->id_country;
    }

    public function setIdCountry(?Country $id_country): self
    {
        $this->id_country = $id_country;

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

    public function getNameFile(): ?string
    {
        return $this->name_file;
    }

    public function setNameFile(string $name_file): self
    {
        $this->name_file = $name_file;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getMetaDescription(): ?string
    {
        return $this->meta_description;
    }

    public function setMetaDescription(?string $meta_description): self
    {
        $this->meta_description = $meta_description;

        return $this;
    }

    public function getIntroTitle(): ?string
    {
        return $this->intro_title;
    }

    public function setIntroTitle(?string $intro_title): self
    {
        $this->intro_title = $intro_title;

        return $this;
    }

    public function getIntroText(): ?string
    {
        return $this->intro_text;
    }

    public function setIntroText(?string $intro_text): self
    {
        $this->intro_text = $intro_text;

        return $this;
    }

    public function getOrderTitle(): ?string
    {
        return $this->order_title;
    }

    public function setOrderTitle(?string $order_title): self
    {
        $this->order_title = $order_title;

        return $this;
    }

    public function getOrderText(): ?string
    {
        return $this->order_text;
    }

    public function setOrderText(?string $order_text): self
    {
        $this->order_text = $order_text;

        return $this;
    }

    public function getDeliveryTitle(): ?string
    {
        return $this->delivery_title;
    }

    public function setDeliveryTitle(?string $delivery_title): self
    {
        $this->delivery_title = $delivery_title;

        return $this;
    }

    public function getDeliveryText(): ?string
    {
        return $this->delivery_text;
    }

    public function setDeliveryText(?string $delivery_text): self
    {
        $this->delivery_text = $delivery_text;

        return $this;
    }

    public function getDeliveryZoneText(): ?string
    {
        return $this->delivery_zone_text;
    }

    public function setDeliveryZoneText(?string $delivery_zone_text): self
    {
        $this->delivery_zone_text = $delivery_zone_text;

        return $this;
    }

    public function getDeliveryTarifText(): ?string
    {
        return $this->delivery_tarif_text;
    }

    public function setDeliveryTarifText(?string $delivery_tarif_text): self
    {
        $this->delivery_tarif_text = $delivery_tarif_text;

        return $this;
    }

    public function getDeliveryModeText(): ?string
    {
        return $this->delivery_mode_text;
    }

    public function setDeliveryModeText(?string $delivery_mode_text): self
    {
        $this->delivery_mode_text = $delivery_mode_text;

        return $this;
    }

    public function getOpportunityTitle(): ?string
    {
        return $this->opportunity_title;
    }

    public function setOpportunityTitle(?string $opportunity_title): self
    {
        $this->opportunity_title = $opportunity_title;

        return $this;
    }

    public function getOpportunityText(): ?string
    {
        return $this->opportunity_text;
    }

    public function setOpportunityText(?string $opportunity_text): self
    {
        $this->opportunity_text = $opportunity_text;

        return $this;
    }
}
