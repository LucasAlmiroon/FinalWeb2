<?php

class resenasmodel {
    private $db;

    function __construct(){
        $this -> db = new PDO('mysql:host=localhost;'.'dbname=TeneloYa ;charset=utf8', 'root', '');

    }

    function getResenas(){
        $sentencia = $this->db->prepare( "SELECT * FROM valoracion");
        $sentencia->execute();
        $resena = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $resena;
    }

    function getResenasxempresa($id_empresa){
        $sentencia = $this->db->prepare( "SELECT * FROM valoracion WHERE id_empresa = ?");
        $sentencia->execute(array($id_empresa));
        $resena = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $resena;
    }

    function agregarResena($id,$id_empresa,$id_usuario,$valoracion,$resena,$inadecuada){
        $sentencia = $this -> db -> prepare("INSERT INTO valoracion(id,id_empresa,id_usuario,valoracion,resena,inadecuada) VALUES (?,?,?,?,?,?)");
        $sentencia ->execute(array($id,$id_empresa,$id_usuario,$valoracion,$resena,$inadecuada));
    }

    function editarResena($valoracion,$resena){
        $sentencia = $this -> db -> prepare("UPDATE valoracion SET valoracion = ?,resena = ? WHERE id_usuario = ?");
        $sentencia ->execute(array($valoracion,$resena));
    }
}



/*USUARIO(id: int; nombre: string, email: string, password: string)

EMPRESA(id: int; nombre: string, direccion: string, premium: boolean)
PEDIDO(id: int; id_usuario: int, id_empresa: int, pedido: string, fecha: date)
VALORACION(id: int; id_empresa: int, id_usuario: int, valoracion: int, resena: string, inadecuada: boolean)*/