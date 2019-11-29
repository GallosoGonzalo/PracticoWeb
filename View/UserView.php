<?php

require_once('libs/Smarty.class.php');

class UserView {

    function __construct(){

    }

    public function DisplayLogin(){
        $smarty = new Smarty();
        $smarty->assign('titulo',"Login");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->display('templates/login.tpl');
    }
    public function DisplayRegistro(){
        $smarty = new Smarty();
        $smarty->assign('titulo',"Registro");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->display('templates/registro.tpl');
    }
    public function DisplayUsuario($usuarios,$loged){
        $smarty = new Smarty();
        $smarty->assign('titulo',"admin");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('usuario',$usuarios);
        $smarty->assign('admin',$loged);
        $smarty->display('templates/admin.tpl');
    }
}
?>
