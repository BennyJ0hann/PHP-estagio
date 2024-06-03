<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador de Parcelamento</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .full-height {
            height: 100vh;
        }
        .input-group-text {
            cursor: pointer;
        }
        .fixed-size {
            width: 550px;
            max-width: 100%;
            height: 600px;
            max-width: 100%;
        }
        
    </style>
</head>
<?php

$numParcela = 0;
$numDivida = $_POST['divida'];

if (isset($_POST['submit'])) {
    if (empty($numDivida)) {
        $numDividaErro = '<p class="text-danger">Informe o valor pedido.</p>';
    } else {

        $numParcela = $_POST['parcelas'];
        
        $numJuros = $_POST['juros'];


        echo '<p class="text-white-50" style="position: absolute; top: 30px; left: 50px;">Você selecionou: ' . $numParcela . ' parcelas.</p>';
        echo '<p class="text-white-50" style="position: absolute; top: 10px; left: 50px">Sua dívida é de R$ ' . $numDivida . '.</p>';
        if ($numJuros == null) {
            $dividaTotal = $numDivida * pow(1 + 0.0279, $numParcela);
            $txtTotalDevido = "<p>R$ " . number_format($dividaTotal, 2,',', '.') . ".</p>";

            $valorParcela = $dividaTotal/$numParcela;
            $txtValorParcela = "<p>R$ " . number_format($valorParcela, 2,',', '.') . ".</p>";

            $valorTotalJuros = $dividaTotal - $numDivida;
            $txtValorTotalJuros = "<p>R$ " . number_format($valorTotalJuros, 2,',', '.') . ".</p>";

        echo '<p class="text-white-50" style="position: absolute; top: 50px; left: 50px">O juros é de 2,79%.</p>';

        } else {

            $dividaTotal = $numDivida * pow(1 + ($numJuros/100), $numParcela);
            $txtTotalDevido = "<p>R$ " . number_format($dividaTotal, 2,',', '.') . ".</p>";

            $valorParcela = $dividaTotal/$numParcela;
            $txtValorParcela = "<p>R$ " . number_format($valorParcela, 2,',', '.') . ".</p>";

            $valorTotalJuros = $dividaTotal - $numDivida;
            $txtValorTotalJuros = "<p>R$ " . number_format($valorTotalJuros, 2,',', '.') . ".</p>";

            echo '<p class="text-white-50" style="position: absolute; top: 50px; left: 50px">O juros é de ' . $numJuros . '%.</p>';

        }


    }
}


?>

<body class="bg-dark  text-white">
<h1 class="text-center" >Simulador de Parcelamento</h1>


    <div class="container d-flex justify-content-center align-items-center vh-100 " >
        
    
        <div class="fixed-size mb-2 bg-secondary p-4 rounded-lg ">
        
            <form class="row align-items-center " role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="col-12">
                    
                    <div>
                    <div class="container bg-dark rounded ">
                        <div class="row row-cols-2 p-3 ">
                            <div class="">Valor total da dívida:</div>
                            <div class="">
                                <?php echo $txtTotalDevido; ?>
                            </div>
                            <div class="">Valor de cada parcela mensal:</div>
                            <div class="">
                                <?php echo $txtValorParcela; ?>
                            </div>
                            <div class="">Valor total em juros:</div>
                            <div class="">
                                <?php echo $txtValorTotalJuros; ?>
                            </div>
                        </div>
                    </div>
                        <label class = "mt-4">Valor da dívida</label>
                        <?php echo $numDividaErro ?>
                        <div class="input-group mb-4">
                            <div class="input-group-text">R$</div>
                            <input type="text" class="form-control" placeholder="00,00" aria-label="First name" name="divida" id="dinheiro">
                        </div>
                        <label>Taxa de juros</label>
                        <div class="input-group mb-4">
                            <input type="text" class="form-control" value="2,79%" aria-label="Disabled input example" disabled readonly name="juros" id="juros">
                            <div class="input-group-text" id="juros-button">🔒</div>
                        </div>
                        <label for="inputState" class="form-label">Parcelas</label>
                        <div class="row-md-4 mb-4">
                            <select id="inputState" class="form-select" name="parcelas">
                                <?php
                                for ($i = 1; $i <= 24; $i++) {
                                    echo "<option>" . $i . "</option>";
                                    global $numParcela;
                                    $numParcela = $i;
                                };
                                ?>
                            </select>
                        </div>
                        <div class="row mb-5 g-3">
                            <div class="col">
                                <button type="submit" value="Confirmar" name="submit" class="btn btn-primary">Calcular</button>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </form>
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
            $('#dinheiro').mask('###0,00', { reverse: true });
        });
        function validateNumberInput(input) {
            input.value = input.value.replace(/[^0-9.]/g, '');
        }
        document.getElementById('juros-button').addEventListener('click', function() {
        var input = document.getElementById('juros');
        if (input.disabled) {
            input.disabled = false;
            input.readOnly = false;
            this.innerHTML = '🔓';
        } else {
            input.disabled = true;
            input.readOnly = true;
            this.innerHTML = '🔒';
        }
    });
    </script>
</body>

</html>