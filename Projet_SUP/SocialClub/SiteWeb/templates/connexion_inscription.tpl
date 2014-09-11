<div id="wrapper_connexion_inscription">
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
	{if !empty($NewMotDePasse)}
		{$NewMotDePasse}
	{/if}
</p>
<p class="error">
	{if !empty($FailInscription)}
		{$FailInscription}
	{/if}<br>
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
						{if !empty($error_code)}
							{$error_code}
						{/if}
					</td>
				</tr>
				<tr>
					<td class="champs_inscription">Login :</td>
					<td class="champs_inscription"><input type="text" class="inscription_input" name="identifiant"></td>
				</tr>
				<tr>
					<td colspan="2" class="error">&nbsp;&nbsp;
						{if !empty($error_identifiant)}
							{$error_identifiant}
						{/if}
					</td>
				</tr>
				<tr>
					<td class="champs_inscription">Password :</td>
					<td class="champs_inscription"><input type="password" class="inscription_input" name="pass"></td>
				</tr>
				<tr>
					<td colspan="2" class="error">&nbsp;&nbsp;
						{if !empty($error_pass)}
							{$error_pass}
						{/if}
					</td>
				</tr>
				<tr>
					<td class="champs_inscription">Confirm Password :</td>
					<td class="champs_inscription"><input type="password" class="inscription_input" name="confpass"></td>
				</tr>
				<tr>
					<td colspan="2" class="error">&nbsp;&nbsp;
						{if !empty($error_confpass)}
							{$error_confpass}
						{/if}
					</td>
				</tr>
				<tr>
					<td class="champs_inscription">Email :</td>
					<td class="champs_inscription"><input type="text" class="inscription_input" name="email"></td>
				</tr>
				<tr>
					<td colspan="2" class="error">&nbsp;&nbsp;
						{if !empty($error_email)}
							{$error_email}
						{/if}
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
						{if !empty($SuccessInscription)}
							{$SuccessInscription}
						{/if}
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>