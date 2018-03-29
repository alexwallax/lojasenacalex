<?php
require_once "./classes/dao/Conexao.php";
require_once "./classes/modelo/Categoria.php";
require_once "./classes/dao/CategoriaDAO.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="assets/css/bootstrap.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <fieldset>
                        <legend>Categorias</legend>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $dao = new CategoriaDAO();
                                $categorias = $dao->listarTodos();
                                foreach ($categorias as $categoria) {
                                    ?>
                                    <tr>
                                        <td><?= $categoria->getId() ?></td>
                                        <td><?= $categoria->getNome() ?></td>
                                        <td>
                                            <form action="editar-categoria.php" method="post">
                                                <input type="hidden" name="id" value="<?= $categoria->getId() ?>">
                                                <button type="submit" class="btn btn-primary">editar</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="remove-categoria.php" method="post">
                                                <input type="hidden" name="id" value="<?= $categoria->getId() ?>">
                                                <button type="submit" class="btn btn-danger">remover</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </fieldset>
                </div>
                <div class="col-md-6">
                    <fieldset>
                        <legend>Nova categoria</legend>
                        <form action="insere-categoria.php" method="post">
                            <div class="form-group">
                                <label for="nome">Categoria</label>
                                <input type="text" id="nome" name="nome" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                    </fieldset>
                </div>
            </div>
        </div>
    </body>
</html>
