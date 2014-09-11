<?php /* Smarty version Smarty-3.1.13, created on 2013-05-31 11:16:59
         compiled from "C:\Users\SUPINTERNET\Dropbox\SocialClub\SiteWeb\templates\utilisateurs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1800451a86a8be49a14-25259219%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '677be082587b65416ffb75851b71c7898a835b62' => 
    array (
      0 => 'C:\\Users\\SUPINTERNET\\Dropbox\\SocialClub\\SiteWeb\\templates\\utilisateurs.tpl',
      1 => 1369948487,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1800451a86a8be49a14-25259219',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51a86a8c029e77_45794673',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a86a8c029e77_45794673')) {function content_51a86a8c029e77_45794673($_smarty_tpl) {?>	<div id="utilisateurs_content">
		<div id="utilisateurs_header">
			<div class="connexion_titre">Utilisateurs</div>
			<img class="trait_connexion" src="images/trait_connexion.png" >
		</div>
		<div id="utilisateurs">
			<button name="previous_page" id="previous_button">&lt;</button>
			<div id="utilisateurs_colonne_1">
			</div>
			<div id="utilisateurs_colonne_2">
			</div>
			<div id="utilisateurs_colonne_3">
			</div>
			<button name="next_page" id="next_button">&gt;</button>
		</div>
	</div>
	
	<div id="demandes_ami">
		<div id="demandes_header">
			<div class="connexion_titre">Demandes d'amiti&eacute;</div>
			<img class="trait_connexion" src="images/trait_reduit.png" >
		</div>
		<div id="liste_demandes_ami">
		</div>
	</div>

	<div id="fil_statuts_content_pageUtilisateurs">
		<div id="statut_header">
			<div class="connexion_titre">Statuts de vos amis</div>
			<img class="trait_connexion" src="./images/trait_connexion.png" >
		</div>
		<table id="postutilisateur"></table>
	</div>

	<script>
	/* Module Mes Demandes d'amis */
	function listDemandesAmis() {
		$.getJSON('index.php?action=getAllRequests&ajax', function(logins)
		{				
			var length = logins.length;
			login = null;
			$('#liste_demandes_ami').empty();
			for (var i = 0; i < length; i++)
			{
				login = logins[i];
				$('#liste_demandes_ami').append('<div class="demande_ami"><img src="users/'+login+'/photo_profil/'+login+'.jpg" class="icone_identifiant_1" width="30" height="30"><span class="nom_user">'+login+'</span><a href="index.php?action=acceptFriend&friend='+login+'"><img class="icone_confirmer" src="images/confirm-relation.png" alt="confirmer la demande d\'ami" width="20"></a><div class="clear"></div><div class="trait_label"></div></div>');
			}
		})
	}
	listDemandesAmis();
	setInterval(listDemandesAmis,4000);
	
	/* Module 10 derniers Statuts */
	function listDixDerniersStatuts() {
		$.getJSON('index.php?action=getpostlist&ajax', function(tableau)
		{				
			var length = tableau[0].length;
			statut = null;
			date = null;
			login = null;
			$('#postutilisateur').empty();
			for (var i = 0; i < length; i++)
			{
				statut = tableau[0][i];
				date = tableau[1][i];
				login = tableau[2][i];
				$('#postutilisateur').append('<tr><td class="all_td"><img src="./users/'+login+'/photo_profil/'+login+'.jpg" class="icone_identifiant_1" width="30" height="30"><span class="fil_statut_pseudo">'+login+'</span></td></tr><tr><td class="all_td"><div class="fil_statut_pageProfil">'+statut+'</td></tr><div class="clear"></div>'+date+'<div class="trait_label"></div><tr><td>&nbsp;</td></tr>');
			}
		})
	}
	listDixDerniersStatuts();
	setInterval(listDixDerniersStatuts,4000);
	

	/* Module Utilisateurs */
		var page = 0;
		$('#next_button').click(function() {
			page++;			//on incrémente le numéro de la page
			listUsers();		//on appelle la fonction qui liste les utilisateurs pour ne pas attendre les 4 secondes de l'interval
		});
		$('#previous_button').click(function() {
			page--;
			listUsers();
		});
		function listUsers(){			//fonction qui va lister tous les utilisateurs dans la div correspondante
			$.getJSON('index.php?action=getAllUsers&ajax', function(users) {
				var length = users.length,			//longueur du tableau retourné par la requete getAllUsers()
				user = null;
				
				var i = 0;
				for (var j = 1; j <= 3; j++) {
					$('#utilisateurs_colonne_'+j).empty();			//vide la div avant d'y insérer les utilisateurs
				
					for (; i < 12*j && (i + 36 * page)< length; i++) {
						user = users[i + 36 * page];			//on retrouve la key du user dans le tableau retourné par la requete en fonction du numero de la page
						
						if (user['relation'] == 'friend')
							$('#utilisateurs_colonne_'+j).append('<div class="ligne_user"><img src="./users/'+user['login']+'/photo_profil/'+user['login']+'.jpg" class="icone_identifiant_1" width="30" height="30"><span class="statut_pseudo"><a href="index.php?action=friend&pseudo='+user['login']+'">'+user['login']+'</a></span></div><div class="clear"></div>');
						else if (user['relation'] == 'requestsByMe')
							$('#utilisateurs_colonne_'+j).append('<div class="ligne_user"><img src="./users/'+user['login']+'/photo_profil/'+user['login']+'.jpg" class="icone_identifiant_1" width="30" height="30"><span class="statut_pseudo"><a href="index.php?action=inconnu&pseudo='+user['login']+'">'+user['login']+'</a></span><img class="en_attente" src="./images/wait-relation.png" alt="icone en attente de sa reponse" width="20"></div><div class="clear"></div>');
						else if (user['relation'] == 'requestsByYou')
							$('#utilisateurs_colonne_'+j).append('<div class="ligne_user"><img src="./users/'+user['login']+'/photo_profil/'+user['login']+'.jpg" class="icone_identifiant_1" width="30" height="30"><span class="statut_pseudo"><a href="index.php?action=inconnu&pseudo='+user['login']+'">'+user['login']+'</a></span><img class="question" src="./images/question.png" alt="icone en attente de votre reponse" width="18"></div><div class="clear"></div>');
						else if (user['relation'] == 'unknown')
							$('#utilisateurs_colonne_'+j).append('<div class="ligne_user"><img src="./users/'+user['login']+'/photo_profil/'+user['login']+'.jpg" class="icone_identifiant_1" width="30" height="30"><span class="statut_pseudo"><a href="index.php?action=inconnu&pseudo='+user['login']+'">'+user['login']+'</a></span><a href="index.php?action=addFriend&friend='+user['login']+'"><img class="ajouter_amis" src="./images/ajouter.png"></a></div><div class="clear"></div>');
						//on insère un nouvelle ligne pour chaque utilisateur dans la div colonne correspondante
					}
				}
				
				if (page <= 0)			//le bouton "précédent" ne s'affiche pas à la première page
					$('#previous_button').css('display', 'none');
				else
					$('#previous_button').css('display', 'block');
					
				if (page >= Math.floor(length/36))			//le bouton "suivant" ne s'affiche pas à la dernière page
					$('#next_button').css('display', 'none');
				else
					$('#next_button').css('display', 'block');
			})
		}
		listUsers();
		setInterval (listUsers,4000);			//la div va refresh toutes les 4 secondes
	</script>


<?php }} ?>