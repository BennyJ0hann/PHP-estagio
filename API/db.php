<?php

$servername = "localhost";
$username = "root";
$password = "fV?L_`Uq!722£hp*MQ<~~~cP";
$dbname = "cadastroPessoas";

$conexao = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['verificaConexao'])) {
    if ($conexao->connect_error) {
        echo "<p class = 'text-danger'>Desconectado do Banco de Dados: </p>";
    }
    echo '<p class = "text-success">Conectado ao Banco de Dados</p>';
}
?>