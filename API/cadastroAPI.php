<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Cadastro por API</title>
</head>

<body class="bg-dark text-white">
  <?php
  if (isset($_POST['cadastroNormal'])) {
    header('Location: /API/cadastroPessoas.php');
    exit();
  }
  $resultadoPesquisa = '';
    if (isset($_POST['pesquisarPersonagem'])) {

      $nomePersonagem = $_POST['nomePersonagem'];
      $sexoPersonagem = $_POST['sexo'];
      $arrayPersonagens[] = pesquisaAll();
      $pesquisa = pesquisaParametros($arrayPersonagens,$nomePersonagem,$sexoPersonagem);
      $resposta = json_encode($pesquisa, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ;
    }
  
    function pesquisaParametros($arrayPersonagens,$nomePersonagem, $sexoPersonagem){
      $arrayPesquisaPersonagens = [];
      foreach($arrayPersonagens as $personagens){
        if (stripos($personagens['nome'], $nomePersonagem) !== false) {
          $arrayPersonagens[] = $personagens['nome'];
      }
      }
      return $arrayPesquisaPersonagens;

    }
function pesquisaAll(){
for ($i=1; $i < 30; $i++) { 

      $responseApi = recebeUrlApi("https://rickandmortyapi.com/api/character/$i");
      $arrayPersonagens[] = $responseApi;
    }
    return $arrayPersonagens;

  }
  function formata($dados){
    $dataCriacao = new DateTime($dados['created']);
    $dataFormatada = $dataCriacao->format('d/m/Y');

    $generoTraduzido = '';
    switch ($dados['gender']) {
      case 'Male':
        $generoTraduzido = 'Masculino';
        break;
      case 'Female':
        $generoTraduzido = 'Feminino';
        break;
      default:
        $generoTraduzido = $dados['gender'];
        break;
    }

    return [
      '<br>'.'nome' =>$dados['name'],
      'sexo' => $generoTraduzido,
      'cidade' => $dados['location']['name'],
      'nascimento' => $dataFormatada
    ];

  }
  function recebeUrlApi($api_url)
  {
    $resposta = file_get_contents($api_url);
    
    $dados = json_decode($resposta, true);
    
    return formata($dados);

  }

  ?>
  <div class="container">
    <h2>Cadastro de Personagem por API</h2>
    <div class="form-group row">
      <div class="col-3">
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <label for="nome">Nome do personagem:</label>
          <input type="text" id="nome" name="nomePersonagem" class="form-control"><br>

          <label for="quemE">Sexo:</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="sexo" id="Masculino" value="Masculino">
            <label class="form-check-label" for="Masculino">Masculino</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="sexo" id="Feminino" value="Feminino">
            <label class="form-check-label" for="Feminino">Feminino</label>
          </div><br>


          <div class="col mb-2">
            <button type="submit" value="Confirmar" name="submit1" class="btn btn-primary">Cadastrar</button>
          </div>
          <div class="col mb-2">
            <button type="submit" value="ver" id="verCadastro" name="verTudo" class="btn btn-success">Ver
              Cadastros</button>

          </div>
          <div class="col mb-2">
            <button type="cadastroNormal" value="cadastroNormal" name="cadastroNormal" class="btn btn-primary">Cadastro
              Específico</button>
          </div>
          <div class="col mb-3">
            <button type="submit" value="pesquisarPersonagem" id="pesquisarPersonagem" name="pesquisarPersonagem"
              class="btn btn-secondary">Pesquisar Personagem</button>
          </div>

        </form>
      </div>
      <div class="col-9">
        <?php
        echo ''.$resposta.'';
        ?>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script>
    $(document).ready(function () {
      $('#dtNascimento').mask('00/00/0000');
    });
  </script>
</body>

</html>