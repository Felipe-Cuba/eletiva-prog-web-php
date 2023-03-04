<?php

// Implemente através do mecanismo de herança, um cadastro de pessoas 
// em uma faculdade, em uma faculdade podemos ter três tipos 
// de pessoas: professor, funcionário e aluno. Os professores e os funcionários devem possuir um método 
// que atualiza seus salários e os alunos um método que altere o seu termo. 
// Deve existir também um método para retornar os dados da pessoa, retornando 
// um objeto com as informações nome, cpf e email.
// Implemente e teste as classes derivadas.

abstract class Pessoa
{
    protected string $cpf;
    protected string $email;
    protected string $nome;

    function __construct(string $cpf, string $email, string $nome)
    {
        $this->setCpf($cpf);
        $this->setEmail($email);
        $this->setNome($nome);
    }

    private function setCpf(string $cpf)
    {
        if (gettype($cpf) == "string") {
            $this->cpf = $cpf;
        } else {
            print_r("Valor inserido no CPF está incorreto");
            return;
        }
    }

    private function setEmail(string $email)
    {
        if (gettype($email) == "string") {
            $this->email = $email;
        } else {
            print_r("Valor inserido no email está incorreto");
            return;
        }
    }

    private function setNome(string $nome)
    {
        if (gettype($nome) == "string") {
            $this->nome = $nome;
        } else {
            print_r("Valor inserido no nome está incorreto");
            return;
        }
    }

    public function getDetalhes(): string
    {
        return "Nome: {$this->nome} | Email: {$this->email} | CPF: {$this->cpf}";
    }
}


/* O cadastro de professores 
deve armazenar as informações de cpf, nome, email, matricula, carga horario, 
salario e departamento. */
final class Professor extends Pessoa
{
    private string $matricula;
    private int $carga_horaria;
    private float $salario;
    private string $departamento;

    function __construct(
        string $cpf,
        string $email,
        string $nome,
        string $matricula,
        int $carga_horaria,
        float $salario,
        string $departamento
    )
    {
        parent::__construct($cpf, $email, $nome);
        $this->setCargaHoraria($carga_horaria);
        $this->setMatricula($matricula);
        $this->setSalario($salario);
        $this->setDepartamento($departamento);
    }

    private function setMatricula(string $matricula)
    {
        if (gettype($matricula) == "string") {
            $this->matricula = $matricula;
        } else {
            echo "Valor digitado para a matricula é inválido!";
        }
    }
    private function setCargaHoraria(int $carga_horaria)
    {
        if (gettype($carga_horaria) == "int") {
            $this->carga_horaria = $carga_horaria;
        } else {
            echo "Valor digitado para a carga horária é inválido!";
        }
    }

    private function setSalario(float $salario)
    {
        if (gettype($salario) == "double") {
            $this->salario = $salario;
        } else {
            echo "Valor digitado para o salário é inválido!";
        }
    }

    private function setDepartamento(string $departamento)
    {
        if (gettype($departamento) == "string") {
            $this->departamento = $departamento;
        } else {
            echo "Valor digitado para o departamento é inválido!";
        }
    }

    public function atualizaSalario(float $indice): bool
    {
        $this->salario += $this->salario * $indice / 100;

        return true;
    }
}

/*
O cadastro de funcionarios deve armazenar as informações de nome, cpf, email, matricula, regime, salario.
*/

final class Funcionario extends Pessoa
{
    private string $matricula;
    private string $regime;
    private float $salario;

    function __construct(
        string $cpf,
        string $email,
        string $nome,
        string $matricula,
        string $regime,
        float $salario
    )
    {
        parent::__construct($cpf, $email, $nome);
        $this->setMatricula($matricula);
        $this->setRegime($regime);
        $this->setSalario($salario);

    }

    private function setMatricula(string $matricula): void
    {
        if (gettype($matricula) == "string") {
            $this->matricula = $matricula;
        } else {
            echo "Valor digitado para a matricula é inválido!";
        }
    }

    private function setSalario(float $salario): void
    {
        if (gettype($salario) == "double") {
            $this->salario = $salario;
        } else {
            echo "Valor digitado para o salario é inválido!";
        }
    }

    private function setRegime(string $regime): void
    {
        if (gettype($regime) == "string") {
            $this->regime = $regime;
        } else {
            echo "Valor digitado para o regime é inválido!";
        }
    }

    public function atualizaSalario(float $indice): bool
    {
        $this->salario += $this->salario * $indice / 100;

        return true;
    }
}

/* O cadastro de 
alunos deve armazenar as informações de nome, cpf, email, ra, curso e termo 
que se encontra */

final class Aluno extends Pessoa
{
    private string $ra;
    private string $curso;
    private int $termo;

    function __construct(
        string $cpf,
        string $email,
        string $nome,
        string $ra,
        string $curso,
        int $termo
    )
    {
        parent::__construct($cpf, $email, $nome);
        $this->setCurso($curso);
        $this->setTermo($termo);
        $this->setRa($ra);
    }

    private function setRa(string $ra): void
    {
        if (gettype($ra) == "string") {
            $this->ra = $ra;
        } else {
            echo "Valor digitado para o R.A é inválido";
        }
    }

    private function setCurso(string $curso): void
    {
        if (gettype($curso) == "string") {
            $this->curso = $curso;
        } else {
            echo "Valor digitado para o curso é inválido";
        }
    }

    private function setTermo(int $termo): void
    {
        if (gettype($termo) == "string") {
            $this->termo = $termo;
        } else {
            echo "Valor digitado para o termo é inválido";
        }
    }
}