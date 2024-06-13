<?php
include 'db.php';

$sql = "select id, name, cidade, idade, sexo from pessoas";
$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {
    while($row = $resultado->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["cidade"]. $row["idade"]. $row["sexo"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();

?>