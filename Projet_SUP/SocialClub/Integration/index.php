<?php 
include("header.html");
?>

<div id="wrapper_connexion_inscription">
	<div id="connexion_content">
		<div id="connexion_header">
			<div class="connexion_titre">Connexion</div> 
			<img class="trait_connexion" src="images/trait_connexion.png" >
		</div>
		<div class="identifiants">
			<img src="images/icone_identifiant.jpg" id="icone_identifiant_1" width="30px">
			<span class="connexion_label">Login</span>
			<input class="connexion_input" />
			<div class="clear"></div>
			<div class="trait_label"></div>
			<img src="images/icone_identifiant.jpg" id="icone_identifiant_1" width="30px">
			<span class="connexion_label_pass">Password</span>
			<Input type="password" class="connexion_input" />
			<div class="trait_label"></div>
		</div>
		<a href="interface.php"><input class="submit" type="submit" value="se connecter"></a>
	</div>	

	<div id="inscription_content">
		<div id="inscription_header">
			<div class="connexion_titre">Nouveau?</div>
			<img class="trait_connexion" src="images/trait_connexion.png" >

		</div>	
		<div class="identifiants">
			<span class="inscription_label_code">Code :</span> 
			<input type="text" class="inscription_input" />
			<div class="clear"></div>
			<span class="inscription_label_align_input">Login : </span>
			<input type="text" class="inscription_input" />
			<div class="clear"></div>
			<span class="inscription_label">Password :</span> 
			<input type="password" class="inscription_input" />
			<div class="clear"></div>
			<span class="inscription_label">Password : </span>
			<input type="password" class="inscription_input" />
		</div>
		<a href="interface.php"><input class="submit" type="submit" value="s'inscrire"></a>
	</div>	
</div>


<?php 
include("footer.html");
?>