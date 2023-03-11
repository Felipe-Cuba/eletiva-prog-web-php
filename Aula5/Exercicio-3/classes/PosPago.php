<?php

require_once 'Celular.php';

class PosPago extends Celular
{
  public function calculaCusto(int $tempoLigacao): float
  {
    return $tempoLigacao * ($this->custoMinutoBase * 0.9);
  }
}

?>