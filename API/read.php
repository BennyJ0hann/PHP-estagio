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
  include 'Funcoes.php';
  include 'criar.php';
  ?>
  <div class="container">
    <form role="form" method="post" class="mt-5 row" >
      <div class="col-4 text-center mb-2">
        <div class="text-start">
          <label for="primeiraAparicao" class="text-wrap">Cidade:</label>
          <select class="form-select mb-3" aria-label="form-select" name="selectCidade">
            <?php
            selectCidade();
            echo '<option value ="" selected>Não definido</option>';
            ?>
          </select>
          <label for="primeiraAparicao">Idade:</label>
          <select class="form-select mb-3" name="selectIdade">
            <?php
              selectIdade();
              echo '<option value="" selected>Não definido</option>';
            ?>
          </select>
          <label>Sexo:</label>
          <select class="form-select mb-3" name="selectSexo">
            <option value="masculino">Masculino</option>
            <option value="feminino">Feminino</option>
            <option value="" selected>Não definido</option>
          </select>
        </div>
        <div class="row">
          <div class="col-6 text-start">

            <button type="submit" value="cadastrar" id="cadastrar" name="todosResgistros" class="btn btn-info">Todos
              Registros</button>
          </div>
          <div class="col-6 text-end">
            <button type="pesquisa" value="cadastrar" id="cadastrar" name="pesquisar"
              class="btn btn-secondary">Pesquisar</button>
          </div>
        </div>
      </div>
      <div class="col-4 text-end mb-2 mt-3">
        <div class="">
          <div class=" mb-5">
            <div class="col">
              <button type="submit" value="cadastrar" id="cadastrar" name="cadastrar"
                class="btn btn-success">Cadastrar</button>
              <button type="submit" value="cadastrar" id="cadastrar" name="atualizarCadastro" class="btn btn-primary">Atualizar
                Cadastro</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-4 text-end mt-3">
        <div class="col">
          <button type="submit" name="deletar" class="btn btn-danger">Deletar
            Cadastro</button>
        </div>
      </div>
  </div>
  </form>
  </div>
</body>