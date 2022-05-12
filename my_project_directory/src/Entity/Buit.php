<?php

namespace App\Entity;

class Buit
{
    protected $a;

    public function getA(): String
    {
        return $this->a;
    }

    public function setA(string $a)
    {
        $this->a=$a;
    }
}

?>