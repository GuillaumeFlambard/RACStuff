<?php
session_start();
//on inclue les fichiers de conf
include ('Models/dbtools.php');
include ('Models/config.php');
//on inclue les classes

//Data base connect
$link = mysqli_connect($config['bdd']['server'],
	$config['bdd']['user'],
	$config['bdd']['pass'],
	$config['bdd']['base']);

$action = $config['defaults']['action'];

if (!empty($_GET['action']))
	$action = $_GET['action'];

if(!array_key_exists($action, $config['routes']))
	die('Action doesn\'t exist');

if($action == $config['defaults']['action'])
	include ('views/loading.php');
else
	include ('controler.php');

$actiongroup_path = $config['routes'][$action];

if (!empty($view))
	include($view);


?>