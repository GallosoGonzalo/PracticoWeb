<?php
require_once("./Model/ComentarioModel.php");
require_once("./api/jsonView.php");

class comentarioApiController {

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

    public function  getComentarios($params = null) {
        $comments = $this->model->getComentarios();
        $this->view->response($comments, 200);
    }

    public function getComentario($params = null) {
        $id = $params[':ID'];
        $comentario = $this->model->getComentario($id);        
        if ($comentario)
            $this->view->response($comentario, 200);
        else
            $this->view->response("El comentario con el id={$id} no existe", 404);
    } 
    public function insertComentario($params = null) {
        $body = $this->getData();
        $id = $this->model->insertarComentario($body->comentario, $body->puntaje, $body->id_producto);
        $comentario = $this->model->getComentario($id);
        if ($comentario)
            $this->view->response($comentario, 200);
        else
            $this->view->response("El comentario no fue creado", 500);

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


