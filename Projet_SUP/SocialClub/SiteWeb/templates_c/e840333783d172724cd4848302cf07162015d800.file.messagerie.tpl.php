<?php /* Smarty version Smarty-3.1.13, created on 2013-05-31 11:17:22
         compiled from "C:\Users\SUPINTERNET\Dropbox\SocialClub\SiteWeb\templates\messagerie.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2341651a86aa27181b8-58230390%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e840333783d172724cd4848302cf07162015d800' => 
    array (
      0 => 'C:\\Users\\SUPINTERNET\\Dropbox\\SocialClub\\SiteWeb\\templates\\messagerie.tpl',
      1 => 1369952096,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2341651a86aa27181b8-58230390',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'interlocuteur' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51a86aa2877509_43084845',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a86aa2877509_43084845')) {function content_51a86aa2877509_43084845($_smarty_tpl) {?>
<!-- Module Conversation -->
	<div id="conversation_content">
		
		<div id="conversation">
		</div>

		<div id="reponse">
			<form id="ajax_form" method="post" action="index.php?action=sendResponse">
				<table>
					<tr><td><img src="./images/user_moustache.jpg" id="icone_identifiant_1" width="30" height="30"><input type="text" id="UserRecipient" name="UserRecipient" value="<?php echo $_smarty_tpl->tpl_vars['interlocuteur']->value;?>
" placeholder="pseudo de votre ami" maxlength="25"></td></tr>
					<tr><td><textarea name="reponse_input" id="reponse_input"></textarea></td></tr>
					<tr><td><input type="submit" name="submit_message" value="R&eacute;pondre" id="submit_reponse"></td></tr>
				</table>
			</form>
		</div>
	</div>	
<!-- /Module Conversation -->

<!-- Module Tous Messages -->
	<div id="messagerie_content_pageMessagerie">
		<div id="messagerie_header">
			<div class="connexion_titre">Messagerie</div>
			<img class="trait_connexion" src="images/trait_connexion.png" >
		</div>	
		<div id="messages_pageMsg">
		</div>
	</div>
<!-- /Module Derniers Messages -->

<!-- Module Statuts -->
	<div id="fil_statuts_content_pageMessagerie">
		<div id="statut_header">
			<div class="connexion_titre">Statuts de vos amis</div>
			<img class="trait_connexion" src="./images/trait_connexion.png" >
		</div>
		<table id="all"></table>
	</div>
<!-- /Module Statuts -->

<script> 

	/* Module Conversation */
  	function getConversation (){
		var interlocuteur = $('#UserRecipient').attr('value');
		$.getJSON('index.php?action=getConversationMessages&ajax&interlocuteur='+interlocuteur, function(tableau)
		{
			var length = tableau[0].length;
			login = null;
			content = null;
			date = null;
			idMessage = null;
			$('#conversation').empty();
				for (var i = 0; i < length; i++)
				{
					login = tableau[0][i];
					content = tableau[1][i];
					date = tableau[2][i];
					idMessage = tableau[3][i];
					$('#conversation').append('<span class="conversation_pseudo">'+login+'</span><div class="conversation_message">'+content+'</div><div class="clear"></div>'+date+'<a href="index.php?action=deleteMessage&message='+idMessage+'&interlocuteur='+interlocuteur+'"><img src="./images/supprimer.png" alt="icone suppression" id="icone_suppression" width="20"></a><div class="trait_label"></div>');
				}
		})
	}
	getConversation();
	setInterval(getConversation,500);

	/* Module Tous Messages des amis  */
  	function listAllMessages(){
			$.getJSON('index.php?action=getAllMessages&ajax', function(messages)
			{
				var length = messages.length;
				message = null;
				$('#messages_pageMsg').empty();
					for (var i = 0; i < length; i++)
					{
						message = messages[i];
						$('#messages_pageMsg').append('<div class="message_expediteur"><img src="users/'+message['login']+'/photo_profil/'+message['login']+'.jpg" class="icone_identifiant_1" width="30" height="30"><span class="statut_pseudo"><a href="index.php?action=messagerie&friend='+message['login']+'" >'+message['login']+'</a></span></div><div class="clear"></div><span class="message">'+message['content']+'</span><div class="clear"></div><div class="date_message">'+message['date']+'</div>');
					}
			})
		}
		listAllMessages();
		setInterval(listAllMessages,4000);

	/* Module 10 Derniers statuts */
	function dixdernierstatut()
	{
		$.getJSON('index.php?action=getpostlist&ajax', function(tableau)
		{				
			var length = tableau[0].length;
			statut = null;
			date = null;
			$('#all').empty();
			for (var i = 0; i < length; i++)
			{
				statut = tableau[0][i];
				date = tableau[1][i];
				login = tableau[2][i];
				$('#all').append('<tr><td class="all_td"><img src="./users/'+login+'/photo_profil/'+login+'.jpg" class="icone_identifiant_1" width="30" height="30"><span class="fil_statut_pseudo"><a href="index.php?action=friend&pseudo='+login+'">'+login+'</a></span></td></tr><tr><td class="all_td"><div class="fil_statut_pageProfil">'+statut+'</td></tr><div class="clear"></div>'+date+'<div class="trait_label"></div><tr><td>&nbsp;</td></tr>');
			}
		})
	}
	dixdernierstatut();
	setInterval(dixdernierstatut,4000);
</script>




<?php }} ?>