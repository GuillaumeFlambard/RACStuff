<?php /* Smarty version Smarty-3.1.13, created on 2013-05-30 23:36:08
         compiled from "C:\wamp\www\Dropbox\SocialClub\SiteWeb\templates\connexion_inscription.tpl" */ ?>
<?php /*%%SmartyHeaderCode:242519f7319ea41f7-24332612%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07d6587cc1c73d8a1eaebddf21bee19c90ce7817' => 
    array (
      0 => 'C:\\wamp\\www\\Dropbox\\SocialClub\\SiteWeb\\templates\\connexion_inscription.tpl',
      1 => 1369949733,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '242519f7319ea41f7-24332612',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_519f7319f01394_18726825',
  'variables' => 
  array (
    'NewMotDePasse' => 0,
    'FailInscription' => 0,
    'error_code' => 0,
    'error_identifiant' => 0,
    'error_pass' => 0,
    'error_confpass' => 0,
    'error_email' => 0,
    'SuccessInscription' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_519f7319f01394_18726825')) {function content_519f7319f01394_18726825($_smarty_tpl) {?><div id="wrapper_connexion_inscription">
	<div id="connexion_content">
		<div id="connexion_header">
			<div class="connexion_titre">Connexion</div> 
			<img class="trait_connexion" src="images/trait_connexion.png" alt="trait_connexion">
		</div>
	<form action="index.php?action=connexion" method="post" id="form1">
		<div class="identifiants">
				<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30" height="30" alt="icone_identifiant_1">
				<span class="connexion_label">Login</span>
				<input class="connexion_input" type="text" name="login">
				<div class="clear"></div>
				<div class="trait_label"></div>
				<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30" height="30" alt="icone_identifiant_1">
				<span class="connexion_label_pass">Password</span>
				<input type="password" class="connexion_input" name="password">
				<div class="trait_label"></div>
			</div>
			<input class="submit" type="submit" value="se connecter">
	</form><br>
<p  class="success">
	<?php if (!empty($_smarty_tpl->tpl_vars['NewMotDePasse']->value)){?>
		<?php echo $_smarty_tpl->tpl_vars['NewMotDePasse']->value;?>

	<?php }?>
</p>
<p class="error">
	<?php if (!empty($_smarty_tpl->tpl_vars['FailInscription']->value)){?>
		<?php echo $_smarty_tpl->tpl_vars['FailInscription']->value;?>

	<?php }?><br>
</p>
<a href="index.php?action=forget_pass">Vous avez oubli&eacute; votre mot de passe ?</a>

		</div>
	<div id="inscription_content">
			<div id="inscription_header">
				<div class="connexion_titre">Nouveau?</div>
				<img class="trait_connexion" src="images/trait_connexion.png" alt="trait_connexion">
			</div>
		<form action="index.php?action=inscription" method="post">
			<table id="form_inscription">
				<tr>
					<td class="champs_inscription">Code :</td>
					<td class="champs_inscription"><input type="text" class="inscription_input" name="code"></td>
				</tr>
				<tr>
					<td colspan="2" class="error">&nbsp;&nbsp;						
						<?php if (!empty($_smarty_tpl->tpl_vars['error_code']->value)){?>
							<?php echo $_smarty_tpl->tpl_vars['error_code']->value;?>

						<?php }?>
					</td>
				</tr>
				<tr>
					<td class="champs_inscription">Login :</td>
					<td class="champs_inscription"><input type="text" class="inscription_input" name="identifiant"></td>
				</tr>
				<tr>
					<td colspan="2" class="error">&nbsp;&nbsp;
						<?php if (!empty($_smarty_tpl->tpl_vars['error_identifiant']->value)){?>
							<?php echo $_smarty_tpl->tpl_vars['error_identifiant']->value;?>

						<?php }?>
					</td>
				</tr>
				<tr>
					<td class="champs_inscription">Password :</td>
					<td class="champs_inscription"><input type="password" class="inscription_input" name="pass"></td>
				</tr>
				<tr>
					<td colspan="2" class="error">&nbsp;&nbsp;
						<?php if (!empty($_smarty_tpl->tpl_vars['error_pass']->value)){?>
							<?php echo $_smarty_tpl->tpl_vars['error_pass']->value;?>

						<?php }?>
					</td>
				</tr>
				<tr>
					<td class="champs_inscription">Confirm Password :</td>
					<td class="champs_inscription"><input type="password" class="inscription_input" name="confpass"></td>
				</tr>
				<tr>
					<td colspan="2" class="error">&nbsp;&nbsp;
						<?php if (!empty($_smarty_tpl->tpl_vars['error_confpass']->value)){?>
							<?php echo $_smarty_tpl->tpl_vars['error_confpass']->value;?>

						<?php }?>
					</td>
				</tr>
				<tr>
					<td class="champs_inscription">Email :</td>
					<td class="champs_inscription"><input type="text" class="inscription_input" name="email"></td>
				</tr>
				<tr>
					<td colspan="2" class="error">&nbsp;&nbsp;
						<?php if (!empty($_smarty_tpl->tpl_vars['error_email']->value)){?>
							<?php echo $_smarty_tpl->tpl_vars['error_email']->value;?>

						<?php }?>
					</td>
				</tr>
				<tr>
					<td colspan="2"><input class="submit" type="submit" value="S'inscrire"></td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2" class="success">&nbsp;&nbsp;
						<?php if (!empty($_smarty_tpl->tpl_vars['SuccessInscription']->value)){?>
							<?php echo $_smarty_tpl->tpl_vars['SuccessInscription']->value;?>

						<?php }?>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div><?php }} ?>