<?php
if (isset($_POST['nome'])) {
  try {
    require("config/connection.php");
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];
    $tipo = $_POST['tipo'];
    $lida = false;

    $minecraft = $conn->prepare("INSERT INTO contatos (nome, email, mensagem, tipo, lida) 
    VALUES (:nome, :email, :mensagem, :tipo, :lida)");
    $minecraft->bindParam(':nome', $nome);
    $minecraft->bindParam(':email', $email);
    $minecraft->bindParam(':mensagem', $mensagem);
    $minecraft->bindParam(':tipo', $tipo);
    $minecraft->bindParam(':lida', $lida);

    $minecraft->execute();
  } catch (PDOException $error) {
    echo $error->getMessage();
  }

  $conn = null;
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              Formulário de Contato
            </div>
            <div class="card-body">
              <form action="" method="post">
                <div class="form-group">
                  <label for="nome">Nome:</label>
                  <input type="text" class="form-control mb-3" id="nome" name="nome" required>
                </div>

                <div class="form-group">
                  <label for="email">E-mail:</label>
                  <input type="email" class="form-control mb-3" id="email" name="email" required>
                </div>

                <div class="form-group">
                  <label for="mensagem">Mensagem:</label>
                  <textarea class="form-control mb-3" id="mensagem" name="mensagem" rows="5" required></textarea>
                </div>

                <div class="form-group">
                  <label for="tipo">Tipo:</label>
                  <select class="form-control mb-3" id="tipo" name="tipo" required>
                    <option value="">Selecione o tipo de mensagem</option>
                    <option value="elogio">Elogio</option>
                    <option value="crítica">Crítica</option>
                    <option value="sugestão">Sugestão</option>
                    <option value="outro">Outro</option>
                  </select>
                </div>

                <button type="submit" class="btn btn-primary col-12">Enviar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>