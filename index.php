<?php

require_once "./classes/modelo/Categoria.php";
require_once "./classes/dao/CategoriaDAO.php";

$categoriaDAO = new CategoriaDAO();

echo "<pre>";
print_r($categoriaDAO->listarTodos());
echo "</pre>";