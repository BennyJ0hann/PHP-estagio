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
    </style>
</head>

<body class="bg-dark text-white">

    <div class="d-flex justify-content-center full-height">
        <form class="row row-cols-lg-auto g-3 align-items-center" role="form" method="post"
            action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div>
                <h1>Simulador de Parcelamento</h1>
                <div>
                    <label>Valor da dívida</label>
                    <div class="input-group mb-4">

                        <div class="input-group-text">R$</div>
                        <input type="text" class="form-control" placeholder="00,00" aria-label="First name"
                            name="dinheiro" id="dinheiro">
                    </div>
                    <label>Taxa de juros</label>
                    <div class="input-group mb-4">
                        <input type="text" class="form-control" value="2,79%" aria-label="Disabled input example"
                            disabled readonly>
                        <div class="input-group-text">🔒</div>
                    </div>
                    <label for="inputState" class="form-label">Parcelas</label>
                    <div class="row-md-4 mb-4">

                        <select id="inputState" class="form-select" name="parcelas">
                            <option selected>1</option>
                            <option selected>2</option>
                            <option selected>3</option>
                            <option selected>4</option>
                            <option selected>5</option>
                            <option selected>6</option>
                            <option selected>7</option>
                            <option selected>8</option>
                            <option selected>9</option>
                            <option selected>10</option>
                            <option selected>11</option>
                            <option selected>12</option>
                            <option selected>13</option>
                            <option selected>14</option>
                            <option selected>15</option>
                            <option selected>16</option>
                            <option selected>17</option>
                            <option selected>18</option>
                            <option selected>19</option>
                            <option selected>20</option>
                            <option selected>21</option>
                            <option selected>22</option>
                            <option selected>23</option>
                            <option selected>24</option>

                        </select>
                    </div>
                    <div class="row mb-3 g-3">
                        <div class="col">
                            <button type="submit" value="Confirmar" name="submit"
                                class="btn btn-primary">Calcular</button>
                        </div>
                    </div>

                </div>
                <div class="container">
                    <div class="row row-cols-2">
                        <div class="col">Column</div>
                        <div class="col">Column</div>
                        <div class="col">Column</div>
                        <div class="col">Column</div>
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
            $('#dinheiro').mask('#.##0,00', { reverse: true });
        });
        function validateNumberInput(input) {
            input.value = input.value.replace(/[^0-9.]/g, '');
        }
    </script>
</body>

</html>