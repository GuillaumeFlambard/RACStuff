  <?php

interface WizardDolphinInterface
{

	/*
	*	Remove 40 health point to the player and 80health point to the enemy
	*/
	public function crazyDolphin(Player $enemy);

	/*
	*	Remove [intelligence] health point to the enemy
	*/
	public function dolphinTail(Player $enemy);
}