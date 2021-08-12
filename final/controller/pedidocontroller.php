<?php
require_once("./model/pedidomodel.php");
class pedidocontroller {
    private $model;

    function __construct (){
        $this->model = new pedidomodel();
    }
}