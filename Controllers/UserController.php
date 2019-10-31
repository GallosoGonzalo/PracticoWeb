<?php
require_once "./Model/UserModel.php";
require_once "./View/UserView.php";

class UserController {

    private $model;
    private $view;

	function __construct(){
        $this->model = new UserModel();
        $this->view = new UserView();
    }
    
    public function IniciarSesion(){
        $password = $_POST['pass'];
        $usuario = $this->model->getPassword($_POST['user']);
        if (isset($usuario) && $usuario != null && password_verify($password, $usuario->pass)){
                session_start();
                $_SESSION['user'] = $usuario->usuario;
                $_SESSION['userId'] = $usuario->id_usuario;
                header("Location: " . URL_LISTA);
            }
            else{
                header("Location: " . URL_LOGIN);
                }
                                                                                                                                                                                             
           }

    public function Login(){
        $this->view->DisplayLogin();
    }

    public function Logout(){
        session_start();
        session_destroy();
        header("Location: " . URL_LOGIN);
    }

    public function Registrar(){
        $this->view->DisplayRegistro();
    }
    public function Home(){
        $this->view->DisplayHome();
    }
    
    function addRegistro(){
        $this->model->Registrarusuario($_POST['usuario'],$_POST['pass']);   
        header("Location: " . URL_LOGIN);
    }
}

?>
