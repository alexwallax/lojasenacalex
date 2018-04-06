<?php
session_start();
$_SESSION['cpf'] = $_POST['cpf'];
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Página 3</title>
    </head>
    <body>
        <form action="resultado.php" method="post">
            <h2><?= $_SESSION['nome'] ?></h2>
            <h2><?= $_SESSION['cpf'] ?></h2>
            <label for="nascimento">Nascimento:</label>
            <input type="date" id="nascimento" name="nascimento">
            <button type="submit">Enviar</button>
        </form>
    </body>
</html>
