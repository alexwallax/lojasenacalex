<?php

class ProdutoDAO {

    private $conexao;
    
    public function __construct() {
        $this->conexao = Conexao::conectar();
    }

    public function inserir(Produto $produto) {
        $sql = "insert into produtos "
                . "(nome, descricao, preco, categoria_id) value "
                . "('{$produto->getNome()}', '{$produto->getDescricao()}', "
                . "{$produto->getPreco()}, {$produto->getCategoria()->getId()})";
        return mysqli_query($this->conexao, $sql);
    }
    
    public function listarTodos() {
        $produtos = array();
        $sql = "select * from produtos p join categorias c on c.id=p.categoria_id";
        $resultado = mysqli_query($this->conexao, $sql);
        while ($produto_array = mysqli_fetch_assoc($resultado)) {
            $categoria = new Categoria();
            $categoria->setId($produto_array[5]);
            $categoria->setNome($produto_array[6]);
            
            $produto = new Produto();
            $produto->setId($produto_array[0]);
            $produto->setNome($produto_array[1]);
            $produto->setDescricao($produto_array[2]);
            $produto->setPreco($produto_array[3]);
            $produto->setCategoria($categoria);
            array_push($produtos, $produto);
        }
        return $produtos;
    }
    
    
    public function remover(Categoria $categoria) {
        $sql = "delete from categorias where id={$categoria->getId()}";
        return mysqli_query($this->conexao, $sql);
    }
    
    public function editar(Categoria $categoria) {
        $sql = "update categorias set "
                . "nome='{$categoria->getNome()}' "
                . "where id={$categoria->getId()}";
        return mysqli_query($this->conexao, $sql);
    }

    
    
    public function buscarPorId($id) {
        
    }
    
}
