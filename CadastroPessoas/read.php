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
  include 'db.php';


  if (isset($_POST['cadastrar'])) {
    header('Location: /CadastroPessoas/cadastroPessoas.php');
    exit();
  }
  if (isset($_POST['deletar'])) {
    header('Location: /CadastroPessoas/delete.php');
    exit();
  }
  if (isset($_POST['atualizar'])) {
    header('Location: /CadastroPessoas/update.php');
    exit();
  }
  
  if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['verCadastro']) || isset($_POST["verTudo"]) || isset($_POST["deletar"])) {

      $sql = "select id, name, cidade, data_nascimento, sexo from pessoas";
      $resultado = $conexao->query($sql);

      if ($resultado->num_rows > 0) {
        echo '<div class="container ">
  <div class="row ">
    <div class="col border border-secondary text-center ">
      id
    </div>
    <div class="col border border-secondary text-center">
      Nome
    </div>
    <div class="col border border-secondary text-center">
      Cidade
    </div>
    <div class="col border border-secondary text-center">
      Data de Nascimento
    </div>
    <div class="col border border-secondary text-center">
      Sexo
    </div>
  </div>
</div>';
        while ($row = $resultado->fetch_assoc()) {
          echo '<div class="container rounded">
  <div class="row ">
    <div class="col border border-secondary text-end">
      ' . $row["id"] . '
    </div>
    <div class="col border border-secondary">
      ' . formatacao($row["name"]) . '
    </div>
    <div class="col border border-secondary">
      ' . formatacao($row["cidade"]) . '
    </div>
    <div class="col border border-secondary">
      ' . $row["data_nascimento"] . '
    </div>
    <div class="col border border-secondary">
      ' . $row["sexo"] . '
    </div>
  </div>
</div>';
        }
      } else {
        echo "Sem nenhum cadastro";
      }

    }
    if (isset($_POST['pesquisar'])) {
      $cidadeForm = $_POST['selectCidade'];
      $idadeForm = (int) $_POST['selectIdade'];
      $sexoForm = $_POST['selectSexo'];
  
      $condicao = "YEAR(CURRENT_DATE()) - YEAR(p.data_nascimento) - (RIGHT(CURRENT_DATE(), 5) < RIGHT(p.data_nascimento, 5))";
  
      $condCidade = $cidadeForm ? " and upper(p.cidade) = upper('$cidadeForm')" : "";
      $condIdade = $idadeForm ? "and $condicao = $idadeForm" : "";
      $condSexo = $sexoForm ? "and upper(p.sexo) = upper('$sexoForm')" : "";
  
  
      $pesquisa = " SELECT p.name, p.cidade, $condicao AS idade, p.sexo
                    FROM cadastroPessoas.pessoas p
                    where 1=1 $condCidade $condIdade $condSexo;";
  
      $resultado = $conexao->query($pesquisa);
  
      if ($resultado->num_rows > 0) {
        echo '<div class="container">
            <div class="row">
            <div class="col border border-secondary text-center">
            Nome
            </div>
            <div class="col border border-secondary text-center">
            Cidade
            </div>
            <div class="col border border-secondary text-center">
            Idade
            </div>
            <div class="col border border-secondary text-center">
            Sexo
            </div>
            </div>
            </div>';
        while ($row = $resultado->fetch_assoc()) {
          echo '<div class="container rounded">
            <div class="row ">
            <div class="col border border-secondary">
            ' . formatacao($row["name"]) . '
            </div>
            <div class="col border border-secondary">
            ' . formatacao($row["cidade"]) . '
            </div>
            <div class="col border border-secondary">
            ' . $row["idade"] . '
            </div>
            <div class="col border border-secondary">
            ' . $row["sexo"] . '
            </div>
            </div>
            </div>';
        }
      } else {
        echo 'Pesquisa não encontrada';
      }
    }
  }

  

  $sqlCidade = "SELECT DISTINCT (p.cidade)  FROM cadastroPessoas.pessoas p;";
  $cidades = $conexao->query($sqlCidade);

  $sqlIdade = "SELECT DISTINCT (YEAR(CURRENT_DATE()) - YEAR(p.data_nascimento) - (RIGHT(CURRENT_DATE(), 5) < RIGHT(p.data_nascimento, 5))) AS idade
                FROM cadastroPessoas.pessoas p ORDER BY idade ASC;";
  $idades = $conexao->query($sqlIdade);



  

  

  ?>
  <div class="container">
    <form role="form" method="post" class="mt-5 row" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">




      <div class="col-4 text-center mb-2">
        
          <div class="text-start">
            <label for="primeiraAparicao" class="text-wrap">Cidade:</label>
            <select class="form-select mb-3" aria-label="form-select" name="selectCidade">
              <?php
              if ($cidades->num_rows > 0) {
                while ($row = $cidades->fetch_assoc()) {
                  echo "<option value ='{$row["cidade"]}'>{$row["cidade"]}</option>";
                }
              }
              echo '<option value ="" selected>Não definido</option>';
              ?>
          </select>
            <label for="primeiraAparicao">Idade:</label>
            <select class="form-select mb-3" name="selectIdade">
              <?php
              if ($idades->num_rows > 0) {
                while ($row = $idades->fetch_assoc()) {
                  echo "<option value ='{$row["idade"]}'>{$row["idade"]}</option>";
                }
              }
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
          
            <button type="submit" value="cadastrar" id="cadastrar" name="verTudo" class="btn btn-info">Todos
            Registros</button>
            </div>
          <div class="col-6 text-end">
          <button type="submit" value="cadastrar" id="cadastrar" name="pesquisar"
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
            <button type="submit" value="cadastrar" id="cadastrar" name="atualizar" class="btn btn-primary">Atualizar
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