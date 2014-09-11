<p>
	<form action="index.php?action=acceuil_connection" method="post" id="form1">
		<table id="connection">
			<tr>
				<td>Identifiant :</td>
				<td><INPUT type="text" name="login_p1" /></td>
			</tr>
			<tr>
				<td colspan = "2">&nbsp;</td>
			</tr>
			<tr>
				<td>mot de passe :</td> 
				<td><INPUT type="password" name="pass_p1" /></td>
			</tr>
			<tr>
				<td colspan = "2">&nbsp;</td>
			</tr>
			<tr>
				<td><INPUT type="submit" class="submit" value="Connection" /></td>
			</tr>
		</table>
	</form>
</p>
<p>
	<form action="index.php?action=acceuil_inscription" method="post">
		<table id="inscription">
			<tr>
				<td><label for="login">Identifiant :</label></td>
				<td><input type="text" name="login" id="login" ></td>
			</tr>
			<tr>
				<td colspan = "2">&nbsp;</td>
			</tr>
			<tr>
				<td><label for="pass">Mot de passe :</label></td>
				<td><input class="form" type="password" name="pass" id="pass" ></td>
			</tr>
			<tr>
				<td colspan = "2">&nbsp;</td>
			</tr>
					<td><input class="submit" type="submit" value="Inscription" /><br /></td>
			</tr>
		</table>
	</form>
</p>