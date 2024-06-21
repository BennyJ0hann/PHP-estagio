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
    function formatacao($string, $search = array("De ", "Do ", "Dos ", "Da ", "Das "), $replace = array("de ", "do ", "dos ", "da ", "das ")) {
        return str_replace($search, $replace, ucwords(strtolower($string)));
    }

?>