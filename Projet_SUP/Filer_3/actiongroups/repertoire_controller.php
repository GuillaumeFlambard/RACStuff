<?php

require_once ('models/model_repertoire.php');

if($action  =="home")
{
	if(isset($_GET['chemin']))
	{
		$path=$_GET['chemin'];
	}
	else
	{
		$path=$path_default;
	}
	$val_return= url($path);
	if(isset($_SESSION['login']) && isset($_SESSION['pass']))
	{
		if($_SESSION['login']!=='' && $_SESSION['pass']=='connecte')
		{
			$template = "home";
		}
		else
		{
			$template = "acceuil";
		}
	}
	else
	{
		$template = "acceuil";
	}
}
else
{
	if ($action =="cree_repertoire")
	{
		if(isset($_GET['chemin']))
		{
			$path=$_GET['chemin'];
			//die($path);
			dir_plus($path);
			$template = "home";
		}
	}
	elseif ($action =="suppr_repertoire")
	{
		if(isset($_GET['chemin']))
		{
			$path=$_GET['chemin'];
			dir_suppr($path);
			$template = "home";
		}
	}
	elseif ($action =="renom_repertoire")
	{
		if(isset($_GET['chemin']))
		{
			$path=$_GET['chemin'];
			dir_renam($path);
			$template = "home";
		}
	}
	elseif ($action =="prise_deplacement_dir")
	{
		if(isset($_GET['chemin']))
		{
			$path=$_GET['chemin'];
			session_start();
			$_SESSION['deplacement_dir'] = " ";
			$_SESSION['deplacement_dir']=$path;
			$template = "home";
		}
	}
	elseif ($action =="deplace_repertoire")
	{
		if(isset($_GET['chemin']))
		{
			$path=$_GET['chemin'];
			dir_deplace($path);
			$template = "home";
		}
	}
	elseif ($action =="copie_dossier_prise")
	{
		if(isset($_GET['chemin']))
		{
			$path=$_GET['chemin'];
			session_start();
			$_SESSION['copie_dir'] = " ";
			$_SESSION['copie_dir']=$path;
			$template = "home";
		}
	}
	elseif ($action =="copie_repertoire")
	{
		if(isset($_GET['chemin']))
		{
			$path=$_GET['chemin'];
			copy_dir($path);
			$template = "home";
		}
	}
	header('Location: index.php?chemin='.$path.'');
}

?>