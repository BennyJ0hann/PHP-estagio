<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['Registro'];
    $nomePessoa = $_POST['nomePessoa'];
    $cidadePessoa = $_POST['cidadePessoa'];
    $idadePessoa = $_POST['idadePessoa'];
    $sexo = $_POST['sexo'];

    $sql = "UPDATE pessoas SET name='$nomePessoa', cidade='$cidadePessoa', idade='$idadePessoa', sexo='$sexo' WHERE id=$id";
    if ($conexao->query($sql) === TRUE) {
        echo "Atualização de cadastro feita com sucesso";
    } else {
        echo "Erro ao atualizar o cadastro: " . $conexao->error;
    }

    $conexao->close();
}
?>
