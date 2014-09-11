	<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<title>Files</title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<meta http-equiv="content-language" content="fr" />
		<meta name="author" content="Guillaume Flambard" />
		<link rel="stylesheet" type="text/css" href="../styles/style.css"/>
	</head>
	<body>
			<?php
			//$template ='acceuil';
			$view_path = 'templates/'.$template.'.php';
			if (is_file($view_path))
			{
				include($view_path);
			}
			else
			{
				echo "Page introuvable ('".$view_path."' inexistant ou innaccessible)";
			}
			?>
	</body>
</html>