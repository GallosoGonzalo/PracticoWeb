<?php
require_once("Router.php");
require_once("./api/comentarioApiController.php");

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

// recurso solicitado
$resource = $_GET["resource"];

// método utilizado
$method = $_SERVER["REQUEST_METHOD"];

// instancia el router
$router = new Router();

// arma la tabla de ruteo
$router->addRoute("/comentarios", "GET", "comentarioApiController", "getComentarios");
$router->addRoute("/comentarios/:ID", "GET", "comentarioApiController", "getComentario");
$router->addRoute("/eliminar/:ID", "DELETE", "comentarioApiController", "deleteComentario");
$router->addRoute("/comentarios", "POST", "comentarioApiController", "insertComentario"); 


// rutea
$router->route($resource, $method);

