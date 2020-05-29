<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ActiviteitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     collectionOperations={"get"},
 *     itemOperations={"get"},
 *     normalizationContext={"groups"={"activiteit:read"}}
 * )
 * @ORM\Entity(repositoryClass=ActiviteitRepository::class)
 */
class Activiteit
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
    private $titel;

    /**
     * @ORM\OneToMany(targetEntity=Locatie::class, mappedBy="activiteit")
     * @Groups("activiteit:read")
     */
    private $locaties;

    public function __construct()
    {
        $this->locaties = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitel(): ?string
    {
        return $this->titel;
    }

    public function setTitel(string $titel): self
    {
        $this->titel = $titel;

        return $this;
    }

    /**
     * @return Collection|Locatie[]
     */
    public function getLocaties(): Collection
    {
        return $this->locaties;
    }

    public function addLocaty(Locatie $locaty): self
    {
        if (!$this->locaties->contains($locaty)) {
            $this->locaties[] = $locaty;
            $locaty->setActiviteit($this);
        }

        return $this;
    }

    public function removeLocaty(Locatie $locaty): self
    {
        if ($this->locaties->contains($locaty)) {
            $this->locaties->removeElement($locaty);
            // set the owning side to null (unless already changed)
            if ($locaty->getActiviteit() === $this) {
                $locaty->setActiviteit(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getTitel();
    }
}
