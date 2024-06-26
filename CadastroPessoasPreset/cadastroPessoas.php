<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Cadastro</title>
</head>

<body class="bg-dark text-white">
    <div class="container">
        <h2>Cadastro de Personagem</h2>
        <div class="form-group row">
            <div class="col-4"></div>
            <div class="col-4">
                <form action="criar.php" method="post">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nomePessoa" class="form-control"><br>

                    <label for="primeiraAparicao">Cidade:</label>
                    <input type="text" id="primeiraAparicao" name="cidadePessoa" class="form-control"><br>

                    <label for="maiorFeito">Idade:</label>
                    <input type="text" id="maiorFeito" name="idadePessoa" class="form-control"><br>

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
                        <button type="submit" value="Confirmar" name="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                    <div class="col mb-2">
                        <button type="submit" value="popula" name="populaPag" class="btn btn-success">Popula Cadastro</button>
                    </div>
                    <div class="col mb-2">
                        <button type="limpa" value="Limpar" name="limpa" class="btn btn-danger">Limpar
                            Cadastros</button>
                    </div>
                    
                    <div class="col mb-2">
                        <button type="submit" value="limp" id="verCadastro" name="verCadastro" class="btn btn-secondary">Ver Cadastros</button>
                    </div>
                    <div class="col mb-2">
                        <button type="submit" value="verifica" name="verificaConexao" class="btn btn-secondary">Verificar Conexão</button>
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
</body>

</html>