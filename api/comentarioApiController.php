<?php
require_once("/Model/ComentarioModel.php");
require_once("/api/json.view.php");

class TaskApiController {

    private $model;
    private $view;
    private $data;

    public function __construct() {
        $this->model = new ComentarioModel();
        $this->view = new JSONView();
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function insertComentario($params = []){
        $body = $this->getData();
        //inserta el comentario;
        $comentario = $body->comentario;
        $puntaje = $body->puntaje;
        $id_prodcto = $body->producto_fk;
        $comentarios = $this->model-> insertarComentario($comentario,$puntaje,$id_producto);
    }
    public function getComentarios($params=null){
        $comentario = $this->model->traerComentarios();
        $this->view-> response($comentario, 200);
    }
    public function getComentario($params = []){
        $comentarios = $params[':ID'];
        $comentario= $this->model->getComentario($id);
        $this->view->response($comentario, 200);
    }
    public function deleteComentario($params = null){
        $id = $params[':ID'];
        $comentario = $this->model->getComentario($id);
        if ($comentario) {
            $this->model->borrarComentario($id);
            $this->view->response("El comentario fue borrada con exito.", 200);
        } else{
            $this->view->response("El comentario con el id={$id} no existe", 404);
        }
    }
   }
}

