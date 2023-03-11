<!DOCTYPE html>
<html>

<head>
  <title>Teste de Classes</title>
  <style>
    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
      padding: 5px;
    }

    th {
      text-align: left;
    }
  </style>
</head>

<body>
  <?php
  require_once './classes/Funcionario.php';
  require_once './classes/Servente.php';
  require_once './classes/Motorista.php';
  require_once './classes/MestreDeObras.php';

  $funcionario = new Funcionario(1, 'João', 2000.0);
  $servente = new Servente(2, 'Maria', 1500.0);
  $motorista = new Motorista(3, 'Pedro', 2500.0, '123456789');
  $mestreDeObras = new MestreDeObras(4, 'José', 3000.0, 25);

  $funcionarios = array($funcionario, $servente, $motorista, $mestreDeObras);
  ?>

  <h1>Teste de Classes</h1>
  <table>
    <tr>
      <th>Código</th>
      <th>Nome</th>
      <th>Salário Base</th>
      <th>Salário Líquido</th>
      <th>Número da Carteira de Motorista</th>
      <th>Número de Funcionários Supervisionados</th>
    </tr>
    <?php foreach ($funcionarios as $funcionario): ?>
      <tr>
        <td>
          <?= $funcionario->getCodigo() ?>
        </td>
        <td>
          <?= $funcionario->getNome() ?>
        </td>
        <td>
          <?= number_format($funcionario->getSalarioBase(), 2, ',', '.') ?>
        </td>
        <td>
          <?= number_format($funcionario->getSalarioLiquido(), 2, ',', '.') ?>
        </td>
        <?php if ($funcionario instanceof Motorista): ?>
          <td>
            <?= $funcionario->getNumeroCarteira() ?>
          </td>
          <td>-</td>
        <?php elseif ($funcionario instanceof MestreDeObras): ?>
          <td>-</td>
          <td>
            <?= $funcionario->getNumFuncSupervisionados() ?>
          </td>
        <?php else: ?>
          <td>-</td>
          <td>-</td>
        <?php endif; ?>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>