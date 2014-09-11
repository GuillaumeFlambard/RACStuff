<?php /* Smarty version Smarty-3.1.13, created on 2013-05-30 13:42:06
         compiled from "C:\wamp\www\SocialMoustacheClub\SiteWeb\templates\connexion_inscription.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2399951a3f43673e3f8-83027552%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f765f5be40c8fb56fa2bc1def5c0c536a5947881' => 
    array (
      0 => 'C:\\wamp\\www\\SocialMoustacheClub\\SiteWeb\\templates\\connexion_inscription.tpl',
      1 => 1369913842,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2399951a3f43673e3f8-83027552',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51a3f43696f9f8_05159189',
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
<?php if ($_valid && !is_callable('content_51a3f43696f9f8_05159189')) {function content_51a3f43696f9f8_05159189($_smarty_tpl) {?><div id="wrapper_connexion_inscription">
	<div id="connexion_content">
		<div id="connexion_header">
			<div class="connexion_titre">Connexion</div> 
			<img class="trait_connexion" src="images/trait_connexion.png" >
		</div>
			<div class="identifiants">
	<form action="index.php?action=connexion" method="post" id="form1">
				<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30" height="30">
				<span class="connexion_label">Login</span>

				<input class="connexion_input" type="text" name="login">
				<div class="clear"></div>
				<div class="trait_label"></div>
				<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30" height="30">
				<span class="connexion_label_pass">Password</span>
				<Input type="password" class="connexion_input" name="password">
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
				<img class="trait_connexion" src="images/trait_connexion.png" >
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