<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LocatieRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     collectionOperations={"get"},
 *     itemOperations={"get"}
 * )
 * @ORM\Entity(repositoryClass=LocatieRepository::class)
 */
class Locatie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("activiteit:read")
     */
    private $naam;

    /**
     * @ORM\Column(type="integer")
     * @Groups("activiteit:read")
     */
    private $km;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("activiteit:read")
     */
    private $adres;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("activiteit:read")
     */
    private $website;

    /**
     * @ORM\Column(type="text")
     * @Groups("activiteit:read")
     */
    private $omschrijving;

    /**
     * @ORM\ManyToOne(targetEntity=Activiteit::class, inversedBy="locaties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $activiteit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getKm(): ?int
    {
        return $this->km;
    }

    public function setKm(int $km): self
    {
        $this->km = $km;

        return $this;
    }

    public function getAdres(): ?string
    {
        return $this->adres;
    }

    public function setAdres(string $adres): self
    {
        $this->adres = $adres;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getOmschrijving(): ?string
    {
        return $this->omschrijving;
    }

    public function setOmschrijving(string $omschrijving): self
    {
        $this->omschrijving = $omschrijving;

        return $this;
    }

    public function getActiviteit(): ?Activiteit
    {
        return $this->activiteit;
    }

    public function setActiviteit(?Activiteit $activiteit): self
    {
        $this->activiteit = $activiteit;

        return $this;
    }

    public function __toString()
    {
        return $this->getNaam();
    }
}
