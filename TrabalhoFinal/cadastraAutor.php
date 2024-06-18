<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Cadastro de Autor</title>
    </head>
    <body>
        <?php
            require 'navbar.php';
            require 'conectaBanco.php';
            $nome = $_POST['NOME'];
            $dataNascimento = $_POST['DATA_NASCIMENTO'];

            $dataMinima = date('Y-m-d', strtotime('-18 years'));

            if(empty($nome)){
                echo "<p>Campo Nome deve ser preenchido </p>";
            } elseif (strtotime($dataNascimento) > strtotime($dataMinima)) {
                echo "<p>Autor deve ser maior de 18 anos para prosseguir. </p>";
            }else {
                $sql = "INSERT INTO autor(NOME, DATA_NASCIMENTO) VALUES 
                                                ('$nome', '$dataNascimento')";
                $banco->query($sql);
                if($banco->affected_rows >= 1){
                    echo "<p>Autor $nome cadastrado com sucesso!</p>";
                }else{
                    echo "Erro ao inserir carteira $nome no banco de dados!";
                }
            }

            $banco->close();
        ?>
    </body>
</html>

