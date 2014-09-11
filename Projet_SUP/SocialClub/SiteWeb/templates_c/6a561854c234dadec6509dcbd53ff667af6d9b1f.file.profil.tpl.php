<?php /* Smarty version Smarty-3.1.13, created on 2013-05-31 11:12:39
         compiled from "C:\Users\SUPINTERNET\Dropbox\SocialClub\SiteWeb\templates\profil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1662551a86987800249-47659960%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a561854c234dadec6509dcbd53ff667af6d9b1f' => 
    array (
      0 => 'C:\\Users\\SUPINTERNET\\Dropbox\\SocialClub\\SiteWeb\\templates\\profil.tpl',
      1 => 1369952606,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1662551a86987800249-47659960',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pseudo' => 0,
    'description' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51a869879b9489_05555391',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a869879b9489_05555391')) {function content_51a869879b9489_05555391($_smarty_tpl) {?>	<div id="left_part">
		<div id="description_content">
			<div id="pseudo_profil"><?php echo $_smarty_tpl->tpl_vars['pseudo']->value;?>
</div>
			<div id="photo_profil">
				<img src="users/<?php echo $_smarty_tpl->tpl_vars['pseudo']->value;?>
/photo_profil/<?php echo $_smarty_tpl->tpl_vars['pseudo']->value;?>
.jpg" width="380">
				<a href="index.php?action=deleteProfilePicture"><img id="icone_supprimer_photo" src="./images/supprimer.png" width="20"></a>
			</div>
			<div id="description_profil">
				<?php echo $_smarty_tpl->tpl_vars['description']->value;?>

			</div>
			<form action="index.php?action=description" method="post">
					<table>
						<tr>
							<td><textarea rows='5' cols='55' name='ContenuDescription' maxlength='255' placeholder="Composer votre description en 255 caract&egrave;res..." id="contenu_description"></textarea></td>
						</tr><tr><td></td></tr>
						<tr>
							<td><input type="submit" value="Sauvegarder" class="grey_submit_button"></td>
						</tr>
					</table>
				</form>
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
				<div class="connexion_titre">Derniers messages priv&eacute;s re&ccedil;us</div>
				<img class="trait_connexion" src="./images/trait_connexion.png" >
			</div>
			<div id="messages">
			</div>
		</div>

		<div id="amis_content">
			<div id="amis_header">
				<div class="connexion_titre">Amis</div>
				<img class="trait_connexion" src="./images/trait_connexion.png" >
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
	<div id="importer_photo">
		<form action="index.php?action=upload_img" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Importez vos photos:</td><td><input type="file" name="file"></td>
				</tr>
				<tr>
					<td>Ajoutez une legende a votre image:</td><td><textarea rows='3' cols='30' name="legende"></textarea></td>
				</tr>
				<tr><td colspan="2"><input type="submit" name="submit_image" value="importer" class="grey_submit_button"><td></tr>
			</table>
		</form>
	</div>
	<div id="photos_content">
		<div class="clear"></div>
		<div id="photos">
		</div>
		<div class="clear"></div>
	</div>

<script>
	/* Module Photos */
	function listImages() {
		$.getJSON('index.php?action=getAllPictures&ajax', function(tableau)
		{				
			var length = tableau[0].length;
			pathPhoto = null;
			legende = null;
			$('#photos').empty();
			for (var i = 0; i < length; i++)
			{
				pathPhoto = tableau[0][i];
				legende = tableau[1][i];
				$('#photos').append('<div id="curseur" class="infobulle"></div><div onmouseover="montre(\''+legende+'\');" onmouseout="cache();" class="image_galerie"><a href="'+pathPhoto+'" rel="lightbox[photos]" title="'+legende+'"><img class="photo_utilisateur" src="'+pathPhoto+'" alt="Photos: image de l\'utilisateur"></a><div class="clear"></div><a href="index.php?action=switchProfilePicture&pathPhoto='+pathPhoto+'"><img class="icone_definir_photoProfil" src="./images/definir_profil.png" alt="definir photo de profil" width="22"></a><a href="index.php?action=deleteGaleryPicture&pathPhoto='+pathPhoto+'"><img class="icone_supprimer_photoGalerie"  src="./images/supprimer.png" alt="supprimer la photo de la galerie" width="20"></a></div>');
			}
		})
	}
	listImages();
	setInterval(listImages,4000);
	

	/* Module Tous mes Amis */
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
					$('#messages').append('<div class="message_expediteur"><img src="./users/'+login+'/photo_profil/'+login+'.jpg" id="icone_identifiant_1" width="30" height="30" height="30"><span class="statut_pseudo"><a href="index.php?action=friendOfFriend&pseudo='+login+'">'+login+'</a></span></div><div class="clear"></div><div class="message">'+content+'</div><div class="date">'+date+'</div><div class="clear"></div>');
				}
			})
	}
	listCinqDerniersMessages();
	setInterval(listCinqDerniersMessages,4000);


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
	
	
	/* Module Statuts Utilisateurs Connectés */
	function listMesStatuts() {
		$.getJSON('index.php?action=getutilisateurpost&ajax', function(tableau)
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
	listMesStatuts();
	setInterval(listMesStatuts,4000);
</script>



<?php }} ?>