<?php

interface RedPandaHunterInterface
{
	/*
	*	increases 30 intelligence to the player
	*/
	public function bambooBreak();

	/*
	*	Remove [strength] point to the enemy
	*/
	public function oneShot(Player $enemy);
}

?>