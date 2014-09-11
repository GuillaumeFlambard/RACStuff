<?php


/*********************FUNCTIONS************************

	-my_query
	-url
	-file_plus
	-file_suppr
	-file_renam
	-file_copie
	-file_deplace
	-file_download

******************************************************/



/*----------------------my_query-----------------------

------------------------------------------------------*/
function my_query($link, $query)
{
	$result =  mysqli_query($link, $query);
	if($result === false)
	{
		die(mysqli_error($link));
	}
	else if ($result === true)
	{
		//return array(TRUE);
		return true;
	}
	else
	{
		return mysqli_fetch_all($result);
	}
}



/*----------------------url-----------------------

------------------------------------------------------*/
function url($data)
{
	$files = array();
	$dh = opendir($data);
	while (($file = readdir($dh)) !== false)
	{
		if($file== ".")
		{
			continue;
		}
		if($file== "..")
		{
			continue;
		}
		$files[] = $file;
	}
   return $files;
}



/*----------------------file_plus-----------------------

------------------------------------------------------*/
function file_plus($data)
{
	if(is_file("".$data."/".$_POST['fichier_plus']."/"))
	{
		die ('Le fichier existe deja');
	}
	else
	{
		$result = fopen($data."/".$_POST['fichier_plus'], "c");

		//**********************************Insertion BDD******************************************************//
		$link = mysqli_connect("localhost","root","","dump");
		if ($link == FALSE)
		{
			die (mysqli_connect_error());
		}
		mysqli_set_charset($link, "utf8");
		my_query ($link,
		"INSERT INTO `actions` (`id_membre`,`action_effectue`,`element_affecte`,`parametre_action`,`date_heure`,`IP_utilisateur`)
		VALUES ('".$_SESSION['id_membre']."','creation','fichier','".$data."/".$_POST['fichier_plus']."','".date("Y-m-d H:i:s")."','".$_SERVER['REMOTE_ADDR']."')");
	}
}


/*----------------------file_suppr-----------------------

------------------------------------------------------*/
function file_suppr($data)
{
	$result = unlink($data);
	if (!$result)
		die('unlink n a pas marche');
	$result = fopen($data."/".$_POST['fichier_plus'], "c");

		//**********************************Insertion BDD******************************************************//
		$link = mysqli_connect("localhost","root","","dump");
		if ($link == FALSE)
		{
			die (mysqli_connect_error());
		}
		mysqli_set_charset($link, "utf8");
		my_query ($link,
		"INSERT INTO `actions` (`id_membre`,`action_effectue`,`element_affecte`,`parametre_action`,`date_heure`,`IP_utilisateur`)
		VALUES ('".$_SESSION['id_membre']."','supression','fichier','".$data."/".$_POST['fichier_plus']."','".date("Y-m-d H:i:s")."','".$_SERVER['REMOTE_ADDR']."')");
}


/*----------------------file_renam-----------------------

------------------------------------------------------*/
function file_renam($data)
{
	if(is_file ($data))
	{
		$target = $data;
		$newName = $data."/../".$_POST['renomme_file'];
		rename($target, $newName);

		//**********************************Insertion BDD******************************************************//
		$link = mysqli_connect("localhost","root","","dump");
		if ($link == FALSE)
		{
			die (mysqli_connect_error());
		}
		mysqli_set_charset($link, "utf8");
		my_query ($link,
		"INSERT INTO `actions` (`id_membre`,`action_effectue`,`element_affecte`,`parametre_action`,`date_heure`,`IP_utilisateur`)
		VALUES ('".$_SESSION['id_membre']."','renommer','fichier','".$target."==>".$_POST['renomme_file']."','".date("Y-m-d H:i:s")."','".$_SERVER['REMOTE_ADDR']."')");
	}
	else
	{
		die ('fichier inexistant');
	}

}


/*----------------------file_copie-----------------------

------------------------------------------------------*/
function file_copie ($data)
{
	if($_SESSION['copie'])
	{
		$source = $_SESSION['copie'];
		$recup = substr($source, strrpos($source, "/"));
		$newName = $data.$recup;
		copy($source, $newName);

		//**********************************Insertion BDD******************************************************//
		$link = mysqli_connect("localhost","root","","dump");
		if ($link == FALSE)
		{
			die (mysqli_connect_error());
		}
		mysqli_set_charset($link, "utf8");
		my_query ($link,
		"INSERT INTO `actions` (`id_membre`,`action_effectue`,`element_affecte`,`parametre_action`,`date_heure`,`IP_utilisateur`)
		VALUES ('".$_SESSION['id_membre']."','copie','fichier','".$source."==>".$newName."','".date("Y-m-d H:i:s")."','".$_SERVER['REMOTE_ADDR']."')");
	}
}


/*----------------------file_deplace-----------------------

------------------------------------------------------*/
function file_deplace ($data)
{
	if($_SESSION['deplacement_file']!== " ")
	{
		$source = $_SESSION['deplacement_file'];
		$recup = substr($source, strrpos($source, "/"));
		$newName = $data.$recup;
		rename($source, $newName);

		//**********************************Insertion BDD******************************************************//
		$link = mysqli_connect("localhost","root","","dump");
		if ($link == FALSE)
		{
			die (mysqli_connect_error());
		}
		mysqli_set_charset($link, "utf8");
		my_query ($link,
		"INSERT INTO `actions` (`id_membre`,`action_effectue`,`element_affecte`,`parametre_action`,`date_heure`,`IP_utilisateur`)
		VALUES ('".$_SESSION['id_membre']."','deplacement','fichier','".$source."==>".$newName."','".date("Y-m-d H:i:s")."','".$_SERVER['REMOTE_ADDR']."')");
	}
	else
	{
		die('Vous devez dabord apuyer sur le bouton "deplacer".');
	}
}


/*----------------------file_download-----------------------

------------------------------------------------------*/
function file_download ($chemin)
{
	$filename =basename($chemin);
	$handle = fopen($chemin, 'r');
	if($handle === false)
		die('pas possible douvrir '.$chemin.'');
	$contenu = ' ';
	header('Content-Disposition: attachment; filename='.$filename.'');
	header('Content-Type: application/force-download');
	header('Content-Type: application/octet-stream');
	header('Content-Type: application/download');
	header('Content-Description: File Transfer'); 
	
	while (!feof($handle))
	{
		$contenu = fread($handle, 8192);
		echo $contenu;
	}
	fclose($handle);
	flush(); //garantie l'affichage de messages d'erreurs.
	exit();
}


?>