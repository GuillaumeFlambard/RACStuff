<?php
session_start();
include ('includes/config.php');
include('includes/tools.php');
include('libs/smarty/Smarty.class.php');
include('./class/phpmailer.class.php');
date_default_timezone_set("Europe/Zurich");

include ('./class/table.class.php');
include ('./class/code.class.php');
include ('./class/image.class.php');
include ('./class/message.class.php');
include ('./class/relationship.class.php');
include ('./class/statut.class.php');
include ('./class/user.class.php');
$affiche= new Smarty();


//connecter a la base de donnee
$link = mysqli_connect($config['bdd']['server'],
	$config['bdd']['user'],
	$config['bdd']['pass'],
	$config['bdd']['base']);

$action = $config['defaults']['action'];

if (!empty($_GET['action']))
	$action = $_GET['action'];

if (!array_key_exists($action, $config['routes']))
{
	$affiche->assign('config',$config['erreurs']['action_illegale']);
	$template=__DIR__."./templates/erreur.tpl";
	$affiche->assign('template',$template);
	$affiche->display('./views/main.tpl');
	exit();
}

$actiongroup_path = 'actiongroups/'.$config['routes'][$action].'_controller.php';

if (is_readable($actiongroup_path))
	include ($actiongroup_path);
else
	die('le fichier '.$actiongroup_path." est inexistant ou innaccessible");

if(isset($_SESSION['login']))
{
	$affiche->assign('header',$_SESSION['login']);
}
else
{
	$affiche->assign('header','');
}
if (!isset($_GET['ajax']))
	$affiche->display('./views/main.tpl');
?>