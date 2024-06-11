<?php
session_start();

if (!isset($_SESSION['pessoas'])) {
    $_SESSION['pessoas'] = [];
    $_SESSION['contador'] = 0;
}
if (isset($_POST['limpa'])) {
    unset($_SESSION['pessoas']);
}
if (isset($_POST['verCadastro'])) {
    header('Location: /CadastroPessoas/cadastroPessoa.php');
    exit();
}
if (isset($_POST['nomesEidades'])) {
    
}
if (isset($_POST['moraEmSantos'])) {
    
}
if (isset($_POST['maisDe18'])) {
    
}
if (isset($_POST['countMasculino'])) {
    
}

$nomePessoa = $_POST['nomePessoa'];
$cidadePessoa = $_POST['cidadePessoa'];
$idadePessoa = $_POST['idadePessoa'];
$sexo = $_POST['sexo'];

if (isset($_POST['submit'])) {
    if (empty($nomePessoa)) {
        $erroModelo = '<p class="text-danger">Informe o nome da pessoa.</p>';
    } else if (empty($cidadePessoa)) {
        $erroFabricante = '<p class="text-danger">Informe corretamente a cidade.</p>';
    } else if (empty($idadePessoa)) {
        $erroCor = '<p class="text-danger">Informe corretamente a idade.</p>';
    } else if (empty($sexo)) {
        $erroPortas = '<p class="text-danger">Marque a opção que melhor te representa.</p>';
    } else {
        $pessoa = [
            'Registro' => $_SESSION['contador'],
            'nomePessoa' => $nomePessoa,
            'cidadePessoa' => $cidadePessoa,
            'idadePessoa' => $idadePessoa,
            'sexo' => $sexo
        ];

        $_SESSION['pessoas'][] = $pessoa;
        $_SESSION['contador']++;

        echo '<p class="text-success">Pessoa cadastrada com sucesso.</p>';

        

    }
}
for ($i = 0; $i < count($_SESSION['pessoas']); $i++) {
    $pessoaSession = $_SESSION['pessoas'][$i];
    echo '<p> Nome: ' . $pessoaSession['nomePessoa'] . ' | Cidade: ' . $pessoaSession['cidadePessoa'] . ' | Idade: ' . $pessoaSession['idadePessoa'] . ' | Sexo: ' . $pessoaSession['sexo'] . '</p>';
}
?>