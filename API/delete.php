<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Cadastro</title>
</head>

<body class="bg-dark text-white">
  <?php
  include 'criar.php';
  ?>
  <div class="container">
    <form role="form" method="post" class="mt-5">
      <div class="row text-left">
        <div class="col-5">
          <label for="idDeDelete">Digite o ID da pessoa q irá ser excluida:</label>
          <input type="text" id="primeiraAparicao" name="Registro" class="form-control"><br>
        </div>
      </div>
      <div class="row ">
        <div class="col-5 text-left">
          <button type="submit" value="voltar" id="voltar" name="voltar" class="btn btn-primary">Voltar</button>
        </div>
        <div class="col-5 text-right">
          <button type="submit" value="deletar" id="deletar" name="delete" class="btn btn-danger">Deletar
            Cadastro</button>
        </div>
      </div>
  </div>
  </form>
  </div>
</body>