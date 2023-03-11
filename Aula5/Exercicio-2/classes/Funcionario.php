<?php

class Funcionario
{
  private string $nome;
  private int $codigo;
  private float $salarioBase;

  public function __construct(int $codigo, string $nome, float $salarioBase)
  {
    $this->codigo = $codigo;
    $this->nome = $nome;
    $this->salarioBase = $salarioBase;
  }

  public function getNome(): string
  {
    return $this->nome;
  }

  public function getCodigo(): int
  {
    return $this->codigo;
  }

  public function getSalarioBase(): float
  {
    return $this->salarioBase;
  }

  public function setSalarioBase(float $salarioBase): void
  {
    $this->salarioBase = $salarioBase;
  }

  public function getSalarioLiquido(): float
  {
    $inss = $this->salarioBase * 0.1;
    $ir = 0.0;
    if ($this->salarioBase > 2000.0) {
      $ir = ($this->salarioBase - 2000.0) * 0.12;
    }
    return $this->salarioBase - $inss - $ir;
  }

  public function __toString(): string
  {
    return sprintf(
      "%s\n Codigo: %d\n Nome: %s\n Salario Base: %.2f\n Salario liquido: %.2f",
      static::class,
      $this->getCodigo(),
      $this->getNome(),
      $this->getSalarioBase(),
      $this->getSalarioLiquido()
    );
  }
}