<?php

require_once ('models/model_fichier.php');

if($action  == "home")
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
	$template = "home";
}
else
{
	if ($action=="cree_fichier")
	{
		if(isset($_GET['chemin']))
		{
			$path=$_GET['chemin'];
			file_plus($path);
			$template = "home";
		}
	}
	elseif ($action=="suppr_fichier")
	{
		if(isset($_GET['chemin']))
		{
			$path=$_GET['chemin'];
			file_suppr($path);
			$template = "home";
		}
	}
	elseif ($action=="renom_fichier")
	{
		if(isset($_GET['chemin']))
		{
			$path=$_GET['chemin'];
			file_renam($path);
			$template = "home";
		}
	}
	elseif ($action=="copie_fichier")
	{
		if(isset($_GET['chemin']))
		{
			$path=$_GET['chemin'];
			file_copie ($path);
			$template = "home";
		}
	}
	elseif ($action=="copie_fichier_prise")
	{
		if(isset($_GET['chemin']))
		{
			$path=$_GET['chemin'];
			session_start();
			$_SESSION['copie'] = ' ';
			$_SESSION['copie'] = $path;
			$template = "home";
		}
	}
	elseif ($action =="prise_deplacement_file")
	{
		if(isset($_GET['chemin']))
		{
			$path=$_GET['chemin'];
			session_start();
			$_SESSION['deplacement_file'] = " ";
			$_SESSION['deplacement_file']=$path;
			$template = "home";
		}
	}
	elseif ($action =="deplace_fichier")
	{
		if(isset($_GET['chemin']))
		{
			$path=$_GET['chemin'];
			file_deplace($path);
			$template = "home";
		}
	}
	elseif (isset($_FILES['upload']))
	{ 
	     $dossier = $_GET['chemin'];
	     $fichier = basename($_FILES['upload']['name']);
	     move_uploaded_file($_FILES['upload']['tmp_name'], $dossier . $fichier);
		 $template = "home";
	}
	elseif ($action =="download_fichier")
	{
		if(isset($_GET['chemin']))
		{
			$path=$_GET['chemin'];
			file_download($path);
			$template = "home";
		}
	}
	header('Location: index.php?chemin='.$path.'');
}
?>