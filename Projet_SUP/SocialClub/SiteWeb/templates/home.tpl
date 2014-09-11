<div id="content">
	<div id="pseudo_photo">
			<div id="photo_profil">

			</div>
			<a href="index.php?action=deconnexion">Deconnexion</a>
	</div>

	<article id="status">
			<table border="1" id="all"></table>
		<br />
		<br />
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
		<table border ="1" id="utilisateur"></table>
	</article>
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
							$('#utilisateur').append('<tr><td>'+statut+'</td></tr>');
						}
					})
			},2000
				);
	</script>
			
</div>