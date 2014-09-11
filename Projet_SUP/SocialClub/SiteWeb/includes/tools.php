<?php

/*********************FUNCTIONS************************

	-my_query
	-my_fetch_assoc
	-ConvertId
	-AfficheDescription
	-getAllFriends

******************************************************/

function my_query($query) 
{
	global $link;
	if (empty ($link))
		$link= mysqli_connect('localhost', 'root', "", 'moustache');
		
	$result = mysqli_query($link, $query);
	return $result;
}


function my_fetch_assoc($query) 
{
	global $link;
	$result = my_query($query);
	if($result == FALSE)
		die('Erreur lors de l\'execution de la requete');
	
	$data = mysqli_fetch_array($result, MYSQLI_ASSOC);
	return $data;
}

/*--------------------ConvertId------------------------

------------------------------------------------------*/
function ConvertId($pseudo)
{
	$user_instance = new User;
		$user_instance->hydrate(" WHERE `login` = '".$pseudo."'");
		return $result=$user_instance->getidUser();
}

/*------------------AfficheDescription------------------
	prend en parametre l'id d'un user et retourne
	sa description
------------------------------------------------------*/
function AfficheDescription($idUser)
{
	$user = new user;
		$user->setidUser($idUser);
		$user->hydrate();
		return $result=$user->getDescription();
}

/*--------------------getAllFriends--------------------

------------------------------------------------------*/
function getAllFriends($my_id) {
	$instance = new Relationship;
	$all = $instance->getAll(" WHERE `idUser1` = '".$my_id."' AND `accepted` = 1");
	
	$allFriends = array();
	foreach ($all as $friend) {
		$instance_user = new User;
		$instance_user->setidUser($friend->getidUser2());
		$instance_user->hydrate();
		$allFriends[] = $instance_user;
	}
	
	return $allFriends;
}
