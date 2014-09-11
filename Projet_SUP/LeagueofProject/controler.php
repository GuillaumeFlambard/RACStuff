<?php

	include 'Classes/Table.php';
	include 'Interfaces/MagicCowInterface.php';
	include 'Interfaces/PeanutRatInterface.php';
	include 'Interfaces/WizardDolphinInterface.php';
	include 'Interfaces/SquirrelNinjaInterface.php';
	include 'Interfaces/RedPandaHunterInterface.php';
	include 'Classes/Player.php';
	include 'Classes/MagicCow.php';
	include 'Classes/PeanutRat.php';
	include 'Classes/WizardDolphin.php';
	include 'Classes/SquirrelNinja.php';
	include 'Classes/RedPandaHunter.php';

	if ($action == "home")
	{
		if (!empty($_SESSION['id1']) && !empty($_SESSION['id2']))
		{
			$player1 = new Player;
			$player1->data['id'] = $_SESSION['id1'];
			$player1->delete();
			unset ($player1);

			$player2 = new Player;
			$player2->data['id'] = $_SESSION['id2'];
			$player2->delete();
			unset($player2);

			unset ($_SESSION['id1']);
			unset ($_SESSION['id2']);

		}

		$view = "views/loading.php";
	}

	if ($action == "restartGame")
	{
		if (!empty($_SESSION['id1']) && !empty($_SESSION['id2']))
		{
			$oldplayer1 = new Player;
			$oldplayer1->data['id'] = $_SESSION['id1'];
			$oldplayer1->hydrate();

			$player1 = new $oldplayer1->data['classe']($oldplayer1->data['name']);

			$oldplayer2 = new Player;
			$oldplayer2->data['id'] = $_SESSION['id2'];
			$oldplayer2->hydrate();

			$player2 = new $oldplayer2->data['classe']($oldplayer2->data['name']);

			$view = "views/fight.php";
		}

		else
			$view = "views/loading.php";
	}

	if ($action == "setGame" && !empty($_POST['pseudo1']) && !empty($_POST['pseudo2']) && !empty($_POST['classe1']) && !empty($_POST['classe2']))
	{
		$player1 = new $_POST['classe1']($_POST['pseudo1']);
		$player2 = new $_POST['classe2']($_POST['pseudo2']);
		$_SESSION['id1'] = $player1->data['id'];
		$_SESSION['id2'] = $player2->data['id'];
		$view = "views/fight.php";
	}

	if ($action == "attack" && !empty($_POST['attaquant']) && !empty($_POST['enemy']) && !empty($_POST['action']))
	{
		if ($_POST['attaquant'] == "player1")
		{
			$attaquant = $_SESSION['id1'];
			$enemy = $_SESSION['id2'];
		}

		else
		{
			$attaquant = $_SESSION['id2'];
			$enemy = $_SESSION['id1'];
		}

		$capacity = $_POST['action'];

		$query = "SELECT `classe` FROM `players` WHERE `id` = $attaquant";
		$data = myFetchAssoc($query);
		$query = "SELECT `classe` FROM `players` WHERE `id` = $enemy";
		$data2 = myFetchAssoc($query);

		if (!empty($data['classe']) && !empty($data2['classe']))
		{
			if ($_SESSION['id1'] == $attaquant)
			{
				$player2 = new $data2['classe']('test');
				$player2->data['id'] = $_SESSION['id2'];
				$player2->hydrate();

				$player1 = new $data['classe']('test');
				$player1->data['id'] = $_SESSION['id1'];
				$player1->hydrate();

				$player1->$capacity($player2);
				$reponse = array(1 => $player1->data, 2 => $player2->data);
			}

			else
			{
				$player1 = new $data2['classe']('test');
				$player1->data['id'] = $_SESSION['id1'];
				$player1->hydrate();

				$player2 = new $data['classe']('test');
				$player2->data['id'] = $_SESSION['id2'];
				$player2->hydrate();

				$player2->$capacity($player1);
				$reponse = array(1 => $player2->data, 2 => $player1->data);
			}

			echo json_encode($reponse);
		}

		die();
	}



	/*$dolphin = new dolphin ('bobo');
	$dolphin->crazyDolphin();
	$dolphin->dolphinTail();
	var_dump($dolphin);

	$peanutRat = new peanutRat ('bibi');
	$peanutRat->poisonnedBit();
	$peanutRat->eatPeanut();
	var_dump($peanutRat);

	$SquirrelNinja = new SquirrelNinja ('kennen');
	$SquirrelNinja->electicShurikenInYourFace();
	$SquirrelNinja->transformIntoAEnergeticBall();
	var_dump($SquirrelNinja);

	$magicCow = new magicCow ('cleo');
	$magicCow->fermantation();
	$magicCow->looseGas();
	var_dump($magicCow);

	$hunter = new hunter ('gromain');
	$hunter->bambooBreaker();
	$hunter->oneShot();
	var_dump($hunter);*/

?>
