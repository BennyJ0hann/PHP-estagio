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

            

        }
        


    }
    // $arrayValida = [];
    // for( $i = 0; $i < count($_SESSION['carros']); $i++){
    //     $fabricante = $_SESSION['carros'][$i]['Fabricante'];
    //     if(!in_array($fabricante, $arrayValida)){
    //         array_push($arrayValida, $fabricante);
    //     }
    //     echo '<br>';
    //     var_dump($fabricante);
    //     }
    //     echo '<br><br>';
    //     for( $i = 0; $i < count($arrayValida); $i++){
    //         var_dump($arrayValida[$i]);
    //     }

    if (isset($_POST['modeloEano'])) {
        echo '<h1> Modelo e ano dos carros cadastrados </h1>';
        for( $i = 0; $i < count($_SESSION['carros']); $i++){
                $fabricante = [$_SESSION['carros'][$i]['Modelo do carro'], $_SESSION['carros'][$i]['Ano']];
            echo '<br>';
            echo '<p>Modelo do carro: '.$fabricante[0].' <br>Ano: '. $fabricante[1].'</p>';
            }
    }
    if (isset($_POST['corPrata'])) {
        $arrayValida = [];
        echo '<h1> Modelos na cor prata </h1>';
        for( $i = 0; $i < count($_SESSION['carros']); $i++){
                if ($_SESSION['carros'][$i]['Cor'] == 'prata'){
                    $modelo = $_SESSION['carros'][$i]['Modelo do carro'];
                    if(!in_array($modelo, $arrayValida)){
                        array_push($arrayValida, $modelo);
                    }
                }
            
            }
        for( $i = 0; $i < count($arrayValida); $i++){
            echo '<p>'.$arrayValida[$i].'</p>';
        }    
    }
    if (isset($_POST['VeiculoCorPortas'])) {
        echo '<h1> Veículos, suas cores e a quantidade de portas </h1>';
        for( $i = 0; $i < count($_SESSION['carros']); $i++){
                $VeiculoCorPortas = [$_SESSION['carros'][$i]['Modelo do carro'], $_SESSION['carros'][$i]['Cor'], $_SESSION['carros'][$i]['Portas']];
            echo '<br>';
            echo '<p>Modelo do carro: '.$VeiculoCorPortas[0].' <br>Cor: '. $VeiculoCorPortas[1].' <br>Portas: '. $VeiculoCorPortas[2].'</p>';
            }
        
    }
    
    if (isset($_POST['veiculosFord'])) {
        $arrayValida = [];
        echo '<h1> Veículos da Ford </h1>';
        for( $i = 0; $i < count($_SESSION['carros']); $i++){
            
                if ($_SESSION['carros'][$i]['Fabricante'] == 'Ford'){
                        $modelo = $_SESSION['carros'][$i]['Modelo do carro'];
                        if(!in_array($modelo, $arrayValida)){
                            array_push($arrayValida, $modelo);
                        }
                        
                    
               
            }
            }
            for( $i = 0; $i < count($arrayValida); $i++){
                echo '<p>'.$arrayValida[$i].'</p>';
            }
            
    }
    if (isset($_POST['fabricação2013'])) {
        echo '<h1> Veículos com o ano de fabricação igual ou superior a 2013 </h1>';
        for( $i = 0; $i < count($_SESSION['carros']); $i++){
            if ($_SESSION['carros'][$i]['Ano'] >= 2013){
                echo '<p>'.$_SESSION['carros'][$i]['Modelo do carro'].'</p>';
            }
            
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
                            <button type="submit" value="Confirmar" name="modeloEano" class="btn btn-success">Modelos e Anos</button>
                        </div>
                        <div class="col">
                            <button type="submit" value="Confirmar" name="corPrata" class="btn btn-success">Cor Prata</button>
                        </div>
                        <div class="col">
                            <button type="submit" value="Confirmar" name="VeiculoCorPortas" class="btn btn-success">Veículos, cor e qtde portas</button>
                        </div>

                    </div>
                    <div class="row mb-3 g-3">
                        <div class="col">
                            <button type="submit" value="Confirmar" name="veiculosFord" class="btn btn-success">Veículos Ford</button>
                        </div>
                        <div class="col">
                            <button type="submit" value="Confirmar" name="fabricação2013" class="btn btn-success">Fabricação >= 2013</button>
                        </div>
                        <div class="col">
                            <button type="limpa" value="Confirmar" name="limpa" class="btn btn-danger">Limpar Veículos</button>
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