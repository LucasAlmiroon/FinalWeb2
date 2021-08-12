<?php
require_once("./model/resenasmodel.php");
require_once("./model/usermodel.php");
require_once("./model/pedidomodel.php");

class resenascontroller {

    private $model;
    private $view;
    private $pedidosmodel;
    
    function __construct(){
        $this->model = new resenasmodel();
        
        $this->pedidosmodel = new pedidomodel();
    }

    function agregarResena(){

        $pedidos = $this -> pedidosmodel -> getPedidos();

        $resenas = $this-> model-> getResenas();

        foreach ($pedidos as $pedido){
            if($pedido->id_usuario == $_SESSION["id_usuario"]):
                $pidio = true;
            else:
                $pidio = false;
            endif;
        }

        foreach($resenas as $resena){
            if($resena->id_usuario == $_SESSION["id_usuario"]):
                $comento = true;
            else: $comento = false;
            endif;
        }

        if($pidio && !$comento && $_POST["id"] && $_POST["id_empresa"] && $_POST["id_usuario"] && $_POST["valoracion"] && $_POST["resena"] && $_POST["inadecuado"]):
            $this -> model -> agregarResena($_POST["id"],$_POST["id_empresa"],$_POST["id_usuario"],$_POST["valoracion"],$_POST["resena"],$_POST["inadecuado"]);
        else: 
            $this -> view -> showError($msgError);
        endif; 
    }
}