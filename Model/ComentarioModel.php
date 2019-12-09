<?php

class ComentarioModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=boutique;charset=utf8', 'root', '');
    }
  
    function getComentarios(){
        $sentencia = $this->db->prepare('SELECT * FROM comentarios ORDER BY puntaje DESC');
        $sentencia->execute();
        $comentario = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $comentario;
    }	
    function getProducto($id){
        $sentencia = $this->db->prepare("SELECT * FROM producto WHERE id_producto = ?");
        $sentencia->execute([$id]);
        $producto = $sentencia->fetch(PDO::FETCH_OBJ);
        return $producto;   
     }
     function getComentario($id){
        $sentencia = $this->db->prepare('SELECT * FROM comentarios WHERE id_comentario=? ');
        $sentencia->execute(array($id));
        $result = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    function insertarComentario($comentario,$puntaje,$id){
        $sentencia = $this->db->prepare('INSERT INTO comentarios(comentario,puntaje,producto_fk) VALUE(?,?,?)');
        $sentencia ->execute(array($comentario,$puntaje,$id));
        return $this->db->lastInsertId();
    }
    
    function borrarComentario($id){
        $sentencia = $this->db->prepare("DELETE FROM comentarios WHERE id_comentario=?");
        $sentencia->execute(array($id));
    }
}