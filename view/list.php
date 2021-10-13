<?php
include '../controller/content-controller.php';

$contentcontroller = new contentcontroller();

header('Content-Type: application/json');

foreach($contentcontroller->findAll() as $valor){
	echo json_encode($valor);
}

?>