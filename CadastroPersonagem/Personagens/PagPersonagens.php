<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Personagens</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<?php
session_start();
?>
<body class="background">
    <div>
        <div class="logo">
            <a href="./pagInicial.html">
                <img src="./Design sem nome(1).png" alt="logo">
            </a>
        </div>
        <div class="cabecalho">
        </div>
    </div>
    
    <div class="formatation" id="conteudo">
        <h1 style="color: aliceblue;" class="pt-3">Personagens</h1>

        <div style="text-align: center; margin-top: 50px;">
        <form method="POST">
            <button type="submit" value="" name="cadastrarNew" class="btn btn-primary">Adicionar Personagem</button>
        </form>
    </div>
        
        <?php
        if (isset($_POST['cadastrarNew'])) {
            header('Location: http://localhost/CadastroPersonagem/Personagens/cadastro.html');
            exit();
        }

        $personagens = $_SESSION["cadastro"];

        if (count($personagens) > 0) {
            $counter = 0;

            echo '<ul>';

            foreach ($personagens as $index => $personagem) {
                if ($counter > 0 && $counter % 4 == 0) {
                    echo '</ul><ul>';
                }

                echo '<div class="cards" style = "margin-right: 15px; width: 23%">
                        <h2>'.htmlspecialchars($personagem['nomePersonagem']).'</h2>
                        <div class="container">
                            <a href="'.htmlspecialchars($personagem['imagemPersonagem']).'">
                                <button style="background-color: black; border: none;">
                                    <img src="'.htmlspecialchars($personagem['imagemPersonagem']).'" alt="Avatar" class="" style="  width: 100%;
                                    height: 100%;
                                    left: 50%;
                                    position: absolute;
                                    top: 50%;
                                    object-fit: cover;
                                    transform: translate(-50%, -50%);">
                                    <div class="overlay">
                                        <div class="text">Conhecer <br> Personagem</div>
                                    </div>
                                </button>
                            </a>
                        </div>';

                if (htmlspecialchars($personagem['vivoMorto']) == 'Morto') {
                    echo '<p class="dead">'.htmlspecialchars($personagem['vivoMorto']).'</p>';
                } else {
                    echo '<p class="life">'.htmlspecialchars($personagem['vivoMorto']).'</p>';
                }

                echo '  <table>
                            <tr valign="top">
                                <th class="text-start fontCard">Nome</th>
                                <td class="text-start fontCard">'.htmlspecialchars($personagem['nomePersonagem']).'</td>
                            </tr>
                            <tr valign="top">
                                <th class="text-start fontCard">Primeira aparição</th>
                                <td class="text-start fontCard">'.htmlspecialchars($personagem['primeiraAparicao']).'</td>
                            </tr>
                            <tr valign="top">
                                <th class="text-start fontCard">Maior feito</th>
                                <td class="fontCard text-start">'.htmlspecialchars($personagem['maiorFeito']).'</td>
                            </tr>
                            <tr valign="top">
                                <th class="text-start fontCard">Quem é?</th>
                                <td class="text-start fontCard">'.htmlspecialchars($personagem['quemE']).'</td>
                            </tr>';
                if (htmlspecialchars($personagem['vivoMorto']) == 'Morto') {
                    echo '<tr valign="top">
                            <th class="text-start fontCard">Causa da morte</th>
                            <td class="text-start fontCard">'.htmlspecialchars($personagem['causaDaMorte']).'</td>
                        </tr>';
                }
                echo '  </table>
                    </div>';

                $counter++;
            }

            echo '</ul>';

        } else {
            echo '<p>Não há personagens cadastrados.</p>';
            
        }
        
        ?>
        
    </div>
    
    
</body>
</html>
