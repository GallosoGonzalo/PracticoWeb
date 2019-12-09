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
                $_SESSION['admin']=$usuario->tipouser;
                header("Location: " . URL_LISTA);
            }
            else{
                header("Location: " . URL_LOGIN);
                }
                                                                                                                                                                                             
           }    

           public function checarusuario(){
            session_start();
            if (isset($_SESSION['userId'])) {
                if($_SESSION['admin']=="Administrador"){
    
                return "Administrador";
                }
                
                else if($_SESSION['admin']=="Usuario"){
                    return "Usuario";
                }
            }
            else {
                return "anonimo";
            }
           }
           public function checkLogIn(){
            session_start();
            
            if(!isset($_SESSION['userId'])){
                header("Location: " . URL_LOGIN);
                die();
            }
    
            if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1000)) { 
                header("Location: " . URL_LOGOUT);
                die(); // destruye la sesión, y vuelve al login
            } 
            $_SESSION['LAST_ACTIVITY'] = time();
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
   
    public function getUsuario(){
        $loged = $this->checarusuario();
        $usuarios = $this->model->traerUsuario();
        $this->view->DisplayUsuario($usuarios,$loged);
    }
    function addRegistro(){
        $this->model->Registrarusuario($_POST['user'],$_POST['pass']); 
        $this->IniciarSesion();
    }
    function deleteUsuario($id){
        $this->checkLogIn();
        $this->model->borrarUsuario($id);
        header("Location: " . URL_USUARIOS);
}
    function modifyUsuario($id){
        $this->checkLogIn();
        $this->model->modificarUsuario($id);
        header("Location: " . URL_USUARIOS);
}
}
?>
