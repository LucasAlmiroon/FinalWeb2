<?php

require_once("./model/usermodel.php");
require_once("./view/userview.php");



class usercontroller {

    private $model;
    private $view;

	function __construct(){
        $this->model = new usermodel();
        $this->view = new UserView();
    }

    public function IniciarSesion(){
            session_start();
            $_SESSION['user'] = $usuario->nombre;
            $_SESSION['id_usuario'] = $usuario->id_usuario;
            $_SESSION['administrador'] = $usuario->administrador;
            header();
    }

    function usuariosInadecuados(){
        $resenas = $this ->resenasmodel -> getResenas();
        $usuarios = $this ->model->getUsuarios();
        $usuariosinadecuados = array();
        foreach($resenas as $resena){
            if($resena -> inadecuada == true){
                $resena -> id_usuario;
                foreach($usuarios as $usuario){
                    if($usuario ->id_usuario == $resena-> id_usuario){
                        array_push($usuariosinadecuados, $usuario);
                        $this -> view -> mostrarUsuariosInadecuados($usuariosinadecuados);
                    }
                }
            }
        }        
    }
}