<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\KamerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ApiResource(
 *     collectionOperations={"get"},
 *     itemOperations={"get"}
 * )
 * @ORM\Entity(repositoryClass=KamerRepository::class)
 * @Vich\Uploadable()
 */
class Kamer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $naam;

    /**
     * @ORM\Column(type="integer")
     */
    private $personen;

    /**
     * @ORM\Column(type="integer")
     */
    private $oppervlakte;

    /**
     * @ORM\Column(type="text")
     */
    private $omschrijving;

    /**
     * @ORM\Column(type="float")
     */
    private $prijslaagseizoen;

    /**
     * @ORM\Column(type="float")
     */
    private $prijshoogseizoen;

    /**
     * @ORM\OneToMany(targetEntity=Reservatie::class, mappedBy="kamer", cascade={"persist"})
     */
    private $reservaties;

    /**
     * @ORM\ManyToMany(targetEntity=Dienst::class, mappedBy="kamer", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $diensts;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $thumbnail;

    /**
     * @Vich\UploadableField(mapping="kamer_thumbnails", fileNameProperty="thumbnail")
     */
    private $thumbnailFile;

    /**
     * @return mixed
     */
    public function getThumbnailFile()
    {
        return $this->thumbnailFile;
    }

    public function setThumbnailFile($thumbnailFile): void
    {
        $this->thumbnailFile = $thumbnailFile;
        if($thumbnailFile){
            $this->updatedAt = new \DateTime();
        }
    }

    /**
    * @ORM\Column(type="datetime")
    */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity=KamerImage::class, mappedBy="kamer", cascade={"persist"})
     */
    private $kamerImages;

    public function __construct()
    {
        $this->reservaties = new ArrayCollection();
        $this->diensts = new ArrayCollection();
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->kamerImages = new ArrayCollection();
    }

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

    public function getPersonen(): ?int
    {
        return $this->personen;
    }

    public function setPersonen(int $personen): self
    {
        $this->personen = $personen;

        return $this;
    }

    public function getOppervlakte(): ?int
    {
        return $this->oppervlakte;
    }

    public function setOppervlakte(int $oppervlakte): self
    {
        $this->oppervlakte = $oppervlakte;

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

    public function getPrijslaagseizoen(): ?float
    {
        return $this->prijslaagseizoen;
    }

    public function setPrijslaagseizoen(float $prijslaagseizoen): self
    {
        $this->prijslaagseizoen = $prijslaagseizoen;

        return $this;
    }

    public function getPrijshoogseizoen(): ?float
    {
        return $this->prijshoogseizoen;
    }

    public function setPrijshoogseizoen(float $prijshoogseizoen): self
    {
        $this->prijshoogseizoen = $prijshoogseizoen;

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
            $reservaty->setKamer($this);
        }

        return $this;
    }

    public function removeReservaty(Reservatie $reservaty): self
    {
        if ($this->reservaties->contains($reservaty)) {
            $this->reservaties->removeElement($reservaty);
            // set the owning side to null (unless already changed)
            if ($reservaty->getKamer() === $this) {
                $reservaty->setKamer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Dienst[]
     */
    public function getDiensts(): Collection
    {
        return $this->diensts;
    }

    public function addDienst(Dienst $dienst): self
    {
        if (!$this->diensts->contains($dienst)) {
            $this->diensts[] = $dienst;
            $dienst->addKamer($this);
        }

        return $this;
    }

    public function removeDienst(Dienst $dienst): self
    {
        if ($this->diensts->contains($dienst)) {
            $this->diensts->removeElement($dienst);
            $dienst->removeKamer($this);
        }

        return $this;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(?string $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection|KamerImage[]
     */
    public function getKamerImages(): Collection
    {
        return $this->kamerImages;
    }

    public function addKamerImage(KamerImage $kamerImage): self
    {
        if (!$this->kamerImages->contains($kamerImage)) {
            $this->kamerImages[] = $kamerImage;
            $kamerImage->setKamer($this);
        }

        return $this;
    }

    public function removeKamerImage(KamerImage $kamerImage): self
    {
        if ($this->kamerImages->contains($kamerImage)) {
            $this->kamerImages->removeElement($kamerImage);
            // set the owning side to null (unless already changed)
            if ($kamerImage->getKamer() === $this) {
                $kamerImage->setKamer(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getNaam();
    }
}
