<?php

class Relationship extends Table
{
	protected $idRelationship;
	protected $idUser1;
	protected $idUser2;
	protected $accepted;
	
	
	public function __construct()
	{
		$this->tableName = 'relationships';
		$this->primaryKey = 'idRelationship';
	}
	
	public function setidRelationship($idRelationship)
	{
		$this->idRelationship = intval($idRelationship);
	}
	
	public function getidRelationship()
	{
		return $this->idRelationship;
	}
	
	public function setidUser1($idUser1)
	{
		$this->idUser1 = intval($idUser1);
	}
	
	public function getidUser1()
	{
		return $this->idUser1;
	}
	
	public function setidUser2($idUser2)
	{
		$this->idUser2 = intval($idUser2);
	}
	
	public function getidUser2()
	{
		return $this->idUser2;
	}
	
	public function setAccepted($accepted)
	{
		$this->accepted = intval($accepted);
	}
	
	public function getAccepted()
	{
		return $this->accepted;
	}
}

?>