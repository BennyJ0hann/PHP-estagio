<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Cadastro</title>
</head>

<body class="bg-dark text-white">
<?php
  include 'criar.php';
  ?>
    <div class="container">
        <h2>Cadastro de Personagem</h2>
        <div class="form-group row">
            <div class="col-4"></div>
            <div class="col-4">
                <form method="post">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nomePessoa" class="form-control"><br>

                    <label for="primeiraAparicao">Cidade:</label>
                    <input type="text" id="primeiraAparicao" name="cidadePessoa" class="form-control"><br>

                    <label for="maiorFeito">Data de nascimento:</label>
                    <input type="text" id="dtNascimento" name="dtNascimento" class="form-control col-4" oninput="validateNumberInput(this)"><br>

                    <label for="quemE">Sexo:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sexo" id="Masculino" value="Masculino" >
                        <label class="form-check-label" for="Masculino">Masculino</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sexo" id="Feminino" value="Feminino" >
                        <label class="form-check-label" for="Feminino">Feminino</label>
                    </div><br>


                    <div class="col mb-2">
                        <button type="submit" value="Confirmar" name="submit1" class="btn btn-primary">Cadastrar</button>
                    </div>                    
                    <div class="col mb-2">
                        <button type="submit" value="ver" id="verCadastro" name="verTudo" class="btn btn-success">Ver Cadastros</button>

                    </div>
                    <div class="col mb-2">
                        <button type="verifica" value="verifica" name="verificaConexao" class="btn btn-secondary">Verificar Conexão</button>
                    </div>
                    <div class="col mb-2">
                        <button type="cadastroApi" value="cadastroApi" name="cadastroApi" class="btn btn-primary">Cadastrar por API</button>
                    </div>

                </form>
            </div>
            <div class="col-4"></div>
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