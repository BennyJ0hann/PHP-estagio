<?php
include 'cadastro.html';
session_start();

if (!isset($_SESSION['cadastro'])) {
    $_SESSION['cadastro'] = [];
    $_SESSION['contador'] = 0;
}

if (isset($_POST['limpa'])) {
    unset($_SESSION['cadastro']);
    
}
if (isset($_POST['verCadastro'])) {
    
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    

    if (isset($_POST['submit'])) {
        $erroNomePersonagem = '';
        $erroPrimeiraAparicao = '';
        $erroMaiorFeito = '';
        $erroQuemE = '';
        $erroVivoMorto = '';
        $erroCausaDaMorte = '';

        if (empty($_POST['nomePersonagem'])) {
            $erroNomePersonagem = '<p class="text-danger">Informe o nome do personagem.</p>';
        } else if (empty($_POST['primeiraAparicao'])) {
            $erroPrimeiraAparicao = '<p class="text-danger">Informe a primeira aparição.</p>';
        } else if (empty($_POST['maiorFeito'])) {
            $erroMaiorFeito = '<p class="text-danger">Informe o maior feito.</p>';
        } else if (empty($_POST['quemE'])) {
            $erroQuemE = '<p class="text-danger">Diga quem é o personagem.</p>';
        } else if (empty($_POST['vivoMorto'])) {
            $erroVivoMorto = '<p class="text-danger">Informe se ele está vivo/morto.</p>';
        } else if (empty($_POST['causaMorte']) && $_POST['vivoMorto'] == 'morto') {
            $erroCausaDaMorte = '<p class="text-danger">Informe a causa da morte.</p>';
        } else {
            $postNome = $_POST['nomePersonagem'];
            $postAparicao = $_POST['primeiraAparicao'];
            $postFeito = $_POST['maiorFeito'];
            $postQuem = $_POST['quemE'];
            $postVivo = $_POST['vivoMorto'];
            $postMorte = isset($_POST['causaMorte']) ? $_POST['causaMorte'] : '';
            $postImagem = $_POST['linkImagem'];

            $personagem = [
                'Registro'=>$_SESSION['contador'],
                'nomePersonagem' => $postNome,
                'primeiraAparicao' => $postAparicao,
                'maiorFeito' => $postFeito,
                'quemE' => $postQuem,
                'vivoMorto' => $postVivo,
                'causaDaMorte' => $postMorte,
                'imagemPersonagem' => $postImagem
            ];

            $_SESSION['cadastro'][] = $personagem;
            $_SESSION['contador']++;


            echo '<p class="text-success">Personagem adicionado com sucesso.</p>';

            for ($i = 0; $i < count($_SESSION['cadastro']); $i++) {
                $personagem = $_SESSION['cadastro'][$i];
                echo '<p> Nome: ' . $personagem['nomePersonagem'] . ' | Primeira Aparição: ' . $personagem['primeiraAparicao'] . ' | Maior Feito: ' . $personagem['maiorFeito'] . ' | Quem é: ' . $personagem['quemE'] . ' - ' . $personagem['vivoMorto'] . '   ' . $personagem['causaDaMorte'] .$personagem['imagemPersonagem']. '</p>';
            }
            
        }
        
    }
}
header('Location: /CadastroPersonagem/Personagens/PagPersonagens.php');
exit();
?>
