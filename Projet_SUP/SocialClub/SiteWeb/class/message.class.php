<?php

class Message extends Table
{
	protected $idMessage;
	protected $idUserSender;
	protected $idUserRecipient;
	protected $content;
	protected $date;
	
	public function __construct()
	{
		$this->tableName = 'messages';
		$this->primaryKey = 'idMessage';
	}
	
	public function setidMessage($idMessage)
	{
		$this->idMessage = intval($idMessage);
	}
	
	public function getidMessage()
	{
		return $this->idMessage;
	}
	
	public function setidUserSender($idUserSender)
	{
		$this->idUserSender = intval($idUserSender);
	}
	
	public function getidUserSender()
	{
		return $this->idUserSender;
	}
	
	public function setidUserRecipient($idUserRecipient)
	{
		$this->idUserRecipient = intval($idUserRecipient);
	}
	
	public function getidUserRecipient()
	{
		return $this->idUserRecipient;
	}
	
	public function setContent($content) 
	{
		$this->content = $content;
	}
	
	public function getContent()
	{
		return $this->content;
	}
	
	public function setDate($date) 
	{
		$this->date = $date;
	}
	
	public function getDate()
	{
		return $this->date;
	}
}

?>