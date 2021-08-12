<?php
    require_once("./model/empresasmodel.php");
    require_once("./model/resenasmodel.php");


    class apiresenas{
        private $view;
        private $data;
        private $model;
        private $empresasmodel;
    
        public function __construct() {
            $this->view = new JSONView();
            $this->data = file_get_contents("php://input"); 
            $this->model = new resenasmodel();
            $this -> empresasmodel = new empresasmodel();
        }
    
        private function getData() {
            return json_decode($this->data);
        }

        public function verResenasxempresa($id_empresa){
            $resenasxempresa = $this -> model -> getResenasxempresa($id_empresa);
            $this->view->response($resenasxempresa,200);
        }

        public function editarResena($id_usuario,$valoracion,$resena){

            if($_SESSION["id_usuario"] == $id_usuario){
                $this -> model -> editarResena($valoracion,$resena);
                
            }
        }
    }