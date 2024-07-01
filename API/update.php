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
        <form role="form" method="post" class="mt-5">
            <div class="row">
                <div class="col">
                    <div class="col-5 text-left">
                        <label for="nome">ID:</label>
                        <input type="text" id="nome" name="Registro" class="form-control" placeholder="Obriatório"><br>
                    </div>
                    <div class="col-5 text-left">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nomePessoa" class="form-control"
                            placeholder="Deixe em branco para não alterar"><br>
                    </div>
                    <div class="col-5 text-left">
                        <label for="primeiraAparicao">Cidade:</label>
                        <input type="text" id="primeiraAparicao" name="cidadePessoa" class="form-control"
                            placeholder="Deixe em branco para não alterar"><br>
                    </div>
                    <div class="col-5 text-left">
                        <label for="dtNascimento">Data de nascimento:</label>
                        <input type="text" id="dtNascimento" name="dtNascimento" class="form-control"
                            placeholder="Deixe em branco para não alterar"><br>
                    </div>
                    <div class="col-5 text-left">
                        <label for="quemE">Sexo:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexoForm" id="Masculino"
                                value="Masculino">
                            <label class="form-check-label" for="Masculino">Masculino</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexoForm" id="Feminino" value="Feminino">
                            <label class="form-check-label" for="Feminino">Feminino</label>
                        </div><br>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-5 text-left">
                    <button type="submit" value="voltar" id="voltar" name="voltar"
                        class="btn btn-primary">Voltar</button>
                </div>
                <div class="col text-left">
                    <button type="submit" value="atualizar" id="atualizar" name="atualizar"
                        class="btn btn-success">Atualizar
                        Cadastro</button>
                </div>
            </div>
    </div>

    </div>
    </form>
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