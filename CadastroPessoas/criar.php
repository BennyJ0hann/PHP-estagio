<?php
include 'db.php';
include 'read.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

    if (isset($_POST['submit'])) {
        $nomePessoa = $_POST['nomePessoa'];
        $cidadePessoa = $_POST['cidadePessoa'];
        $idadePessoa = $_POST['idadePessoa'];
        $sexo = $_POST['sexo'];
        if (empty($nomePessoa)) {
            $erroModelo = '<p class="text-danger">Informe o nome da pessoa.</p>';
        } else if (empty($cidadePessoa)) {
            $erroFabricante = '<p class="text-danger">Informe corretamente a cidade.</p>';
        } else if (empty($idadePessoa)) {
            $erroCor = '<p class="text-danger">Informe corretamente a idade.</p>';
        } else if (empty($sexo)) {
            $erroPortas = '<p class="text-danger">Marque a opção que melhor te representa.</p>';
        } else {

    

    $sql = "INSERT INTO pessoas (name, cidade, idade, sexo) VALUES ('$nomePessoa', '$cidadePessoa', '$idadePessoa', '$sexo')";
    if ($conexao->query($sql) === TRUE) {
        echo "Novo cadastro adicionado ao Banco";
    } else {
        echo "Erro: " . $sql . "<br>" . $conexao->error;
    }
    $conexao->close();
}
    }
}
?>