<?php

require_once 'Celular.php';

class PrePago extends Celular
{
  public function calculaCusto(int $tempoLigacao): float
  {
    return $tempoLigacao * ($this->custoMinutoBase * 1.4);
  }
}

?>