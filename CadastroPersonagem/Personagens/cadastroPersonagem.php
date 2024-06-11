<?php
session_start();

if (!isset($_SESSION['cadastro'])) {
    $_SESSION['cadastro'] = [];
    $_SESSION['contador'] = 0;
}

if (isset($_POST['limpa'])) {
    unset($_SESSION['cadastro']);
}
if (isset($_POST['verCadastro'])) {
    header('Location: /CadastroPersonagem/Personagens/PagPersonagens.php');
    exit();
}
if (isset($_POST['populaPag'])) {
    
    $arrayPersonagens = [
         [
            'Registro'=> 1,
            'nomePersonagem' => 'Jim Hawkins',
            'primeiraAparicao' => '2002',
            'maiorFeito' => 'Achou o planeta do tesouro',
            'quemE' => 'É um rapaz solitário de 15 anos que tenta encontrar seu lugar no universo',
            'vivoMorto' => 'Vivo',
            'causaDaMorte' => '',
            'imagemPersonagem' => 'https://pbs.twimg.com/media/E2z6kxIUYAgw0KM.png'
         ],
        [
            'Registro'=> 2,
            'nomePersonagem' => 'Stitch',
            'primeiraAparicao' => '2002',
            'maiorFeito' => 'Virar uma bola',
            'quemE' => 'Experiencia 626, é um experimento ilegal criado por Jumba Jookiba',
            'vivoMorto' => 'Vivo',
            'causaDaMorte' => '',
            'imagemPersonagem' => 'https://static1.cbrimages.com/wordpress/wp-content/uploads/2023/04/stitch-smiling-menacingly-1.jpg'
        ],
        [
        'Registro'=> 3,
        'nomePersonagem' => 'Woody',
        'primeiraAparicao' => '1999',
        'maiorFeito' => 'Fugiu da creche',
        'quemE' => 'Um brinquedo!!',
        'vivoMorto' => 'Vivo',
        'causaDaMorte' => '',
        'imagemPersonagem' => 'https://media.gq.com.mx/photos/5be9d64088903b7289337699/master/w_1600%2Cc_limit/toy_story_3215.jpg'
        ],
        [
        'Registro'=> 4,
        'nomePersonagem' => 'Mike Wazowski',
        'primeiraAparicao' => '2001',
        'maiorFeito' => 'Trouxe a papelada',
        'quemE' => 'O monstro que não sabe assustar',
        'vivoMorto' => 'Vivo',
        'causaDaMorte' => '',
        'imagemPersonagem' => 'https://i.ytimg.com/vi/pZEIY0XZG1c/hqdefault.jpg'
        ],
        [
        'Registro'=> 5,
        'nomePersonagem' => 'Peter Parker',
        'primeiraAparicao' => 'Amazing Fantasy #15 (1962)',
        'maiorFeito' => 'Derrotou todos os X-Men',
        'quemE' => 'Um herói de bom humor, bastante honrado e muito procurado pelos que o odeiam',
        'vivoMorto' => 'Vivo',
        'causaDaMorte' => '',
        'imagemPersonagem' => 'https://i.pinimg.com/originals/6c/1d/b8/6c1db811bc63bb6db15da5c9361d866b.jpg'
        ],
        [
        'Registro'=> 6,
        'nomePersonagem' => 'Knigth Artorias',
        'primeiraAparicao' => 'Dark Souls Dlc: Artorias of the Abyss',
        'maiorFeito' => 'Conteu o Abismo que se espalhava com seu parceiro Sif',
        'quemE' => 'Guerreiros mais confiável de Gwyn',
        'vivoMorto' => 'Morto',
        'causaDaMorte' => 'Foi incapaz de vencer o Pai do Abismo',
        'imagemPersonagem' => 'https://pm1.aminoapps.com/7960/119c2072d3b1ea9da34e90b53faf23ea5c8c0ca2r1-1060-1500v2_hq.jpg'
        ],
        [
        'Registro'=> 7,
        'nomePersonagem' => 'Jack Sparrow',
        'primeiraAparicao' => 'Piratas do Caribe: A maldição do pérola negra',
        'maiorFeito' => 'Mestre do improviso',
        'quemE' => 'Um pirata lendário dos Sete Mares, malandro, irreverente e excêntrico ',
        'vivoMorto' => 'Vivo',
        'causaDaMorte' => 'Enganado por Elizabeth, que o prendeu para ser engolido pelo Kraken',
        'imagemPersonagem' => 'https://s2-quem.glbimg.com/hG3qW2guu2jAbgvGvoBRvdgGAFg=/0x0:1400x1016/888x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_b0f0e84207c948ab8b8777be5a6a4395/internal_photos/bs/2022/b/R/wiofIvTwaJJxMm1vAUDQ/johnny-depp-piratas-do-caribe.jpg'
        ],
        [
        'Registro'=> 8,
        'nomePersonagem' => 'Anakin Skywalker',
        'primeiraAparicao' => 'Star Wars: Episódio I – A Ameaça Fantasma ',
        'maiorFeito' => 'Subjuga os deuses de Mortis (filho e filha)',
        'quemE' => 'O escolhido que trouxe equilíbrio a força',
        'vivoMorto' => 'Morto',
        'causaDaMorte' => 'Se redime sacrificando sua vida para salvar seu filho, Luke Skywalker',
        'imagemPersonagem' => 'https://i.ytimg.com/vi/w8KadEulEWg/maxresdefault.jpg'
        ],
        [
        'Registro'=> 9,
        'nomePersonagem' => 'Coringa',
        'primeiraAparicao' => 'Quadrinhos: Batman #1 (1940)',
        'maiorFeito' => 'Obrigou Batman a quebrar seu código de conduta (não matar)',
        'quemE' => 'Agente do caos, lunático e psicopata',
        'vivoMorto' => 'Morto',
        'causaDaMorte' => 'Batman quebra seu pescoço',
        'imagemPersonagem' => 'https://i.pinimg.com/736x/59/64/79/596479fc99f91dfbf401e2c68d373cd8.jpg'
        ],
        [
        'Registro'=> 10,
        'nomePersonagem' => 'Tracer',
        'primeiraAparicao' => 'Heroes of the Storm',
        'maiorFeito' => 'A pessoa mais jovem a testar o protótipo de um caça teleportador, o Slipstream.',
        'quemE' => 'Ela é uma aventureira que salta no tempo e é uma força incontrolável para o bem.',
        'vivoMorto' => 'Vivo',
        'causaDaMorte' => '',
        'imagemPersonagem' => 'https://p2.trrsf.com.br/image/fget/cf/540/960/smart/images.terra.com/2022/11/14/tracer-cover-rlb55pk4eek1.jpeg'
    ],
    [
        'Registro'=> 11,
        'nomePersonagem' => 'Link',
        'primeiraAparicao' => 'The Legend of Zelda (1986)',
        'maiorFeito' => 'Salvar Hyrule (Em todas as series)',
        'quemE' => 'Heroi arquetípico e protagonista da série The Legend of Zelda',
        'vivoMorto' => 'Vivo',
        'causaDaMorte' => '',
        'imagemPersonagem' => 'https://i.pinimg.com/originals/ed/7c/dc/ed7cdc64393e796e36a97b4a229f0f65.jpg'
    ],
    [
        'Registro'=> 12,
        'nomePersonagem' => 'Shrek',
        'primeiraAparicao' => 'Shrek! (1990 book)',
        'maiorFeito' => 'Foi rei por 1 semana',
        'quemE' => 'O melhor Personagem de contos de fadas',
        'vivoMorto' => 'Vivo',
        'causaDaMorte' => '',
        'imagemPersonagem' => 'https://uploads.metropoles.com/wp-content/uploads/2019/11/25162330/Shrek1-600x400.jpg'
    ],
    [
        'Registro'=> 13,
        'nomePersonagem' => 'Ben 10',
        'primeiraAparicao' => '2005',
        'maiorFeito' => 'Derrotou Vilgax',
        'quemE' => 'Menino que encontrou um relógio alienígena e virou herói',
        'vivoMorto' => 'Vivo',
        'causaDaMorte' => '',
        'imagemPersonagem' => 'https://pbs.twimg.com/profile_images/1459351401952382989/fpHZ_cQO_400x400.jpg'
    ],
    [
        'Registro'=> 14,
        'nomePersonagem' => 'B.E.N',
        'primeiraAparicao' => '2002',
        'maiorFeito' => 'Achou seu circuito de memória',
        'quemE' => 'Robô hilário e estressado, atormentado pela falta de um circuito de memória,',
        'vivoMorto' => 'Vivo',
        'causaDaMorte' => '',
        'imagemPersonagem' => 'https://assets.mycast.io/characters/158271_normal.jpg'
    ],
    [
        'Registro'=> 15,
        'nomePersonagem' => 'Miguel',
        'primeiraAparicao' => '2000',
        'maiorFeito' => 'Fingiu ser um deus',
        'quemE' => 'Ele é um vigarista otimista e descontraído',
        'vivoMorto' => 'Vivo',
        'causaDaMorte' => '',
        'imagemPersonagem' => 'https://i.pinimg.com/564x/0a/32/b9/0a32b9ff66812957c197796ee2ff9d4e.jpg'
    ],
    [
        'Registro'=> 16,
        'nomePersonagem' => 'Barry Benson',
        'primeiraAparicao' => '2007',
        'maiorFeito' => 'Roubou a namorada de um humano',
        'quemE' => 'Recém-formado Barry acha a vida de trabalhar com mel desinteressante.',
        'vivoMorto' => 'Vivo',
        'causaDaMorte' => '',
        'imagemPersonagem' => 'https://static.wikia.nocookie.net/dreamworks/images/1/10/Barry_B._Benson_Profile.jpg'
    ]
    ];
        foreach ($arrayPersonagens as $index => $personagem) {
            $_SESSION['cadastro'][] = $personagem;
        }

    header('Location: /CadastroPersonagem/Personagens/PagPersonagens.php');
    exit();
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
