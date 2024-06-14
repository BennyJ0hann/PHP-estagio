<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Cadastro</title>
</head>

<body class="bg-dark text-white">
    <?php

    session_start();

    

    $valida = true;

    if (!isset($_SESSION['pessoas'])) {
        $_SESSION['pessoas'] = [];
        $_SESSION['contador'] = 0;
    }
    if (isset($_POST['limpa'])) {
        $_SESSION['pessoas'] = [];
        $_SESSION['contador']= 0;

        echo '<p class ="text-danger">Todos os registros foram apagados</p>';
    }
    if (isset($_POST['verCadastro'])) {
        header('Location: /CadastroPessoas/cadastroPessoa.php');
        exit();
    }
    if (isset($_POST['cadastrar'])) {
        header('Location: /CadastroPessoas/cadastroPessoas.html');
        exit();
    }
    
    if (isset($_POST['nomesEidades'])) {
        echo '<h2> Nome e Idade </h2>';

        foreach ($_SESSION['pessoas'] as $index => $nomesEidades) {
            echo '' . $index + 1 . ' - ' . $nomesEidades['nomePessoa'] . ' ' . $nomesEidades['idadePessoa'] . ' anos. <br>';
        }
        $valida = false;
    }
    if (isset($_POST['moraEmSantos'])) {
        echo '<h2> Pessoas que moram em Santos </h2>';
        $moraEmSantos = $_SESSION['pessoas'];
        foreach ($moraEmSantos as $index => $nomes) {
            if (strtolower($nomes['cidadePessoa']) == 'santos') {
                echo $index + 1 . ' - ' . $nomes['nomePessoa'] . ' (' . strtoupper($nomes['cidadePessoa']) . '). <br>';
            }
        }
        $valida = false;
    }
    if (isset($_POST['maisDe18'])) {
        echo '<h2> Pessoas maiores de 18 anos </h2>';
        $maisDe18 = $_SESSION['pessoas'];
        foreach ($maisDe18 as $index => $idade) {
            if (strtolower($idade['idadePessoa']) > 18) {
                echo $index + 1 . ' - ' . $idade['nomePessoa'] . ' ' . $idade['idadePessoa'] . ' anos. <br>';
            }
        }
        $valida = false;
    }
    if (isset($_POST['countMasculino'])) {
        echo '<h2> Pessoas do sexo masculino </h2>';
        $sexo = $_SESSION['pessoas'];
        $count = 0;
        foreach ($sexo as $index => $nomes) {
            if (strtolower($nomes['sexo']) == 'masculino') {
                $count++;
            }
        }
        echo 'Cadastros do sexo masculino : ' . $count . '';
        $valida = false;
    }
    if (isset($_POST['populaPag'])) {
        echo '<p class ="text-success">Registros adicionados com sucesso!</p>';
        $arrayPreset = [
            [
                'Registro' => $_SESSION['contador']++,
                'nomePessoa' => 'Mickey Mouse',
                'cidadePessoa' => 'Santos',
                'idadePessoa' => '92',
                'sexo' => 'Masculino'
            ],
            [
                'Registro' => $_SESSION['contador']++,
                'nomePessoa' => 'Minnie Mouse',
                'cidadePessoa' => 'Belo Horizonte',
                'idadePessoa' => '92',
                'sexo' => 'Feminino'
            ],
            [
                'Registro' => $_SESSION['contador']++,
                'nomePessoa' => 'Pato Donald',
                'cidadePessoa' => 'Contagem',
                'idadePessoa' => '88',
                'sexo' => 'Masculino'
            ],
            [
                'Registro' => $_SESSION['contador']++,
                'nomePessoa' => 'Margarida',
                'cidadePessoa' => 'Nova Lima',
                'idadePessoa' => '86',
                'sexo' => 'Feminino'
            ],
            [
                'Registro' => $_SESSION['contador']++,
                'nomePessoa' => 'Pateta',
                'cidadePessoa' => 'Santos',
                'idadePessoa' => '88',
                'sexo' => 'Masculino'
            ],
            [
                'Registro' => $_SESSION['contador']++,
                'nomePessoa' => 'Pluto',
                'cidadePessoa' => 'Belo Horizonte',
                'idadePessoa' => '90',
                'sexo' => 'Masculino'
            ],
            [
                'Registro' => $_SESSION['contador']++,
                'nomePessoa' => 'Simba',
                'cidadePessoa' => 'Contagem',
                'idadePessoa' => '19',
                'sexo' => 'Masculino'
            ],
            [
                'Registro' => $_SESSION['contador']++,
                'nomePessoa' => 'Nala',
                'cidadePessoa' => 'Nova Lima',
                'idadePessoa' => '19',
                'sexo' => 'Feminino'
            ],
            [
                'Registro' => $_SESSION['contador']++,
                'nomePessoa' => 'Ariel',
                'cidadePessoa' => 'Santos',
                'idadePessoa' => '16',
                'sexo' => 'Feminino'
            ],
            [
                'Registro' => $_SESSION['contador']++,
                'nomePessoa' => 'Bela',
                'cidadePessoa' => 'Belo Horizonte',
                'idadePessoa' => '22',
                'sexo' => 'Feminino'
            ],
            [
                'Registro' => $_SESSION['contador']++,
                'nomePessoa' => 'Fera',
                'cidadePessoa' => 'Contagem',
                'idadePessoa' => '30',
                'sexo' => 'Masculino'
            ],
            [
                'Registro' => $_SESSION['contador']++,
                'nomePessoa' => 'Aladdin',
                'cidadePessoa' => 'Nova Lima',
                'idadePessoa' => '20',
                'sexo' => 'Masculino'
            ],
            [
                'Registro' => $_SESSION['contador']++,
                'nomePessoa' => 'Jasmine',
                'cidadePessoa' => 'Santos',
                'idadePessoa' => '17',
                'sexo' => 'Feminino'
            ],
            [
                'Registro' => $_SESSION['contador']++,
                'nomePessoa' => 'Woody',
                'cidadePessoa' => 'Belo Horizonte',
                'idadePessoa' => '25',
                'sexo' => 'Masculino'
            ],
            [
                'Registro' => $_SESSION['contador']++,
                'nomePessoa' => 'Buzz Lightyear',
                'cidadePessoa' => 'Contagem',
                'idadePessoa' => '25',
                'sexo' => 'Masculino'
            ],
            [
                'Registro' => $_SESSION['contador']++,
                'nomePessoa' => 'Elsa',
                'cidadePessoa' => 'Nova Lima',
                'idadePessoa' => '24',
                'sexo' => 'Feminino'
            ],
            [
                'Registro' => $_SESSION['contador']++,
                'nomePessoa' => 'Anna',
                'cidadePessoa' => 'Santos',
                'idadePessoa' => '23',
                'sexo' => 'Feminino'
            ],
            [
                'Registro' => $_SESSION['contador']++,
                'nomePessoa' => 'Olaf',
                'cidadePessoa' => 'Belo Horizonte',
                'idadePessoa' => '15',
                'sexo' => 'Masculino'
            ],
            [
                'Registro' => $_SESSION['contador']++,
                'nomePessoa' => 'Shrek',
                'cidadePessoa' => 'Contagem',
                'idadePessoa' => '33',
                'sexo' => 'Masculino'
            ],
            [
                'Registro' => $_SESSION['contador']++,
                'nomePessoa' => 'Fiona',
                'cidadePessoa' => 'Nova Lima',
                'idadePessoa' => '24',
                'sexo' => 'Feminino'
            ],
            [
                'Registro' => $_SESSION['contador']++,
                'nomePessoa' => 'Burro',
                'cidadePessoa' => 'Santos',
                'idadePessoa' => '13',
                'sexo' => 'Masculino'
            ],
            [
                'Registro' => $_SESSION['contador']++,
                'nomePessoa' => 'Gato de Botas',
                'cidadePessoa' => 'Belo Horizonte',
                'idadePessoa' => '11',
                'sexo' => 'Masculino'
            ],
            [
                'Registro' => $_SESSION['contador']++,
                'nomePessoa' => 'Moana',
                'cidadePessoa' => 'Contagem',
                'idadePessoa' => '22',
                'sexo' => 'Feminino'
            ],
            [
                'Registro' => $_SESSION['contador']++,
                'nomePessoa' => 'Maui',
                'cidadePessoa' => 'Nova Lima',
                'idadePessoa' => '574',
                'sexo' => 'Masculino'
            ]

        ];
        foreach ($arrayPreset as $index => $personagem) {
            $_SESSION['pessoas'][] = $personagem;
        }
        $valida = true;
    }
    if (isset($_POST['verTudo'])) {
        $valida = true;
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
    if ($valida == true) {
        echo '<h2>Todos os registros </h2>';
        for ($i = 0; $i < count($_SESSION['pessoas']); $i++) {
            $pessoaSession = $_SESSION['pessoas'][$i];
            echo '<p>' . $pessoaSession['Registro'] + 1 . ' - ' . ' Nome: ' . $pessoaSession['nomePessoa'] . ' | Cidade: ' . $pessoaSession['cidadePessoa'] . ' | Idade: ' . $pessoaSession['idadePessoa'] . ' | Sexo: ' . $pessoaSession['sexo'] . '</p>';
        }
    }
    ?>
    <form role="form" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div class="row">
            <div class="col-3 mb-2">
                <button type="submit" value="cadastrar" id="cadastrar" name="nomesEidades"
                    class="btn btn-secondary">Nome e idade</button>
                <button type="submit" value="cadastrar" id="cadastrar" name="moraEmSantos"
                    class="btn btn-secondary">Moram em Santos</button>
            </div>
            <div class="col-3 mb-2 ">
                <button type="submit" value="cadastrar" id="cadastrar" name="verTudo" class="btn btn-primary mr-2">Todos
                    Registros</button>

            </div>
            <div class="col-6 mb-2">
            </div>
        </div>
        <div class="row">
            <div class="col-3 mb-2">
                <button type="submit" value="cadastrar" id="cadastrar" name="maisDe18" class="btn btn-secondary">Nome >
                    18 anos</button>
                <button type="submit" value="cadastrar" id="cadastrar" name="countMasculino"
                    class="btn btn-secondary">Qtde de Homens</button>
            </div>
            <div class="col-3 mb-2">
                <button type="submit" value="cadastrar" id="cadastrar" name="cadastrar"
                    class="btn btn-success">Cadastrar</button>

            </div>
            <div class="col-6 mb-2">
            </div>
        </div>
    </form>
</body>

</html>