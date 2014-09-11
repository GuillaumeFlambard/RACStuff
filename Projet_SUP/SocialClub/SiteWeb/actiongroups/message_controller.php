<?php 

require_once('models/message_model.php');

if ($action == "getMessagesList")
{
	$list = getMessagesList($_SESSION['idUser']);
	$content = array();
	$date = array();
	$login = array();
	foreach ($list as $key => $message)
	{
		$user = new User;
			$user->setidUser($message->getidUserSender());
			$user->hydrate();
		
		$content[] = $message->getContent();
		$date[] = $message->getDate();
		$login[] = $user->getLogin();
	}
	
	$tableau = array();
	$tableau[] = $content;
	$tableau[] = $date;
	$tableau[] = $login;
	echo json_encode($tableau);
	die();
}
elseif ($action == "getAllMessages")
{
	$all = getAllMessages($_SESSION['idUser']);
	$tableau = array();
	foreach ($all as $key => $value)
	{
		$message = array();
		$param = "WHERE `idUser` = '".$value->getidUserSender()."'";
		$user = new User;
		$user->hydrate($param);
		$message['content'] = $value->getContent();
		$message['date'] = $value->getDate();
		$message['login'] = $user->getLogin();
		$tableau[] = $message;
	}
	echo json_encode($tableau);
	die();
}
elseif ($action == "getConversationMessages")
{
	if(!empty($_GET['interlocuteur']))
	{
		$id_friend = ConvertId($_GET['interlocuteur']);
		$conversation = getConversationMessages($_SESSION['idUser'], $id_friend);
		$content = array();
		$date = array();
		$login = array();
		$idMessage = array();
		foreach($conversation as $key => $message)
		{
			$sender = new User;
				$sender->setidUser($message->getidUserSender());
				$sender->hydrate();
				
			$login[] = $sender->getLogin();
			$content[] = $message->getContent();
			$date[] = $message->getDate();
			$idMessage[] = $message->getidMessage();
		}
			
		$tableau = array();
		$tableau[] = $login;
		$tableau[] = $content;
		$tableau[] = $date;
		$tableau[] = $idMessage;
			
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
elseif ($action == "getConversationProfil")
{
	if(!empty($_GET['friend']))
	{
		$id_friend = ConvertId($_GET['friend']);
		$conversations = getConversationProfil($_SESSION['idUser'], $id_friend);
		$tableau = array();
		
		foreach($conversations as $key => $instance_msg)
		{
			$sender = new User;
				$sender->setidUser($instance_msg->getidUserSender());
				$sender->hydrate();
		
			$message = array();
			$message['content'] = $instance_msg->getContent();
			$message['date'] = $instance_msg->getDate();
			$message['login'] = $sender->getLogin();
			$tableau[] = $message;
		}
		
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
elseif($action == "sendResponse")
{
	if (!empty($_POST['UserRecipient']))
		$interlocuteur = $_POST['UserRecipient'];
	elseif (!empty($_GET['friend']) && empty($_GET['interlocuteur']))
		$interlocuteur = $_GET['friend'];
	elseif (empty($_GET['friend']) && !empty($_GET['interlocuteur']))
		$interlocuteur = $_GET['interlocuteur'];
	else
		$interlocuteur = '';

	if (!empty($_POST['UserRecipient']) && !empty($_POST['reponse_input']))
	{
		$friend_id = ConvertId($_POST['UserRecipient']);
		$content = mysqli_real_escape_string($link, htmlspecialchars($_POST['reponse_input']));
		sendReponse($_SESSION['idUser'], $friend_id, $content);
	}
	
	$affiche->assign('$interlocuteur',$interlocuteur);
	header('Location: index.php?action=messagerie&interlocuteur='.$interlocuteur);
}
elseif ($action == "deleteMessage")
{
	if(count(checkDeleteMessage($_SESSION['idUser'], $_GET['interlocuteur']))>0)
	{
		deleteMessage($_GET['message']);
		header("Location: index.php?action=messagerie&interlocuteur=".$_GET['interlocuteur']);
	}
	else
	{
		$affiche->assign('config',$config['erreurs']['twix']);
		$template=__DIR__."/../templates/erreur.tpl";
		$affiche->assign('template',$template);
	}
}
if(empty($template))
{
	$affiche->assign('config',$config['erreurs']['twix']);
	$template=__DIR__."/../templates/erreur.tpl";
	$affiche->assign('template',$template);
}
?>
