<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DienstRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     collectionOperations={"get"},
 *     itemOperations={"get"}
 * )
 * @ORM\Entity(repositoryClass=DienstRepository::class)
 */
class Dienst
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups("kamer:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("kamer:read")
     */
    private $omschrijving;

    /**
     * @ORM\ManyToMany(targetEntity=Kamer::class, inversedBy="diensts")
     */
    private $kamer;

    public function __construct()
    {
        $this->kamer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|Kamer[]
     */
    public function getKamer(): Collection
    {
        return $this->kamer;
    }

    public function addKamer(Kamer $kamer): self
    {
        if (!$this->kamer->contains($kamer)) {
            $this->kamer[] = $kamer;
        }

        return $this;
    }

    public function removeKamer(Kamer $kamer): self
    {
        if ($this->kamer->contains($kamer)) {
            $this->kamer->removeElement($kamer);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getOmschrijving();
    }
}
