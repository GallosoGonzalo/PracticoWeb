<?php

class CategoriaModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=boutique;charset=utf8', 'root', '');
    }

	 function getCategorias(){
        $sentencia = $this->db->prepare('SELECT * FROM categoria');
        $sentencia->execute();
        $categorias = $sentencia->fetchAll(PDO::FETCH_OBJ);   
        return $categorias;
    }	

    function insertarCategoria($nombre){
        $sentencia = $this->db->prepare('INSERT INTO categoria(categoria) VALUE(?)');
        $sentencia ->execute(array($nombre));
    }
    
    function borrarCategoria($id){
        $sentencia = $this->db->prepare("DELETE FROM categoria WHERE id_categoria=?");
        $sentencia->execute(array($id));
    }
    function modificarCategoria($id){
        $sentencia = $this->db->prepare("UPDATE categoria SET categoria = ? WHERE id_categoria=?");
        $sentencia->execute(array($_POST['categoria'],$id));
    }
}