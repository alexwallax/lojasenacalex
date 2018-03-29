<?php

class Conexao {
    
    private static $SERVER = "localhost";
    private static $USER = "root";
    private static $PASSWORD = "senac";
    private static $DATABASE = "loja";
    
    function conectar() {
        return mysqli_connect(
                Conexao::$SERVER, 
                Conexao::$USER, 
                Conexao::$PASSWORD, 
                Conexao::$DATABASE
            );
    }
    
}
