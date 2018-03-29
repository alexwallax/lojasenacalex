<?php

class CategoriaDAO {
    
    private $conexao;
    
    public function __construct() {
        $this->conexao = Conexao::conectar();
    }

    public function inserir(Categoria $categoria) {
        $sql = "insert into categorias (nome) value ('{$categoria->getNome()}')";
        return mysqli_query($this->conexao, $sql);
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


    public function listarTodos() {
        $categorias = array();
        $sql = "select * from categorias";
        $resultado = mysqli_query($this->conexao, $sql);
        while ($categoria_array = mysqli_fetch_assoc($resultado)) {
            $categoria = new Categoria();
            $categoria->setId($categoria_array['id']);
            $categoria->setNome($categoria_array['nome']);
            array_push($categorias, $categoria);
        }
        return $categorias;
    }
    
    public function buscarPorId($id) {
        
    }

}
