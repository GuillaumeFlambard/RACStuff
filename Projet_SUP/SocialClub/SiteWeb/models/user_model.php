<?php

/*********************FUNCTIONS************************

	-inscription
	-connection
	-VerifierAdresseMail
	-random
	-smtpmailer
	-VerifPseudo
	-VerifEmail
	-check
	-MiseAJourMotDePass
	-Description
	-checkcode

******************************************************/



/*----------------------inscription---------------------
	Inscrit l'utilisateur avec :
	-Son login
	-Son mot de passe
	-Son email
	-Un descritpion predefinit
	Ensuite elle crée deux dossiers pour chaque nouvel utilisateur:
	-Un photo
	-Un photo_profil
	Ces dossier serviront a la gestion des photos
	definit une image de profil par defaut
------------------------------------------------------*/
function inscription()
{
	global $link;

	$user = new user;
		$user->setLogin(mysqli_real_escape_string($link, $_POST['identifiant']));
		$user->setPassword(sha1($_POST['pass']));
		$user->setEmail(mysqli_real_escape_string($link,$_POST['email']));
		$user->setDescription('Aucune description pour le moment.');
		$user->save();
		if(!isset($directory))
		{
			$login = mysqli_real_escape_string($link, $_POST['identifiant']);
			$directory = "./users/".$login;
			mkdir($directory);
			mkdir($directory."/photos");
			mkdir($directory."/photo_profil");
			copy("./images/user_moustache.jpg", $directory."/photo_profil/".$login.".jpg");
		}
}


/*----------------------connexion---------------------
	Connecte l'utilisateur grace a son login et son mot 
	de passe si il n'a pas d'erreur on rempli la super globale
	$_SESSION avec les information qu'on veut
------------------------------------------------------*/
function connexion($login, $pass)
{
	global $link;

	$user = new user;
		$param=' WHERE `login` = "'.mysqli_real_escape_string($link,$login).'" AND `password` = "'.sha1($pass).'"';
		$user->hydrate($param);
		return $user;
}

/*----------------------VerifierAdresseMail---------------
	regexp qui verifie que l'email entré par l'utilisateur
	comporte un @ et un nom de domaine.
------------------------------------------------------*/
function VerifierAdresseMail($adresse)  
{  
   $syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';  
   if(preg_match($syntaxe,$adresse))  
      return true;  
   else  
     return false;  
}

/*----------------------random------------------------
	genere un code commencant par $string et comprenant 
	8 caracteres aleatiorede $chaine
------------------------------------------------------*/
function random() 
{
	$string = "";
	$chaine = "azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN0123456789";
	srand((double)microtime()*1000000);
	for($i=0; $i<8; $i++) 
	{
		$string .= $chaine[rand()%strlen($chaine)];
	}
	return $string;
}

/*--------------------Envoyer_invit--------------------

------------------------------------------------------*/
function smtpmailer($to, $from, $subject, $body) { 
	global $error;
	$mail = new PHPMailer();  // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	$mail->IsHTML();
	$mail->Host = 'smtp.gmail.com';
	$mail->Port =465; 
	$mail->Username = 'moustachesocialclub@gmail.com';  
	$mail->Password = 'iswhrceten';
	$mail->SetFrom($from);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} 
	else 
	{
		return true;
	}
}

/*--------------------VerifPseudo----------------------
	Prend en parametre le login d'un utilisateur
	et verifie qu'il existe dans la BDD et retourne 
	toute la ligne voulu
------------------------------------------------------*/
function VerifPseudo($pseudo)
{
	$user = new user;
		$param=" WHERE `login`='".$pseudo."'";
		$result=$user->getAll($param);
		return $result;
}

/*--------------------VerifEmail----------------------
	Prend en parametre l'email d'un utilisateur
	et verifie qu'il existe dans la BDD et retourne 
	toute la ligne voulu
------------------------------------------------------*/
function VerifEmail($email)
{
	$user = new user;
		$param=" WHERE `email`='".$email."'";
		$result=$user->getAll($param);
		return $result;
}

/*--------------------check----------------------
	prend en parametre le login et le  password d'un user
	et verifie qu'ils sont associés au meme user dans la BDD 
	et retourne la ligne si il correspondent
------------------------------------------------------*/
function check($Login, $email)
{
	$user = new user;
		$param=" WHERE `email`='".$email."' AND `login`='".$Login."'";
		$result=$user->getAll($param);
		return $result;
}


/*------------------MiseAJourMotDePass------------------
	prend en parametre le login et le nouveau motdepasse
	d'un user puis UPDATE la colonne mot de passe
------------------------------------------------------*/
function MiseAJourMotDePass($VerifLogin, $NewPass)
{
	$user_instance1 = new user;
		$param=" WHERE `login` = '".$VerifLogin."'";
		$user_instance1->hydrate($param);
		$user_instance1->setPassword(sha1($NewPass));
		$user_instance1->save();
}

/*--------------------Description----------------------
	
------------------------------------------------------*/
function Description($idUser, $description)
{
	$user_instance1 = new user;
		$user_instance1->setidUser($idUser);
		$user_instance1->hydrate();

	$user_instance2 = new User;
		$user_instance2->setidUser($user_instance1->getidUser());
		$user_instance2->setLogin($user_instance1->getLogin());
		$user_instance2->setPassword($user_instance1->getPassword());
		$user_instance2->setCode($user_instance1->getCode());
		$user_instance2->setDescription(htmlspecialchars($description));
		$user_instance2->save();
}

/*--------------------checkcode----------------------
	
------------------------------------------------------*/
function checkcode($code)
{
	$checkcode = new Code;
	$param=" WHERE `code`='".$code."'";
	$result=$checkcode->getAll($param);
	return $result;
}