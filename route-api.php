<?php
require_once("Router.php");
require_once("./api/TareasApiController.php");

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

// recurso solicitado
$resource = $_GET["resource"];

// método utilizado
$method = $_SERVER["REQUEST_METHOD"];

// instancia el router
$router = new Router();

// arma la tabla de ruteo
$router->addRoute("/comentarios", "GET", "TareasApiController", "getTareas");
$router->addRoute("comentarios/:ID", "GET", "TareasApiController", "getTarea");
$router->addRoute("comentarios/:ID", "DELETE", "TareasApiController", "deleteTask");
$router->addRoute("comentarios", "POST", "TareasApiController", "addTask");
$router->addRoute("comentarios/:ID", "PUT", "TareasApiController", "updateTask");


// rutea
$router->route($resource, $method);

