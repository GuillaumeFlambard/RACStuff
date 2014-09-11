<?php

interface MagicCowInterface
{
	/*
	*	increases 10 percent of intelligence to the player
	*/
	public function fermantation();

	/*
	*	Remove [intelligence] point to the enemy
	*/
	public function looseGas(Player $enemy);
}

?>