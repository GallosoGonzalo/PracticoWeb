<?php
require_once "./Model/ProductoModel.php";
require_once "./View/BoutiqueView.php";
require_once "./Model/CategoriaModel.php";
class ProductosController {

    private $model;
    private $view;
    private $modelc;

	function __construct(){
        $this->model = new ProductosModel();
        $this->view = new BoutiqueView();
        $this->modelc = new CategoriaModel();
    }
    public function checkLogIn(){
        session_start();
        
        if(!isset($_SESSION['userId'])){
            header("Location: " . URL_LOGIN);
            die();
        }

        if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 100)) { 
            header("Location: " . URL_LOGOUT);
            die(); // destruye la sesión, y vuelve al login
        } 
        $_SESSION['LAST_ACTIVITY'] = time();
    }

    public function getProductoYcatego(){
        $producto = $this->model->traerProducto();
        $categorias = $this->modelc->getCategorias();
        $this->view->DisplayProductos($producto,$categorias);
    }

    function agregarProducto(){
        $this->checkLogIn();
     $sentencia = $this->model->insertarProducto($_POST['nombre'],$_POST['descripcion'],$_POST['precio'],$_POST['marca'],$_POST['id_catego']);
    header("Location: " .URL_LISTA);
    }

    function deleteProducto($id){
        $this->checkLogIn();
        $this->model->borrarProducto($id);
        header("Location: " . BASE_URL);
}
    function modifyProducto($id){
        $this->checkLogIn();
        $this->model->modificarProducto($id);
        header("Location: " . BASE_URL);
}
}  

?>
