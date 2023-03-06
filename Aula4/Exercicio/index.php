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

abstract class Pessoa
{
    protected string $cpf;
    protected string $nome;
    protected string $email;

    public function setCpf(string $cpf): void
    {
        if (preg_match('/^\d{3}\.\d{3}\.\d{3}-\d{2}$/', $cpf)) {
            $this->cpf = $cpf;
        } else {
            echo "CPF inválido!";
        }
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function setEmail(string $email): void
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        } else {
            echo "E-mail inválido!";
        }
    }

    public function getDados(): string
    {
        return "CPF: $this->cpf | Nome: $this->nome | Email: $this->email";
    }
}

class Aluno extends Pessoa
{
    private string $ra;
    private string $curso;
    private int $termo;

    public function setRa(string $ra): void
    {
        if (is_string($ra)) {
            $this->ra = $ra;
        } else {
            echo "RA deve ser uma string";
        }
    }

    public function setCurso(string $curso): void
    {
        if (is_string($curso)) {
            $this->curso = $curso;
        } else {
            echo "Curso deve ser uma string";
        }
    }

    public function setTermo(int $termo): void
    {
        if (is_int($termo)) {
            $this->termo = $termo;
        } else {
            echo "Termo deve ser um inteiro";
        }
    }

    public function alterarTermo(int $novoTermo): void
    {
        $this->termo = $novoTermo;
    }

    public function getDados(): string
    {
        return parent::getDados() . " | RA: $this->ra | Curso: $this->curso | Termo: $this->termo º";
    }
}


class Professor extends Pessoa
{
    private string $matricula;
    private int $cargaHoraria;
    private float $salario;
    private string $departamento;

    public function setMatricula(string $matricula): string
    {
        if (is_string($matricula)) {
            $this->matricula = $matricula;
            return "";
        } else {
            return "Matricula deve ser uma string";
        }
    }

    public function setCargaHoraria(int $cargaHoraria): string
    {
        if (is_int($cargaHoraria)) {
            $this->cargaHoraria = $cargaHoraria;
            return "";
        } else {
            return "Carga horária deve ser um inteiro";
        }
    }

    public function setSalario(float $salario): string
    {
        if (is_numeric($salario)) {
            $this->salario = $salario;
            return "";
        } else {
            return "Salario deve ser um numero";
        }
    }

    public function setDepartamento(string $departamento): string
    {
        if (is_string($departamento)) {
            $this->departamento = $departamento;
            return "";
        } else {
            return "Departamento deve ser uma string";
        }
    }

    public function atualizarSalario(float $aumentoPercentual): void
    {
        $this->salario *= (1 + $aumentoPercentual / 100);
    }

    public function getDados(): string
    {
        return parent::getDados() . " | Matricula: $this->matricula | Carga Horária: $this->cargaHoraria | Salário: R$ " . number_format($this->salario, 2, ',', '.') . " | Departamento: $this->departamento";
    }
}

class Funcionario extends Pessoa
{
    protected string $matricula;
    protected string $regime;
    protected float $salario;

    public function setMatricula(string $matricula): string
    {
        if (is_string($matricula)) {
            $this->matricula = $matricula;
            return "";
        } else {
            return "Matricula deve ser uma string";
        }
    }

    public function setRegime(string $regime): string
    {
        if (is_string($regime)) {
            $this->regime = $regime;
            return "";
        } else {
            return "Regime deve ser uma string";
        }
    }

    public function setSalario(float $salario): string
    {
        if (is_numeric($salario)) {
            $this->salario = $salario;
            return "";
        } else {
            return "Salario deve ser um numero";
        }
    }

    public function atualizarSalario(float $porcentagem): void
    {
        $aumento = $this->salario * $porcentagem / 100;
        $this->salario += $aumento;
    }

    public function getDados(): string
    {
        return parent::getDados() . " | Matricula: $this->matricula | Regime: $this->regime | Salario: R$ " . number_format($this->salario, 2, ',', '.');
    }

    public function __toString(): string
    {
        return $this->nome;
    }
}


$professor = new Professor();
$professor->setCpf('111.111.111-11');
$professor->setNome('Professor 1');
$professor->setEmail('professor1@teste.com');
$professor->setMatricula('0001');
$professor->setCargaHoraria(40);
$professor->setSalario(4000);
$professor->setDepartamento('Departamento 1');

$funcionario = new Funcionario();
$funcionario->setCpf('222.222.222-22');
$funcionario->setNome('Funcionario 1');
$funcionario->setEmail('funcionario1@teste.com');
$funcionario->setMatricula('0002');
$funcionario->setRegime('Integral');
$funcionario->setSalario(2000);

$aluno = new Aluno();
$aluno->setCpf('333.333.333-33');
$aluno->setNome('Aluno 1');
$aluno->setEmail('aluno1@teste.com');
$aluno->setRa('123456');
$aluno->setCurso('Curso 1');
$aluno->setTermo(3);

echo "<h2>Professor - antes do aumento</h2>";
echo $professor->getDados() . "<hr>";
$professor->atualizarSalario(10);
echo "<h2>Professor - depois do aumento</h2>";
echo $professor->getDados() . "<hr>";


echo "<h2>Funcionario - antes do aumento</h2>";
echo $funcionario->getDados() . "<hr>";
$funcionario->atualizarSalario(5);
echo "<h2>Funcionario - depois do aumento</h2>";
echo $funcionario->getDados() . "<hr>";


echo "<h2>Aluno - antes de alterar o termo</h2>";
echo $aluno->getDados() . "<hr>";
$aluno->setTermo(4);
echo "<h2>Aluno - depois de alterar o termo</h2>";
echo $aluno->getDados() . "<hr>";