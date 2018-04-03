<?php
require_once "./classes/dao/Conexao.php";
require_once "./classes/modelo/Categoria.php";
require_once "./classes/dao/CategoriaDAO.php";
require_once "./classes/modelo/Produto.php";
require_once "./classes/dao/ProdutoDAO.php";

$produto = new Produto();
$produtoDao = new ProdutoDAO();

if (isset($_POST['salvar'])) {
    $categoria = new Categoria();
    $categoria->setId($_POST['categoria']);

    $produto->setId($_POST['id']);
    $produto->setNome($_POST['nome']);
    $produto->setDescricao($_POST['descricao']);
    $produto->setPreco($_POST['preco']);
    $produto->setCategoria($categoria);

    if ($produto->getId() == "") {
        $produtoDao->inserir($produto);
    } else {
        $produtoDao->editar($produto);
    }
    
    $produto = new Produto();
}

if (isset($_POST['editar'])) {
    $produto = $produtoDao->buscarPorId($_POST['id_produto']);
}

if (isset($_POST['remover'])) {
    $p = new Produto();
    $p->setId($_POST['id_produto']);
    $produtoDao->remover($p);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Produtos</title>
        <link rel="stylesheet" href="assets/css/bootstrap.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <fieldset>
                        <legend>Dados do Produto</legend>
                        <form action="produtos.php" method="post">
                            <input type="hidden" name="id" value="<?= $produto->getId() ?>">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" value="<?= $produto->getNome() ?>" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="descricao">Descrição</label>
                                <textarea class="form-control" id="descricao" name="descricao"><?= $produto->getDescricao() ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                <select class="form-control" id="categoria" name="categoria">
                                    <?php
                                    $dao = new CategoriaDAO();
                                    $categorias = $dao->listarTodos();
                                    foreach ($categorias as $categoria) {
                                        $selecionado = "";
                                        if ($produto->getId() != null && $categoria->getId() == $produto->getCategoria()->getId()) {
                                            $selecionado = "selected";
                                        }
                                        ?>
                                        <option value="<?= $categoria->getId() ?>" <?= $selecionado ?>><?= $categoria->getNome() ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="preco">Preço</label>
                                <input type="text" class="form-control" id="preco" name="preco" value="<?= $produto->getPreco() ?>">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="salvar">Salvar</button>
                        </form>
                    </fieldset>
                </div>
                <div class="col-sm-6">
                    <fieldset>
                        <legend>Lista de Produtos</legend>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Produto</th>
                                    <th>Categoria</th>
                                    <th>Preço</th>
                                    <th colspan="2">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $produtos = $produtoDao->listarTodos();
                                foreach ($produtos as $p) {
                                    ?>
                                    <tr>
                                        <td><?= $p->getId() ?></td>
                                        <td><?= $p->getNome() ?></td>
                                        <td><?= $p->getCategoria()->getNome() ?></td>
                                        <td><?= $p->getPreco() ?></td>
                                        <td>
                                            <form action="produtos.php" method="post">
                                                <input type="hidden" name="id_produto" value="<?= $p->getId() ?>">
                                                <button type="submit" class="btn btn-primary" name="editar">editar</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="produtos.php" method="post">
                                                <input type="hidden" name="id_produto" value="<?= $p->getId() ?>">
                                                <button type="submit" class="btn btn-danger" name="remover">remover</button>
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
            </div>
        </div>
    </body>
</html>
