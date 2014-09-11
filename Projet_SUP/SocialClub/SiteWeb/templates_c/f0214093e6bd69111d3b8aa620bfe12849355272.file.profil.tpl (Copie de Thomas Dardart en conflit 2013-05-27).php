<?php /* Smarty version Smarty-3.1.13, created on 2013-05-27 15:30:35
         compiled from "C:\wamp\www\Dropbox\SocialClub\SiteWeb\templates\profil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3695519f89a0623f83-68351423%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0214093e6bd69111d3b8aa620bfe12849355272' => 
    array (
      0 => 'C:\\wamp\\www\\Dropbox\\SocialClub\\SiteWeb\\templates\\profil.tpl',
      1 => 1369668632,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3695519f89a0623f83-68351423',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_519f89a076a939_48253396',
  'variables' => 
  array (
    'pseudo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_519f89a076a939_48253396')) {function content_519f89a076a939_48253396($_smarty_tpl) {?>	<div id="left_part">
		<div id="description_content">
			<div id="photo_profil">
				<img id="" src="images/photo_profil.jpg" width="400px" />
			</div>
			<div id="pseudo_profil"><?php echo $_smarty_tpl->tpl_vars['pseudo']->value;?>
</div>
			<div id="description_profil">
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
			</div>
		</div>
		<table border ="1" id="utilisateur"></table>
	</div>	


	<div id="right_part">
		<div id="fil_statuts_content_pageProfil">
			<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
			<span class="fil_statut_pseudo">Faustine</span>
			<div class="fil_statut_pageProfil">Do what you want,’cause a pirate is free, You are a pirate!
				Yar har, fiddle di dee, Being a pirate is alright to be </div>
			<div class="clear"></div>
			<div class="trait_label"></div>
			<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
			<span class="fil_statut_pseudo">Faustine</span>
			<div class="fil_statut_pageProfil"> Do what you want,’cause a pirate is free, You are a pirate!
				Yar har, fiddle di dee, Being a pirate is alright to be Do what you want,’cause a pirate is free, You are a pirate!
				Yar har, fiddle di dee, Being a pirate is alright to beDo what you want,’cause a pirate is free, You are a pirate!
				Yar har, fiddle di dee, Being a pirate is alright to be</div>
			<div class="clear"></div>
			<div class="trait_label"></div>
			<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
			<span class="fil_statut_pseudo">Faustine</span>
			<span class="fil_statut_pageProfil">Do what you want,’cause a pirate is free, You are a pirate!
				Yar har, fiddle di dee, Being a pirate is alright to be </span>
			<div class="clear"></div>
			<div class="trait_label"></div>
			<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
			<span class="fil_statut_pseudo">Faustine</span>
			<span class="fil_statut_pageProfil">Do what you want,’cause a pirate is free, You are a pirate!
				Yar har, fiddle di dee, Being a pirate is alright to be </span>
			<div class="clear"></div>
			<div class="trait_label"></div>
		</div>
		
		<div id="messagerie_profil_content">
			<div id="messagerie_header">
				<div class="connexion_titre">Messagerie</div>
				<img class="trait_connexion" src="images/trait_connexion.png" >
			</div>	
			<div id="messages">
				<div class="message_expediteur">
					<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
					<span class="statut_pseudo">Faustine</span>
				</div>
				<div class="clear"></div>
				<span class="message">Coucou what you want,
						’cause a pirate is free, You are a pirate!
						Yar har, fiddle di dee</span>
				<div class="clear"></div>
				<div class="message_expediteur">
					<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
					<span class="statut_pseudo">Faustine</span>
				</div>
				<div class="clear"></div>
				<span class="message">Do what you want,’cause a pirate is free, You are a pirate!
						Yar har, fiddle di dee, Being a pirate is alright to be </span>
				<div class="message_expediteur">
					<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
					<span class="statut_pseudo">Faustine</span>
				</div>
				<div class="clear"></div>
				<span class="message">Coucou what you want,
						’cause a pirate is free, You are a pirate!
						Yar har, fiddle di dee</span>
				<div class="clear"></div>
				<div class="message_expediteur">
					<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
					<span class="statut_pseudo">Faustine</span>
				</div>
				<div class="clear"></div>
				<span class="message">Do what you want,’cause a pirate is free, You are a pirate!
						Yar har, fiddle di dee, Being a pirate is alright to be </span>
			</div>
		</div>

		<div id="amis_profil_content">
			<div id="messagerie_header">
				<div class="connexion_titre">Amis</div>
				<img class="trait_connexion" src="images/trait_connexion.png" >
			</div>
			<div id="amis">
				<div id="amis_colonne_1">	
					<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
					<span class="statut_pseudo_amis">Faustine</span>
					<div class="clear"></div>
					<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
					<span class="statut_pseudo_amis">Guillaume</span>
					<div class="clear"></div>
					<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
					<span class="statut_pseudo_amis">Thomas</span>
					<div class="clear"></div>
					<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
					<span class="statut_pseudo_amis">Tintin</span>
					<div class="clear"></div>
					<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
					<span class="statut_pseudo_amis">Faustine</span>
					<div class="clear"></div>
					<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
					<span class="statut_pseudo_amis">Guillaume</span>
					<div class="clear"></div>
					<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
					<span class="statut_pseudo_amis">Thomas</span>
					<div class="clear"></div>
					<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
					<span class="statut_pseudo_amis">Tintin</span>
					<div class="clear"></div>
					<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
					<span class="statut_pseudo_amis">Thomas</span>
					<div class="clear"></div>
					<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
					<span class="statut_pseudo_amis">Tintin</span>
					<div class="clear"></div>
					<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
					<span class="statut_pseudo_amis">Faustine</span>
					<div class="clear"></div>
					<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
					<span class="statut_pseudo_amis">Guillaume</span>
					<div class="clear"></div>
					<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
					<span class="statut_pseudo_amis">Thomas</span>
					<div class="clear"></div>
					<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
					<span class="statut_pseudo_amis">Tintin</span>
					<div class="clear"></div>
				</div>
				<div id="amis_colonne_2">
					<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
					<span class="statut_pseudo_amis">Faustine</span>
					<div class="clear"></div>
					<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
					<span class="statut_pseudo_amis">Guillaume</span>
					<div class="clear"></div>
					<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
					<span class="statut_pseudo_amis">Thomas</span>
					<div class="clear"></div>
					<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
					<span class="statut_pseudo_amis">Tintin</span>
					<div class="clear"></div>
					<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
					<span class="statut_pseudo_amis">Faustine</span>
					<div class="clear"></div>
					<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
					<span class="statut_pseudo_amis">Guillaume</span>
					<div class="clear"></div>
					<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
					<span class="statut_pseudo_amis">Thomas</span>
					<div class="clear"></div>
					<img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px">
					<span class="statut_pseudo_amis">Tintin</span>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>


	<div class="clear"></div>
</div>
	<div id="photos_header">
		 <span class="entete">Photos </span>
	</div>
<div class="wrapper">
	<div id="photos_content">
		<div id="photos">
			<div class="clear"></div>
			<A href="#" onMouseOver="AffBulle('<b>Infobulle :</b>Et voici une jolie infobulle !')" onMouseOut="HideBulle()">Passez le curseur ici !</A>
			<img id="1" class="photo_utilisateur" src="images/1.jpg">
			<img id="2" class="photo_utilisateur" src="images/2.jpg">
			<img id="3" class="photo_utilisateur" src="images/3.jpg">
			<img id="4" class="photo_utilisateur" src="images/4.jpg">
			<img id="5" class="photo_utilisateur" src="images/5.jpg">
			<img id="6" class="photo_utilisateur" src="images/6.jpg">
			<img id="1" class="photo_utilisateur" src="images/1.jpg">
			<img id="2" class="photo_utilisateur" src="images/2.jpg">
			<img id="3" class="photo_utilisateur" src="images/3.jpg">
			<img id="4" class="photo_utilisateur" src="images/4.jpg">
			<div class="clear"></div>
		</div>
	</div>

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
							$('#utilisateur').append('<tr><td><div id="statuts_profil_content"><img src="images/user_moustache.jpg" class="icone_identifiant_1" width="30px"><span class="statut_pseudo"></span><div class="statut">'+statut+'</div><div class="clear"></div><div class="trait_label"></div></div></td></tr>');
						}
					})
			},2000
				);
	</script>



<?php }} ?>