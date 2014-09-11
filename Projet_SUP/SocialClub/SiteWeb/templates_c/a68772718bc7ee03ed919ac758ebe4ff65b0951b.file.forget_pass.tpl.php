<?php /* Smarty version Smarty-3.1.13, created on 2013-05-29 12:35:12
         compiled from "C:\wamp\www\SocialMoustacheClub\SiteWeb\templates\forget_pass.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1032551a5f23514c149-94990632%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a68772718bc7ee03ed919ac758ebe4ff65b0951b' => 
    array (
      0 => 'C:\\wamp\\www\\SocialMoustacheClub\\SiteWeb\\templates\\forget_pass.tpl',
      1 => 1369830909,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1032551a5f23514c149-94990632',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51a5f2352297d6_33774923',
  'variables' => 
  array (
    'error_conf_login' => 0,
    'error_conf_email' => 0,
    'error_pass' => 0,
    'error_confpass' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a5f2352297d6_33774923')) {function content_51a5f2352297d6_33774923($_smarty_tpl) {?><div id="forget_pass">
	<div id="forget_pass_header">
		<div class="connexion_titre">Changer de mot de passe</div>
		<img class="trait_connexion" src="./images/trait_connexion.png" >
	</div>
	<form action="index.php?action=change_pass" method="post">
		<table>
			<tr>
				<td>Taper votre login.</td>
				<td><input type="text" name="conf_login"></td>
			</tr>
			<tr>
				<td colspan="2" class="error">&nbsp;&nbsp;
					<?php if (!empty($_smarty_tpl->tpl_vars['error_conf_login']->value)){?>
						<?php echo $_smarty_tpl->tpl_vars['error_conf_login']->value;?>

					<?php }?>
				</td>
			</tr>
			<tr>
				<td>Taper votre email.</td>
				<td><input type="text" name="conf_email"></td>
			</tr>
			<tr>
				<td colspan="2" class="error">&nbsp;&nbsp;
					<?php if (!empty($_smarty_tpl->tpl_vars['error_conf_email']->value)){?>
						<?php echo $_smarty_tpl->tpl_vars['error_conf_email']->value;?>

					<?php }?>
				</td>
			</tr>
			<tr>
				<td>Taper votre nouveau mot de passe.</td>
				<td><input type="password" name="new_password"></td>
			</tr>
			<tr>
				<td colspan="2" class="error">&nbsp;&nbsp;
					<?php if (!empty($_smarty_tpl->tpl_vars['error_pass']->value)){?>
						<?php echo $_smarty_tpl->tpl_vars['error_pass']->value;?>

					<?php }?>
				</td>
			</tr>
			<tr>
				<td>Comfirmer votre nouveau mot de passe.</td>
				<td><input type="password" name="new_conf_password"></td>
			</tr>
			<tr>
				<td colspan="2" class="error">&nbsp;&nbsp;
					<?php if (!empty($_smarty_tpl->tpl_vars['error_confpass']->value)){?>
						<?php echo $_smarty_tpl->tpl_vars['error_confpass']->value;?>

					<?php }?>
				</td>
			</tr>
			<tr>
				<td colspan="2" id="submit_change_pass"><input type="submit" value="Confirmer" class="grey_submit_button"></td>
			</tr>
		</table>
	</form>
</div><?php }} ?>