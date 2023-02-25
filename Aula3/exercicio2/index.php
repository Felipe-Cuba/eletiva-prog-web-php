<?php
class Conta
{
    private string $numero;
    private string $banco;
    private string $agencia;
    private float $saldo;

    function __construct(
        string $numero,
        string $banco,
        string $agencia,
        float $saldo
    )
    {
        $this->setAgencia($agencia);
        $this->setBanco($banco);
        $this->setNumero($numero);
        $this->setSaldo($saldo);
    }

    private function setNumero(string $numero)
    {
        if (gettype($numero) == 'string') {
            $this->numero = $numero;
        } else {
            echo 'Valor de numero invalido!';
            return;
        }
    }

    private function setBanco(string $banco)
    {
        if (gettype($banco) == 'string') {
            $this->banco = $banco;
        } else {
            echo 'Valor de banco invalido!';
            return;
        }
    }

    private function setAgencia(string $agencia)
    {
        if (gettype($agencia) == 'string') {
            $this->agencia = $agencia;
        } else {
            echo 'Valor de numero invalido!';
            return;
        }
    }

    private function setSaldo(float $saldo)
    {
        if (gettype($saldo) == 'double') {
            $this->saldo = $saldo;
        } else {
            echo 'Valor de saldo invalido!';
            return;
        }
    }

    public function getDetails()
    {
        $saldoFormat = number_format($this->saldo, 2, ',', '.');
        return "Banco: {$this->banco}
        <br>
        Agencia: {$this->agencia}
        <br>
        Numero: {$this->numero}
        <br>
        Saldo: R$ {$saldoFormat}";
    }

    public function depositar(float $valor)
    {
        $formatValue = number_format($valor, 2, ',', '.');
        $this->saldo += $valor;
        echo "Deposito de R$ {$formatValue} realizado";
        $formatSaldo = number_format($this->saldo, 2, ',', '.');
        echo "<br>Novo saldo R$ {$formatSaldo}";
    }

    public function sacar(float $valor)
    {
        if ($valor < $this->saldo) {
            $formatValue = number_format($valor, 2, ',', '.');
            echo "Saque de R$ {$formatValue} realizado";
            $this->saldo -= $valor;
            $formatSaldo = number_format($this->saldo, 2, ',', '.');
            echo "<br>Novo saldo R$ {$formatSaldo}";
        } else {
            echo "Saque não aceito! Saldo insuficiente!";
        }
    }
}

$c1 = new Conta('1234 748', 'Caixa', '12345-c', 500.00);
echo $c1->getDetails();
echo "<br>";
$c1->depositar(500.00);
echo "<br>";
$c1->sacar(900.00);
echo "<br>";
$c1->sacar(150.00);