<?php
require_once('Database.php');

class crudOperation extends Database{
// Create records 
	public function create($table,$data){
		$sql = "";
		$sql .="INSERT INTO ".$table." (".implode(",", array_keys($data)).") VALUES (:".implode(", :", array_keys($data)).")";
		$stmt = $this->con->prepare($sql);
		foreach($data as $field => $value) {
			$binding[':'.$field]=htmlspecialchars(strip_tags($value));
		}
		if($stmt->execute($binding))
		{echo "Record saved";}
		else
		{echo "Failed !Try again";}
	}

// Update records
	public function update($table, $data, $where ){
		$sql = "";
		$condition="";
		foreach ($where as $key => $value) {
			$condition .= $key."=:".$key." AND ";
		}
		$condition = substr($condition, 0,-5);
		
		foreach ($data as $key => $value) {
			$sql .= $key."=:".$key.", ";
		}
		$sql = substr($sql, 0,-2);

		$sql = "UPDATE ".$table." SET ".$sql." WHERE ".$condition;
		foreach($data as $field => $value) {
			$binding[':'.$field]=htmlspecialchars(strip_tags($value));
		}
		foreach($where as $field => $value) {
			$binding[':'.$field]=htmlspecialchars(strip_tags($value));
		}
		$stmt = $this->con->prepare($sql);
		$stmt->execute($binding);
		if ($stmt) {
			return TRUE;
		}
		else{
			return FALSE;
		}
	}


// Read all records
	public function read_All($table){
		$query = $this->con->query('SELECT * FROM '.$table);
		$row = $query->fetchAll(PDO::FETCH_OBJ);
		return $row;
	}


// Read One record
	public function read_One($table, $where){
		$sql = "";
		$condition="";
		foreach ($where as $key => $value) {
			$condition .= $key."=:".$key." AND ";
		}
		$condition = substr($condition, 0,-5);
		$sql = "SELECT * FROM ".$table." WHERE ".$condition;
		foreach($where as $field => $value) {
			$binding[':'.$field]=htmlspecialchars(strip_tags($value));
		}
		$stmt = $this->con->prepare($sql);
		$stmt->execute($binding);
		$row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
	}

// Delete one record
	public function delete($table, $where){
		$sql = "";
		$condition="";
		foreach ($where as $key => $value) {
			$condition .= $key."=:".$key." AND ";
		}
		$condition = substr($condition, 0,-5);
		$sql = "DELETE FROM ".$table." WHERE ".$condition;
		foreach($where as $field => $value) {
			$binding[':'.$field]=htmlspecialchars(strip_tags($value));
		}
		$stmt = $this->con->prepare($sql);
		$stmt->execute($binding);
		if ($stmt) {
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

}