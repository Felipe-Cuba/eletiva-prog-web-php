<?php
require_once 'Funcionario.php';

class MestreDeObras extends Servente
{
  private const ADIC_GRUPO = 0.1;
  private int $numFuncSupervisionados;

  public function __construct(int $cod, string $nome, float $salarioBase, int $numFuncSupervisionados)
  {
    parent::__construct($cod, $nome, $salarioBase);
    $this->numFuncSupervisionados = $numFuncSupervisionados;
  }

  public function getNumFuncSupervisionados(): int
  {
    return $this->numFuncSupervisionados;
  }

  public function setNumFuncSupervisionados(int $numFuncSupervisionados): void
  {
    $this->numFuncSupervisionados = $numFuncSupervisionados;
  }

  public function getSalarioLiquido(): float
  {
    $salarioLiquido = parent::getSalarioLiquido();
    $adicionalGrupo = floor($this->numFuncSupervisionados / 10) * self::ADIC_GRUPO;
    return $salarioLiquido * (1 + $adicionalGrupo);
  }
}