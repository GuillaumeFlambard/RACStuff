<?php

/*--------------------getAllUsers--------------------

------------------------------------------------------*/
function getAllUsers() {
	$instance = new User;
	$allUsers = $instance->getAll();
	
	return $allUsers;
}

/*--------------------addFriend--------------------

------------------------------------------------------*/
function addFriend ($my_id, $friend_id) {
	$instance = new Relationship;
	$instance->setidUser1($my_id);
	$instance->setidUser2($friend_id);
	$instance->setAccepted(0);
	$instance->save();
}

/*--------------------acceptFriend--------------------

------------------------------------------------------*/
function acceptFriend($my_id, $friend_id) {
 	$instance = new Relationship;
	$instance->setidUser1($my_id);
	$instance->setidUser2($friend_id);
	$instance->setAccepted(1);
	$instance->save();
	
	$instance2 = new Relationship;
	$instance2->hydrate(" WHERE `idUser2` = '".$my_id."' AND `idUser1` = '".$friend_id."'");
	$instance2->setAccepted(1);
	$instance2->save();
}

/*--------------------getAllRequests--------------------

------------------------------------------------------*/
function getAllRequests($my_id) {
	$instance_relation = new Relationship;
	$allRequests = $instance_relation->getAll(" WHERE `idUser2` = '".$my_id."' AND `accepted` = 0");
	
	$usersWhoRequested = array();
	foreach ($allRequests as $request) {
		$instance_user = new User;
		$instance_user->setidUser($request->getidUser1());
		$instance_user->hydrate();
		$usersWhoRequested[] = $instance_user;
	}
	
	return $usersWhoRequested;
}

/*--------------------getAllMyRequests--------------------

------------------------------------------------------*/
function getAllMyRequests($my_id) {
	$instance_relation = new Relationship;
	$allMyRequests = $instance_relation->getAll(" WHERE `idUser1` = '".$my_id."' AND `accepted` = 0");
	
	$usersRequested = array();
	foreach ($allMyRequests as $request) {
		$instance_user = new User;
		$instance_user->setidUser($request->getidUser2());
		$instance_user->hydrate();
		$usersRequested[] = $instance_user;
	}
	
	return $usersRequested;
}

?>