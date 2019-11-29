<?php
require_once("/Model/ProductoModel.php");
require_once("/api/json.view.php");

class TaskApiController {

    private $model;
    private $view;
    private $data;

    public function __construct() {
        $this->model = new ProductoModel();
        $this->view = new JSONView();
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function agregarComentario($params = []){
        $body = $this->getData();
        //inserta el comentario;
        $comentario = $body->comentario;
        $puntaje = $body->puntaje;
        $comentarios = $this->model-> insertarComentario($comentario,$puntaje);
    }
    public function getComentarios($params=null){
        $comentario = $this->model->getComentarios();
        $this->view-> response($comentario, 200);
    }
    public function getComentario($params = []){
        $comentarios = $params[':ID'];
        $comentario= $this->model->getComentario();
        $this->view->response($comentario, 200);
    }
   
   }
}

