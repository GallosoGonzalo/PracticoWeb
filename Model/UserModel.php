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
    function Registrarusuario($usuario,$pass){
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $sentencia = $this->db->prepare("INSERT INTO usuario(usuario,pass) VALUES(?,?)");
        $sentencia->execute(array($usuario,$hash));
    }
}

?>
