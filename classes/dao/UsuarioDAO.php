<?php

class UsuarioDAO {
    
    private $conexao;
    
    public function __construct() {
        $this->conexao = Conexao::conectar();
    }
    
    public function logar($login, $senha) {
        $usuario = $this->buscarUsuarioPorLogin($login);
        if ($usuario != null && $usuario->getSenha() == $senha) {
            return true;
        }
        return false;
    }
    
    public function buscarUsuarioPorLogin($login) {
        $sql = "select * from usuarios where login='{$login}'";
        $resultado = mysqli_query($this->conexao, $sql);
        while ($linha = mysqli_fetch_assoc($resultado)) {
            $senha = $linha['senha'];
            
            $usuario = new Usuario($login, $senha);
            $usuario->setNome($linha['nome']);
            $usuario->setTipo($linha['tipo']);
            
            return $usuario;
        }
        return null;
    }
    
}