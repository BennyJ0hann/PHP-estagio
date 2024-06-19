<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <title>Cadastro</title>
</head>

<body class="bg-dark text-white">
  <?php
  include 'db.php';

  $sqlCidade = "SELECT DISTINCT (p.cidade)  FROM cadastroPessoas.pessoas p;";
  $cidades = $conexao->query($sqlCidade);
  $cidade = '';

  $sqlIdade = "SELECT DISTINCT (p.idade) FROM cadastroPessoas.pessoas p ORDER BY p.idade ASC;";
  $idades = $conexao->query($sqlIdade);
  $idade = 0;


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

  if(isset($_POST['pesquisar'])){
    $cidadeForm = $_POST['selectCidade'];
    $idadeForm = (int)$_POST['selectIdade'];
    $sexoForm = $_POST['selectSexo'];

    $condCidade = $cidadeForm ? " and upper(p.cidade) = upper('$cidadeForm')" : "" ;
    $condIdade = $idadeForm ? "and p.idade = $idadeForm" : "";
    $condSexo = $sexoForm ? "and upper(p.sexo) = upper('$sexoForm')" : "";

    $persquisa = "SELECT p.name, p.cidade, p.idade, p.sexo FROM cadastroPessoas.pessoas p
    where 1=1 $condCidade $condIdade $condSexo";



    $resultado = $conexao->query($persquisa);

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
          ' . $row["name"] . '
          </div>
          <div class="col border border-secondary">
          ' . $row["cidade"] . '
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
}else{
  echo 'Deu ruim';
}
}

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["verCadastro"]) || isset($_POST["verTudo"]) || isset($_POST["deletar"])) {

      $sql = "select id, name, cidade, idade, sexo from pessoas";
      $resultado = $conexao->query($sql);

      if ($resultado->num_rows > 0) {
        echo '<div class="container">
  <div class="row ">
    <div class="col border border-secondary text-center">
      id
    </div>
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
    <div class="col border border-secondary text-right">
      ' . $row["id"] . '
    </div>
    <div class="col border border-secondary">
      ' . $row["name"] . '
    </div>
    <div class="col border border-secondary">
      ' . $row["cidade"] . '
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
        echo "Sem nenhum cadastro";
      }

      $conexao->close();
    }
  }
    
  
  ?>
  <div class="container">
    <form role="form" method="post" class="mt-5" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

      <div class="row text-center mb-2">
        <div class="col">
          <select class="form-select" name="selectCidade" >
            <?php
            if ($cidades->num_rows > 0) {
              while ($row = $cidades->fetch_assoc()) {
              echo "<option value ='{$row["cidade"]}'>{$row["cidade"]}</option>";
              }
            }
            echo '<option value ="" selected>Não definido</option>';
            ?>
          </select>
          <select class="form-select" name="selectIdade" >
            <?php
            if ($idades->num_rows > 0) {
              while ($row = $idades->fetch_assoc()) {
              echo '<option value ="'.$row["idade"].'">'.$row["idade"].'</option>';
              }
            }
            echo '<option value="" selected>Não definido</option>';
            ?>
          </select>
          <select class="form-select" name="selectSexo" >
            <option value="masculino" >Masculino</option>
            <option value="feminino" >Feminino</option>
            <option value= "" selected>Não definido</option>
          </select>
          <button type="submit" value="cadastrar" id="cadastrar" name="pesquisar" class="btn btn-secondary">Pesquisar</button>
        </div>
      </div>
      <div class="row text-center mb-5">
        <div class="col">
          <button type="submit" value="cadastrar" id="cadastrar" name="verTudo" class="btn btn-info">Todos
            Registros</button>
        </div>
      </div>
      <div class="row text-center mb-5">
        <div class="col">
          <button type="submit" value="cadastrar" id="cadastrar" name="cadastrar"
            class="btn btn-success">Cadastrar</button>
          <button type="submit" value="cadastrar" id="cadastrar" name="atualizar" class="btn btn-primary">Atualizar
            Cadastro</button>
        </div>
      </div>
      <div class="row text-center mb-5">
      </div>
      <div class="row text-right">
        <div class="col">
          <button type="submit" value="cadastrar" id="cadastrar" name="deletar" class="btn btn-danger">Deletar
            Cadastro</button>
        </div>
      </div>


  </div>


  </form>
  </div>
</body>