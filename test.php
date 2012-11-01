<?php
include('objetos/apiServer.php');

$server = new apiServer();

//echo $server->getAccessToken();
var_dump($server->getTareasCron());

?>