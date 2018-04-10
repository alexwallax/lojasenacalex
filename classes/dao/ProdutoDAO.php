<?php

class ProdutoDAO {

    private $conexao;

    public function __construct() {
        $this->conexao = Conexao::conectar();
    }

    public function inserir(Produto $produto) {
        $sql = "insert into produtos "
                . "(nome, descricao, preco, categoria_id, foto_produto) value "
                . "('{$produto->getNome()}', '{$produto->getDescricao()}', "
                . "{$produto->getPreco()}, {$produto->getCategoria()->getId()}, "
                . "'{$produto->getFotoProduto()}')";
        return mysqli_query($this->conexao, $sql);
    }

    public function listarTodos() {
        $produtos = array();
        $sql = "select * from produtos p join categorias c on c.id=p.categoria_id";
        $resultado = mysqli_query($this->conexao, $sql);
        while ($produto_array = mysqli_fetch_array($resultado)) {
            $categoria = new Categoria();
            $categoria->setId($produto_array[6]);
            $categoria->setNome($produto_array[7]);

            $produto = new Produto();
            $produto->setId($produto_array[0]);
            $produto->setNome($produto_array[1]);
            $produto->setDescricao($produto_array[2]);
            $produto->setPreco($produto_array[3]);
            $produto->setFotoProduto($produto_array[5]);
            $produto->setCategoria($categoria);
            array_push($produtos, $produto);
        }
        return $produtos;
    }

    public function remover(Produto $produto) {
        $sql = "delete from produtos where id={$produto->getId()}";
        return mysqli_query($this->conexao, $sql);
    }

    public function editar(Produto $produto) {
        $sql = "update produtos set "
                . "nome='{$produto->getNome()}', "
                . "descricao='{$produto->getDescricao()}', "
                . "preco={$produto->getPreco()}, "
                . "foto_produto={$produto->getFotoProduto()}, "
                . "categoria_id={$produto->getCategoria()->getId()} "
                . "where id={$produto->getId()}";
        return mysqli_query($this->conexao, $sql);
    }

    public function buscarPorId($id) {
        $sql = "select * from produtos p join categorias c on c.id=p.categoria_id where p.id={$id}";
        $resultado = mysqli_query($this->conexao, $sql);
        $produto = new Produto();
        while ($produto_array = mysqli_fetch_array($resultado)) {
            $categoria = new Categoria();
            $categoria->setId($produto_array[5]);
            $categoria->setNome($produto_array[6]);

            $produto->setId($produto_array[0]);
            $produto->setNome($produto_array[1]);
            $produto->setDescricao($produto_array[2]);
            $produto->setPreco($produto_array[3]);
            $produto->setCategoria($categoria);
        }
        return $produto;
    }

}
