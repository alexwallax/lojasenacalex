<?php

class Usuario {
    
    private $login;
    private $senha;
    private $nome;
    private $tipo;
    
    public function __construct($login, $senha) {
        $this->login = $login;
        $this->senha = $senha;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    
}
