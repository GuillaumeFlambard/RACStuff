<?php
/*********************FUNCTIONS************************

	-getMessagesList 
	-getAllMessages
	-getConversationMessages
	-getConversationProfil
	-deleteMessage
	-sendReponse

******************************************************/


function getMessagesList($my_id) // 5 Derniers Messages
{
	$instance = new message;
	$param="WHERE `idUserRecipient`= '".$my_id."' ORDER BY `date` DESC LIMIT 0,5";
	return $getListMessages=$instance->getAll($param);
}

function getAllMessages($idUserRecipient) // Tous les messages
{
	$instance = new message;
	$instance->getidUserRecipient($idUserRecipient);
	$instance->getDate();
	$instance->getContent();
	$param="WHERE `idUserRecipient`= ".$idUserRecipient." ORDER BY `date` DESC ";
	return $getAllMessages=$instance->getAll($param);
}

function getConversationMessages($my_id,$friend_id) // Dernière Conversation Page messagerie
{
	$instance = new Message;
	$param = " WHERE (`idUserRecipient` = '".$my_id."' && `idUserSender` = '".$friend_id."') || (`idUserRecipient` = '".$friend_id."' && `idUserSender` = '".$my_id."') ORDER BY `date` ASC ";
	
	return $conversationMessages=$instance->getAll($param);
}

function getConversationProfil($my_id,$friend_id) // Derniere conversation avec la personne dont on visite le profil
{
	$instance = new Message;
	$param=" WHERE (idUserRecipient = ".$my_id." && idUserSender =".$friend_id.") || (idUserRecipient = ".$friend_id." && idUserSender =".$my_id.") ORDER BY `date` DESC";

	return $conversationMessagesProfil=$instance->getAll($param);
}

function sendReponse($my_id, $friend_id, $content) // Repondre
{
	global $link;
	$instance = new Message;
		$instance->setidUserSender($my_id);
		$instance->setidUserRecipient($friend_id);
		$instance->setContent($content);
		$instance->setDate(date('Y-m-d H:i:s'));
		$instance->save();
}

function deleteMessage($idmessage) // Supprimer un message
{
	$instance = new Message;
		$instance->setidMessage($idmessage);
		$instance->delete();
}

function checkDeleteMessage($idUserSender, $idUserRecipient)
{
	$message = new Message;
		$param=" WHERE `idUserSender`='".$idUserSender."' AND `idUserRecipient`='".$idUserRecipient."'";
		$result=$user->message($param);
		return $result;
}

?>