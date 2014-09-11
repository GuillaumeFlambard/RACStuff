<?php /* Smarty version Smarty-3.1.13, created on 2013-05-30 17:21:51
         compiled from "C:\wamp\www\SocialMoustacheClub\SiteWeb\templates\profil_ami.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2972251a5cb7862d9a3-37657944%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94a1f4561f82cb059a8789f303218b1502d277dc' => 
    array (
      0 => 'C:\\wamp\\www\\SocialMoustacheClub\\SiteWeb\\templates\\profil_ami.tpl',
      1 => 1369927305,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2972251a5cb7862d9a3-37657944',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51a5cb78696377_26377875',
  'variables' => 
  array (
    'friend' => 0,
    'description' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a5cb78696377_26377875')) {function content_51a5cb78696377_26377875($_smarty_tpl) {?>	<div id="left_part">
		<div id="description_content">
			<div id="pseudo_profil"><?php echo $_smarty_tpl->tpl_vars['friend']->value;?>
</div>
			<div id="photo_profil">
				<img src="users/<?php echo $_smarty_tpl->tpl_vars['friend']->value;?>
/photo_profil/<?php echo $_smarty_tpl->tpl_vars['friend']->value;?>
.jpg" width="380">
			</div>
			<div id="description_profil">
				<?php echo $_smarty_tpl->tpl_vars['description']->value;?>

			</div>
		</div>
		<div id="utilisateur"></div>
	</div>	


	<div id="right_part">
		<div id="fil_statuts_content_pageProfil">
			<div id="statut_header">
				<div class="connexion_titre">Statuts de vos amis</div>
				<img class="trait_connexion" src="./images/trait_connexion.png" >
			</div>
			<table id="all"></table>
		</div>
		
		<div id="messagerie_profil_content">
			<div id="messagerie_header">
				<div class="connexion_titre">Derni&egrave;re conversation</div>
				<img class="trait_connexion" src="images/trait_connexion.png" >
			</div>	
			<div id="messages">
			</div>
		</div>

		<div id="amis_content">
			<div id="amis_header">
				<div class="connexion_titre">Amis</div>
				<img class="trait_connexion" src="images/trait_connexion.png" >
			</div>
				<button name="previous_page" id="previous_button">&lt;</button>
			<div id="amis">
				<div id="amis_colonne_1">
				</div>
				<div id="amis_colonne_2">
				</div>
			</div>
				<button name="next_page" id="next_button">&gt;</button>
		</div>
	</div>


	<div class="clear"></div>
</div>
	<div id="photos_header">
		 <span class="entete">Photos </span>
	</div>
<div class="wrapper">
	<div id="photos_content">
		<div class="clear"></div>
		<div id="photos">
		</div>
		<div class="clear"></div>
	</div>

<script>
	/* Module Photos de l'ami */
	function listImages() {
		$.getJSON('index.php?action=getAllPicturesOfFriend&ajax&pseudo=<?php echo $_smarty_tpl->tpl_vars['friend']->value;?>
', function(tableau)
		{				
			var length = tableau[0].length;
			pathPhoto = null;
			legende = null;
			$('#photos').empty();
			for (var i = 0; i < length; i++)
			{
				pathPhoto = tableau[0][i];
				legende = tableau[1][i];
				$('#photos').append('<div class="image_galerie"><a href="'+pathPhoto+'" rel="lightbox[photos]" title="'+legende+'"><img class="photo_utilisateur" src="'+pathPhoto+'" alt="Photos: image de l\'utilisateur"></a><div class="clear"></div></div>');
			}
		})
	}
	listImages();
	setInterval(listImages,4000);
	
	
	/* Module Tous ses Amis */
	var page = 0;
	$('#next_button').click(function() {
		page++;			//on incrémente le numéro de la page
		listFriendsOfFriend();		//on appelle la fonction qui liste les amis pour ne pas attendre les 4 secondes de l'interval
	});
	$('#previous_button').click(function() {
		page--;
		listFriendsOfFriend();
	});
	function listFriendsOfFriend(){			//fonction qui va lister tous les amis dans la div correspondante
		$.getJSON('index.php?action=getAllFriendsOfFriend&ajax&pseudo=<?php echo $_smarty_tpl->tpl_vars['friend']->value;?>
', function(friends) {					
			var length = friends.length,			//longueur du tableau retourné par la requete getAllFriends()
			friend = null;
			
			var i = 0;
			for (var j = 1; j <= 2; j++) {
				$('#amis_colonne_'+j).empty();			//vide la div avant d'y insérer les amis
			
				for (; i < 13*j && (i + 26 * page)< length; i++) {
					friend = friends[i + 26 * page];			//on retrouve la key de l'ami dans le tableau retourné par la requete en fonction du numero de la page
					$('#amis_colonne_'+j).append('<img src="./users/'+friend+'/photo_profil/'+friend+'.jpg" class="icone_identifiant_1" width="30" height="30"><span class="statut_pseudo_amis"><a href="index.php?action=friendOfFriend&pseudo='+friend+'">'+friend+'</a></span><div class="clear"></div>');
					//on insère un nouvelle ligne pour chaque ami dans la div colonne correspondante
				}
			}
			
			if (page <= 0)			//le bouton "précédent" ne s'affiche pas à la première page
				$('#previous_button').css('display', 'none');
			else
				$('#previous_button').css('display', 'block');
				
			if (page >= Math.floor(length/26))			//le bouton "suivant" ne s'affiche pas à la dernière page
				$('#next_button').css('display', 'none');
			else
				$('#next_button').css('display', 'block');
		})
	}
	listFriendsOfFriend();
	setInterval (listFriendsOfFriend,4000);			//la div va refresh toutes les 4 secondes


	/* Module 5 derniers Messages Echangés avec cet ami */
	function listConversationProfil()
	{
		$.getJSON('index.php?action=getConversationProfil&friend=<?php echo $_smarty_tpl->tpl_vars['friend']->value;?>
&ajax', function(tableau)
		{
			var length = tableau.length;
			message = null;
			$('#messages').empty();
				for (var i = 0; i < length; i++)
				{
					message = tableau[i];
					$('#messages').append('<div class="message_expediteur"><img src="./users/'+message['login']+'/photo_profil/'+message['login']+'.jpg" class="icone_identifiant_1" width="30" height="30"><span class="statut_pseudo"><a href="index.php?action=getConversationProfil&friend='+message['login']+'&ajax" >'+message['login']+'</a></span></div><div class="clear"></div><span class="message">'+message['content']+'</span><div class="clear">'+message['date']+'</div>');
				}
			})
	}
	listConversationProfil();
	setInterval(listConversationProfil,4000);


	/* Module 10 derniers Statuts */
	function listDixDerniersStatuts() {
		$.getJSON('index.php?action=getpostlist&ajax', function(tableau)
		{				
			var length = tableau[0].length;
			statut = null;
			date = null;
			login = null;
			$('#all').empty();
			for (var i = 0; i < length; i++)
			{
				statut = tableau[0][i];
				date = tableau[1][i];
				login = tableau[2][i];
				$('#all').append('<tr><td class="all_td"><img src="./users/'+login+'/photo_profil/'+login+'.jpg" class="icone_identifiant_1" width="30" height="30"><span class="fil_statut_pseudo">'+login+'</span></td></tr><tr><td class="all_td"><div class="fil_statut_pageProfil">'+statut+'</td></tr><div class="clear"></div>'+date+'<div class="trait_label"></div><tr><td>&nbsp;</td></tr>');
			}
		})
	}
	listDixDerniersStatuts();
	setInterval(listDixDerniersStatuts,4000);
	
	
	/* Module Statuts de l'ami */
	function listSesStatut()
	{
		$.getJSON('index.php?action=GetPostAmi&ajax&pseudo=<?php echo $_smarty_tpl->tpl_vars['friend']->value;?>
', function(tableau)
		{
			var length = tableau[0].length;
			statutUtilisateur = null;
			dateUtilisateur = null;
			loginUtilisateur = null;
			$('#utilisateur').empty();
			for (var i = 0; i < length; i++)
			{
				statutUtilisateur = tableau[0][i];
				dateUtilisateur = tableau[1][i];
				loginUtilisateur = tableau[2][i];
				$('#utilisateur').append('<div id="statuts_profil_content"><img src="./users/'+loginUtilisateur+'/photo_profil/'+loginUtilisateur+'.jpg" class="icone_identifiant_1" width="30" height="30"><span class="statut_pseudo">'+loginUtilisateur+'</span><div class="statut">'+statutUtilisateur+'</div><div class="clear">'+dateUtilisateur+'</div><div class="trait_label"></div></div>');
			}
		})
	}
	listSesStatut();
	setInterval(listSesStatut,4000);
</script>



<?php }} ?>