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
  include 'db.php';

  if (isset($_POST['cadastroNormal'])) {
    header('Location: /API/cadastroPessoas.php');
    exit();
  }
  if (isset($_POST['verTudo'])) {
    header('Location: /API/criar.php');
    exit();
  }
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cadastrar'])) {

      $personagensSelecionados = $_POST['personagemAdd'];
      foreach ($personagensSelecionados as $personagemId) {

        $nome = $_POST['data-nome'][$personagemId];
        $sexo = $_POST['data-sexo'][$personagemId];
        $cidade = $_POST['data-cidade'][$personagemId];
        $nascimento = DateTime::createFromFormat('d/m/Y', $_POST['data-nascimento'][$personagemId]);
        $nascimentoFormat = $nascimento->format('Y-m-d');

          $sql = "INSERT INTO pessoas (name, cidade, sexo, data_nascimento) VALUES ('$nome', '$cidade', '$sexo', '$nascimentoFormat')";
          if ($conexao->query($sql) === TRUE) {
              echo "Novo cadastro adicionado ao Banco <br>";
              echo "ID: $personagemId, Nome: $nome, Sexo: $sexo, Cidade: $cidade, Nascimento: $nascimentoFormat<br>";

              
          } else {
              echo "Erro no cadastro ";
          }
          

      }
      $conexao->close();

    }
    if (isset($_POST['pesquisarPersonagem'])) {

      $nomePersonagem = $_POST['nomePersonagem'];
      $sexoPersonagem = $_POST['sexo'];
      $arrayPersonagens = pesquisaAll();
      $pesquisa = pesquisaParametros($arrayPersonagens, $nomePersonagem, $sexoPersonagem);
      $resposta = json_encode($pesquisa, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
  }

  function pesquisaAll()
  {
    for ($i = 1; $i < 30; $i++) {

      $responseApi = recebeUrlApi("https://rickandmortyapi.com/api/character/$i");
      if (!is_string($responseApi)) {
        $arrayPersonagens[] = $responseApi;

      }
    }
    return $arrayPersonagens;

  }
  function pesquisaParametros($arrayPersonagens, $nomePersonagem, $sexoPersonagem)
  {
    $arrayPesquisaPersonagens = [];
    foreach ($arrayPersonagens as $index => $personagem) {
      if (
        isset($personagem['nome']) && stripos($personagem['nome'], $nomePersonagem) !== false &&
        isset($personagem['sexo']) && stripos($personagem['sexo'], $sexoPersonagem) !== false
      ) {

        $arrayPesquisaPersonagens[] = $personagem;

      } else if (
        isset($personagem['sexo']) && stripos($personagem['sexo'], $sexoPersonagem) !== false &&
        !isset($personagem['nome'])
      ) {

        $arrayPesquisaPersonagens[] = $personagem;

      } else if (
        isset($personagem['nome']) && stripos($personagem['nome'], $nomePersonagem) !== false &&
        !isset($personagem['sexo'])
      ) {

        $arrayPesquisaPersonagens[] = $personagem;

      }

    }
    return $arrayPesquisaPersonagens;

  }

  function formata($dados)
  {
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
      case 'unknown':
        $generoTraduzido = 'Desconhecido';
        break;
      default:
        $generoTraduzido = $dados['gender'];
        break;
    }

    return [
      'id' => $dados['id'],
      'nome' => $dados['name'],
      'sexo' => $generoTraduzido,
      'cidade' => $dados['location']['name'],
      'nascimento' => $dataFormatada
    ];

  }
  function recebeUrlApi($api_url)
  {
    $resposta = file_get_contents($api_url);
    if ($resposta === FALSE) {
      return "Erro ao fazer a requisição para a API.";
    }

    $dados = json_decode($resposta, true);
    if ($dados === NULL) {
      return "Erro ao decodificar a resposta JSON.";
    }

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
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="sexo" id="Desconhecido" value="Desconhecido">
            <label class="form-check-label" for="Desconhecido">Desconhecido</label>
          </div><br>


          
          <div class="col mb-2">
            <button type="submit1" value="ver" id="verCadastro" name="verTudo" class="btn btn-success">Ver
              Cadastros</button>

          </div>
          <div class="col mb-2">
            <button type="cadastroNormal" value="cadastroNormal" name="cadastroNormal" class="btn btn-primary">Cadastro
              Específico</button>
          </div>
          <div class="col mb-3">
            <button type="submit1" value="pesquisarPersonagem" id="pesquisarPersonagem" name="pesquisarPersonagem"
              class="btn btn-secondary">Pesquisar Personagem</button>
          </div>

        </form>
      </div>
      <div class="col-9">
      <form id="personagemForm" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <?php
        foreach ($pesquisa as $personagem) {

          echo '<div class="form-check">
              <input class="form-check-input" type="checkbox" value="' . $personagem['id'] . '" id="flexCheckDefault" name="personagemAdd[]" data-nome="'. $personagem['nome'] .'" data-sexo="'. $personagem['sexo'] .'" data-cidade="'. $personagem['cidade'] .'" data-nascimento="'. $personagem['nascimento'] .'">
              <label class="form-check-label" for="flexCheckDefault">
              ' . $personagem['id'] . ' - ' . $personagem['nome'] . ' - ' . $personagem['sexo'] . ' - ' . $personagem['cidade'] . ' - ' . $personagem['nascimento'] . '<br>' . '
              </label>
          </div>';
        }
        ?>
        <div class="col mb-2">
            <button type="submit" value="Confirmar" name="cadastrar" class="btn btn-primary">Cadastrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    document.getElementById('personagemForm').addEventListener('submit', function (event) {

      const checkboxes = document.querySelectorAll('input[name="personagemAdd[]"]:checked');

      checkboxes.forEach(checkbox => {
        const nome = checkbox.getAttribute('data-nome');
        const sexo = checkbox.getAttribute('data-sexo');
        const cidade = checkbox.getAttribute('data-cidade');
        const nascimento = checkbox.getAttribute('data-nascimento');

        const hiddenInputs = `
            <input type="hidden" name="data-nome[${checkbox.value}]" value="${nome}">
            <input type="hidden" name="data-sexo[${checkbox.value}]" value="${sexo}">
            <input type="hidden" name="data-cidade[${checkbox.value}]" value="${cidade}">
            <input type="hidden" name="data-nascimento[${checkbox.value}]" value="${nascimento}">
        `;
        this.insertAdjacentHTML('beforeend', hiddenInputs);
      });
    });
  </script>

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