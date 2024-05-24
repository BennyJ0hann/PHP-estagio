<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-dark text-white">
    <?php
    session_start();

    if (!isset($_SESSION['carros'])) {
        $_SESSION['carros'] = [];
        $_SESSION['contador'] = 0;
    }
    if (isset($_POST['limpa'])) {
        unset($_SESSION['carros']);
    }

    $modeloCar = $_POST['modeloCar'];
    $fabricante = $_POST['fabricante'];
    $cor = $_POST['cor'];
    $portas = $_POST['portas'];
    $ano = $_POST['ano'];

    $modeloCar1 = $_POST['modeloCar'];
    $fabricante2 = $_POST['fabricante'];
    $cor3 = $_POST['cor'];
    $portas4 = $_POST['portas'];
    $ano5 = $_POST['ano'];

    

    if (isset($_POST['submit'])) {
        if (empty($_POST['modeloCar'])) {
            $erroModelo = '<p class="text-danger">Informe o modelo do carro.</p>';
        } else if (empty($_POST['fabricante'])) {
            $erroFabricante = '<p class="text-danger">Informe corretamente o fabricante.</p>';
        } else if (empty($_POST['cor'])) {
            $erroCor = '<p class="text-danger">Informe corretamente a cor.</p>';
        } else if (empty($_POST['portas'])) {
            $erroPortas = '<p class="text-danger">Informe corretamente a quantidade de portas.</p>';
        } else if (empty($_POST['ano'])) {
            $erroAno = '<p class="text-danger">Informe corretamente o ano do carro.</p>';
        } else {




            $carro = [
                'Registro' => $_SESSION['contador'],
                'Modelo do carro' => $modeloCar,
                'Fabricante' => $fabricante,
                'Cor' => $cor,
                'Portas' => $portas,
                'Ano' => $ano
            ];

            $_SESSION['carros'][] = $carro;
            $_SESSION['contador']++;

            echo '<p class="text-success">Carro adicionado com sucesso.</p>';
            echo '<p class="text-success">' . var_dump($_SESSION['carros']) . '</p>';

        }


    }


    ?>

    <div class="container">
        <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group row">
                <div class="col">

                </div>
                <div class="col-6">
                    <div class="form-group row mb-3">
                        <label for="modeloCar" class="form-label">Modelo do carro</label>
                        <input type="text" class="form-control" id="modeloCar" placeholder="Uno" name="modeloCar">
                        <?php echo $erroModelo; ?>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="fabricante" class="form-label">Fabricante</label>
                        <input type="text" class="form-control" id="fabricante" placeholder="Fiat" name="fabricante">
                        <?php echo $erroFabricante; ?>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="cor" class="form-label">Cor do carro</label>
                        <input type="text" class="form-control" id="cor" placeholder="prata" name="cor">
                        <?php echo $erroCor; ?>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="portas" class="form-label">Quantidade de portas</label>
                        <input type="number" class="form-control" id="portas" placeholder="4" name="portas"
                            oninput="validateNumberInput(this)">
                        <?php echo $erroPortas; ?>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="ano" class="form-label">Ano do carro</label>
                        <input type="number" class="form-control" id="ano" placeholder="2014" name="ano"
                            oninput="validateNumberInput(this)">
                        <?php echo $erroAno; ?>
                    </div>
                    <div class="row mb-3 g-3">
                        <div class="col">
                            <button type="submit" value="Confirmar" name="submit"
                                class="btn btn-primary">Adicionar</button>
                        </div>
                    </div>
                    <div class="row mb-3 g-3">
                        <div class="col">
                            <button type="" value="Confirmar" name="" class="btn btn-success">Confirmar</button>
                        </div>
                        <div class="col">
                            <button type="" value="Confirmar" name="" class="btn btn-success">Confirmar</button>
                        </div>
                        <div class="col">
                            <button type="" value="Confirmar" name="" class="btn btn-success">Confirmar</button>
                        </div>

                    </div>
                    <div class="row mb-3 g-3">
                        <div class="col">
                            <button type="" value="Confirmar" name="" class="btn btn-success">Confirmar</button>
                        </div>
                        <div class="col">
                            <button type="" value="Confirmar" name="" class="btn btn-success">Confirmar</button>
                        </div>
                        <div class="col">
                            <button type="limpa" value="Confirmar" name="limpa" class="btn btn-danger">Limpar
                                Cache</button>
                        </div>

                    </div>
                </div>
                <div class="col">
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
            $('#portas').mask('0');
            $('#ano').mask('0000');
        });
        function validateNumberInput(input) {
            input.value = input.value.replace(/[^0-9.]/g, '');
        }
    </script>
</body>

</html>