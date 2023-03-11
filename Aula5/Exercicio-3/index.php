<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Testando classes Telefone</title>
</head>

<body>
  <?php
  require_once 'classes/Telefone.php';
  require_once 'classes/Fixo.php';
  require_once 'classes/Celular.php';
  require_once 'classes/PrePago.php';
  require_once 'classes/PosPago.php';

  $telefone1 = new Fixo(11, '123456789', 0.50);
  $celular1 = new PrePago(11, '987654321', 'TIM', 0.80);
  $celular2 = new PosPago(11, '111111111', 'VIVO', 1.00);

  $tempoLigacao = 10;

  echo "<p>Testando telefone fixo:</p>";
  echo "<ul>";
  echo "<li>DDD: {$telefone1->getDdd()}</li>";
  echo "<li>Número: {$telefone1->getNumero()}</li>";
  echo "<li>Custo por minuto: R$ {$telefone1->getCustoMinuto()}</li>";
  echo "<li>Custo da ligação ({$tempoLigacao} minutos): R$ {$telefone1->calculaCusto($tempoLigacao)}</li>";
  echo "</ul>";

  echo "<p>Testando celular pré-pago:</p>";
  echo "<ul>";
  echo "<li>DDD: {$celular1->getDdd()}</li>";
  echo "<li>Número: {$celular1->getNumero()}</li>";
  echo "<li>Operadora: {$celular1->getOperadora()}</li>";
  echo "<li>Custo por minuto base: R$ {$celular1->getCustoMinutoBase()}</li>";
  echo "<li>Custo da ligação ({$tempoLigacao} minutos): R$ {$celular1->calculaCusto($tempoLigacao)}</li>";
  echo "</ul>";

  echo "<p>Testando celular pós-pago:</p>";
  echo "<ul>";
  echo "<li>DDD: {$celular2->getDdd()}</li>";
  echo "<li>Número: {$celular2->getNumero()}</li>";
  echo "<li>Operadora: {$celular2->getOperadora()}</li>";
  echo "<li>Custo por minuto base: R$ {$celular2->getCustoMinutoBase()}</li>";
  echo "<li>Custo da ligação ({$tempoLigacao} minutos): R$ {$celular2->calculaCusto($tempoLigacao)}</li>";
  echo "</ul>";
  ?>
</body>

</html>