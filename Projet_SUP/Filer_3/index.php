<?php
session_start();

$link = mysqli_connect("localhost","root","latiyietpirate1","dump");
if ($link == FALSE)
{
	die (mysqli_connect_error());
}
mysqli_set_charset($link, "utf8");

include ('config.php');

$action = $config['defaults']['action'];

if (!empty($_GET['action']))
	$action = $_GET['action'];

if (!array_key_exists($action, $config['routes']))
	die('action illegale');

$actiongroup_path = 'actiongroups/'.$config['routes'][$action].'_controller.php';

if (is_readable($actiongroup_path))
	include ($actiongroup_path);
else
{
	die('le fichier '.$actiongroup_path." est inexistant ou innaccessible");
}
if(isset($path))
{
	$test=substr_replace ($path, "", -1, 1);
	$recup=substr($test, strrpos($test, "/"));
	$lala=strlen($recup);
	$lili=substr_replace ($test, "", -$lala, $lala);
	$parent=$lili;
}
include ('views/main.php');
?>