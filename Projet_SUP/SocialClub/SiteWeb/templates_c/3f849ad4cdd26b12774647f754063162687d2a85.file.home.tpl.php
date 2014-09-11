<?php /* Smarty version Smarty-3.1.13, created on 2013-05-27 14:01:37
         compiled from "C:\wamp\www\Dropbox\SocialClub\SiteWeb\templates\home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31675519f858e1dc605-93178845%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f849ad4cdd26b12774647f754063162687d2a85' => 
    array (
      0 => 'C:\\wamp\\www\\Dropbox\\SocialClub\\SiteWeb\\templates\\home.tpl',
      1 => 1369663024,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31675519f858e1dc605-93178845',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_519f858e2f1312_57452116',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_519f858e2f1312_57452116')) {function content_519f858e2f1312_57452116($_smarty_tpl) {?><div id="content">
	<div id="pseudo_photo">
			<div id="photo_profil">

			</div>
			<a href="index.php?action=deconnexion">Deconnexion</a>
	</div>

	<article id="status">
			<table border="1" id="all"></table>
		<br />
		<br />
		<form action="index.php?action=CreationStatut" method="post">
			<table>
				<tr>
					<td><textarea rows='3' cols='20' name='ContenuStatut' maxlength='140'></textarea></td>
				</tr>
				<tr>
					<td><input type="submit" value="Sauvegarder" /></td>
				</tr>
			</table>
		</form>
		<table border ="1" id="utilisateur"></table>
	</article>
	<script>
	setInterval(
			function()
			{
					$.getJSON('index.php?action=getpostlist&ajax', function(tableau)
					{				
						var length = tableau.length,
						statut = null;
						$('#all').empty();
						for (var i = 0; i < length; i++)
						{
							statut = tableau[i];
							$('#all').append('<tr><td>'+statut+'</td></tr>');
						}
					})
			},2000
				);
	setInterval(
			function()
			{
					$.getJSON('index.php?action=getutilisateurpost&ajax', function(tableau)
					{				
						var length = tableau.length,
						statut = null;
						$('#utilisateur').empty();
						for (var i = 0; i < length; i++)
						{
							statut = tableau[i];
							$('#utilisateur').append('<tr><td>'+statut+'</td></tr>');
						}
					})
			},2000
				);
	</script>
			
</div><?php }} ?>