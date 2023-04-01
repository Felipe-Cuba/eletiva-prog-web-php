<?php

namespace App\Models\Entidades;

class Usuario
{
    private int $id;
    private string $nome;
    private string $email;
    private string $data_cadastro;

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}