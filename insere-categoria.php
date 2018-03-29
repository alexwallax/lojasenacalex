<?php

require_once "./classes/dao/Conexao.php";
require_once "./classes/modelo/Categoria.php";
require_once "./classes/dao/CategoriaDAO.php";

$categoria = new Categoria();
$categoria->setNome($_POST["nome"]);

$categoriaDAO = new CategoriaDAO();
$categoriaDAO->inserir($categoria);

header("location:categorias.php");
