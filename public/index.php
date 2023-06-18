<?php


/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| to this client's browser, allowing them to enjoy our application.
|
*/
if(isset($_SERVER['HTTP_ORIGIN'])){
    // Header set Access-Control-Allow-Origin "*"
	// Header set Access-Control-Allow-Headers "origin, x-requested-with, content-type"
	// Header set Access-Control-Allow-Methods "PUT, GET, POST, DELETE, OPTIONS"

    header("Access-Control-Allow-Origin:{$_SERVER['HTTP_ORIGIN']}");
    header("Access-Control-Allow-Credential:true");
    header("Access-Control-Allow-Max-Age:86400");
}
if($_SERVER['REQUEST_METHOD']=='OPTIONS'){
    if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods:PUT, GET, POST, DELETE, OPTIONS");

    if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
    header("Access-Control-Allow-Origin:{$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    
}
require __DIR__ . '/../Dispatcher/Dispatcher.php';
ini_set('session.gc_maxlifetime', 1800) ;
session_start();
$app = new Dispatcher();
$app->run();
