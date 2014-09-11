<?php

abstract class Table	//abstarct class table veut dire qu'on ne pourra jamais créer d'instance Table (new Table) mais on pourra créer des class filles telles que " 'nom' extends Table " 
{
	protected $tableName;
	protected $primaryKey;

	public function delete()
	{
		$pk = $this->primaryKey;
		$query = "DELETE FROM `".$this->tableName."`".
		" WHERE `".$pk."`='".$this->$pk."'";
	
		my_query($query);
	}
	
	public function save()
	{
		global $link;

		$pk = $this->primaryKey;
		
		if ($this->$pk != null) {
			$result = my_query('show columns from `'.$this->tableName.'`');	//récupère le nom de chaque champs
			$columns = array();
			
			while (($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) == true) {
				$columns[] = $data['Field'];
			}
		
			$query = 'UPDATE `'.$this->tableName.'` SET ';
			
			foreach ($columns as $key => $value) {
				if ($key == 0)
					$query .= '`'.$value.'`="'.$this->$value.'"';
				else
					$query .= ', `'.$value.'`="'.$this->$value.'"';
			}
			
			$query .= ' WHERE `'.$pk.'` = "'.$this->$pk.'"';
		}
		else {
			$result = my_query('show columns from `'.$this->tableName.'`');
			$columns = array();
			
			while (($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) == true) {
				if ($data['Key'] != 'PRI')
					$columns[] = $data['Field'];
			}
			
			$query = "INSERT INTO `".$this->tableName."` (";
			
			foreach ($columns as $key => $value) {
				if ($key == 0)
					$query .= $value;
				else
					$query .= ', '.$value;
			}
			
			$query .= ") VALUES (";
			
			foreach ($columns as $key => $value) {
				if ($key == 0)
				$query .= "'".$this->$value."'";
				else
					$query .= ", '".$this->$value."'";
			}
			
			$query .= ")";
		}
		
			my_query($query);
			$id = "set".$pk;
			$this->$id(mysqli_insert_id($link));
	}
	
	public function feedMeUp($data) {		//remplit un objet en utilisant le tableau de données retourné par la requete.
		foreach ($data as $column => $value) {
			$this->$column = $value;
		}
	}
	
	public function hydrate($param = null)			//hydrate une instance à partir de n'importe quel(s) paramètre(s) donné(s) ou de l'id
	{
		global $link;

		if ($param == null) {
			$pk = $this->primaryKey;
			$param = " WHERE `".$pk."` = '".$this->$pk."'";
		}
		
		$query = "SELECT * from `".$this->tableName."`".$param;
		$data = my_fetch_assoc($query);
		if ($data == null)
			return true;

		$this->feedMeUp($data);
	}
	
	public function getAll($param = null)		//Renvoie un tableau d'instances hydratées correspondant à l'intégralité de la table
	{
		$query = "SELECT * from `".$this->tableName."`".$param;
		$result = my_query($query);
		
		$all = array();
		$class = get_class($this);
		
		while (($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) == true) {
			$instance = new $class;
			$instance->feedMeUp($data);
			$all[] = $instance;
		}
		
		return $all;
	}
}

?>