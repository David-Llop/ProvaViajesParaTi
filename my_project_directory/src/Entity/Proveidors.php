<?php

namespace App\Entity;

use App\Repository\ProveidorRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProveidorRepository::class)
 */

class Proveidors
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
    protected $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $mail;

    /**
     * @ORM\Column(type="string", length=9)
     */
    protected $telf;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $tipus;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $actiu;

    /**
     * @ORM\Column(type="integer")
     */
    protected $creacio;  // data inserció bd

    /**
     * @ORM\Column(type="integer")
     */
    protected $actualitzacio;  // data última actualització

    public function getNom(): String
    {
        return $this->nom;
    }

    public function setNom(string $nom)
    {
        $this->nom = $nom;
    }

    public function getMail(): String
    {
        return $this->mail;
    }

    public function setMail(string $mail)
    {
        $this->mail = $mail;
    }

    public function getTelf(): String
    {
        return $this->telf;
    }

    public function setTelf(string $telf)
    {
        $this->telf=$telf;
    }

    public function getTipus(): String
    {
        return $this->tipus;
    }

    public function setTipus(string $tipus)
    {
        $this->tipus=$tipus;
    }

    public function getActiu(): bool
    {
        return $this->actiu;
    }

    public function setActiu(bool $actiu)
    {
        $this->actiu=$actiu;
    }

    public function getInsert(): int
    {
        return $this->creacio;
    }

    public function setInsert(int $insert)
    {
        $this->creacio=$insert;
    }

    public function getUpdate(): int
    {
        return $this->actualitzacio;
    }

    public function setUpdate(int $update)
    {
        $this->actualitzacio=$update;
    }
}
?>