<?php

require('libs/Smarty.class.php');


class BoutiqueView {

    function __construct(){

    }

    public function DisplayProductos($producto,$categorias){
        $smarty = new Smarty();
        $smarty->assign('titulo',"mostrar");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('producto',$producto);
        $smarty->assign('categoria',$categorias);
        $smarty->display('templates/ver_productos.tpl');
    }
    public function DisplayCategoria($categoria){

        $smarty = new Smarty();
        $smarty->assign('titulo',"mostrar");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('categoria',$categoria);
        $smarty->display('templates/ver_categorias.tpl');
    }

}

?>
