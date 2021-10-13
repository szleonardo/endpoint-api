<?php
include '../controller/content-controller.php';
 
$data = file_get_contents('php://input');
$obj =  json_decode($data);

if(!empty($data)){	
 $contentcontroller = new contentcontroller();
 $contentcontroller->insert($obj);
 header('Location:list.php');
}

?>