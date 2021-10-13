<?php
include '../connection/conn.php';

class content extends Conexao{
	private $user_id;
    private $movement_id;
    private $value;
    private $date;

    function getUser_id() {
        return $this->user_id;
    }

    function getMovement_id() {
        return $this->movement_id;
    }

    function getValue() {
        return $this->value;
    }

    function getDate() {
        return $this->date;
    }


    public function insert($obj){
    	$sql = "INSERT INTO personal_record(user_id,movement_id,value,date) VALUES (:user_id,:movement_id,:value,:date)";
    	$consulta = Conexao::prepare($sql);
        $consulta->bindValue('user_id',  $obj->user_id);
        $consulta->bindValue('movement_id', $obj->movement_id);
        $consulta->bindValue('value' , $obj->value);
        $consulta->bindValue('date' , $obj->date);
    	return $consulta->execute();

	}

	public function update($obj,$id = null){
		$sql = "UPDATE personal_record SET user_id = :user_id, movement_id = :movement_id,value = :value, date = :date WHERE id = :id ";
		$consulta = Conexao::prepare($sql);
		$consulta->bindValue('user_id', $obj->user_id);
		$consulta->bindValue('movement_id', $obj->movement_id);
		$consulta->bindValue('value' , $obj->value);
		$consulta->bindValue('date', $obj->date);
		return $consulta->execute();
	}

	public function delete($obj,$id = null){
		$sql =  "DELETE FROM personal_record WHERE id = :id";
		$consulta = Conexao::prepare($sql);
		$consulta->bindValue('id',$id);
		$consulta->execute();
	}

	public function find($id = null){

	}

	public function findAll(){
		$sql = "SELECT mov.name as nome_mov, usr.name as nome, max(per.value) as valor, per.date as data, DENSE_RANK() OVER (PARTITION BY mov.name ORDER BY per.value ASC) as ranking FROM personal_record per 
        LEFT JOIN movement mov ON per.movement_id = mov.id LEFT JOIN user usr ON per.user_id = usr.id 
        GROUP BY usr.name, mov.name ORDER BY mov.name, per.value";
		$consulta = Conexao::prepare($sql);
		$consulta->execute();
		return $consulta->fetchAll();
	}

}

?>