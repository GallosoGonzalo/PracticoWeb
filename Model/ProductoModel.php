<?php

class ProductosModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=boutique;charset=utf8', 'root', '');
    }

	 function traerProducto(){
        $sentencia = $this->db->prepare(" SELECT producto.*, categoria.* FROM producto INNER JOIN categoria ON (producto.id_catego = categoria.id_categoria) ORDER BY categoria");
        $sentencia->execute();
        $producto = $sentencia->fetchAll(PDO::FETCH_OBJ);   
        return $producto;
        
    }	

    function insertarProducto($nombre,$descripcion,$precio,$marca,$id_catego){
        $sentencia = $this->db->prepare( 'INSERT INTO producto(nombre,descripcion,precio,marca,id_catego) VALUE(?,?,?,?,?)');
        $sentencia ->execute(array($nombre,$descripcion,$precio,$marca,$id_catego));
    }
    
    function borrarProducto($id){
        $sentencia = $this->db->prepare("DELETE FROM producto WHERE id_producto=?");
        $sentencia->execute(array($id));
    }
    function modificarProducto($id){
        $sentencia = $this->db->prepare("UPDATE producto SET nombre = ?, descripcion = ?, precio = ?, marca = ?, id_catego = ? WHERE id_producto=?");
        $sentencia->execute(array($_POST['nombre'],$_POST['descripcion'],$_POST['precio'],$_POST['marca'],$_POST['id_catego'],$id));
    }
}
?>
