<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Emprestimos</title>
</head>
<body>
    <div class="container-fluid">
        <?php
            include 'navbar.php';
        ?>
        <div class="row">
            <div class="col-6 text-center p-3 m-g">
                <h1>Emprestimos</h1>
                <?php
                    require 'conectaBanco.php';
                    $select = "SELECT * FROM emprestimo";
                    $resultado = mysqli_query($banco, $select);
                ?>
            </div>
            <div class="col-3 text-center p-3 m-g">
                <a href="formEmprestimo.php">
                    <button class="btn btn-primary">Cadastrar Emprestimo</button>
                </a>
            </div>
            <div class="col-3 text-center p-3 m-g">
                <a href="formExcluirEmprestimo.php">
                    <button class="btn btn-primary">Excluir Emprestimo</button>
                </a>
            </div>
            <div class="row text-center p-3 m-g">
                <table class="table table-hover">
                    <thead>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Livro</th>
                        <th scope="col">Data Inicio</th>
                        <th scope="col">Data Final</th>
                    </thead>

                    <tbody>
                        <?php
                            if ($resultado) {
                                while($linha = mysqli_fetch_assoc($resultado)) {
                                    $id = $linha['ID'];
                                    $nome = $linha['NOME'];
                                    $livro = $linha['LIVRO_NOME'];
                                    $dtInicio = $linha['DT_INICIO'];
                                    $dtFinal = $linha['DT_FINAL'];

                                    echo "<tr>
                                    <td>$id</td>
                                    <td>$nome</td>
                                    <td>$livro</td>
                                    <td>$dtInicio</td>
                                    <td>$dtFinal</td>
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