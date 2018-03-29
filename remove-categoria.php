<?php

require_once "./classes/dao/Conexao.php";
require_once "./classes/modelo/Categoria.php";
require_once "./classes/dao/CategoriaDAO.php";

$categoria = new Categoria();
$categoria->setId($_POST["id"]);

$dao = new CategoriaDAO();

$dao->remover($categoria);

header("location:categorias.php");