<?php

$config['routes'] = array(
					"home" => "repertoire",
					"suppr_repertoire" => "repertoire",
					"cree_repertoire"	=> "repertoire",
					"renom_repertoire" => "repertoire",
					"deplace_repertoire" => "repertoire",
					"copie_repertoire" => "repertoire",
					"prise_deplacement_dir" => "repertoire",
					"copie_dossier_prise" => "repertoire",
					
					"suppr_fichier" => "fichier",
					"cree_fichier" => "fichier",
					"renom_fichier" => "fichier",
					"deplace_fichier" => "fichier",
					"copie_fichier" => "fichier",
					"copie_fichier_prise" => "fichier",
					"prise_deplacement_file" => "fichier",
					"upload_fichier" => "fichier",
					"download_fichier" => "fichier",
					
					"acceuil_inscription" => "acceuil",
					"acceuil_connection" => "acceuil",
					"deconnection" => "acceuil"
);

$config['defaults']['action'] = "home";

//$path_default="files/";
$path_default="var/www/Filer_3/files/";

?>