<?php

// Implemente através do mecanismo de herança, um cadastro de pessoas 
// em uma faculdade, em uma faculdade podemos ter três tipos 
// de pessoas: professor, funcionário e aluno. O cadastro de professores 
// deve armazenar as informações de cpf, nome, email, matricula, carga horario, 
// salario e departamento. O cadastro de funcionarios deve armazenar as 
// informações de nome, cpf, email, matricula, regime, salario. O cadastro de 
// alunos deve armazenar as informações de nome, cpf, email, ra, curso e termo 
// que se encontra. Os professores e os funcionários devem possuir um método 
// que atualiza seus salários e os alunos um método que altere o seu termo. 
// Deve existir também um método para retornar os dados da pessoa, retornando 
// um objeto com as informações nome, cpf e email.
// Implemente e teste as classes derivadas.

class Pessoa
{
    private string $cpf;
    private string $email;
    private string $nome;

    function __construct(string $cpf, string $email, string $nome)
    {
    }

    protected function setCpf(string $cpf)
    {
        if (gettype($cpf) == "string") {
            $this->cpf = $cpf;
        } else {
            print_r("Valor inserido no CPF está incorreto");
            return;
        }
    }

    protected function setEmail(string $email)
    {
        if (gettype($email) == "string") {
            $this->email = $email;
        } else {
            print_r("Valor inserido no email está incorreto");
            return;
        }
    }

    protected function setNome(string $nome)
    {
        if (gettype($nome) == "string") {
            $this->nome = $nome;
        } else {
            print_r("Valor inserido no nome está incorreto");
            return;
        }
    }

    public function getData()
    {
        return "Nome: {$this->nome} | Email: {$this->email} | CPF: {$this->cpf}";
    }
}
