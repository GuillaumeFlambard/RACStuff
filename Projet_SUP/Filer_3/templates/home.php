<?php
echo ('
	<div id="header">
	</div>
	<div="section">
	<a href="index.php?action=deconnection">Deconnection</a>
	<form action="index.php?action=cree_repertoire&amp;chemin='.$path.'" method="post">
	ajouter un dossier : <input type="text" name="repertoire_plus"/>
	<input type="submit"/>
	</form>
	<form action="index.php?action=cree_fichier&chemin='.$path.'" method="post">
	ajouter un fichier : <input type="text" name="fichier_plus">
	<input type="submit"/>
	</form>
	<a href="index.php?action=copie_fichier&amp;chemin='.$path.'">Coller fichier</a>&nbsp;&nbsp;
	<a href="index.php?action=deplace_repertoire&amp;chemin='.$path.'">deplacer le dossier ici</a><br>
	<a href="index.php?action=copie_repertoire&amp;chemin='.$path.'">Coller dossier</a>&nbsp;&nbsp;
	<a href="index.php?action=deplace_fichier&amp;chemin='.$path.'">deplacer le fichier ici</a><br>
	<form method="POST" action="index.php?action=upload_fichier&amp;chemin='.$path.'" enctype="multipart/form-data">
	 Fichier : <input type="file" name="upload">
	 <input type="submit" name="envoyer" value="Envoyer">
	</form> <br><br><br>
	</div>
	');

foreach (url($path) as $value)
{
	if($value!="..")
	{
		if(is_dir($path."/".$value))
		{
			echo "<a href='index.php?chemin=".$path."".$value."/'>Dossier_".$value."</a>&nbsp;
					<a href='index.php?action=suppr_repertoire&amp;chemin=".$path."".$value."' >suppr</a>
					<form action='index.php?action=renom_repertoire&amp;chemin=".$path."".$value."' method='post'>
					<input type='text' name='renomme_dir'/>
					<input type='submit' value='renommer'/>
					</form>
					<form action='index.php?action=copie_dossier_prise&amp;chemin=".$path."".$value."' method='post'>
					<input type='submit' value='copie'/>
					</form>
					<a href='index.php?action=prise_deplacement_dir&amp;chemin=".$path."".$value."' >deplacer</a><br><br><br>";
		}
		else
		{
			echo "<a href='index.php?action=download_fichier&amp;chemin=".$path."".$value."' >Fichier_".$value."</a><br>
					<a href='index.php?action=suppr_fichier&amp;chemin=".$path."".$value."' >suppr</a>
					<form action='index.php?action=renom_fichier&amp;chemin=".$path."".$value."' method='post'>
					<input type='text' name='renomme_file'/>
					<input type='submit' value='renommer'/>
					</form>
					<form action='index.php?action=copie_fichier_prise&amp;chemin=".$path."".$value."' method='post'>
					<input type='submit' value='copie'/>
					</form>
					<a href='index.php?action=prise_deplacement_file&amp;chemin=".$path."".$value."' >deplacer</a>
					<br><br><br>";
		}
	}
	elseif($path!=$path_default.$_SESSION['login'].'/' && $path!=$path_default.$_SESSION['login'])
	{
			
		echo"<a href='index.php?chemin=".$parent."/'>Parent_directory</a><br><br><br>";
		}
	}
?>