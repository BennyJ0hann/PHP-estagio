<!DOCTYPE html>
<html>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body class="bg-dark text-white">

<?php
        $salarioHr = $_POST['salarioHr'];
        $horasMes = $_POST['horasMes'];

        if(isset($_POST['submit'])) {

            if(empty($salarioHr) || !is_numeric($salarioHr) ) {
                $errSalarioHr = '<p class="text-danger">Informe o valor pedido.</p>';
              }
              else if(empty($horasMes) || !is_numeric($salarioHr)) {
                $errHorasMes = '<p class="text-danger">Informe as horas de trabalho pedidas.</p>';
              }else {
                echo '<p class="text-success">Cálculo efetuado com sucesso.</p>';
                
                $txtSalarioHr = '<p class = "text-secondary">'.'Salário por hora: R$'. $salarioHr. '</p>';
                $txtHora = '<p class = "text-secondary">'.'Carga Horária por mês: R$'. $horasMes. '</p>';
                $numSalarioBruto = $horasMes * $salarioHr;
                $txtSalarioBruto = '<p class = "text-primary">'.'Salário bruto: R$'.$numSalarioBruto. '</p>';

                $numImpostoDeRenda = $numSalarioBruto * 0.11;
                $numINSS = $numSalarioBruto * 0.08;
                $numSindicato = $numSalarioBruto * 0.05;

                $txtImpostoDeRenda = '<p class = "text-danger">'.'Imposto de Renda: - R$'.$numImpostoDeRenda. '</p>';
                $txtINSS = '<p class = "text-danger">'.'INSS: - R$'.$numINSS. '</p>';
                $txtSindicato = '<p class = "text-danger">'.'Sindicato: - R$'.$numSindicato. '</p>';

                $numSalarioLiquido = $numSalarioBruto -($numImpostoDeRenda + $numINSS + $numSindicato);
                $txtSalarioLiquido = '<p class = "text-primary">'.'Salário Líquido: R$'.$numSalarioLiquido. '</p>';


              }
        }

    ?>

    <h1>Consulta Horas trabalhadas</h1>

    <div class="container">
        <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group row">
            <div class="col">
            </div>
            <div class="col-6">
                <div class="form-group row mb-3">
                    <label for="salarioHr" class="form-label">Ganho por hora</label>
                    <input type="number" class="form-control" id="salarioHr"
                        placeholder="R$ 000,00" name="salarioHr"> 
                        <?php echo $errSalarioHr; ?>
                </div>
                <div class="form-group row mb-3">
                    <label for="horasMes" class="form-label">Horas trabalhadas ao mês</label>
                    <input type="number" class="form-control" id="horasMes"
                        placeholder="00hrs" name="horasMes">
                        <?php echo $errHorasMes; ?>
                </div>
                <div class="mb-3">
                    <div >
                        <button type="submit" value="Confirmar" name="submit" class="btn btn-primary">Confirmar</button>
                    </div>
                </div>
                <?php echo $txtSalarioHr; ?>
                <?php echo $txtHora; ?>
                <?php echo $txtSalarioBruto; ?>
                <?php echo $txtImpostoDeRenda; ?>
                <?php echo $txtINSS; ?>
                <?php echo $txtSindicato; ?>
                <?php echo $txtSalarioLiquido; ?>

            </div>
            <div class="col">
            </div>
        </div>
        </form>
    </div>



    

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <script>
    function validateNumberInput(input) {
        input.value = input.value.replace(/[^0-9.]/g,'');
    }
</script>
</body>

</html>