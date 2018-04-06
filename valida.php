<?php

require_once "./classes/dao/Conexao.php";
require_once "./classes/modelo/Usuario.php";
require_once "./classes/dao/UsuarioDAO.php";

$login = $_POST['login'];
$senha = $_POST['senha'];

$dao = new UsuarioDAO();

if ($dao->logar($login, $senha)) {
    session_start();
    $usuario = $dao->buscarUsuarioPorLogin($login);
    $_SESSION['usuario_logado'] = $usuario;
    if ($usuario->getTipo() == 'produtos') {
        header("location:produto/produtos.php");
    } else if ($usuario->getTipo() == 'categorias') {
        header("location:categoria/categorias.php");
    }
} else {
    header("location:index.php");
}
