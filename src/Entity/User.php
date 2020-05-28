<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     collectionOperations={"post", "get"},
 *     itemOperations={"get", "put"},
 *     normalizationContext={"groups"={"user:read"}},
 *     denormalizationContext={"groups"={"user:write"}}
 * )
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"})
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\NotBlank(message="Dit veld is verplicht.")
     * @Groups({"user:read", "user:write"})
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Dit veld is verplicht.")
     * @Groups({"user:write"})
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Dit veld is verplicht.")
     * @Groups({"user:read", "user:write"})
     */
    private $voornaam;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Dit veld is verplicht.")
     * @Groups({"user:read", "user:write"})
     */
    private $achternaam;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Dit veld is verplicht.")
     * @Groups({"user:read", "user:write"})
     */
    private $telefoonnr;

    /**
     * @ORM\OneToMany(targetEntity=Reservatie::class, mappedBy="user", cascade={"persist"})
     * @Groups({"user:read"})
     */
    private $reservaties;

    public function __construct()
    {
        $this->reservaties = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function __toString()
    {
        return $this->getEmail();
    }

    public function getVoornaam(): ?string
    {
        return $this->voornaam;
    }

    public function setVoornaam(string $voornaam): self
    {
        $this->voornaam = $voornaam;

        return $this;
    }

    public function getAchternaam(): ?string
    {
        return $this->achternaam;
    }

    public function setAchternaam(string $achternaam): self
    {
        $this->achternaam = $achternaam;

        return $this;
    }

    public function getTelefoonnr(): ?string
    {
        return $this->telefoonnr;
    }

    public function setTelefoonnr(string $telefoonnr): self
    {
        $this->telefoonnr = $telefoonnr;

        return $this;
    }

    /**
     * @return Collection|Reservatie[]
     */
    public function getReservaties(): Collection
    {
        return $this->reservaties;
    }

    public function addReservaty(Reservatie $reservaty): self
    {
        if (!$this->reservaties->contains($reservaty)) {
            $this->reservaties[] = $reservaty;
            $reservaty->setUser($this);
        }

        return $this;
    }

    public function removeReservaty(Reservatie $reservaty): self
    {
        if ($this->reservaties->contains($reservaty)) {
            $this->reservaties->removeElement($reservaty);
            // set the owning side to null (unless already changed)
            if ($reservaty->getUser() === $this) {
                $reservaty->setUser(null);
            }
        }

        return $this;
    }

}
