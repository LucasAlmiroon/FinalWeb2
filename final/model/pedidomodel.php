<?php

    class pedidosmodel{
        private $db;

    function __construct(){
        $this -> db = new PDO('mysql:host=localhost;'.'dbname=TeneloYa ;charset=utf8', 'root', '');

    }

    function getPedidos(){
        $sentencia = $this->db->prepare( "SELECT * FROM valoracion");
        $sentencia->execute();
        $pedidos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $pedidos;
    }
    }