<?php

class Ponto
{
  private int $x;
  private int $y;
  private static int $count = 0;

  public function __construct(int $x, int $y)
  {
    $this->x = $x;
    $this->y = $y;
    self::$count++;
  }

  public function setX(int $x): void
  {
    $this->x = $x;
  }

  public function getX(): int
  {
    return $this->x;
  }

  public function setY(int $y): void
  {
    $this->y = $y;
  }

  public function getY(): int
  {
    return $this->y;
  }

  public function deslocar(int $dx, int $dy): void
  {
    $this->x += $dx;
    $this->y += $dy;
  }

  public function __toString(): string
  {
    return "($this->x, $this->y)";
  }

  public static function getCount(): int
  {
    return self::$count;
  }

  public function distanciaEntrePontos(Ponto $p): float
  {
    $dx = $this->x - $p->getX();
    $dy = $this->y - $p->getY();
    return sqrt(pow($dx, 2) + pow($dy, 2));
  }
}

$p1 = new Ponto(2, 3);
$p2 = new Ponto(-4, 1);

echo "<h2 style='font-family: Arial, sans-serif;'>Classe Ponto</h2>";

echo "<p><b>Coordenadas do Ponto 1:</b> ({$p1->getX()}, {$p1->getY()})</p>";
echo "<p><b>Coordenadas do Ponto 2:</b> ({$p2->getX()}, {$p2->getY()})</p>";

echo "<p><b>Distância entre os pontos:</b> " . $p1->distanciaEntrePontos($p2) . "</p>";

echo "<p><b>Deslocando Ponto 1:</b> ($p1) -> ";
$p1->deslocar(-1, 2);
echo "($p1)</p>";

echo "<p><b>Coordenadas do Ponto 1 após deslocamento:</b> ({$p1->getX()}, {$p1->getY()})</p>";

echo "<p><b>Total de pontos criados:</b> " . Ponto::getCount() . "</p>";