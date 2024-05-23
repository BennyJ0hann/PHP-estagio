<!DOCTYPE html> 
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php 

    $carros = [];

    for ($i = 0; $i < 10; $i++) {
        
        $modeloCar = $_POST['modeloCar'];

        $carros[] = [$i, $modeloCar, $modeloCar, $modeloCar, $modeloCar, ];

    }

    ?>

<div class="container">
        <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group row">
            <div class="col">
            </div>
            <div class="col-6">
                <div class="form-group row mb-3">
                    <label for="salarioHr" class="form-label">Modelo do carro</label>
                    <input type="number" class="form-control" id="modeloCar"
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

</body>
</html>