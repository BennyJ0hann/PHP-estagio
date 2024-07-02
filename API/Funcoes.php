<?php
#################Funções para retorno da api####################
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
        echo "Erro ao fazer a requisição para a API.";
    }

    $dados = json_decode($resposta, true);
    if ($dados === NULL) {
        echo "Erro ao decodificar a resposta JSON.";
    }

    return formata($dados);

}
#####################################################################


############################# MYSQL #################################

#CONSULTA
function consulta()
{
    include 'db.php';

    $sql = "select id, name, cidade, data_nascimento, sexo from pessoas";
    $resultado = $conexao->query($sql);

    return printConsulta($resultado);
}

#PRINTA CONSULTA
function printConsulta($resultado)
{
    include 'db.php';
    if ($resultado->num_rows > 0) {
        echo '<div class="container ">
  <div class="row ">
    <div class="col border border-secondary text-center ">
      id
    </div>
    <div class="col border border-secondary text-center">
      Nome
    </div>
    <div class="col border border-secondary text-center">
      Cidade
    </div>
    <div class="col border border-secondary text-center">
      Data de Nascimento
    </div>
    <div class="col border border-secondary text-center">
      Sexo
    </div>
  </div>
</div>';
        while ($row = $resultado->fetch_assoc()) {
            echo '<div class="container rounded">
  <div class="row ">
    <div class="col border border-secondary text-end">
      ' . $row["id"] . '
    </div>
    <div class="col border border-secondary">
      ' . formatacao($row["name"]) . '
    </div>
    <div class="col border border-secondary">
      ' . formatacao($row["cidade"]) . '
    </div>
    <div class="col border border-secondary">
      ' . $row["data_nascimento"] . '
    </div>
    <div class="col border border-secondary">
      ' . $row["sexo"] . '
    </div>
  </div>
</div>';
        }
    } else {
        echo "Sem nenhum cadastro";
    }
    $conexao->close();

}

#INSERT
function insertMysql($nomePessoa, $cidadePessoa, $sexo, $dtNascimento)
{
    include 'db.php';
        $sql = "INSERT INTO pessoas (name, cidade, sexo, data_nascimento) VALUES ('$nomePessoa', '$cidadePessoa', '$sexo', '$dtNascimento')";
        if ($conexao->query($sql) === TRUE) {
            echo "Novo cadastro adicionado ao Banco <br>";
            echo "Nome: $nomePessoa, Sexo: $sexo, Cidade: $cidadePessoa, Nascimento: $dtNascimento<br>";

        } else {
            echo "Erro no cadastro ";
        }
        
    }
#UPDATE
function updateMysql($id, $sexo, $nomePessoa, $cidadePessoa, $dtNascimentoSemFormatar)
{
    include 'db.php';

    if (empty($dtNascimentoSemFormatar)) {
    } else {
        $dtNascimentoSemFormatar = DateTime::createFromFormat('d/m/Y', $dtNascimentoSemFormatar);
        $dtNascimento = $dtNascimentoSemFormatar->format('Y-m-d');
    }

    $sql = "select id, name, cidade, data_nascimento, sexo from pessoas";
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            if ($row["id"] == $id) {
                if (empty($nomePessoa)) {
                    $nomePessoa = $row["name"];
                }
                if (empty($cidadePessoa)) {
                    $cidadePessoa = $row["cidade"];
                }
                if (empty($dtNascimento)) {
                    $dtNascimento = $row["data_nascimento"];
                }
                if (empty($sexo)) {
                    $sexo = $row["sexo"];
                }

                $sql2 = "UPDATE pessoas SET name='$nomePessoa', cidade='$cidadePessoa', data_nascimento='$dtNascimento', sexo='$sexo' WHERE id=$id";
                if ($conexao->query($sql2) == TRUE) {
                    echo "Atualização de cadastro feita com sucesso";
                } else {
                    echo "Erro ao atualizar o cadastro: ";
                }

                $conexao->close();
            }
        }
    }

}

#DELETE
function deleteMysql($id)
{
    include 'db.php';

    $sql = "DELETE FROM pessoas WHERE id=$id";
    if ($conexao->query($sql) === TRUE) {
        echo "<p class='text-success'>Cadastro deletado com sucesso";
    } else {
        echo "Error não foi possivel deletar cadastro: ";
    }

    $conexao->close();
}

#SELECTs
#caixa de seleção idade
function selectIdade()
{
    include 'db.php';
    $sqlIdade = "SELECT DISTINCT (YEAR(CURRENT_DATE()) - YEAR(p.data_nascimento) - (RIGHT(CURRENT_DATE(), 5) < RIGHT(p.data_nascimento, 5))) AS idade
                FROM cadastroPessoas.pessoas p ORDER BY idade ASC;";
    $idades = $conexao->query($sqlIdade);
    if ($idades->num_rows > 0) {
        while ($row = $idades->fetch_assoc()) {
            echo "<option value ='{$row["idade"]}'>{$row["idade"]}</option>";
        }
    }
}

#caixa de seleção cidade
function selectCidade()
{
    include 'db.php';

    $sqlCidade = "SELECT DISTINCT (p.cidade)  FROM cadastroPessoas.pessoas p;";
    $cidades = $conexao->query($sqlCidade);


    if ($cidades->num_rows > 0) {
        while ($row = $cidades->fetch_assoc()) {
            echo "<option value ='{$row["cidade"]}'>{$row["cidade"]}</option>";
        }
    }
}

#filtro de pesquisa read.php
function filtroPesquisa($cidadeForm, $idadeForm, $sexoForm)
{
    include 'db.php';

    $condicao = "YEAR(CURRENT_DATE()) - YEAR(p.data_nascimento) - (RIGHT(CURRENT_DATE(), 5) < RIGHT(p.data_nascimento, 5))";

    $condCidade = $cidadeForm ? " and upper(p.cidade) = upper('$cidadeForm')" : "";
    $condIdade = $idadeForm ? "and $condicao = $idadeForm" : "";
    $condSexo = $sexoForm ? "and upper(p.sexo) = upper('$sexoForm')" : "";


    $pesquisa = " SELECT p.name, p.cidade, $condicao AS idade, p.sexo
                    FROM cadastroPessoas.pessoas p
                    where 1=1 $condCidade $condIdade $condSexo;";

    $resultado = $conexao->query($pesquisa);

    if ($resultado->num_rows > 0) {
        echo '<div class="container">
            <div class="row">
            <div class="col border border-secondary text-center">
            Nome
            </div>
            <div class="col border border-secondary text-center">
            Cidade
            </div>
            <div class="col border border-secondary text-center">
            Idade
            </div>
            <div class="col border border-secondary text-center">
            Sexo
            </div>
            </div>
            </div>';
        while ($row = $resultado->fetch_assoc()) {
            echo '<div class="container rounded">
            <div class="row ">
            <div class="col border border-secondary">
            ' . formatacao($row["name"]) . '
            </div>
            <div class="col border border-secondary">
            ' . formatacao($row["cidade"]) . '
            </div>
            <div class="col border border-secondary">
            ' . $row["idade"] . '
            </div>
            <div class="col border border-secondary">
            ' . $row["sexo"] . '
            </div>
            </div>
            </div>';
        }
    } else {
        echo 'Pesquisa não encontrada';
    }
}

#####################################################################
function formatacao($string, $search = array("De ", "Do ", "Dos ", "Da ", "Das "), $replace = array("de ", "do ", "dos ", "da ", "das "))
{
    return str_replace($search, $replace, ucwords(strtolower($string)));
}
?>