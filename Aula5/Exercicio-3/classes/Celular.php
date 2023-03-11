<?php

require_once 'Telefone.php';

abstract class Celular extends Telefone
{
  protected string $operadora;
  protected float $custoMinutoBase;

  public function __construct(int $ddd, string $numero, string $operadora, float $custoMinutoBase)
  {
    parent::__construct($ddd, $numero);
    $this->operadora = $operadora;
    $this->custoMinutoBase = $custoMinutoBase;
  }

  public function getOperadora(): string
  {
    return $this->operadora;
  }

  public function getCustoMinutoBase(): float
  {
    return $this->custoMinutoBase;
  }
}

?>