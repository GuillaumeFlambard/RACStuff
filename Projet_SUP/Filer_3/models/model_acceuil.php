<?php


/*********************FUNCTIONS************************

	-my_query
	-inscription
	-connection

******************************************************/



/*----------------------my_query-----------------------

------------------------------------------------------*/
function my_query($link, $query)
{
	$result =  mysqli_query($link, $query);
	if($result === false)
	{
		die(mysqli_error($link));
	}
	else if ($result === true)
	{
		//return array(TRUE);
		return true;
	}
	else
	{
		return mysqli_fetch_all($result);
	}
}


/*----------------------inscription-----------------------

------------------------------------------------------*/
function inscription($data)
{
	$link = mysqli_connect("localhost","root","latiyietpirate1","dump");
	if ($link == FALSE)
	{
		die (mysqli_connect_error());
	}
	mysqli_set_charset($link, "utf8");
	my_query ($link,
	"INSERT INTO `membres` (`identifiant`,`mot_de_pass`)
	VALUES ('".htmlspecialchars($_POST['login'])."','".sha1($_POST['pass'])."')");
	//die("".$data."/".$_POST['login']."");

	mkdir("".$data.$_POST['login']."");
}


/*----------------------connection-----------------------

------------------------------------------------------*/
function connection()
{
	$link = mysqli_connect("localhost","root","latiyietpirate1","dump");
	if ($link == FALSE)
	{
		die (mysqli_connect_error());
	}
	//include('model_fichier');
	$data=my_query($link,"SELECT * FROM `membres`
	WHERE `identifiant` = '".$_POST['login_p1']."' AND `mot_de_pass` = '".sha1($_POST['pass_p1'])."'");
	if($data == null)
	{
		die('Erreur bdd');
	}
	else
	{
		$_SESSION['login']=$_POST['login_p1'];
		$_SESSION['pass']='connecte';
		$_SESSION['id_membre']=$data[0][0];
	}
}

?>