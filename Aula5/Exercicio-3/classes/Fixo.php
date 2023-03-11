<?php

require_once 'Telefone.php';

class Fixo extends Telefone
{
  private float $custoMinuto;

  public function __construct(int $ddd, string $numero, float $custoMinuto)
  {
    parent::__construct($ddd, $numero);
    $this->custoMinuto = $custoMinuto;
  }

  public function calculaCusto(int $tempoLigacao): float
  {
    return $tempoLigacao * $this->custoMinuto;
  }

  public function getCustoMinuto(): string
  {
    return $this->custoMinuto;
  }
}

?>