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
    header('Location: /CadastroPessoasPreset/read.php');
    exit();
}   
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["delete"])) {

    $id = $_POST['Registro'];

    $sql = "DELETE FROM pessoas WHERE id=$id";
    if ($conexao->query($sql) === TRUE) {
        echo "<p class='text-success'>Cadastro deletado com sucesso";
    } else {
        echo "Error não foi possivel deletar cadastro: " . $conexao->error;
    }

    $conexao->close();
}
}
?>
<div class="container">
        <form role="form" method="post" class="mt-5" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="row text-left">
                <div class="col-5">
                <label for="idDeDelete">Digite o ID da pessoa q irá ser excluida:</label>
                <input type="text" id="primeiraAparicao" name="Registro" class="form-control"><br>
                </div>
            </div>
            <div class="row ">
            <div class="col-5 text-left">
                    <button type="submit" value="voltar" id="voltar" name="voltar"
                        class="btn btn-primary">Voltar</button>
                </div>
                <div class="col-5 text-right">
                    <button type="submit" value="deletar" id="deletar" name="delete"
                        class="btn btn-danger">Deletar Cadastro</button>
                </div>
            </div>


    </div>


    </form>
    </div>
</body>
