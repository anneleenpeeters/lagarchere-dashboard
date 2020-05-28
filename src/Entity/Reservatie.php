<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ReservatieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     collectionOperations={"post", "get"},
 *     itemOperations={"get"}
 * )
 * @ORM\Entity(repositoryClass=ReservatieRepository::class)
 */
class Reservatie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank(message="Dit veld is verplicht.")
     * @Groups({"user:read"})
     */
    private $aankomst;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank(message="Dit veld is verplicht.")
     * @Groups({"user:read"})
     */
    private $vertrek;


    /**
     * @ORM\ManyToOne(targetEntity=Kamer::class, inversedBy="reservaties", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank(message="Dit veld is verplicht.")
     * @Groups({"user:read"})
     */
    private $kamer;


    /**
     * @ORM\Column(type="boolean")
     */
    private $goedgekeurd;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reservaties", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->vertrek = new \DateTime();
        $this->aankomst = new \DateTime();

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAankomst(): ?\DateTimeInterface
    {
        return $this->aankomst;
    }

    public function setAankomst(\DateTimeInterface $aankomst): self
    {
        $this->aankomst = $aankomst;

        return $this;
    }

    public function getVertrek(): ?\DateTimeInterface
    {
        return $this->vertrek;
    }

    public function setVertrek(\DateTimeInterface $vertrek): self
    {
        $this->vertrek = $vertrek;

        return $this;
    }

    public function getKamer(): ?Kamer
    {
        return $this->kamer;
    }

    public function setKamer(?Kamer $kamer): self
    {
        $this->kamer = $kamer;

        return $this;
    }

    public function getGoedgekeurd(): ?bool
    {
        return $this->goedgekeurd;
    }

    public function setGoedgekeurd(bool $goedgekeurd): self
    {
        $this->goedgekeurd = $goedgekeurd;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

}
