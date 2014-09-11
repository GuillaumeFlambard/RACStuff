<?php

require_once ('models/user_model.php');

if(!empty($_SESSION['login']))
{
	$affiche->assign('pseudo',$_SESSION['login']);
	$affiche->assign('idUser',$_SESSION['idUser']);

	if ($action =="home")
	{
		$template=__DIR__."/../templates/interface.tpl";
		$affiche->assign('template',$template);
	}
	elseif($action=="profil")
	{
		//description
		$description = AfficheDescription($_SESSION['idUser']);
		$affiche->assign('description',$description);
		$template=__DIR__."/../templates/profil.tpl";
		$affiche->assign('template',$template);
	}
	elseif($action=="description" && isset($_POST['ContenuDescription']))
	{
		Description($_SESSION['idUser'], $_POST['ContenuDescription']);
		//descrition
		$description = AfficheDescription($_SESSION['idUser']);
		$affiche->assign('description',$description);

		$template=__DIR__."/../templates/profil.tpl";
		$affiche->assign('template',$template);
	}
	elseif($action=="inconnu" && isset($_GET['pseudo']))
	{
		$affiche->assign("inconnu",$_GET['pseudo']);
		//description
		$id_inconnu = ConvertId($_GET['pseudo']);
		$description = AfficheDescription($id_inconnu);
		$max = 130;  
		if (strlen($description) >= $max)
		{  
			$description = substr($description, 0, $max);  
			$espace = strrpos($description, " ");  
			$description = substr($description, 0, $espace)."...";  
		}
		
		$relation1 = new Relationship;
			$hydrate1 = $relation1->hydrate(' WHERE `idUser1` = "'.$id_inconnu.'" && `idUser2` = "'.$_SESSION['idUser'].'"');
		$relation2 = new Relationship;
			$hydrate2 = $relation2->hydrate(' WHERE `idUser1` = "'.$_SESSION['idUser'].'" && `idUser2` = "'.$id_inconnu.'"');
		if (($hydrate1 == true) && ($hydrate2 == null)) {
			$icone_ajout_ami = '<img src="./images/icone-wait.png" alt="vous avez demand&eacute; cet utilisateur en ami" width="45" id="icone_ajouter_ami" title="En attente d\'une r&eacute;ponse">';
		}
		elseif (($hydrate2 == true) && ($hydrate1 == null)) {
			$icone_ajout_ami = '<a href="index.php?action=utilisateurs"><img src="./images/icone-question.png" alt="cet utilisateur vous a demand&eacute; en ami" width="45" id="icone_ajouter_ami"></a>';
		}
		else {
			$icone_ajout_ami = '<a href="index.php?action=addFriend&friend='.$_GET['pseudo'].'"><img src="./images/add_friend.png" alt="icone envoyer une demande d\'ami" width="45" id="icone_ajouter_ami"></a>';
		}
		
		$affiche->assign('icone_ajout_ami',$icone_ajout_ami);
		$affiche->assign('description',$description);
		$template=__DIR__."/../templates/profil_inconnu.tpl";
		$affiche->assign("template",$template);
	}
	elseif($action=="friend" && !empty($_GET['pseudo']))
	{
		$affiche->assign("friend",$_GET['pseudo']);
		//description
		$description = AfficheDescription(ConvertId($_GET['pseudo']));
		$affiche->assign('description',$description);
		$template=__DIR__."/../templates/profil_ami.tpl";
		$affiche->assign("template",$template);
	}
	elseif($action=="messagerie")
	{
		if (!empty($_GET['friend']) && empty($_GET['interlocuteur']))
			$interlocuteur = $_GET['friend'];
		elseif (empty($_GET['friend']) && !empty($_GET['interlocuteur']))
			$interlocuteur = $_GET['interlocuteur'];
		else
			$interlocuteur = '';
		$header="connecte";
		$template=__DIR__."/../templates/messagerie.tpl";
		
		$affiche->assign('interlocuteur',$interlocuteur);
		$affiche->assign('header',$header);
		$affiche->assign('template',$template);
	}
	elseif($action=="utilisateurs")
	{
		$template=__DIR__."/../templates/utilisateurs.tpl";
		$affiche->assign("template",$template);
	}
	elseif($action=="envoi_invit" && isset($_POST['invit_email']))
	{
		Envoyer_invit($_POST['invit_email']);
	}
	elseif($action=="deconnexion")
	{
		session_destroy();
		header('location:index.php');
	}
	elseif($action=="invitation" && !empty($_POST['invit_email']))
	{
		global $link;
		if(count($_POST))
		{
			$invit_adresse=mysqli_real_escape_string($link,$_POST['invit_email']);
			$error_invit=0;
			if ($_POST['invit_email']=="")
			{
				$error_invit_email = "Veuillez remplir le champ.";
				$error_invit=1;
			}
			elseif(VerifierAdresseMail($_POST['invit_email']) == FALSE)
			{
				$error_invit_email = "L'email que vous avez rentr&eacute; n'est pas valide.";
				$error_invit=1;
			}
			if($error_invit==0)
			{
				$code=random();
				$message='<html>
				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
				<title>Invitation &agrave; rejoindre le Moustache Club</title>
				<body style="margin: 0px 0px 0px 0px; padding: 0px 0px 0px 0px; font-family: Trebuchet MS, Arial, Verdana, sans-serif;">
							<!-- start texte -->
								F&eacute;licitation ! Vous avez &eacute;t&eacute; invit&eacute; &agrave; rejoindre le Moustache Club ! <br />Pour se faire, utilisez votre moustache-code sp&eacute;cial lors de votre inscription.<br /><br />
								Votre code est le : '.$code.'
							<!-- end texte -->
							 
							 
							<!-- début footer -->
						  

							<!-- fin du footer -->
						 
				</body>
				</html>';
			 	smtpmailer($invit_adresse,'Moustache_Club', 'Invitation à rejoindre le moustache club',$message);
			 	$sucess_invit_email= "Invitation envoy&eacute;e avec succ&egrave;s";
			 	$code_inscri= new code;
			 	$code_inscri->setCode(mysqli_real_escape_string($link,$code));
			 	$code_inscri->setEmail(mysqli_real_escape_string($link,$invit_adresse));
			 	$code_inscri->save();
			}
			if (!empty($error)) 
				echo $error;
			
			$template=__DIR__."/../templates/invitation.tpl";
			$affiche->assign("template",$template);		
		}

		if(isset($error_invit_email))
			$affiche->assign("error_invit_email",$error_invit_email);
		if(isset($sucess_invit_email))
			$affiche->assign('sucess',$sucess_invit_email);

		$template=__DIR__."/../templates/invitation.tpl";
		$affiche->assign("template",$template);
	}
	elseif ($action=="invitation" && empty($_POST['invit_email']))
	{
		$template=__DIR__."/../templates/invitation.tpl";
		$affiche->assign("template",$template);
	}
}
else
{
	if($action=="home")
	{
		$template=__DIR__."/../templates/connexion_inscription.tpl";
		$affiche->assign('template',$template);
	}
	elseif($action =="connexion" && isset($_POST['login']) && isset($_POST['password']))
	{
		global $UtilisateurStatut;
		global $AllStatut;
		//connexion();
		$user=connexion($_POST['login'], $_POST['password']);
		if(is_object($user) === true && $user->getidUser() != null)
		{
			$_SESSION['login']=$user->getLogin();
			$_SESSION['pass']='connecte';
			$_SESSION['idUser']=$user->getidUser();

			$affiche->assign('pseudo',$_SESSION['login']);
			$affiche->assign('idUser',$_SESSION['idUser']);

			header('Location: index.php');
		}
		else
		{
			$template=__DIR__."/../templates/connexion_inscription.tpl";
			$affiche->assign('template',$template);
			$FailInscription="Login ou mot de passe incorrect";
			$affiche->assign("FailInscription",$FailInscription);
		}
	}
	elseif ($action =="inscription" && isset($_POST['identifiant']) && isset($_POST['pass'])
			&& isset($_POST['confpass']) && isset($_POST['email']) && isset($_POST['code']))
	{
		global $link;
		$error_indentifiant="";
		$error_pass="";
		$error_confpass="";
		$error_email="";
		$error_code="";
		$error =0;

		if(count($_POST))
		{
			$VerifAlpha=str_replace ("-", "a", $_POST['identifiant']);
			if (empty($_POST['identifiant']))
			{
				$error_identifiant = "Veuillez remplir le champ login";
				$error=1;
			}
			elseif (ctype_alpha($VerifAlpha) == false)
			{
				$error_identifiant = "Le champ identifiant ne doit contenir que des lettres.";
				$error=1;
			}
			elseif(strlen($_POST['identifiant']) < 3)
			{
				$error_identifiant = "Votre login doit comporter au moins de 3 caract&egrave;res";
				$error=1;
			}
			elseif(strlen($_POST['identifiant']) > 25)
			{
				$error_identifiant = "Votre login doit comporter moins de 25 caract&egrave;res";
				$error=1;
			}
			elseif(count(VerifPseudo($_POST['identifiant'])) != 0 )
			{
				$error_identifiant = "Votre speudo est d&eacute;j&agrave; utilis&eacute;.";
				$error=1;
			}
			if (empty($_POST['pass']) || empty($_POST['confpass']))
			{
				$error_pass = "Veuillez remplir les deux champs mot de passe.";
				$error=1;
			}
			elseif ($_POST['pass'] != $_POST['confpass'])	
			{
				$error_confpass = "Les mots de passe que vous avez renseign&eacute;s sont diff&eacute;rents";
				$error=1;
			}
			elseif(strlen($_POST['pass']) < 6)
			{
				$error_pass = "Votre mot de passe doit comporter au moins 6 caract&egrave;res";
				$error=1;
			}
			elseif(strlen($_POST['pass']) > 25)
			{
				$error_pass = "Votre mot de passe doit comporter moins de 25 caract&egrave;res";
				$error=1;
			}
			if (($_POST['email'])=="")
			{
				$error_email = "Veuillez remplir le champ email.";
				$error=1;
			}
			elseif(VerifierAdresseMail($_POST['email']) == FALSE)
			{
				$error_email = "Votre email n'est pas valide.";
				$error=1;
			}
			if($_POST['code']=="")
			{
				$error_code="Vous n'avez pas renseign&eacute; votre code d'invitation.";
				$error=1;
			}
			elseif(count(checkcode(mysqli_real_escape_string($link,$_POST['code']))) == 0)
			{
				$error_code = "Le code que vous avez renseign&eacute; n'est pas valide.";
				$error=1;
			}
			if($error==0)
			{
				$code = new Code;
					$code->setCode($_POST['code']);
					$code->hydrate(' WHERE `code` = "'.$_POST['code'].'"');
					$code->delete();

				$template=__DIR__."/../templates/connexion_inscription.tpl";
				$affiche->assign('template',$template);
				$SuccessInscription="Vous avez &eacute;t&eacute; inscrit avec succ&egrave;s";
				$affiche->assign("SuccessInscription",$SuccessInscription);
				inscription();
			}
			else
			{
				$template=__DIR__."/../templates/connexion_inscription.tpl";
		
				if(isset($error_identifiant))
					$affiche->assign("error_identifiant",$error_identifiant);

				if(isset($error_pass))
					$affiche->assign("error_pass",$error_pass);

				if(isset($error_confpass))
					$affiche->assign("error_confpass",$error_confpass);
				
				if(isset($error_email))
					$affiche->assign("error_email",$error_email);
				if(isset($error_code))
					$affiche->assign('error_code',$error_code);
			}
			$affiche->assign("template",$template);
		}
	}
	elseif ($action =="forget_pass")
	{
		$template=__DIR__."/../templates/forget_pass.tpl";
		$affiche->assign('template',$template);
	}
	elseif ($action =="change_pass" && isset($_POST['conf_login']) && isset($_POST['conf_email'])
		&& isset($_POST['new_password']) && isset($_POST['new_conf_password']))
	{
		if(!empty($_POST))
		{
			$error=0;
			if(empty($_POST['conf_login']))
			{
				$error_conf_login = "Veuillez remplir le champ login.";
				$error=1;
			}
			elseif(count(VerifPseudo($_POST['conf_login'])) < 1 )
			{
				$error_conf_login = "Votre compte est introuvable.";
				$error=1;
			}
			if(empty($_POST['conf_email']))
			{
				$error_conf_email = "Veuillez remplir le champ email.";
				$error=1;
			}
			elseif(count(VerifEmail($_POST['conf_email'])) < 1 )
			{
				$error_conf_email = "Votre email n'est pas valide.";
				$error=1;
			}
			elseif(count(check($_POST['conf_login'], $_POST['conf_email'])) > 1 )
			{
				$error_conf_login = "Votre login n'est pas compatible avec l'email.";
				$error_conf_email = "Votre email n'est pas compatible avec votre login.";
				$error=1;
			}
			if(empty($_POST['new_password']) || empty($_POST['new_conf_password']))
			{
				$error_pass = "Veuillez remplir les deux champs concernant mot de passe.";
				$error=1;
			}
			elseif(strlen($_POST['new_password']) < 6)
			{
				$error_pass = "Votre mot de pass doit comporter au moins de 6 caract&egrave;res";
				$error=1;
			}
			elseif($_POST['new_password'] != $_POST['new_conf_password'])	
			{
				$error_confpass = "Les mots de passe que vous avez renseign&eacute;s sont diff&eacute;rents";
				$error=1;
			}
			if($error==0)
			{
				MiseAJourMotDePass($_POST['conf_login'], $_POST['new_password']);
				$success="Votre mot de pass a bien &eacute;t&eacute; modifi&eacute;";
				$template=__DIR__."/../templates/connexion_inscription.tpl";
				$affiche->assign('template',$template);
			}
			else
			{
				$template=__DIR__."/../templates/forget_pass.tpl";
				$affiche->assign('template',$template);
			}
			if(isset($error_conf_login))
			{
				$affiche->assign('error_conf_login',$error_conf_login);
			}
			if(isset($error_conf_email))
			{
				$affiche->assign('error_conf_email',$error_conf_email);
			}
			if(isset($error_pass))
			{
				$affiche->assign('error_pass',$error_pass);
			}
			if(isset($error_confpass))
			{
				$affiche->assign('error_confpass',$error_confpass);
			}
		}
	}
	else
	{
		$affiche->assign('config',$config['erreurs']['sneaker']);
		$template=__DIR__."/../templates/erreur.tpl";
		$affiche->assign('template',$template);
		$affiche->display('./views/main.tpl');
		exit();
	}
}
if(empty($template))
{
	$affiche->assign('config',$config['erreurs']['twix']);
	$template=__DIR__."/../templates/erreur.tpl";
	$affiche->assign('template',$template);
}

?>