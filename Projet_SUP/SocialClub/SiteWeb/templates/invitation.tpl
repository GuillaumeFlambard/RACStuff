<div id="invitation">
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
					{if isset($error_invit_email)}<span style='color:red'>{$error_invit_email}</span>{/if}

					{if isset($sucess)}<span class="success">{$sucess}</span>{/if}
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" id="invitation_submit" value="Inviter"></td>
			</tr>
		</table>
	</form>
</div>