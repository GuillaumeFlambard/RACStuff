<?php

require_once ('models/picture_model.php');

if($action=="getAllPictures")
{
	$all = getAllPictures($_SESSION['idUser']);
	$paths = array();
	$legends = array();
	
	foreach ($all as $key => $picture)
	{
		$paths[] = $picture->getPath();
		$legends[] = $picture->getLegende();
	}
	
	$tableau = array();
	$tableau[] = $paths;
	$tableau[] = $legends;

	echo json_encode($tableau);
	die();
}
elseif($action=="getAllPicturesOfFriend")
{
	if(!empty($_GET['pseudo']))
	{
		$instance = new User;
		$instance->hydrate(' WHERE `login` = "'.$_GET['pseudo'].'"');
		
		$all = getAllPictures($instance->getidUser());
		$paths = array();
		$legends = array();
		
		foreach ($all as $key => $picture)
		{
			$paths[] = $picture->getPath();
			$legends[] = $picture->getLegende();
		}
		
		$tableau = array();
		$tableau[] = $paths;
		$tableau[] = $legends;

		echo json_encode($tableau);
		die();
	}
	else {
		$template=__DIR__."/../templates/erreur.tpl";
		$affiche->assign("template", $template);
		$affiche->assign("pseudo", $_SESSION['login']);
		$affiche->assign('config',$config['erreurs']['twix']);
	}
}
elseif ($action == "deleteProfilePicture")
{
	deleteProfilePicture($_SESSION['login']);
	header('Location: index.php?action=profil');
}
elseif ($action=="switchProfilePicture")
{
	if(!empty($_GET['pathPhoto']))
	{
		switchProfilePicture($_SESSION['login'], $_GET['pathPhoto']);
		header("Location: index.php?action=profil");
	}
	else {
		$template=__DIR__."/../templates/erreur.tpl";
		$affiche->assign("template", $template);
		$affiche->assign("pseudo", $_SESSION['login']);
		$affiche->assign('config',$config['erreurs']['twix']);
	}
}
elseif ($action == "deleteGaleryPicture" && !empty($_GET['pathPhoto']))
{
	if(!empty($_GET['pathPhoto']))
	{
		deleteGaleryPicture($_GET['pathPhoto']);
		header("Location: index.php?action=profil");
	}
	else {
		$template=__DIR__."/../templates/erreur.tpl";
		$affiche->assign("template", $template);
		$affiche->assign("pseudo", $_SESSION['login']);
		$affiche->assign('config',$config['erreurs']['twix']);
	}
}
elseif ($action == "upload_img")
{
	if(isset($_POST['submit_image']))
	{
		$temporary_path = $_FILES['file']['tmp_name'];
	
		if(is_file($temporary_path))
		{
			$newpath = "./users/".$_SESSION['login']."/photos/";
			$name_file = $_FILES['file']['name'];
			$extension ='#^(.*\.jpg)|(.*\.jpeg)|(.*\.JPG)|(.*\.JPEG)$#'; 
			
			if(preg_match($extension, $name_file)) {
				move_uploaded_file($temporary_path, $newpath.$name_file);
				
				global $link;
				$image = new Image;
					$image->setPath(mysqli_real_escape_string($link, $newpath.$name_file));
					$image->setLegende(mysqli_real_escape_string($link, $_POST['legende']));
					$image->setIdUser($_SESSION['idUser']);
					$image->save();
				
				header('Location: index.php?action=profil');
			}
			else
				echo("Vous ne pouvez upload que des photos jpg ou jpeg");
		}
	}
	else
	{
		$affiche->assign('config',$config['erreurs']['uploader_fail']);
		$template=__DIR__."/../templates/erreur.tpl";
		$affiche->assign('template',$template);
		$affiche->display('./views/main.tpl');
		die();
	}
}
elseif ($action == "getLastPictures")
{
	$allPicturesOfFriends = getLastPictures($_SESSION['idUser']);
	$login = array();
	$path = array();
	$legend = array();
	
	foreach ($allPicturesOfFriends as $key => $picture) {
		$friend = new User;
			$friend->setidUser($picture->getidUser());
			$friend->hydrate();
			
		$login[] = $friend->getLogin();
		$path[] = $picture->getPath();
		$legend[] = $picture->getLegende();
	}
	
	$tableau = array();
	$tableau[] = $login;
	$tableau[] = $path;
	$tableau[] = $legend;
	
	echo json_encode($tableau);
	die();
}
if(empty($template))
{
	$affiche->assign('config',$config['erreurs']['twix']);
	$template=__DIR__."/../templates/erreur.tpl";
	$affiche->assign('template',$template);
}

?>