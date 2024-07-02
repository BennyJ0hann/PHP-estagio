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
    
    if (isset($_POST['cadastrar'])) {
        header('Location: /CadastroPessoasPreset/cadastroPessoas.php');
        exit();
    }
    if (isset($_POST['deletar'])) {
        header('Location: /CadastroPessoasPreset/delete.php');
        exit();
    }
    if (isset($_POST['atualizar'])) {
        header('Location: /CadastroPessoasPreset/update.php');
        exit();
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

        if (isset($_POST["nomesEidades"])) {

            $sql = "SELECT name, idade  FROM cadastroPessoas.pessoas p";
            $resultado = $conexao->query($sql);

            if ($resultado->num_rows > 0) {
                echo '<div class="container rounded">
  <div class="row ">
    <div class="col border border-secondary text-center">
      Nome
    </div>
    <div class="col border border-secondary text-center">
      Idade
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
      ' . $row["idade"] . '
    </div>
  </div>
</div>';
                }
            } else {
                echo "Pesquisa não encontrada";
            }

            $conexao->close();
        }
        if (isset($_POST["moraEmSantos"])) {

            $sql = "SELECT name, cidade  FROM cadastroPessoas.pessoas p
                WHERE UPPER(p.cidade) = 'SANTOS'";
            $resultado = $conexao->query($sql);

            if ($resultado->num_rows > 0) {
                echo '<div class="container rounded">
  <div class="row ">
    <div class="col border border-secondary text-center">
      Nome
    </div>
    <div class="col border border-secondary text-center">
      Cidade
    </div>
  </div>
</div>';
                while ($row = $resultado->fetch_assoc()) {
                    echo '<div class="container">
  <div class="row ">
    <div class="col border border-secondary">
      ' . $row["name"] . '
    </div>
    <div class="col border border-secondary">
      ' . $row["cidade"] . '
    </div>
  </div>
</div>';
                }
            } else {
                echo "Pesquisa não encontrada";
            }

            $conexao->close();
        }
        if (isset($_POST["maisDe18"])) {

            $sql = "SELECT name, idade  FROM cadastroPessoas.pessoas p
                WHERE p.idade > 18";
            $resultado = $conexao->query($sql);

            if ($resultado->num_rows > 0) {
                echo '<div class="container rounded">
  <div class="row ">
    <div class="col border border-secondary text-center">
      Nome
    </div>
    <div class="col border border-secondary text-center">
      Idade
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
      ' . $row["idade"] . '
    </div>
  </div>
</div>';
                }
            } else {
                echo "Pesquisa não encontrada";
            }

            $conexao->close();
        }
        if (isset($_POST["countMasculino"])) {

            $sql = "SELECT COUNT(name) as Quandidade_de_homens FROM cadastroPessoas.pessoas p
                WHERE p.sexo = 'Masculino' ";
            $resultado = $conexao->query($sql);

            if ($resultado->num_rows > 0) {
                echo '<div class="container rounded">
  <div class="row ">
    <div class="col border border-secondary text-center">
      Quantidade de homens
    </div>
  </div>
</div>';
                while ($row = $resultado->fetch_assoc()) {
                    echo '<div class="container rounded">
  <div class="row ">
    <div class="col border border-secondary">
      ' . $row["Quandidade_de_homens"] . '
    </div>
  </div>
</div>';
                }
            } else {
                echo "Pesquisa não encontrada";
            }

            $conexao->close();
        }

    }
    ?>
    <div class="container">
        <form role="form" method="post" class="mt-5" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <div class="row text-center mb-2">
                <div class="col">
                    <button type="submit" value="cadastrar" id="cadastrar" name="nomesEidades"
                        class="btn btn-secondary">Nome e idade</button>
                    <button type="submit" value="cadastrar" id="cadastrar" name="moraEmSantos"
                        class="btn btn-secondary">Moram em Santos</button>
                    <button type="submit" value="cadastrar" id="cadastrar" name="maisDe18"
                        class="btn btn-secondary">Nome >
                        18 anos</button>
                    <button type="submit" value="cadastrar" id="cadastrar" name="countMasculino"
                        class="btn btn-secondary">Qtde de Homens</button>
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
                    <button type="submit" value="cadastrar" id="cadastrar" name="atualizar"
                        class="btn btn-primary">Atualizar Cadastro</button>
                </div>
            </div>
            <div class="row text-center mb-5">
            </div>
            <div class="row text-right">
                <div class="col">
                    <button type="submit" value="cadastrar" id="cadastrar" name="deletar"
                        class="btn btn-danger">Deletar Cadastro</button>
                </div>
            </div>


    </div>


    </form>
    </div>
</body>