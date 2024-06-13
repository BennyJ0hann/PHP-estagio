<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['Registro'];

    $sql = "DELETE FROM pessoas WHERE id=$id";
    if ($conexao->query($sql) === TRUE) {
        echo "Cadastro deletado com sucesso";
    } else {
        echo "Error não foi possivel deletar cadastro: " . $conexao->error;
    }

    $conexao->close();
}
?>
