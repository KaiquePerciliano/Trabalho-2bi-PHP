<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Formulário para cadastro de Livro</title>
</head>
    <body>
        <?php
            include 'navbar.php'; 
            ?>
        </div>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h3 class="text-center">Cadastro de Livro</h3>
                    <div class="bg-light p-5 rounded">
                        <form action="cadastraLivro.php" method="post">
                        <div class="mb-3">
                                <label class="form-label" for="NOME">Nome do Livro</label>
                                <input class="form-control" name="NOME" type="text">
                            </div>
                            <div class="mb-3">
                                <label for="AUTOR_NOME" class="form-label">Autor:</label>
                                <select class="form-control" name="AUTOR_NOME" required>
                                        <?php
                                            require_once 'conectaBanco.php';
                                            $sql = "SELECT id, nome FROM autor ORDER BY nome";
                                            $result = $banco->query($sql);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                                                }
                                            } else {
                                                echo "<option value=''>Nenhum autor cadastrado</option>";
                                            }
                                            $banco->close();
                                        ?>
                                    </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="DATA_LANCAMENTO">Data de Lançamento</label>
                                <input class="form-control" name="DATA_LANCAMENTO" type="date">
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