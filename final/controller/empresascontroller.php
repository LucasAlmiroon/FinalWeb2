<?php
require_once("./model/empresasmodel.php");
require_once("./model/resenasmodel.php");

class empresascontroller {

    private $model;
    private $resenasmodel;

    function __construct(){
        $this ->model = new empresasmodel();
        $this ->resenasmodel = new resenasmodel();
        
    }

    function marcarPremium(){

        $empresas = $this ->model -> getEmpresas();
        foreach($empresas as $empresa){
            $resenas = $this ->resenasmodel -> getResenasxempresa($empresa -> id_empresa);
            $valoraciontotal = 0;
            $cant = 0;
            foreach ($resenas as $resena){
                $valoraciontotal += $resena -> valoracion;
                $cant++;
            }
            $valoraciontotal = $valoraciontotal/$cant;
            if( $_POST['premium'] && $valoraciontotal >= $_POST['premium'] ):
                $this ->model-> marcarPremium(true);
            else:
                $this->view -> msjError("No supera el promedio");
            endif;
        }
    }

}