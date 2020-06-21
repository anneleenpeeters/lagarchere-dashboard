<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Controller\MailController;

/**
 * @ApiResource(
 *     collectionOperations={"post", "get"},
 *     itemOperations={"get"}
 * )
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
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
    private $voornaam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $achternaam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="text")
     */
    private $bericht;

    /**
     * @ORM\Column(type="boolean")
     */
    private $responded;

    public function __construct($voornaam, $achternaam, $email, $bericht)
    {
        $mailer = new MailController();
        $mailer->sendMailContact(ucfirst($voornaam), ucfirst($achternaam), $email, $bericht);
        $this->setVoornaam($voornaam);
        $this->setAchternaam($achternaam);
        $this->setBericht($bericht);
        $this->setEmail($email);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVoornaam(): ?string
    {
        return $this->voornaam;
    }

    public function setVoornaam(string $voornaam): self
    {
        $this->voornaam = ucfirst($voornaam);
        return $this;
    }

    public function getAchternaam(): ?string
    {
        return $this->achternaam;
    }

    public function setAchternaam(string $achternaam): self
    {
        $this->achternaam = ucfirst($achternaam);

        return $this;
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

    public function getBericht(): ?string
    {
        return $this->bericht;
    }

    public function setBericht(string $bericht): self
    {
        $this->bericht = $bericht;
        return $this;
    }

    public function getResponded(): ?bool
    {
        return $this->responded;
    }

    public function setResponded(bool $responded): self
    {
        $this->responded = $responded;
        return $this;
    }


}
