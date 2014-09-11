<?php

// login BDD
$config['bdd']['server'] = "127.0.0.1";
$config['bdd']['user'] = "warlord";
$config['bdd']['pass'] = "tournament";
$config['bdd']['base'] = "warlordtournament";

// config['routes'] Legal Action list to controler
$config['routes'] = array(
		"home" => "controler",
		"attack" => "controler",
		"setGame" => "controler"
);

// default action : params, me + opponent
$config['defaults']['action'] = "home";