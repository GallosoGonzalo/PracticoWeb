<?php

require_once "./View/BoutiqueView.php";
require_once "./Model/ComentarioModel.php";
require_once "./Model/ProductoModel.php";


class ComentarioController {

    private $model;
    private $view;
    private $modelp;
    private $user;

	function __construct(){
        $this->model = new ComentarioModel();
        $this->view = new BoutiqueView();
        $this->user = new UserController();
        $this->modelp = new ProductosModel();
    }
    public function getComentarios($id){
        $producto = $this->model->getProducto($id);
        $usuario = $this->user->checarusuario();
        $this->view->DisplayComentarios($producto,$usuario);
    
    }

    function agregarComentario($id){
        $this->user->checkLogIn();
     $sentencia = $this->model->insertarComentario($_POST['comentario'],$_POST['puntaje'],$id);
    }

    function deleteComentario($id){
        $this->user->checkLogIn();
        $this->model->borrarComentario($id);
        header("Location: " . URL_LISTACAT);
}
}