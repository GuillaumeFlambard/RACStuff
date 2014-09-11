<?php

/*********************FUNCTIONS************************

	-CreeStatut
	-AllStatut
	-InterfaceAllStatut
	-UtilisateurStatut
	-UtilisateurInconnu

******************************************************/


/*----------------------CreeStatut---------------------
	Créé un statut comportant un contenu et une date
------------------------------------------------------*/
function CreeStatut()
{
	global $link;
	$statut = new statut;
		$statut->setidUser($_SESSION['idUser']);
		$statut->setDate(date('Y-m-d H:i:s'));
		$statut->setContent(mysqli_real_escape_string($link, htmlspecialchars($_POST['ContenuStatut'])));
		$statut->save();
}

/*----------------------AllStatut---------------------
	Retourne les derniers 10 statuts de tout mes
	amis
------------------------------------------------------*/
function AllStatut()
{
	$statut = new statut;

	$param="ORDER BY `date` DESC";
	$AllStatut=$statut->getAll($param);
	$AllFriends = getAllFriends($_SESSION['idUser']);
	
	$ids = array();
	foreach ($AllFriends as $value)
		$ids[] = $value->getIdUser();
	
	$result = array();
	foreach ($AllStatut as $value) {
		if (count($result) >= 10)
			break;
		if (in_array($value->getidUser(), $ids))
			$result[] = $value;
	}
	return $result;
}

/*---------------InterfaceAllStatut---------------------
	retourne tout les statuts de nos amis
------------------------------------------------------*/
function InterfaceAllStatut()
{
	$statut = new statut;

	$param="ORDER BY `date` DESC";
	$AllStatut=$statut->getAll($param);
	$AllFriends = getAllFriends($_SESSION['idUser']);
	
	$ids = array();
	foreach ($AllFriends as $value)
		$ids[] = $value->getIdUser();
		
	$result = array();
	foreach ($AllStatut as $value) {
		if (in_array($value->getidUser(), $ids))
			$result[] = $value;
	}
	return $result;
}

/*--------------------UtilisateurStatut-------------------
	Prend en paramétre l'id d'un utilisateur et retourne
	touts ses statuts du plus ressent au moins ressent
------------------------------------------------------*/
function UtilisateurStatut($id)
{
	$statut = new statut;

		$param="WHERE `idUser`=".$id." ORDER BY `date` DESC";
	return $UtilisateurStatut=$statut->getAll($param);
}

/*------------------UtilisateurInconnu-----------------
	Prend en paramétre l'id d'un utilisateur et retourne
	le statut le plus ressent de l'utilisateur
------------------------------------------------------*/
function UtilisateurInconnu($id)
{
	$statut = new statut;

		$param="WHERE `idUser`=".$id." ORDER BY `date` DESC LIMIT 0,1";
	return $UtilisateurStatutInconnu=$statut->getAll($param);
}
