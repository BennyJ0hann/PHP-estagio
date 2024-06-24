
<?php
include 'read.php';
  if (isset($_POST['voltar'])) {
    header('Location: /CadastroPessoas/cadastroPessoas.php');
    exit();
  }
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['submit1'])) {
        $nomePessoa = formatacao($_POST['nomePessoa']);
        $cidadePessoa = formatacao($_POST['cidadePessoa']);
        $sexo = $_POST['sexo'];
        $dtNascimentoSemFormatar = DateTime::createFromFormat('d/m/Y', $_POST['dtNascimento']);

        
        $dtNascimento = $dtNascimentoSemFormatar->format('Y-m-d');
    

        if (empty($nomePessoa)) {
            echo '<p class="text-danger">Informe o nome da pessoa.</p>';
        } else if (empty($cidadePessoa)) {
            echo '<p class="text-danger">Informe corretamente a cidade.</p>';
        } else if (empty($dtNascimento)) {
            echo '<p class="text-danger">Informe corretamente a idade.</p>';
        } else if (empty($sexo)) {
            echo '<p class="text-danger">Marque a opção que melhor te representa.</p>';
        } else {
            $sql = "INSERT INTO pessoas (name, cidade, sexo, data_nascimento) VALUES ('$nomePessoa', '$cidadePessoa', '$sexo', '$dtNascimento')";
            if ($conexao->query($sql) === TRUE) {
                echo "Novo cadastro adicionado ao Banco";
                
            } else {
                echo "Erro no cadastro ";
            }
            $conexao->close();
}
    }
        
    

}
?>