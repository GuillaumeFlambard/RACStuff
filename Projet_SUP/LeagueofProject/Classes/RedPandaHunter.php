<?php

class RedPandaHunter extends Player implements RedPandaHunterInterface
{
	const CLASSE = "RedPandaHunter";

	function __construct ($name)
	{
		parent::__construct();

		$this->data['name'] = $name;
		$this->data['strength'] = ($this->data['strength']*140)/100;
		$this->data['intelligence'] = ($this->data['strength']*90)/100;
		$this->data['classe'] = self::CLASSE;
		$this->inventory['RedPandaHunter'] = array(
			'name' => 'bamboo blowgun',
			'type' => 'weapon',
			'health' => '1',
			'strength' => '1',
			'intelligence' => '1.3',
		);

		$this->skills["bambooBreak"] = "Bamboo Break";
		$this->skills["oneShot"] = "One Shot";

		$this->addCaracWeapons();
	
		$this->save();
		$this->baseStats = $this->data;
		$this->calcMaxHP();
		$this->computedStats();
	}

	public function bambooBreak ()
	{
		$this->data['loop'] = 0;
		$this->data['skill'] = 'attack';

		$this->data['strength'] += 30;

		$this->save();
	}

	public function oneShot (Player $enemy)
	{
		$this->data['loop'] = 0;
		$this->data['skill'] = 'attack';
		
		if ($this->data['strength'] < $enemy->data['health_point'])
			$enemy->data['health_point'] -= $this->reduceDamage($this->data['strength'], $enemy);
		else
		{
			$enemy->data['health_point'] = 0;
			//echo $enemy->data['name']." is dead";
		}
		
		/*$enemy->data['mana'] -= 20;*/
		/*$this->data['mana'] -= 50;*/
		$enemy->save();
	}


}

?>