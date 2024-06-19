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
    if (isset($_POST['voltar'])) {
        header('Location: /CadastroPessoas/read.php');
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["atualizar"])) {
            $sql1 = "select id, name, cidade, idade, sexo from pessoas";
            $resultado = $conexao->query($sql1);
            
            $id = $_POST['Registro'];
            $sexo = $_POST['sexo'];
            $nomePessoa = $_POST['nomePessoa'];
            $cidadePessoa = $_POST['cidadePessoa'];
            $idadePessoa = $_POST['idadePessoa'];

            if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                if ($row["id"] == $id ) {
                    if(empty($nomePessoa)){
                        $nomePessoa = $row["name"];
                    }
                    if(empty($cidadePessoa)){
                        $cidadePessoa = $row["cidade"];
                    }
                    if(empty($idadePessoa)){
                        $idadePessoa = $row["idade"];
                    }if(empty($sexo)){
                        $sexo = $row["sexo"];
                    }

            $sql2 = "UPDATE pessoas SET name='$nomePessoa', cidade='$cidadePessoa', idade='$idadePessoa', sexo='$sexo' WHERE id=$id";
            if ($conexao->query($sql2) === TRUE) {
                echo "Atualização de cadastro feita com sucesso";
            } else {
                echo "Erro ao atualizar o cadastro: " . $conexao->error;
            }

            $conexao->close();
        }
    }
    }}
}
    ?>
    <div class="container">
        <form role="form" method="post" class="mt-5" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="row">
                <div class="col">
        <div class="col-5 text-left">
            <label for="nome">ID:</label>
            <input type="text" id="nome" name="Registro" class="form-control" placeholder="Obriatório"><br>
            </div>
        <div class="col-5 text-left">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nomePessoa" class="form-control" placeholder="Deixe em branco para não alterar"><br>
            </div>
        <div class="col-5 text-left">
            <label for="primeiraAparicao">Cidade:</label>
            <input type="text" id="primeiraAparicao" name="cidadePessoa" class="form-control" placeholder="Deixe em branco para não alterar"><br>
        </div>
        <div class="col-5 text-left">
            <label for="maiorFeito">Idade:</label>
            <input type="text" id="maiorFeito" name="idadePessoa" class="form-control" placeholder="Deixe em branco para não alterar"><br>
            </div>
        <div class="col-5 text-left">
            <label for="quemE">Sexo:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sexo" id="Masculino" value="Masculino">
                <label class="form-check-label" for="Masculino">Masculino</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sexo" id="Feminino" value="Feminino">
                <label class="form-check-label" for="Feminino">Feminino</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sexo" id="nãoAlterado" value="Feminino">
                <label class="form-check-label" for="Feminino">Não alterar</label>
            </div><br>
            </div>
            </div>
            </div>
            <div class="row mb-5">
            <div class="col-5 text-left">
                <button type="submit" value="voltar" id="voltar" name="voltar" class="btn btn-primary">Voltar</button>
            </div>
            <div class="col text-left">
                <button type="submit" value="deletar" id="deletar" name="atualizar" class="btn btn-success">Atualizar
                    Cadastro</button>
            </div>
            </div>
    </div>

    </div>
    </form>
    </div>
</body>