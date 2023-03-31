<?php
class Curso
{
  private int $id;
  private string $nome;
  private string $descricao;
  private string $imagem;
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
