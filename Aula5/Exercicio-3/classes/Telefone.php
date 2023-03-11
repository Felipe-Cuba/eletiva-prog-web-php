<?php

abstract class Telefone
{
  protected int $ddd;
  protected string $numero;

  public function __construct(int $ddd, string $numero)
  {
    $this->ddd = $ddd;
    $this->numero = $numero;
  }

  abstract public function calculaCusto(int $tempoLigacao): float;

  public function getDdd(): int
  {
    return $this->ddd;
  }

  public function getNumero(): string
  {
    return $this->numero;
  }
}
?>