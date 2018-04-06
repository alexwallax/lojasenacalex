<?php
session_start();
if (!isset($_SESSION['nome']) && empty($_SESSION['nome'])) {
    $_SESSION['nome'] = $_POST['nome'];
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Página 2</title>
    </head>
    <body>
        <h2><?= $_SESSION['nome'] ?></h2>
        <form action="passo3.php" method="post">
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf">
            <button type="submit">Enviar</button>
        </form>
    </body>
</html>
