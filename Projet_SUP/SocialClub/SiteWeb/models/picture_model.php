<?php

/*--------------------deleteGaleryPicture--------------------

------------------------------------------------------*/
function deleteGaleryPicture($pathPhoto) {			//supprimer une photo de la galerie
	unlink ($pathPhoto);
	$instance = new Image;
		$instance->hydrate(" WHERE `path` = '".$pathPhoto."'");
		$instance->delete();
}

/*--------------------deleteProfilePicture--------------------

------------------------------------------------------*/
function deleteProfilePicture($login) {			//supprimer la photo de profil
	copy("./images/user_moustache.jpg", "./users/".$login."/photo_profil/".$login.".jpg");
}

/*--------------------switchProfilePicture--------------------

------------------------------------------------------*/
function switchProfilePicture($login, $pathPhoto) {			//définir une photo de la galerie comme photo de profil
	$directory = "./users/".$login;
	copy($pathPhoto, $directory."/photo_profil/".$login.".jpg");
}

/*--------------------getAllPictures-------------------

------------------------------------------------------*/
function getAllPictures($idUser) {
	$instance = new Image;
	$allPictures = $instance->getAll(" WHERE `idUser` = ".$idUser);
	
	return $allPictures;
}

/*--------------------getLastPictures-------------------

------------------------------------------------------*/
function getLastPictures($my_id) {
	$allFriends = getAllFriends($my_id);
	$id_friends = array();
	foreach ($allFriends as $key => $friend) 
		$id_friends[] = $friend->getidUser();

	$instance = new Image;
	$allPictures = $instance->getAll();
	$allPicturesOfFriends = array();
	foreach ($allPictures as $key => $picture) {
		if (in_array($picture->getidUser(), $id_friends)) {
			$allPicturesOfFriends[] = $picture;
		}
	}
	
	return $allPicturesOfFriends;
}

?>