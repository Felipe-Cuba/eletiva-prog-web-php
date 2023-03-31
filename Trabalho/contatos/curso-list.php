<?php
require "connection.php";
require "classes/Curso.php";
require_once "header_inc.php";

$sql = "SELECT * FROM cursos ORDER BY id";
$stmt = $conn->query($sql);
$cursos = $stmt->fetchAll(PDO::FETCH_CLASS, "Curso");


?>

<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Gerenciamento de Cursos</h1>
  <hr class="my-3">
  <p class="lead">Permite a inclusão, edição e exclusão dos cursos exibidos na página de cursos.</p>
</div>

<div class="container">
  <a class="btn btn-success" href="formulario-curso.php">Criar Novo Curso</a>
  <p></p>
  <table class="table table-bordered table-striped">
    <thead class="thead-dark">
      <tr>
        <th>#</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Imagem</th>
        <th>Data Cadastro</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $counter = 1;
      foreach ($cursos as $curso) {

      ?>
        <tr>
          <td><?php echo $counter; ?></td> <!-- exibe o número e subtrai 1 -->
          <td><?php echo $curso->__get("nome"); ?></td>
          <td><?php echo $curso->__get("descricao"); ?></td>
          <td><img src="<?php echo $curso->__get("imagem"); ?>" alt="<?php echo $curso->__get("nome"); ?>" height="50"></td>
          <td><?php echo date('d/m/Y H:i:s', strtotime($curso->__get("data_cadastro"))); ?></td>
          <td>
            <a class="btn btn-primary" href="formulario-curso.php?item_id=<?php echo $curso->__get('id'); ?>">Editar</a>
            <a class="btn btn-danger" href="curso-destroy.php?item_id=<?php echo $curso->__get('id'); ?>">Excluir</a>
          </td>
        </tr>
      <?php
        $counter++;
      }
      ?>
    </tbody>
  </table>
</div>

<?php require_once "footer_inc.php"; ?>