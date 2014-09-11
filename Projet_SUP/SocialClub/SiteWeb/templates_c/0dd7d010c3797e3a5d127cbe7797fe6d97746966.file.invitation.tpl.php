<?php /* Smarty version Smarty-3.1.13, created on 2013-05-30 18:42:30
         compiled from "C:\wamp\www\Dropbox\SocialClub\SiteWeb\templates\invitation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:564751a78176b0a0b3-87169386%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0dd7d010c3797e3a5d127cbe7797fe6d97746966' => 
    array (
      0 => 'C:\\wamp\\www\\Dropbox\\SocialClub\\SiteWeb\\templates\\invitation.tpl',
      1 => 1369853498,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '564751a78176b0a0b3-87169386',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error_invit_email' => 0,
    'sucess' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51a78176b79016_70114367',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a78176b79016_70114367')) {function content_51a78176b79016_70114367($_smarty_tpl) {?><div id="invitation">
	<div id="invitation_header">
		<div class="connexion_titre">Invitez vos amis &agrave; rejoindre le r&eacute;seau</div>
		<img class="trait_connexion" src="./images/trait_connexion.png" >
	</div>
	<form action="index.php?action=invitation" method="post">
		<table>
			<tr>
				<td>Entrez l'email de la personne que vous voulez inviter :</td>
				<td><input type="text" name="invit_email" id="invite"></td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;
					<?php if (isset($_smarty_tpl->tpl_vars['error_invit_email']->value)){?><span style='color:red'><?php echo $_smarty_tpl->tpl_vars['error_invit_email']->value;?>
</span><?php }?>

					<?php if (isset($_smarty_tpl->tpl_vars['sucess']->value)){?><span class="success"><?php echo $_smarty_tpl->tpl_vars['sucess']->value;?>
</span><?php }?>
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" id="invitation_submit" value="Inviter"></td>
			</tr>
		</table>
	</form>
</div><?php }} ?>