<?php


/*********************FUNCTIONS************************

	-my_query
	-url
	-dir_plus
	-dir_suppr
	-dir_renam
	-dir_deplace
	-copy_dir

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


/*----------------------url---------------------------

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
		/*if($file== "..")
		{
			continue;
		}*/
		$files[] = $file;
	}
   return $files;
}


/*----------------------dir_plus-----------------------

------------------------------------------------------*/
function dir_plus($data)
{
	if(is_dir("".$data."".$_POST['repertoire_plus']."/"))
	{
		die ('Ce dossier existe deja.');
	}
	else
	{
	   mkdir("".$data."/".$_POST['repertoire_plus']."");

	   //**********************************Insertion BDD******************************************************//
		$link = mysqli_connect("localhost","root","","dump");
		if ($link == FALSE)
		{
			die (mysqli_connect_error());
		}
		mysqli_set_charset($link, "utf8");
		my_query ($link,
		"INSERT INTO `actions` (`id_membre`,`action_effectue`,`element_affecte`,`parametre_action`,`date_heure`,`IP_utilisateur`)
		VALUES ('".$_SESSION['id_membre']."','creation','dossier','".$data."".$_POST['repertoire_plus']."','".date("Y-m-d H:i:s")."','".$_SERVER['REMOTE_ADDR']."')");
	}
}


/*----------------------dir_suppr-----------------------

	-Met un / si il n'y en a pas a la fin du fichier
	-Ouvre le repertoire (recursif)
		-Suprime les fichier
		-Ouvre les sous-repertoire
	-Ferme les sous repertoires et les suprimes
	-ferme le repertoire et le suprimes

------------------------------------------------------*/
function dir_suppr($path)
{
		if($path[strlen($path)-1]!='/')
		{
			$path.='/';
		}
		if(is_dir($path))
		{
			$op=opendir($path);
			while($v=readdir($op))
			{
				if($v!='.'&&$v!='..')
				{
					$fichier=$path.$v;
					if(is_dir($fichier))
					{
						dir_suppr($fichier);
					}
					else
					{
						unlink($fichier);
					}
				}
			}
			closedir($op);
			rmdir($path);
		}
		else{
				unlink($path);
			}


		//**********************************Insertion BDD******************************************************//
		$link = mysqli_connect("localhost","root","","dump");
		if ($link == FALSE)
		{
			die (mysqli_connect_error());
		}
		mysqli_set_charset($link, "utf8");
		my_query ($link,
		"INSERT INTO `actions` (`id_membre`,`action_effectue`,`element_affecte`,`parametre_action`,`date_heure`,`IP_utilisateur`)
		VALUES ('".$_SESSION['id_membre']."','supression','dossier','".$data."','".date("Y-m-d H:i:s")."','".$_SERVER['REMOTE_ADDR']."')");
}


/*----------------------dir_renam-----------------------

------------------------------------------------------*/
function dir_renam($data)
{
	if(is_dir ($data))
	{
		$target = $data; 
		$newName = $data."/../".$_POST['renomme_dir'];
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
		VALUES ('".$_SESSION['id_membre']."','rename','dossier','".$target."==>".$_POST['renomme_dir']."','".date("Y-m-d H:i:s")."','".$_SERVER['REMOTE_ADDR']."')");
	}
	else
	{
		die ('dossier inexistant');
	}
}


/*----------------------dir_deplace-----------------------

------------------------------------------------------*/
function dir_deplace ($data)
{
	if(is_dir ($data))
	{
		if($_SESSION['deplacement_dir']!== " ")
		{
			$source = $_SESSION['deplacement_dir'];
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
		VALUES ('".$_SESSION['id_membre']."','deplacer','dossier','".$source."==>".$newName."','".date("Y-m-d H:i:s")."','".$_SERVER['REMOTE_ADDR']."')");

		}
		else
		{
			die('Vous devez dabord apuyer sur le bouton "deplacer".');
		}
	}
}


/*----------------------copy_dir-----------------------

------------------------------------------------------*/
function copy_dir ($data)
{
	if(is_dir ($data))
	{
		if($_SESSION['copie_dir']!== " ")
		{
			$source = $_SESSION['copie_dir'];
			$recup = substr($source, strrpos($source, "/"));
			$newName = $data.$recup;
			rename($source, $newName);
			mkdir($_SESSION['copie_dir']);

			//**********************************Insertion BDD******************************************************//
			$link = mysqli_connect("localhost","root","","dump");
			if ($link == FALSE)
			{
				die (mysqli_connect_error());
			}
			mysqli_set_charset($link, "utf8");
			my_query ($link,
			"INSERT INTO `actions` (`id_membre`,`action_effectue`,`element_affecte`,`parametre_action`,`date_heure`,`IP_utilisateur`)
			VALUES ('".$_SESSION['id_membre']."','copie','dossier','".$source."==>".$newName."','".date("Y-m-d H:i:s")."','".$_SERVER['REMOTE_ADDR']."')");
		}
		else
		{
			die("Veullez dabord cliquer sur le bouton 'copier'.");
		}
	}
}

?>