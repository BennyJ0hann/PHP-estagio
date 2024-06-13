<?php
include 'db.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $nomePessoa = $_POST['nomePessoa'];
    $cidadePessoa = $_POST['cidadePessoa'];
    $idadePessoa = $_POST['idadePessoa'];
    $sexo = $_POST['sexo'];

    $sql = "INSERT INTO pessoas (name, cidade, idade, sexo) VALUES ('$nomePessoa', '$cidadePessoa', '$idadePessoa', '$sexo')";
    if ($conexao->query($sql) === TRUE) {
        echo "Novo cadastro adicionado ao Banco";
    } else {
        echo "Erro: " . $sql . "<br>" . $conexao->error;
    }
    $conexao->close();
}
?>