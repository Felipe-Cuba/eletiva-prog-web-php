<?php
$flag_msg = null;
$msg = '';

if (isset($_GET['item_id'])) {
  $item_id = $_GET['item_id'];

  require_once "connection.php";

  try {
    $sql = "SELECT * FROM cursos WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $item_id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $nome = $row['nome'];
    $descricao = $row['descricao'];
    $imagem_atual = $row['imagem'];
  } catch (PDOException $e) {
    $flag_msg = false; // Erro 
    $msg = "Erro na conexão com o Banco de dados: " . $e->getMessage();
  }
}

if (!isset($_POST['nome'], $_POST['descricao'])) {
} else {

  require_once "connection.php";

  $nome = $_POST['nome'];
  $descricao = $_POST['descricao'];

  // Verifica se item_id não existe e se a imagem está vazia
  $caminho_arquivo = '';
  if (!empty($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    $diretorio = 'images/cursos/';
    $nome_arquivo = time() . '-' . $_FILES['imagem']['name'];
    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $nome_arquivo);
    $caminho_arquivo = $diretorio . $nome_arquivo;
  } else if (isset($item_id) && isset($imagem_atual)) {
    $caminho_arquivo = $imagem_atual;
  } else {
    $caminho_arquivo = ''; // adicionado
  }


  if (isset($nome, $descricao) && !empty($nome) && !empty($descricao)) {
    try {
      $sql = "INSERT INTO cursos (nome, descricao, imagem) VALUES (:nome, :descricao, :imagem)";
      if (isset($item_id)) {
        $sql = "UPDATE cursos SET nome = :nome, descricao = :descricao, imagem = :imagem WHERE id = :id";
      }

      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':nome', $nome);
      $stmt->bindParam(':descricao', $descricao);
      $stmt->bindParam(':imagem', $caminho_arquivo);
      if (isset($item_id)) {
        $stmt->bindParam(':id', $item_id);
      }
      $stmt->execute();

      $flag_msg = true; // Sucesso 
      $msg = "Dados enviados com sucesso!";

      $nome = '';
      $descricao = '';
    } catch (PDOException $e) {
      $flag_msg = false; //Erro 
      $msg = "Erro na conexão com o Banco de dados: " . $e->getMessage();
    }
    $conn = null;
    header("Location: curso-list.php");
    exit;
  } else {
    $flag_msg = false; //Erro 
    $msg = "Dados incompletos, preencha o formulário corretamente!";
  }
}


require_once "header_inc.php";


?>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Cursos</h1>
  <hr class="my-3">
  <p class="lead">Cadastre um novo curso.</p>
</div>

<div class="container">
  <?php
  if (!is_null($flag_msg)) {
    if ($flag_msg) {
      echo "<div class='alert alert-success mt-5' role='alert'>$msg</div>";
    } else {
      echo "<div class='alert alert-warning mt-5' role='alert'>$msg</div>";
    }
  }
  ?>
  <div class="card my-5">
    <div class="card-body">
      <h1 class="card-title">Formulário de Cadastro de Curso</h1>
      <form action="" method="post" enctype="multipart/form-data" id="formulario-curso">
        <div class="mb-3">
          <label for="nome" class="form-label">Nome:</label>
          <input type="text" class="form-control" id="nome" name="nome" required value="<?php echo $nome ?? ''; ?>">
        </div>
        <div class="mb-3">
          <label for="descricao" class="form-label">Descrição:</label>
          <textarea class="form-control" id="descricao" name="descricao" rows="3" required><?php echo $descricao ?? ''; ?></textarea>
        </div>
        <div class="mb-3">
          <label for="imagem" class="form-label">Imagem:</label>
          <input type="file" class="form-control" id="imagem" name="imagem" onchange="previewImagem();" <?php if (isset($item_id)) echo '';
                                                                                                        else echo 'required'; ?>>
          <img id="preview" class="mt-3" style="max-width: 100%;" style="display:none">
        </div>
        <button type="submit" class="btn btn-primary"><?php if (isset($item_id)) echo 'Atualizar';
                                                      else echo 'Cadastrar'; ?></button>
      </form>
    </div>
  </div>

</div>
<script>
  function previewImagem() {
    var imagem = document.querySelector('input[name=imagem]').files[0];
    var preview = document.querySelector('#preview');
    var reader = new FileReader();

    reader.onloadend = function() {
      preview.src = reader.result;
      preview.style.display = "block";
      preview.style.margin = "auto";
      // preview.style.maxWidth = "10%"; // Definindo largura máxima de 25%
    }

    if (imagem) {
      reader.readAsDataURL(imagem);
    } else {
      preview.src = "";
      preview.style.display = "none";
    }
  }
</script>
<?php require_once "footer_inc.php"; ?>