<?php
require_once "./Model/ProductoModel.php";
require_once "./View/BoutiqueView.php";
require_once "./Model/CategoriaModel.php";
require_once "./Controllers/UserController.php";
require_once "./Model/ComentarioModel.php";

class ProductosController {

    private $model;
    private $view;
    private $modelc;
    private $user;
    private $modelcom;

	function __construct(){
        $this->model = new ProductosModel();
        $this->view = new BoutiqueView();
        $this->modelc = new CategoriaModel();
        $this->user = new UserController();
        $this->modelcom = new ComentarioModel();
    }

    public function getProductoYcatego(){
        $producto = $this->model->traerProducto();
        $categorias = $this->modelc->getCategorias();
        //$loged = $this->user->checkloged();
        $usuario = $this->user->checarusuario();
        $this->view->DisplayProductos($producto,$categorias,$usuario);
    }

    function agregarProducto(){
        $this->user->checkLogIn();
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $marca = $_POST['marca'];
        $precio = $_POST['precio'];
        $id_catego = $_POST['id_catego'];
        if($_FILES['input_name']['type']){
            if($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" || $_FILES['input_name']['type'] == "image/png" ) {

            $this->model->insertarProducto($nombre, $descripcion, $marca,$precio,$_FILES['input_name'],$id_catego);
            header("Location: " .URL_LISTA);    
            }
            else {
                $this->model->insertarProducto($nombre,$descripcion, $marca,$precio,$id_catego);
                    header("Location: " .URL_LISTA);
            }  
        }else {
        $this->view->showError("Faltan datos obligatorios");
    }
    }
    function deleteProducto($id){
        $this->user->checkLogIn();
        $this->model->borrarProducto($id);
        header("Location: " . URL_LISTA);
}
    function modifyProducto($id){
        $imagen= $_FILES['input_name'];
        $this->user->checkLogIn();
        $this->model->modificarProducto($id,$imagen);
        header("Location: " . URL_LISTA);
}
    public function Home(){
    $this->view->DisplayHome();
}
}  

?>
