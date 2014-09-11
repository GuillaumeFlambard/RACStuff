<?php /* Smarty version Smarty-3.1.13, created on 2013-05-31 15:01:38
         compiled from "C:\wamp\www\Dropbox\SocialClub\SiteWeb\templates\interface.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3020751a77f4e024ba4-87453079%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d6d24732a7d8984fe9ee32c759aaf8f8b224ef2' => 
    array (
      0 => 'C:\\wamp\\www\\Dropbox\\SocialClub\\SiteWeb\\templates\\interface.tpl',
      1 => 1369992487,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3020751a77f4e024ba4-87453079',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51a77f4e099476_87701190',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a77f4e099476_87701190')) {function content_51a77f4e099476_87701190($_smarty_tpl) {?>	<div id="statuts_content">
	</div>	

	<div id="messagerie_content">
		<div id="messagerie_header">
			<div class="connexion_titre">Messagerie</div>
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

	<div class="clear"></div>

</div>
	<div id="photos_header">
		<span class="entete">Photos </span>
	</div>
<div class="wrapper">
	<div id="photos_content">
		<div id="photos">		
			<script type="text/javascript">

		</script>
		</div>
	</div>

<script>

	function listLastPictures() {
		$.getJSON('index.php?action=getLastPictures&ajax', function(tableau) {					
			var length = tableau[0].length;			//longueur du tableau retourné par la requete 
			login = null;
			path = null;
			legend = null;
			$('.carousel').empty();
			for (var i = 0; i < length; i++) 
			{
				login = tableau[0][i];
				path = tableau[1][i];
				legend = tableau[2][i];
				$('.carousel').append('<div id="curseur" class="infobulle"></div><ul><li><div class="image_galerie"><a href="'+path+'" rel="lightbox[photos]" title="'+legend+'"><img onmouseover="montre(\''+legend+'\');" onmouseout="cache();" src="'+path+'" alt="Photos: image de l\'ami" height="250"></a></div></li></ul>');
			}
							$(document).ready(function(){
				// Set the interval to be 5 seconds
				var t = setInterval(function(){
					$(".carousel ul").animate({ marginLeft : -480 },1000,function(){
						$(this).find("li:last").after($(this).find("li:first"));
						$(this).css({ marginLeft : 0 } );
					})
				},4000);
			});
		});
	}
	listLastPictures();
	setInterval(listLastPictures,4000);

	/* Module Tous les Amis */
	var page = 0;
	$('#next_button').click(function() {
		page++;			//on incrémente le numéro de la page
		listFriends();		//on appelle la fonction qui liste les amis pour ne pas attendre les 4 secondes de l'interval
	});
	$('#previous_button').click(function() {
		page--;
		listFriends();
	});
	function listFriends(){			//fonction qui va lister tous les amis dans la div correspondante
		$.getJSON('index.php?action=getAllFriends&ajax', function(friends) {					
			var length = friends.length,			//longueur du tableau retourné par la requete getAllFriends()
			friend = null;
			
			var i = 0;
			for (var j = 1; j <= 2; j++) {
				$('#amis_colonne_'+j).empty();			//vide la div avant d'y insérer les amis
			
				for (; i < 13*j && (i + 26 * page)< length; i++) {
					friend = friends[i + 26 * page];			//on retrouve la key de l'ami dans le tableau retourné par la requete en fonction du numero de la page
					$('#amis_colonne_'+j).append('<img src="./users/'+friend+'/photo_profil/'+friend+'.jpg" class="icone_identifiant_1" width="30" height="30"><span class="statut_pseudo_amis"><a href="index.php?action=friend&pseudo='+friend+'">'+friend+'</a></span><div class="clear"></div>');
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
	listFriends();
	setInterval (listFriends,4000);			//la div va refresh toutes les 4 secondes

	/* Module all Statuts interface */
	function listAllStatutsInterface() {
		$.getJSON('index.php?action=ListStatutsInterface&ajax', function(tableau)
		{				
			var length = tableau[0].length;
			statut = null;
			date = null;
			login = null;
			$('#statuts_content').empty();
			for (var i = 0; i < length; i++)
			{
				statut = tableau[0][i];
				date = tableau[1][i];
				login = tableau[2][i];
				$('#statuts_content').append('<img src="users/'+login+'/photo_profil/'+login+'.jpg" class="icone_identifiant_1" width="30" height="30"><span class="statut_pseudo">'+login+'</span><div class="statut">'+statut+'</div><div class="clear"></div>'+date+'<div class="trait_label"></div>');
			}
		})
	}
	listAllStatutsInterface();
	setInterval(listAllStatutsInterface,4000);

	/* Module 5 derniers Messages */
	function listCinqDerniersMessages()
	{
		$.getJSON('index.php?action=getMessagesList&ajax', function(tableau)
		{
			var length = tableau[0].length;
			content = null;
			date = null;
			login = null;
			$('#messages').empty();
				for (var i = 0; i < length; i++)
				{
					content = tableau[0][i];
					date = tableau[1][i];
					login = tableau[2][i];
					$('#messages').append('<div class="message_expediteur"><img src="./users/'+login+'/photo_profil/'+login+'.jpg" class="icone_identifiant_1" width="30" height="30" height="30"><span class="statut_pseudo"><a href="index.php?action=friend&pseudo='+login+'">'+login+'</a></span></div><div class="clear"></div><div class="message">'+content+'</div><div class="date">'+date+'</div><div class="clear"></div>');
				}
			})
	}
	listCinqDerniersMessages();
	setInterval(listCinqDerniersMessages,4000);
</script>
	<?php }} ?>