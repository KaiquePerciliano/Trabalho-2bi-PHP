<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Cadastro de Livro</title>
    </head>
    <body>
        <?php
            require 'navbar.php';
            require 'conectaBanco.php';
            $nome = $_POST['NOME'];
            $autor = $_POST['AUTOR_NOME'];
            $data = $_POST['DATA_LANCAMENTO'];

            $dataAtual = date('Y-m-d');

            if(empty($nome)){
                echo "<p>Campo nome deve ser preenchido </p>";
            }else if(empty($autor)){
                echo "<p>Campo Autor deve ser preenchido </p>";
            } elseif (empty($dataLancamento)) {
                echo "<p>Campo Data de Lançamento deve ser preenchido.</p>";
            } elseif (strtotime($dataLancamento) >= strtotime($dataAtual)) {
                echo "<p>Data de lançamento não pode ser igual ou superior à data atual.</p>";
            } else {
                $sql = "INSERT INTO livro(NOME, DATA_LANCAMENTO, AUTOR) VALUES 
                                                ('$nome', '$data', '$autor')";
                $banco->query($sql);
                if($banco->affected_rows >= 1){
                    echo "<p>Livro $nome cadastrado com sucesso!</p>";
                }else{
                    echo "Erro ao inserir livro $nome no banco de dados!";
                }
            }

            $banco->close();
        ?>
    </body>
</html>

