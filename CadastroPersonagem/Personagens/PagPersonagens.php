<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Personagens</title>
    <link rel="stylesheet" href="./css/style.css">

</head>
<?php
session_start();
    

?>
<body class="background">
    <div>
        <div class="logo">
            <a href="./pagInicial.html">
            <img src="./Design sem nome(1).png" alt="logo" >
        </a>
        </div>
        <div class="cabecalho">
            
        </div>
    </div>
    
    
    <div class="formatation" id="conteudo">
        <h1 style="color: aliceblue;">Personagens</h1>
<?php

$personagens = $_SESSION["cadastro"];

if (count($personagens) > 0) {
// Contador para controlar as iterações
$counter = 0;

// Abrir a primeira tag <ul> fora do loop
echo '<ul>';

foreach ($personagens as $index => $personagem) {
    // Verifica se o contador é múltiplo de 4 e não é zero
    if ($counter > 0 && $counter % 4 == 0) {
        // Fecha a tag <ul> anterior e abre uma nova
        echo '</ul><ul>';
    }

    echo '<div class="cards">

                <h2>'.htmlspecialchars($personagem['nomePersonagem']).'</h2>
                <div class="container">
                    <a href="'. htmlspecialchars($personagem['imagemPersonagem']).'">
                        <button style="background-color: black; border: none;">
                            <img src="'. htmlspecialchars($personagem['imagemPersonagem']).'"
                        alt="Avatar" class="image_4" >
                        <div class="overlay">
                            <div class="text">Conhecer <br> Personagem</div>
                        </div>
                        </button>
                    </a>
                   
                </div>';
                if(htmlspecialchars($personagem['vivoMorto']) == 'morto'){
                
                    echo '<p class= "dead">'.htmlspecialchars($personagem['vivoMorto']). '</p>';

                }else{
                    echo '<p class= "life">'.htmlspecialchars($personagem['vivoMorto']). '</p>';
                }
                echo '<table>
                    <td>
                        <tr valign="top">
                            <th align="left" class = "fontCard">Nome</th>
                            <td align="left" class = "fontCard">'. htmlspecialchars($personagem['nomePersonagem']) .'</td>
                        </tr>
                        <tr valign="top">
                            <th align="left" class = "fontCard">Primeira aparição</th>
                            <td align="left" class = "fontCard">' . htmlspecialchars($personagem['primeiraAparicao']) . '</td>
                        </tr>
                        <tr valign="top">
                            <th align="left" class = "fontCard">Maior feito</th>
                            <td align="left" class = "fontCard">' . htmlspecialchars($personagem['maiorFeito']) . '</td>
                        </tr>
                        <tr valign="top">
                            <th align="left" class = "fontCard">Quem é?</th>
                            <td align="left" class = "fontCard">' . htmlspecialchars($personagem['quemE']) . '</td>
                        </tr>
                        ';
                         if(htmlspecialchars($personagem['vivoMorto']) == 'Morto'){
                            echo '<tr valign="top">
                                    <th align="left" class = "fontCard">Causa da morte</th>
                                    <td align="left" class = "fontCard">' . htmlspecialchars($personagem['causaDaMorte']) . '</td>
                                </tr>';
                        };
                        
                     echo '   
                    </td>

                </table>

            </div>';

    $counter++;
}
echo '</ul>';
}else{
    echo '<p>Não há personagens cadastrados.</p>';
}

?>
    
        
    </div>
</body>

</html>