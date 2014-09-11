<?php

require_once ('models/statut_model.php');

if ($action =="CreationStatut" && !empty($_SESSION['login']))
{
	$affiche->assign('pseudo',$_SESSION['login']);
	if(!empty($_POST['ContenuStatut']))
		CreeStatut();

	//description
	$description = AfficheDescription($_SESSION['idUser']);
	$affiche->assign('description',$description);
	$template=__DIR__."/../templates/profil.tpl";
	$affiche->assign('template',$template);
}
elseif($action=="getpostlist")
{
	$allStatut = AllStatut();
	$allContent = array();
	$allDate = array();
	foreach ($allStatut as $key => $value)
	{
		$allContent[] = $value->getContent();
		$allDate[] = $value->getDate();
		$allidUser[] = $value->getidUser();
	}

	$allLogin = array();
	foreach($allidUser as $key => $idUser)
	{
		$login = new User;
		$login->setidUser($idUser);
		$login->hydrate();
		$allLogin[] = $login->getLogin();
	}

	$tableau = array();
	$tableau[] = $allContent;
	$tableau[] = $allDate;
	$tableau[] = $allLogin;

	echo json_encode($tableau);
	die();
}
elseif($action=="getutilisateurpost")
{
	$utilisateurStatut = UtilisateurStatut($_SESSION['idUser']);
	$allContentUtilisateur = array();
	$allDateUtilisateur = array();
	foreach($utilisateurStatut as $key => $value)
	{
		$allContentUtilisateur[] = $value->getContent();
		$allDateUtilisateur[] = $value->getDate();
		$allidUserUtilisateur[] = $value->getidUser();
	}

	$allLogin = array();
	foreach($allidUserUtilisateur as $key => $idUser)
	{
		$login = new User;
		$login->setidUser($idUser);
		$login->hydrate();
		$allLoginUtilisateur[] = $login->getLogin();
	}

	$tableau = array();
	$tableau[] = $allContentUtilisateur;
	$tableau[] = $allDateUtilisateur;
	$tableau[] = $allLoginUtilisateur;

	echo json_encode($tableau);
	die();
}
elseif($action=="getmessageslist")
{
	$allMessages = AllMessages();
	$tableau = array();
	foreach($allMessages as $key => $value)
	{
		$tableau[] = $value->getContent();
	}

	echo json_encode($tableau);
	die();
}
elseif($action=="ListStatutsInterface")
{
	$interfaceAllStatut = InterfaceAllStatut();
	
	$allContentInterface = array();
	$allDateInterface = array();
	$allidUserInterface = array();
	foreach ($interfaceAllStatut as $key => $statut) {
		$allContentInterface[] = $statut->getContent();
		$allDateInterface[] = $statut->getDate();
		$allidUserInterface[] = $statut->getidUser();
	}

	$allLoginInterface = array();
	foreach($allidUserInterface as $key => $idUser) {
		$login = new User;
			$login->setidUser($idUser);
			$login->hydrate();
		$allLoginInterface[] = $login->getLogin();
	}

	$tableau = array();
	$tableau[] = $allContentInterface;
	$tableau[] = $allDateInterface;
	$tableau[] = $allLoginInterface;

	echo json_encode($tableau);
	die();
}
elseif($action=="DernierPostInconnu")
{
	if(isset($_GET['pseudo']))
	{
		$utilisateurInconnu = UtilisateurInconnu(ConvertId($_GET['pseudo']));
		$inconnuContent = array();
		$inconnuDate = array();
		foreach ($utilisateurInconnu as $key => $value)
		{
			$inconnuContent[] = $value->getContent();
			$inconnuDate[] = $value->getDate();
			$inconnuidUser[] = $value->getidUser();
		}

		$inconnuLogin = array();
		foreach($inconnuidUser as $key => $idUser)
		{
			$login = new User;
			$login->setidUser($idUser);
			$login->hydrate();
			$inconnuLogin[] = $login->getLogin();
		}

		$tableau = array();
		$tableau[] = $inconnuContent;
		$tableau[] = $inconnuDate;
		$tableau[] = $inconnuLogin;

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
elseif($action=="GetPostAmi")
{
	if(isset($_GET['pseudo']))
	{
		$utilisateurAmi = UtilisateurStatut(ConvertId($_GET['pseudo']));
		$AmiContent = array();
		$AmiDate = array();
		foreach ($utilisateurAmi as $key => $value)
		{
			$AmiContent[] = $value->getContent();
			$AmiDate[] = $value->getDate();
			$AmiidUser[] = $value->getidUser();
		}

		$AmiLogin = array();
		foreach($AmiidUser as $key => $idUser)
		{
			$login = new User;
			$login->setidUser($idUser);
			$login->hydrate();
			$AmiLogin[] = $login->getLogin();
		}

		$tableau = array();
		$tableau[] = $AmiContent;
		$tableau[] = $AmiDate;
		$tableau[] = $AmiLogin;

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
if(empty($template))
{
	$affiche->assign('config',$config['erreurs']['twix']);
	$template=__DIR__."/../templates/erreur.tpl";
	$affiche->assign('template',$template);
}

?>