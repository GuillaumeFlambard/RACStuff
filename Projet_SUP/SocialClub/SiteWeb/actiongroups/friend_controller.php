<?php

require_once ('models/friend_model.php');

if($action=="getAllUsers")
{
	$users = array();
	$allUser = getAllUsers();
	$allFriendsTmp = getAllFriends($_SESSION['idUser']);
	$requestsByMeTmp = getAllMyRequests($_SESSION['idUser']);
	$requestsByYouTmp = getAllRequests($_SESSION['idUser']);
	
	$allFriends = array();
	$requestsByMe = array();
	$requestsByYou = array();
	
	foreach ($allFriendsTmp as $friend)
		$allFriends[] = $friend->getLogin();
	foreach ($requestsByMeTmp as $request)
		$requestsByMe[] = $request->getLogin();
	foreach ($requestsByYouTmp as $request)
		$requestsByYou[] = $request->getLogin();
	
	foreach ($allUser as $key => $user) {
		if ($user->getLogin() == $_SESSION['login'])
			continue;
		
		$currentUser = array(); 
		$currentUser['login'] = $user->getLogin();
		if (in_array($currentUser['login'], $requestsByMe))
			$currentUser['relation'] = 'requestsByMe';
		elseif (in_array($currentUser['login'], $requestsByYou))
			$currentUser['relation'] = 'requestsByYou';
		elseif (in_array($currentUser['login'], $allFriends))
			$currentUser['relation'] = 'friend';
		else
			$currentUser['relation'] = 'unknown';
		$users[] = $currentUser;
	}
	
	echo json_encode($users);
	die();
}
elseif($action=="getAllFriends")
{
	$all = getAllFriends($_SESSION['idUser']);
	$friends = array();
	
	foreach ($all as $key => $friend) {
		$friends[] = $friend->getLogin();
	}
	
	echo json_encode($friends);
	die();
}
elseif($action=="getAllFriendsOfFriend")
{
	if (!empty($_GET['pseudo'])) {
		$all = getAllFriends(ConvertId($_GET['pseudo']));
		$friends = array();
		
		foreach ($all as $key => $friend) {
			$friends[] = $friend->getLogin();
		}
		
		echo json_encode($friends);
		die();
	}
	else {
		$template=__DIR__."/../templates/erreur.tpl";
		$affiche->assign("template", $template);
		$affiche->assign("pseudo", $_SESSION['login']);
		$affiche->assign('config',$config['erreurs']['twix']);
	}
}
elseif ($action == "friendOfFriend")
{
	if(!empty($_GET['pseudo']))
	{
		if ($_GET['pseudo'] != $_SESSION['login']) {
		$id_user = ConvertId($_GET['pseudo']);
		$relation = new Relationship;
		
		if (($relation->hydrate(' WHERE `idUser1` = "'.$id_user.'" && `idUser2` = "'.$_SESSION['idUser'].'"')) != true) {
			if ($relation->getAccepted() == 1)
				header('Location: index.php?action=friend&pseudo='.$_GET['pseudo']);
			else
				header('Location: index.php?action=inconnu&pseudo='.$_GET['pseudo']);
		}
		else
			header('Location: index.php?action=inconnu&pseudo='.$_GET['pseudo']);
		}
		else {
			header('Location: index.php?action=profil');
		}
	}
	else {
		$template=__DIR__."/../templates/erreur.tpl";
		$affiche->assign("template", $template);
		$affiche->assign("pseudo", $_SESSION['login']);
		$affiche->assign('config',$config['erreurs']['twix']);
	}
}
elseif ($action=="addFriend")
{
	if(!empty($_GET['friend']))
	{
		$instance = new User;
		$instance->hydrate(" WHERE `login` = '".$_GET['friend']."'");	
		addFriend($_SESSION['idUser'], $instance->getidUser());
		header('Location: index.php?action=inconnu&pseudo='.$_GET['friend']);
	}
	else {
		$template=__DIR__."/../templates/erreur.tpl";
		$affiche->assign("template", $template);
		$affiche->assign("pseudo", $_SESSION['login']);
		$affiche->assign('config',$config['erreurs']['twix']);
	}
}
elseif ($action == "getAllRequests") 
{
	$all = getAllRequests($_SESSION['idUser']);
	$logins = array();
	
	foreach ($all as $key => $userWhoRequested) {
		$logins[] = $userWhoRequested->getLogin();
	}
	
	echo json_encode($logins);
	die();
}
elseif ($action == "acceptFriend")
{
	if(!empty($_GET['friend']))
	{
		$friend = new User;
		$friend->hydrate(" WHERE `login` = '".$_GET['friend']."'");
		$idFriend = $friend->getidUser();
		acceptFriend($_SESSION['idUser'], $idFriend);
		header('Location: index.php?action=utilisateurs');
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