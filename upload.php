<?php

function enviarFoto($array_upload, $dir_foto) {
    $arquivo = $array_upload;
    $filename = $arquivo['tmp_name'];
    $destination = "{$dir_foto}/{$arquivo['name']}";
    $podeUpar = true;

    $tamanhoArquivo = $arquivo['size'] / 1024; //Deixando tamanho em KB
    if ($tamanhoArquivo > 500) {
        $podeUpar = false;
    }

    $extensaoArquivo = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
    if ($extensaoArquivo != "jpg" && $extensaoArquivo != "png") {
        $podeUpar = false;
    }

    $existeArquivo = file_exists($destination);
    if ($existeArquivo) {
        $podeUpar = false;
    }

    if ($podeUpar) {
        $foiUpado = move_uploaded_file($filename, $destination);
        if ($foiUpado) {
            return true;
        }
        return false;
    }
}
