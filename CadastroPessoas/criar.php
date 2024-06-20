<?php
include 'db.php';
include 'read.php';
include 'update.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $data_br = $_POST['data_br'];


    if (isset($_POST['submit'])) {
        $nomePessoa = $_POST['nomePessoa'];
        $cidadePessoa = $_POST['cidadePessoa'];
        $sexo = $_POST['sexo'];
        $dtNascimentoSemFormatar = DateTime::createFromFormat('d/m/Y', $_POST['dtNascimento']);

        $dtNascimento = $dtNascimentoSemFormatar->format('Y-m-d');
    

        if (empty($nomePessoa)) {
            echo '<p class="text-danger">Informe o nome da pessoa.</p>';
        } else if (empty($cidadePessoa)) {
            echo '<p class="text-danger">Informe corretamente a cidade.</p>';
        } else if (empty($dtNascimento)) {
            echo '<p class="text-danger">Informe corretamente a idade.</p>';
        } else if (empty($sexo)) {
            echo '<p class="text-danger">Marque a opção que melhor te representa.</p>';
        } else {

    

    $sql = "INSERT INTO pessoas (name, cidade, sexo, data_nascimento) VALUES ('$nomePessoa', '$cidadePessoa', '$sexo', '$dtNascimento')";
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