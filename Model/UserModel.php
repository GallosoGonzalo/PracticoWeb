<?php

class UserModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=boutique;charset=utf8', 'root', '');
    }

    public function getPassword($user){
        $sentencia = $this->db->prepare( "SELECT * FROM usuario WHERE usuario = ?");
        $sentencia->execute(array($user));
        $password = $sentencia->fetch(PDO::FETCH_OBJ);
        
        return $password;
    }

    function traerUsuario(){
        $sentencia = $this->db->prepare(" SELECT * FROM usuario ");
        $sentencia->execute();
        $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);   
        return $usuarios;   
    }
    function Registrarusuario($usuario,$pass){
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $tipoUser = "Usuario";
        $sentencia = $this->db->prepare("INSERT INTO usuario(usuario,pass,tipouser) VALUES(?,?,?)");
        $sentencia->execute(array($usuario,$hash,$tipoUser));
    }
    function borrarUsuario($id){
        $sentencia = $this->db->prepare("DELETE FROM usuario WHERE id_usuario=?");
        $sentencia->execute(array($id));
    }
    function modificarUsuario($id){
        $sentencia = $this->db->prepare("UPDATE usuario SET tipouser = ? WHERE id_usuario=?");
        $sentencia->execute(array($_POST['tipoUser'],$id));
    }
}

?>
