<!doctype html>
	<head>
		<title>Choose your character</title>
		<meta name="description" content="Jeu en POO">
		<meta name="keywords" content="POOgame">
		<meta name="author" content="Guillaume Flambard, Romain Grelet, Benjamin Guibault, Bastien Henry, Faustine Larmagna">
		<meta charset="UTF-8">
		<link rel= "stylesheet" href= "assets/styles/style.css"/>
		<link href='http://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet' type='text/css'>
	</head>
	
	<body>
		<header><h1>EpicAwesomeAnimalsWarTournament</h1></header>
		<section>
			<div id="wrapper">
				<div id="interfaces">
					<div id="players">
						<form method="post" action="index.php?action=setGame">
							<table id="table1">
								<tr><td colspan="2" style="text-align:center"><h3>Player 1</h3></td></tr>
								<tr><td colspan="2">&nbsp;</td></tr>
								<tr>
									<td class="td_bold">Pseudo : </td><td class="td_large"><input type="text" name="pseudo1" required></td>
								</tr>
								<tr><td colspan="2">&nbsp;</td></tr>
								<tr>
									<td class="td_bold">Classe : </td>
									<td class="td_large"><input type="radio" name="classe1" value="MagicCow" id="MagicCow" checked><label for="MagicCow"> Magic Cow</label></td>
								</tr>
								<tr>
									<td class="td_bold"></td>
									<td class="td_large">
										<input type="radio" name="classe1" value="WizardDolphin" id="WizardDolphin"><label for="WizardDolphin"> Wizard Dolphin</label><br>
										<input type="radio" name="classe1" value="SquirrelNinja" id="SquirrelNinja"><label for="SquirrelNinja"> Squirrel Ninja<br>
										<input type="radio" name="classe1" value="RedPandaHunter" id="RedPandaHunter"><label for="RedPandaHunter"> Red Panda Hunter<br>
										<input type="radio" name="classe1" value="PeanutRat" id="PeanutRat"><label for="PeanutRat"> Peanut Rat<br>
									</td>
								</tr>
							</table>
							<table id="table2">
								<tr><td colspan="2" style="text-align:center"><h3>Player 2</h3></td></tr>
								<tr><td colspan="2">&nbsp;</td></tr>
								<tr>
									<td class="td_bold">Pseudo : </td><td class="td_large"><input type="text" name="pseudo2" required></td>
								</tr>
								<tr><td colspan="2">&nbsp;</td></tr>
								<tr>
									<td class="td_bold">Classe : </td>
									<td class="td_large"><input type="radio" name="classe2" value="MagicCow" id="MagicCow1" checked><label for="MagicCow1"> Magic Cow</label></td>
								</tr>
								<tr>
									<td class="td_bold"></td>
									<td class="td_large">
										<input type="radio" name="classe2" value="WizardDolphin" id="WizardDolphin1"><label for="WizardDolphin1"> Wizard Dolphin</label><br>
										<input type="radio" name="classe2" value="SquirrelNinja" id="SquirrelNinja1"><label for="SquirrelNinja1"> Squirrel Ninja</label><br>
										<input type="radio" name="classe2" value="RedPandaHunter" id="RedPandaHunter1"><label for="RedPandaHunter1"> Red Panda Hunter</label><br>
										<input type="radio" name="classe2" value="PeanutRat" id="PeanutRat1"><label for="PeanutRat1"> Peanut Rat</label><br>
									</td>
								</tr>
							</table>
							<table style="width:100%; clear:both; padding-top:100px">
								<tr><td colspan="2" style="text-align:center"><input type="submit" class="play" name="setGame" value="play" id="play_button"></td></tr>
							</table>
						</form>
					</div>
				</div>
			</div>
		</section>
		<footer></footer>
	</body>
</html>