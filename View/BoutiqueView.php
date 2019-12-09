<?php

require('libs/Smarty.class.php');


class BoutiqueView {

    function __construct(){

    }
    public function showError($msgError) {
        echo "<h1>ERROR!</h1>";
        echo "<h2>{$msgError}</h2>";
    }


    public function DisplayProductos($producto,$categorias,$usuario){
        $smarty = new Smarty();
        $smarty->assign('titulo',"mostrar");
        $smarty->assign('BASE_URL',BASE_URL);  
        $smarty->assign('isLogged',$usuario);
        $smarty->assign('producto',$producto);
        $smarty->assign('categoria',$categorias);
       // $smarty->assign('admin',$loged);
        $smarty->display('templates/ver_productos.tpl');
    }
    public function DisplayCategoria($categoria,$usuario){

        $smarty = new Smarty();
        $smarty->assign('titulo',"mostrar");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('isLogged',$usuario);
        $smarty->assign('categoria',$categoria);
        $smarty->display('templates/ver_categorias.tpl');
    }
    public function DisplayHome(){
        $smarty = new Smarty();
        $smarty->assign('titulo',"Home");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->display('templates/home.tpl');
    }
    public function DisplayComentarios($producto,$usuario){
        $smarty = new Smarty();
        $smarty->assign('titulo',"comentario");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('isLogged',$usuario);
        $smarty->assign('producto',$producto);
        $smarty->display('templates/ver_comentarios.tpl');
    }

}

?>
