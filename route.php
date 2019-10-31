<?php


require_once "Controllers/ProductoController.php";
require_once "Controllers/UserController.php";
require_once "Controllers/CategoriaController.php";

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("URL_LISTA", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/productos');
define("URL_LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
define("URL_LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');
define("URL_LISTACAT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/Categoria');

$action = $_GET["action"];
$controller = new ProductosController();
$controllerUser = new UserController();
$controllerCategoria = new CategoriaController();


if($action == ''){
    $controller->getProductoYcatego();
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);

        if($partesURL[0] == "productos"){
            $controller->getProductoYcatego();
        }
        elseif($partesURL[0] == "insertar") {
            $controller->agregarProducto();
        }
        elseif($partesURL[0] == "borrarp") {
            $controller->deleteProducto($partesURL[1]);
        }
        elseif($partesURL[0] == "modificarp") {
            $controller->modifyProducto($partesURL[1]);
        }
        elseif($partesURL[0] == "login") {
            $controllerUser->Login();
        }
        elseif($partesURL[0] == "iniciarSesion") {
            $controllerUser->iniciarSesion();
        }
        elseif($partesURL[0] == "logout") {
            $controllerUser->Logout();
        }
        //Lleva formulario registro
        elseif($partesURL[0] == "Registrar") {
            $controllerUser->Registrar();
        }
        elseif($partesURL[0] == "Registro") {
            $controllerUser->addRegistro();
        }
        elseif($partesURL[0] == "Home") {
            $controllerUser->Home();
        }
        elseif($partesURL[0] == "Categoria") {
           $controllerCategoria->getCategoria();
        }
        elseif($partesURL[0] == "insertarc") {
            $controllerCategoria->agregarCategoria();
        }
        elseif($partesURL[0] == "borrarc") {
            $controllerCategoria->deleteCategoria($partesURL[1]);
        }
        elseif($partesURL[0] == "modificarc") {
            $controllerCategoria->modifyCategoria($partesURL[1]);
        }
    }
}
?>