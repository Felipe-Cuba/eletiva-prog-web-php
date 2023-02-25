<?php

class Teste
{
    private int $a;
    private int $b;

    function __construct(int $a, int $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function getSoma(int $c)
    {
        return $this->a + $this->b + $c;
    }
}

$teste = new Teste(10, 30);

echo $teste->getSoma(50);