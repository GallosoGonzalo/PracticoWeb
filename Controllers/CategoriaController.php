<?php
require_once "./Model/CategoriaModel.php";
require_once "./View/BoutiqueView.php";
require_once "./Controllers/UserController.php";



class CategoriaController {

    private $model;
    private $view;
    private $user;

	function __construct(){
        $this->model = new CategoriaModel();
        $this->view = new BoutiqueView();
        $this->user = new UserController();
    }

    public function getCategoria(){
        $categoria = $this->model->getCategorias();
        $usuario = $this->user->checarusuario();
        $this->view->DisplayCategoria($categoria,$usuario);
    }

    function agregarCategoria(){
        $this->user->checkLogIn();
     $sentencia = $this->model->insertarCategoria($_POST['categoria']);
    header("Location: " .URL_LISTACAT);
    }

    function deleteCategoria($id){
        $this->user->checkLogIn();
        $this->model->borrarCategoria($id);
        header("Location: " . URL_LISTACAT);
}
    function modifyCategoria($id){
        $this->user->checkLogIn();
        $this->model->modificarCategoria($id);
        header("Location: " . URL_LISTACAT);
}
}  

?>