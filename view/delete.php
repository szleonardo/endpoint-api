<?php
include '../controller/content-controller.php';
 
$data = file_get_contents('php://input');
$obj =  json_decode($data);

$id = $obj->id;

if(!empty($data)){	
 $contentcontroller = new contentcontroller();
 $contentcontroller->delete($obj,$id);
 header('Location:list.php');
}

?>