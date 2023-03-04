<?php
class Conta
{
    protected string $numero;
    protected string $banco;
    protected string $agencia;
    protected float $saldo;

    function __construct(
        string $numero,
        string $banco,
        string $agencia,
        float $saldo
    ) {

        $this->setAgencia($agencia);
        $this->setBanco($banco);
        $this->setNumero($numero);
        $this->setSaldo($saldo);
    }

    protected function setNumero(string $numero)
    {
        if (gettype($numero) == 'string') {
            $this->numero = $numero;
        } else {
            echo 'Valor de numero invalido!';
            return;
        }
    }

    protected function setBanco(string $banco)
    {
        if (gettype($banco) == 'string') {
            $this->banco = $banco;
        } else {
            echo 'Valor de banco invalido!';
            return;
        }
    }

    protected function setAgencia(string $agencia)
    {
        if (gettype($agencia) == 'string') {
            $this->agencia = $agencia;
        } else {
            echo 'Valor de numero invalido!';
            return;
        }
    }

    protected function setSaldo(float $saldo)
    {
        if (gettype($saldo) == 'double') {
            $this->saldo = $saldo;
        } else {
            echo 'Valor de saldo invalido!';
            return;
        }
    }

    protected function formatValue(float $value)
    {
        return number_format($value, 2, ',', '.');
    }

    public function getDetails()
    {
        return "Banco: {$this->banco} | Agencia: {$this->agencia} | Numero: {$this->numero} | Saldo: R$ {$this->formatValue($this->saldo)}";
    }

    public function depositar(float $valor)
    {
        $this->saldo += $valor;
        echo "Deposito de R$ {$this->formatValue($valor)} realizado";
        echo "<br>Novo saldo R$ {$this->formatValue($this->saldo)}";
    }

    public function sacar(float $valor)
    {
        if ($valor < $this->saldo) {
            echo "Saque de R$ {$this->formatValue($valor)} realizado";
            $this->saldo -= $valor;
            echo "<br>Novo saldo R$ {$this->formatValue($this->saldo)}";
        } else {
            echo "Saque não aceito! Saldo insuficiente!";
        }
    }
}

class ContaCorrente extends Conta
{
    private float $limite;

    function __construct(
        string $numero,
        string $banco,
        string $agencia,
        float $saldo,
        float $limite
    ) {
        parent::__construct($numero, $banco, $agencia, $saldo);
        $this->limite = $limite;
    }

    public function getDetailsCC()
    {
        return "Banco: {$this->banco} | Agencia: {$this->agencia} | Numero: {$this->numero} | Saldo: R$ {$this->formatValue($this->saldo)} | limite: R$ {$this->formatValue($this->limite)}";
    }
}

class ContaPoupanca extends Conta
{
    private float $taxa;

    function __construct(
        string $numero,
        string $banco,
        string $agencia,
        float $saldo,
        float $taxa
    ) {
        parent::__construct($numero, $banco, $agencia, $saldo);
        $this->taxa = $taxa;
    }

    public function getDetailsCP()
    {
        return "Banco: {$this->banco} | Agencia: {$this->agencia} | Numero: {$this->numero} | Saldo: R$ {$this->formatValue($this->saldo)} | Taxa: {$this->taxa} %";
    }
}

$c1 = new Conta('123123', 'Caixa', '123', 500.00);
$c2 = new ContaCorrente('123123', 'Caixa', '123', 500.00, 400.00);
$c3 = new ContaPoupanca('123123', 'Caixa', '123', 500.00, 1.0);
echo 'Conta';
echo '<br>';
echo '<br>';
echo $c1->getDetails();
echo "<hr>";
echo 'Conta corrente';
echo '<br>';
echo '<br>';
print_r($c2->getDetailsCC());
echo "<hr>";
echo 'Conta poupança';
echo '<br>';
echo '<br>';
print_r($c3->getDetailsCP());
