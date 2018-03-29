<?php
require_once "./classes/dao/Conexao.php";
require_once "./classes/modelo/Categoria.php";
require_once "./classes/dao/CategoriaDAO.php";
require_once "./classes/modelo/Produto.php";
require_once "./classes/dao/ProdutoDAO.php";

if (isset($_POST['nome'])) {
    $categoria = new Categoria();
    $categoria->setId($_POST['categoria']);
    
    $produto = new Produto();
    $produto->setNome($_POST['nome']);
    $produto->setDescricao($_POST['descricao']);
    $produto->setPreco($_POST['preco']);
    $produto->setCategoria($categoria);
    
    $produtoDao = new ProdutoDAO();
    $produtoDao->inserir($produto);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Produtos</title>
    </head>
    <body>
        <form action="produtos.php" method="post">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome"><br>
            <label for="descricao">Descrição</label>
            <textarea id="descricao" name="descricao"></textarea><br>
            <label for="categoria">Categoria</label>
            <select id="categoria" name="categoria">
                <?php
                    $dao = new CategoriaDAO();
                    $categorias = $dao->listarTodos();
                    foreach ($categorias as $categoria) {
                ?>
                <option value="<?= $categoria->getId() ?>"><?= $categoria->getNome() ?></option>
                <?php
                    }
                ?>
            </select><br>
            <label for="preco">Preço</label>
            <input type="text" id="preco" name="preco"><br>
            <button type="submit">Salvar</button>
        </form>
    </body>
</html>
