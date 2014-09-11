<?php

interface PeanutRatInterface
{
	//	Player bits the enemy, remove for player's [intelligence] points to the enemy's health and remove for 60% of player's [strength] points to the enemy's intelligence, uses 50 mana
	public function poisonnedBite(Player $enemy);

	//	Player eats a peanut and throw the peanut shell at the enemy, heal player for [health_point] -30 points and remove for half player's previous heal to the enemy's health, uses 30 mana.
	public function eatPeanut(Player $enemy);
}

?>