		<div id ="header">
			<div class="entete">
				<span class="Titre"> Social </span><a href="index.php?action=home"><img id="logo" src="images/logo.png" /></a><span class="Titre">Club</span>
			</div>
			<div id="icones_header">
				<form action="index.php?action=CreationStatut" method="post" id="statut_input">
					<input type="text" name="ContenuStatut"/>
					<input type="submit" value="Envoyer" />
				</form>
				<img id="icone_plume" src="images/plume.png" width="20" alt="icone plume">
				<a href="index.php?action=utilisateurs"><img id="icone_1" src="images/utilisateurs.png" alt="lien vers page utilisateur"></a>
				<a href="index.php?action=messagerie"><img id="icone_2" src="images/messagerie.png" alt="lien vers messagerie"></a>
				<a href="index.php?action=home"><img id="icone_3" src="users/{$pseudo}/photo_profil/{$pseudo}.jpg" alt="lien vers profil" width="35"></a>
				<a href="index.php?action=deconnexion"><img id="icone_4" src="images/deconnexion.png" alt="icone deconnexion"></a>
			</div>
		</div>
		<div class="clear"></div>