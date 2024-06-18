<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Formulário para Cadastro de Emprestimo</title>
</head>
    <body>
        <?php
            include 'navbar.php'; 
            ?>
        </div>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h3 class="text-center">Cadastro de Emprestimo</h3>
                    <div class="bg-light p-5 rounded">
                        <form action="cadastraEmprestimo.php" method="post">
                            <div class="mb-3">
                                <label class="form-label" for="NOME">Nome do Responsável</label>
                                <input class="form-control" name="NOME" type="text">
                            </div>

                            <div class="mb-3">
                                <label for="LIVRO_NOME" class="form-label">Livro:</label>
                                <select class="form-control" name="LIVRO_NOME" required>
                                        <?php
                                            require_once 'conectaBanco.php';
                                            $sql = "SELECT id, nome FROM livro ORDER BY nome";
                                            $result = $banco->query($sql);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                                                }
                                            } else {
                                                echo "<option value=''>Nenhum livro cadastrado</option>";
                                            }
                                            $banco->close();
                                        ?>
                                    </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label" for="DT_INICIO">Data Inicio</label>
                                <input class="form-control" name="DT_INICIO" type="date">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="DT_FINAL">Data Final</label>
                                <input class="form-control" name="DT_FINAL" type="date">
                            </div>
                            
                            <div class="mb-3 justify-content-md-end">
                                <button class="btn btn-outline-success" type="submit">
                                    Salvar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>