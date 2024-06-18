<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Livros</title>
</head>
<body>
    <div class="container-fluid">
        <?php
            include 'navbar.php';
        ?>
        <div class="row">
            <div class="col-6 text-center p-3 m-g">
                <h1>Livros</h1>
                <?php
                    require 'conectaBanco.php';
                    $select = "SELECT * FROM livro";
                    $resultado = mysqli_query($banco, $select);
                ?>
            </div>
            <div class="col-3 text-center p-3 m-g">
                <a href="formLivro.php">
                    <button class="btn btn-primary">Cadastrar Livro</button>
                </a>
            </div>
            <div class="col-3 text-center p-3 m-g">
                <a href="formExcluirLivro.php">
                    <button class="btn btn-primary">Excluir livro</button>
                </a>
            </div>
            <div class="row text-center p-3 m-g">
                <table class="table table-hover">
                    <thead>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Data de Lançamento</th>
                    </thead>

                    <tbody>
                        <?php
                            if ($resultado) {
                                while($linha = mysqli_fetch_assoc($resultado)) {
                                    $id = $linha['ID'];
                                    $nome = $linha['NOME'];
                                    $autor = $linha['AUTOR'];
                                    $data = $linha['DATA_LANCAMENTO'];
                                    echo "<tr>
                                    <td>$id</td>
                                    <td>$nome</td>
                                    <td>$autor</td>
                                    <td>$data</td>
                                    </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>Nenhum registro encontrado</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>