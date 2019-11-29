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
    public function getComentarios(){
        $comentario = $this->model->traerComentarios();
        $producto = $this->modelp->traerProducto();
        $this->view->DisplayComentarios($comentario,$producto);
    
    }
    public function getComentario($id){
        $comentario = $this->model->traerComentarios();
        $producto = $this->model->getComentario($id);
        $this->view->DisplayComentarios($comentario,$producto);
    }

    function agregarComentario(){
        $this->user->checkLogIn();
     $sentencia = $this->model->insertarComentario($_POST['comentario'],$_POST['puntaje'],$_POST['idproducto']);
    }

    function deleteComentario($id){
        $this->user->checkLogIn();
        $this->model->borrarComentario($id);
        header("Location: " . URL_LISTACAT);
}
}