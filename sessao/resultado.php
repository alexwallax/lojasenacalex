<?php
session_start();
$_SESSION['nascimento'] = $_POST['nascimento'];
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Resultado</title>
    </head>
    <body>
        <h2><?= $_SESSION['nome'] ?></h2>
        <h2><?= $_SESSION['cpf'] ?></h2>
        <h2><?= $_SESSION['nascimento'] ?></h2>
    </body>
</html>
<?php session_destroy(); ?>