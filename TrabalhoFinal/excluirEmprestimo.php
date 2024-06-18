<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Exclusão de Emprestimo</title>
    </head>
    <body>
        <?php
            require 'navbar.php';
            require 'conectaBanco.php';
            $id = $_POST['ID'];
            $stmt = $banco->prepare("DELETE FROM emprestimo WHERE ID = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();

            if ($stmt->affected_rows >= 1) {
                echo "<p>Emprestimo $id excluído com sucesso!</p>";
            } else {
                echo "<p class='text-danger'>Erro ao excluir Emprestimo $id do banco de dados!</p>";
            }

            $stmt->close();
        ?>
    </body>
</html>

