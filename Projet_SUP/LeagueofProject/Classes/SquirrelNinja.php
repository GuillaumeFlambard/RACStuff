<?php

class SquirrelNinja extends Player implements SquirrelNinjaInterface
{
	const CLASSE = "SquirrelNinja";

	function __construct ($name)
	{
		parent::__construct();

		$this->data['name'] = $name;
		$this->data['strength'] -= $this->getStrengh() * (50/100);
		$this->data['intelligence'] += $this->getIntelligence() * (80/100);
		$this->data['classe'] = self::CLASSE;
		$this->inventory['SquirrelNinja'] = array(
			'name' => 'shuriken',
			'type' => 'weapon',
			'health' => 1,
			'strength' => 1.3,
			'intelligence' => 1
		);

		$this->skills["electricShurikenInYourFace"] = "Electric Shuriken In Your Face";
		$this->skills["transformIntoAnEnergeticBall"] = "Transform Into An Energetic Ball";

		$this->save();
		$this->baseStats = $this->data;
		$this->calcMaxHP();
		$this->computedStats();
		$this->save();
	}

	public function electricShurikenInYourFace(Player $enemy)
	{
		$this->data['skill'] = 'attack';
		if ($enemy->data['health_point'] > ($this->data['intelligence'] + 50)) 
			$enemy->data['health_point'] -= $this->reduceDamage($this->data['intelligence'] + 50, $enemy);
		else
		{
			$enemy->data['health_point'] = 0;
			$enemy->save();
		}
	}

	public function transformIntoAnEnergeticBall(Player $enemy)
	{
		$this->data['skill'] = 'attack';
		$this->data['intelligence'] += floor(($this->data['intelligence']) * 1.4);
		$enemy->data['strength'] += 20;
		$this->save();
	}

	//one-hand sword
	//one-hand mace
	//one-hand shield

}

?>