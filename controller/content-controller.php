<?php
include '../model/content.php';

class contentcontroller{
	function insert($obj){
		$content = new content();
		return $content->insert($obj);
		header('Location:list.php');
	}

	function update($obj,$id){
		$content = new content();
		return $content->update($obj,$id);
	}

	function delete($obj,$id){
		$content = new content();
		return $content->delete($obj,$id);
	}

	function find($id = null){

	}

	function findAll(){
		$content = new content();
		return $content->findAll();
	}
}

?>