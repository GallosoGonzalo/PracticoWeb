<?php

class ComentarioModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=boutique;charset=utf8', 'root', '');
    }
  
    public function traerComentarios(){
        $sentencia=$this->db->prepare("SELECT comentarios.*, producto.* FROM comentarios INNER JOIN producto ON comentarios.producto_fk = producto.id_producto) ORDER BY puntaje")  ;
        $sentencia->execute();
        $Comentario=$sentencia->fetchAll(PDO::FETCH_OBJ);
        return $Comentario;
    }	
    public function getComentario($id){
        $sentencia=$this->db->prepare('SELECT * FROM comentarios where producto_fk=?');
        $sentencia->execute([$id]);
        $comentario = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $comentario;   
     }

    function insertarComentario($comentario,$puntaje,$id_producto){
        $sentencia = $this->db->prepare('INSERT INTO comentarios(comentario,puntaje,producto_fk) VALUE(?,?,?)');
        $sentencia ->execute(array($comentario,$puntaje,$id_producto));
    }
    
    function borrarComentario($id){
        $sentencia = $this->db->prepare("DELETE FROM comentarios WHERE id_comentario=?");
        $sentencia->execute(array($id));
    }
}