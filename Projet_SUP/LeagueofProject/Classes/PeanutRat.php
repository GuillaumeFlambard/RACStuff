<?php

class PeanutRat extends Player implements PeanutRatInterface
{
	const CLASSE = "PeanutRat";

	function __construct ($name)
	{
		parent::__construct();

		$this->data['name'] = $name;
		$this->data['strength'] = $this->data['strength'] * 0.3;
		$this->data['intelligence'] = $this->data['intelligence'] * 1.6;
		$this->data['classe'] = self::CLASSE;
		$this->inventory['PeanutRat'] = array(
			'name' => 'magic peanut',
			'type' => 'magic object',
			'health' => '1',
			'strength' => '1',
			'intelligence' => '1.3',
		);

		$this->skills["poisonnedBite"] = "Poisonned Bite";
		$this->skills["eatPeanut"] = "Eat Peanut";

		$this->addCaracWeapons();

		$this->save();
		$this->baseStats = $this->data;
		$this->calcMaxHP();
		$this->computedStats();
	}

	public function poisonnedBite(Player $enemy)
	{
			$this->data['skill'] = 'attack';
			$strength_damage = $this->data['intelligence'];
			$intelligence_damage = floor($this->data['strength'] * 0.6);
		
			if ($enemy->data['health_point'] > $strength_damage)
				$enemy->data['health_point'] -= $this->reduceDamage($strength_damage, $enemy);
			else
			{
				$enemy->data['health_point'] = 0;
				//echo ($enemy->data['name']." is dead");
			}
		
			if ($enemy->data['intelligence'] > $intelligence_damage)
				$enemy->data['intelligence'] -= $intelligence_damage;
			else
			{
				$enemy->data['intelligence'] = 0;
				//echo ($enemy->data['name']." is stupid");
			}
			
			$this->save();
			$enemy->save();
		}

	public function eatPeanut(Player $enemy)
	{
		$this->data['skill'] = 'attack';
		$heal = floor($this->data['health_point'] * 0.3);
		$damage = floor($heal * 1.3);
		
		if ($enemy->data['health_point'] > $damage)
			$enemy->data['health_point'] -= $damage;
		else
		{
			$enemy->data['health_point'] = 0;
			//echo ($enemy->data['name']." is dead");
		}
		
		if (($this->data['health_point'] + $heal) <= $this->data['max_hp'])
			$this->data['health_point']+= $heal;
		else
			$this->data['health_point'] = $this->data['max_hp'];
				
		$this->save();
		$enemy->save();
	}

	//one-hand mace
	//two-hand wand

}

?>