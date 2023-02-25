<?php

class Fabricante
{
    private $name;
    private $contact;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getContact()
    {
        return $this->contact;
    }
    public function setContact($contact)
    {
        $this->contact = $contact;
    }
}
class Produto
{
    private $desc;
    private $price;

    private $qty_storage;

    private Fabricante $fabricante;

    function __construct($desc, $price, Fabricante $fabricante)
    {
        $this->desc = $desc;
        $this->price = $price;
        $this->fabricante = $fabricante;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getDesc()
    {
        return $this->desc;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setDesc($desc)
    {
        $this->desc = $desc;
    }

    public function getDetails()
    {
        $newPrice = number_format($this->price, 2, ',', '.');
        return "O preço do produto {$this->desc} é R$ {$newPrice}. 
        É vendido pelo fabricante {$this->fabricante->getName()}";
    }
}


$f1 = new Fabricante;
$f1->setContact('18981793652');
$f1->setName('Felipe Cuba');

$p1 = new Produto("Livro", 100.00, $f1);

echo $p1->getDetails();