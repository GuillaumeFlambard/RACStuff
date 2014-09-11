<?php

// identifiants BDD
$config['bdd']['server'] = "127.0.0.1";
$config['bdd']['user'] = "root";
$config['bdd']['pass'] = "";
$config['bdd']['base'] = "moustache";

//identifiant BDD pour la VM
/*$config['bdd']['server'] = "163.5.246.74";
$config['bdd']['user'] = "root";
$config['bdd']['pass'] = "iswhrceten";
$config['bdd']['base'] = "moustache";*/

// config['routes'] liste les actions legales et le sous-controllers correspondant
$config['routes'] = array(

		"home" => "user",
		"profil" => "user",
		"inscription" => "user",
		"connexion" => "user",
		"deconnexion"=>"user",
		"invitation" => "user",
		"envoi_invit" =>"user",
		"utilisateurs" => 'user',
		"messagerie"=>"user",
		"description" => "user",
		"DescriptionUtilisateur" => "user",
		"forget_pass" => "user",
		"change_pass" => "user",
		"inconnu" => "user",
		"friend" => "user",
		
		"getpostlist" => "statut",
		"getutilisateurpost" => "statut",
		"CreationStatut" => "statut",
		"ListStatutsInterface" => "statut",
		"DernierPostInconnu" => "statut",
		"GetPostAmi" => "statut",

		"upload_img" => "picture",
		"deleteProfilePicture" => "picture",
		"switchProfilePicture" => "picture",
		"deleteGaleryPicture" => "picture",
		"getAllPictures" => "picture",
		"getAllPicturesOfFriend" => "picture",
		"getLastPictures" => "picture",

		"sendResponse"=>"message",
		"deleteMessage"=>"message",
		"getAllMessages"=>"message",
		"getMessagesList"=>"message",
		"getConversationProfil"=>"message",
		"getConversationMessages"=>"message",
		
		"getAllFriends" => "friend",
		"getAllFriendsOfFriend" => "friend",
		"friendOfFriend" => "friend",
		"getAllUsers" => "friend",
		"addFriend" => "friend",
		"acceptFriend" => "friend",
		"getAllRequests" => "friend"
);

// action par défaut : se connecter ou s'inscrire
$config['defaults']['action'] = "home";

// action par défaut lorsqu'on est connecté : page d'accueil de l'utilisateur
$config['defaults']['action_connected'] = "home";


$config['erreurs'] = array(

		"sneaker" => "Vous devez vous connecter pour acc&eacute;der au r&eacute;seau.",
		"action_illegale" => "Mince alors vous n'&ecirc;tes pas autoris&eacute; &agrave; effectuer cette action.",
		"twix" => "C'est pas bien tout ca.",
		"uploader_fail" => "Impossible d'uploader l'image<br><br><a href='index.php'>retour</a>"
);

?>