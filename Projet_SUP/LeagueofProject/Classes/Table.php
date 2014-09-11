<?php

abstract class Table
{
	protected $tableName;
	protected $primaryKey;
	protected $data;

	public function __construct()
	{
		if (!empty($this->tableName))
		{
			$this->detectFields();
		}
		else
			die('Table: table name is required');
	}

	private function detectFields()
	{
		$datas = myFetchAllAssoc("SHOW COLUMNS FROM `".$this->tableName."`");

		foreach($datas AS $field)
		{
			$this->data[$field['Field']] = "";

			if($field['Key'] == 'PRI')
			{
				$this->primaryKey = $field['Field'];
			}
		}
	}

	public function delete()
	{
		if (empty($this->primaryKey) || empty($this->tableName))
			die('cannot uset class Table without tablename and primary key setted');

		if ($this->data[$this->primaryKey] === null)
			die('Trying to delete without having a primary key value');

		$query = "delete from `".$this->tableName."`".
		"where `".$this->primaryKey."`='".$this->data[$this->primaryKey]."'";
	
		myQuery($query);
	}

	public function save()
	{
		$pk = $this->primaryKey;

		if($this->data[$pk] != null) // UPDATE
		{
			$nbFields = count($this->data);
			$counter = 0;

			$query = "UPDATE `".$this->tableName."` SET";

			foreach($this->data AS $key => $value)
			{
				$query .= " `".$key."` = '".myEscape($value)."'";
				
				if($counter < ($nbFields - 1))
				{
					$query .= ",";
				}
				
				$counter++;
			}
				
			$query .= "WHERE `".$pk."` = '".intval($this->data[$pk])."'";
			myQuery($query);
		}
		else // INSERT
		{
			$nbFields = count($this->data);
			$counter = 0;

			$query = "INSERT INTO `".$this->tableName."` (";

			foreach($this->data AS $key => $value)
			{
				$query .= "`".$key."`";

				if($counter < ($nbFields - 1))
				{
					$query .= ', ';
				}
				
				$counter++;	
			}
			
			$query .= ") VALUES (";

			$counter = 0;
			
			foreach($this->data AS $key => $value)
			{
				$query .="'".myEscape($value)."'";
				
				if($counter < ($nbFields -1))
				{	
					$query .= ",";
				}

				$counter++;	
			}
			$query .= ")";

			myQuery($query);
			$insert_id = myLastInsertId();
			$this->data[$pk] = $insert_id;
		}	
	}

	public function hydrate()
	{
		if (empty($this->data[$this->primaryKey]))
			die (get_called_class().': cannot hydrate without primary key value');

		$q = "SELECT * FROM `".$this->tableName."` WHERE `".$this->primaryKey."` = ".intval($this->data[$this->primaryKey]);
		$datas = myFetchAssoc($q);

		foreach ($this->data as $key => $value)
		{
			/*$setter = 'set_'.$field['Field'];
			$this->$setter($data[$field['Field']]);*/
			$this->data[$key] = $datas[$key];
		}
	}
}

?>