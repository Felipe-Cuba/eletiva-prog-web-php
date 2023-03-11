<?php
require_once "Funcionario.php";
class Servente extends Funcionario
{
  private const ADICIONAL_INSALUBRIDADE = 0.05;

  public function getAdicionalInsalubridade(): float
  {
    return $this->getSalarioBase() * self::ADICIONAL_INSALUBRIDADE;
  }

  public function getSalarioLiquido(): float
  {
    return parent::getSalarioLiquido() + $this->getAdicionalInsalubridade();
  }
}