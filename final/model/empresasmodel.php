<?php

    class empresasmodel{
        private $db;

    function __construct(){
        $this -> db = new PDO('mysql:host=localhost;'.'dbname=TeneloYa ;charset=utf8', 'root', '');

    }

    function getEmpresas(){
        $sentencia = $this->db->prepare( "SELECT * FROM empresa");
        $sentencia->execute();
        $empresas = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $empresas;
    }

    function marcarPremium($premium){
        $sentencia = $this ->db->prepare ("UPDATE empresa SET premium=? WHERE id_empresa = ?");
        $sentencia -> execute(array($premium));
    }
}