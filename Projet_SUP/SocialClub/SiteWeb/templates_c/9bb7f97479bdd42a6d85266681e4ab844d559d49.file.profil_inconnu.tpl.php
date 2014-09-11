<?php /* Smarty version Smarty-3.1.13, created on 2013-05-31 00:46:58
         compiled from "C:\wamp\www\Dropbox\SocialClub\SiteWeb\templates\profil_inconnu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1871851a77f28bed7a6-21614800%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9bb7f97479bdd42a6d85266681e4ab844d559d49' => 
    array (
      0 => 'C:\\wamp\\www\\Dropbox\\SocialClub\\SiteWeb\\templates\\profil_inconnu.tpl',
      1 => 1369948487,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1871851a77f28bed7a6-21614800',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51a77f28cbc3f0_60888528',
  'variables' => 
  array (
    'inconnu' => 0,
    'icone_ajout_ami' => 0,
    'description' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a77f28cbc3f0_60888528')) {function content_51a77f28cbc3f0_60888528($_smarty_tpl) {?>	<div id="left_part">
		<div id="description_content">
			<div id="pseudo_profil"><?php echo $_smarty_tpl->tpl_vars['inconnu']->value;?>
<?php echo $_smarty_tpl->tpl_vars['icone_ajout_ami']->value;?>
</div>
			
			<div id="photo_profil">
				<img src="users/<?php echo $_smarty_tpl->tpl_vars['inconnu']->value;?>
/photo_profil/<?php echo $_smarty_tpl->tpl_vars['inconnu']->value;?>
.jpg" width="380">
			</div>
			<div id="description_profil">
				<?php echo $_smarty_tpl->tpl_vars['description']->value;?>

			</div>
		</div>
		<div id="utilisateur_inconnu"></div>
	</div>

	<div id="right_part_inconnu">
		<div id="fil_statuts_content_pageProfilInconnu">
			<div id="statut_header">
				<div class="connexion_titre">Statuts de vos amis</div>
				<img class="trait_connexion" src="./images/trait_connexion.png" >
			</div>
			<table id="all"></table>
		</div>
	</div>
	<div class="clear"></div>


<script>	
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
	
	
	/* Module affiche le dernier statut Utilisateurs inconnu */
	function GetPostInconnu() {
		$.getJSON('index.php?action=DernierPostInconnu&ajax&pseudo=<?php echo $_smarty_tpl->tpl_vars['inconnu']->value;?>
', function(tableau)
		{				
			var length = tableau[0].length;
			statutUtilisateur = null;
			dateUtilisateur = null;
			loginUtilisateur = null;
			$('#utilisateur_inconnu').empty();
			for (var i = 0; i < length; i++)
			{
				statutUtilisateur = tableau[0][i];
				dateUtilisateur = tableau[1][i];
				loginUtilisateur = tableau[2][i];
				$('#utilisateur_inconnu').append('<div id="statuts_profil_content"><img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px"><span class="statut_pseudo">'+loginUtilisateur+'</span><div class="statut">'+statutUtilisateur+'</div><div class="clear">'+dateUtilisateur+'</div><div class="trait_label"></div></div>');
			}
		})
	}
	GetPostInconnu();
	setInterval(GetPostInconnu,4000);
</script>



<?php }} ?>