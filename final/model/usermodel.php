<?php

    class usermodel{
        private $db;

        function __construct(){
        $this -> db = new PDO('mysql:host=localhost;'.'dbname=TeneloYa ;charset=utf8', 'root', '');

        }

        function getUsuarios(){
            $sentencia = $this->db->prepare( "SELECT * FROM usuarios");
            $sentencia->execute();
            $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $usuarios;
        }
    }