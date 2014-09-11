<?php

require_once ('models/model_acceuil.php');

if ($action =="acceuil_inscription")
{
	if(isset($_GET['chemin']))
	{
		$path=$_GET['chemin'];
	}
	else
	{
		$path=$path_default;
	}
	
	inscription($path);
	$template = "acceuil";
}
elseif ($action =="acceuil_connection")
{
	if(isset($_GET['chemin']))
	{
		$path=$_GET['chemin'];
	}
	else
	{
		$path=$path_default;
	}
	connection();
	$template='home';
	header('Location: index.php?chemin='.$path.$_POST['login_p1'].'/');
}
elseif ($action =="deconnection")
{
	session_destroy();
	$template = "acceuil";
}
?>