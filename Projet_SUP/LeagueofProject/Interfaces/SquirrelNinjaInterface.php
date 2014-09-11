<?php

interface SquirrelNinjaInterface
{
	/*
	*	Remove [Intelligence] + 50 Healthpoint to the enemy.
	*/
	public function electricShurikenInYourFace(Player $enemy);

	/*
	*	Add [intelligence] Intelligence to the player and give 20 Strength to the enemy.
	*/
	public function transformIntoAnEnergeticBall(Player $enemy);
}

?>