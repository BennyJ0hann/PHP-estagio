<?php

include 'db.php';

if (isset($_POST['voltar'])) {
    header('Location: /API/read.php');
    exit();
}
if (isset($_POST['cadastroApi'])) {
    header('Location: /API/cadastroAPI.php');
    exit();
}
if (isset($_POST['atualizarCadastro'])) {
    header('Location: /API/update.php');
    consulta();
}
if (isset($_POST['cadastrar'])) {
    header('Location: /API/cadastroPessoas.php');
    exit();
}
if (isset($_POST['deletar'])) {
    header('Location: /API/delete.php');
    exit();
}
if (isset($_POST['cadastroNormal'])) {
    header('Location: /API/cadastroPessoas.php');
    exit();
}
if (isset($_POST['verTudo'])) {
    header('Location: /API/read.php');
    exit();
}
if (isset($_POST['submit1'])) {
    include 'Funcoes.php';

    $nomePessoa = formatacao($_POST['nomePessoa']);
    $cidadePessoa = formatacao($_POST['cidadePessoa']);
    $sexo = $_POST['sexo'];
    $dtNascimentoValida = $_POST['dtNascimento'];

    include 'db.php';
    if (empty($nomePessoa)) {
        echo '<p class="text-danger">Informe o nome da pessoa.</p>';
    } else if (empty($cidadePessoa)) {
        echo '<p class="text-danger">Informe corretamente de onde é originário.</p>';
    } else if (empty($dtNascimentoValida)) {
        echo '<p class="text-danger">Informe corretamente a data de nascimento.</p>';
    } else if (empty($sexo)) {
        echo '<p class="text-danger">Informe corretamente o gênero.</p>';
    } else {
        $dtNascimentoSemFormatar = DateTime::createFromFormat('d/m/Y', $dtNascimentoValida);
        $dtNascimento = $dtNascimentoSemFormatar->format('Y-m-d');

        insertMysql($nomePessoa, $cidadePessoa, $sexo, $dtNascimento);
    }


}

if (isset($_POST["delete"])) {
    include 'Funcoes.php';

    $id = $_POST['Registro'];
    deleteMysql($id);
}

if (isset($_POST["atualizar"])) {
    include 'Funcoes.php';

    $id = $_POST['Registro'];
    $sexo = $_POST['sexoForm'];
    $nomePessoa = formatacao($_POST['nomePessoa']);
    $cidadePessoa = formatacao($_POST['cidadePessoa']);
    $dtNascimentoSemFormatar = $_POST['dtNascimento'];

    updateMysql($id, $sexo, $nomePessoa, $cidadePessoa, $dtNascimentoSemFormatar);
}


if (isset($_POST['verCadastro']) || isset($_POST["todosResgistros"]) || isset($_POST["deletar"])) {

    consulta();

}


if (isset($_POST['pesquisar'])) {
    $cidadeForm = $_POST['selectCidade'];
    $idadeForm = (int) $_POST['selectIdade'];
    $sexoForm = $_POST['selectSexo'];

    filtroPesquisa($cidadeForm, $idadeForm, $sexoForm);
}


if (isset($_POST['cadastrarPersonagem'])) {
    include 'Funcoes.php';

    $personagensSelecionados = $_POST['personagemAdd'];

    foreach ($personagensSelecionados as $personagemId) {

        $nome = $_POST['data-nome'][$personagemId];
        $sexo = $_POST['data-sexo'][$personagemId];
        $cidade = $_POST['data-cidade'][$personagemId];
        $nascimento = DateTime::createFromFormat('d/m/Y', $_POST['data-nascimento'][$personagemId]);
        $nascimentoFormat = $nascimento->format('Y-m-d');

        insertMysql($nome, $cidade, $sexo, $nascimentoFormat);

    }
    $conexao->close();
}


if (isset($_POST['pesquisarPersonagem'])) {
    include 'Funcoes.php';

    $nomePersonagem = $_POST['nomePersonagem'];
    $sexoPersonagem = $_POST['sexo'];
    $arrayPersonagens = pesquisaAll();
    $pesquisa = pesquisaParametros($arrayPersonagens, $nomePersonagem, $sexoPersonagem);
    $resposta = json_encode($pesquisa, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}

?>