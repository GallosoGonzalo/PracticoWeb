<?php

class ProductosModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=boutique;charset=utf8', 'root', '');
    }

    public function get($id_producto) {
        $query = $this->db->prepare('SELECT * FROM producto WHERE id_producto = ?');
        $query->execute(array($id_producto));
        return $query->fetch(PDO::FETCH_OBJ);
    }

	 function traerProducto(){
        $sentencia = $this->db->prepare(" SELECT producto.*, categoria.* FROM producto INNER JOIN categoria ON (producto.id_catego = categoria.id_categoria) ORDER BY categoria");
        $sentencia->execute();
        $producto = $sentencia->fetchAll(PDO::FETCH_OBJ);   
        return $producto;
        
    }	

    function insertarProducto($nombre,$descripcion,$marca,$precio,$imagen,$id_catego){
        $pathImg= null;
        if ($imagen)
        $pathImg = $this->uploadImage($imagen);
        $sentencia = $this->db->prepare( 'INSERT INTO producto(nombre,descripcion,marca,precio,imagen,id_catego) VALUE(?,?,?,?,?,?)');
        $sentencia ->execute(array($nombre,$descripcion,$marca,$precio,$pathImg,$id_catego));
        return $this->db->lastInsertId();
    }
    private function uploadImage($image){
        $target = "img/" . uniqid() . "." . strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));  
        move_uploaded_file($image['tmp_name'], $target);
        return $target;
    }

    
    function borrarProducto($id){
        $sentencia = $this->db->prepare("DELETE FROM producto WHERE id_producto=?");
        $sentencia->execute(array($id));
    }
    function modificarProducto($id,$imagen){
        $pathImg= null;
        if ($imagen)
        $pathImg = $this->uploadImage($imagen);
        $sentencia = $this->db->prepare("UPDATE producto SET nombre = ?, descripcion = ?, marca = ?, precio = ?, imagen = ?, id_catego = ? WHERE id_producto=?");
        $sentencia->execute(array($_POST['nombre'],$_POST['descripcion'],$_POST['marca'],$_POST['precio'],$pathImg,$_POST['id_catego'],$id));
    }
}
?>
