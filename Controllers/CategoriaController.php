<?php
require_once "./Model/CategoriaModel.php";
require_once "./View/BoutiqueView.php";
require_once "./Controllers/ProductoController.php";



class CategoriaController {

    private $model;
    private $view;
    private $control;

	function __construct(){
        $this->model = new CategoriaModel();
        $this->view = new BoutiqueView();
        $this->control = new ProductosController();
    }

    public function getCategoria(){
        $categoria = $this->model->getCategorias();
        $this->view->DisplayCategoria($categoria);
    }

    function agregarCategoria(){
        $this->control->checkLogIn();
     $sentencia = $this->model->insertarCategoria($_POST['categoria']);
    header("Location: " .URL_LISTACAT);
    }

    function deleteCategoria($id){
        $this->control->checkLogIn();
        $this->model->borrarCategoria($id);
        header("Location: " . URL_LISTACAT);
}
    function modifyCategoria($id){
        $this->control->checkLogIn();
        $this->model->modificarCategoria($id);
        header("Location: " . URL_LISTACAT);
}
}  

?>