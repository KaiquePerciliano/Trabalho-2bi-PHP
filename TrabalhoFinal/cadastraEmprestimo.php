<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Cadastro de Emprestimo</title>
    </head>
    <body>
        <?php
            require 'navbar.php';
            require 'conectaBanco.php';
            $nome = $_POST['NOME'];
            $livro = $_POST['LIVRO_NOME'];
            $dtInicio = $_POST['DT_INICIO'];
            $dtFinal = $_POST['DT_FINAL'];

            $dataAtual = date('Y-m-d');

            if(empty($nome)){
                echo "<p>Campo Nome deve ser preenchido </p>";
            }else if(empty($livro)){
                echo "<p>Campo Livro deve ser preenchido </p>";
            }else if(empty($dtFinal) || empty($dtInicio)){
                echo "<p>Campos de data devem ser preenchidos.</p>";
            } else if(strtotime($dtInicio) >= strtotime($dataAtual)) {
                echo "<p>Data de Inicio não pode ser igual ou superior à data atual.</p>";
            } else if(strtotime($dtFinal) <= strtotime($dataAtual)) {
                echo "<p>Data Final não pode ser igual ou menor à data atual.</p>";
            } else {
                $sql = "INSERT INTO emprestimo(NOME, LIVRO_NOME, DT_INICIO, DT_FINAL) VALUES 
                                                ('$nome','$livro', '$dtInicio', '$dtFinal')";
                $banco->query($sql);
                if($banco->affected_rows >= 1){
                    echo "<p>Emprestimo $nome cadastrado com sucesso!</p>";
                }else{
                    echo "Erro ao inserir carteira $nome no banco de dados!";
                }
            }

            $banco->close();
        ?>
    </body>
</html>

