<div id="forget_pass">
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
					{if !empty($error_conf_login)}
						{$error_conf_login}
					{/if}
				</td>
			</tr>
			<tr>
				<td>Taper votre email.</td>
				<td><input type="text" name="conf_email"></td>
			</tr>
			<tr>
				<td colspan="2" class="error">&nbsp;&nbsp;
					{if !empty($error_conf_email)}
						{$error_conf_email}
					{/if}
				</td>
			</tr>
			<tr>
				<td>Taper votre nouveau mot de passe.</td>
				<td><input type="password" name="new_password"></td>
			</tr>
			<tr>
				<td colspan="2" class="error">&nbsp;&nbsp;
					{if !empty($error_pass)}
						{$error_pass}
					{/if}
				</td>
			</tr>
			<tr>
				<td>Comfirmer votre nouveau mot de passe.</td>
				<td><input type="password" name="new_conf_password"></td>
			</tr>
			<tr>
				<td colspan="2" class="error">&nbsp;&nbsp;
					{if !empty($error_confpass)}
						{$error_confpass}
					{/if}
				</td>
			</tr>
			<tr>
				<td colspan="2" id="submit_change_pass"><input type="submit" value="Confirmer" class="grey_submit_button"></td>
			</tr>
		</table>
	</form>
</div>