<?php

require_once 'Funcionario.php';

class Motorista extends Funcionario
{
  private string $numeroCarteira;

  public function __construct(int $codigo, string $nome, float $salarioBase, string $numeroCarteira)
  {
    parent::__construct($codigo, $nome, $salarioBase);
    $this->numeroCarteira = $numeroCarteira;
  }

  public function getNumeroCarteira(): string
  {
    return $this->numeroCarteira;
  }

  public function setNumeroCarteira(string $numeroCarteira): void
  {
    $this->numeroCarteira = $numeroCarteira;
  }
}

?>