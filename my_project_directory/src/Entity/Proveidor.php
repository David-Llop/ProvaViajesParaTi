<?php

namespace App\Entity;

class Proveidor
{
    protected $nom;
    protected $mail;
    protected $telf;
    protected $tipus;
    protected $actiu;
    protected $insert;  // data inserció bd
    protected $update;  // data última actualització

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
        return $this->insert;
    }

    public function setInsert(int $insert)
    {
        $this->insert=$insert;
    }

    public function getUpdate(): int
    {
        return $this->update;
    }

    public function setUpdate(int $update)
    {
        $this->update=$update;
    }
}
?>