<?php

class MagicCow extends Player implements MagicCowInterface
{
	const CLASSE = "MagicCow";

	function __construct ($name)
	{
		parent::__construct();

		$this->data['name'] = $name;
		$this->data['strength'] = floor($this->data['strength']*0.5);
		$this->data['health_point'] = floor($this->data['health_point']*1.8);
		$this->data['classe'] = self::CLASSE;
		$this->inventory['MagicCow'] = array(
			'name' => 'Bell',
			'type' => 'magic object',
			'health' => '1',
			'strength' => '1',
			'intelligence' => '1.3',
		);

		$this->skills["fermantation"] = "Fermantation";
		$this->skills["looseGas"] = "Loose Gas";

		$this->save();
		$this->baseStats = $this->data;
		$this->calcMaxHP();
		$this->computedStats();
		$this->save();
	}

	public function fermantation()
	{
		$this->data['skill'] = 'attack';
		$this->data['intelligence']+=30;
		if (($this->data['health_point'] + 50) <= $this->data['max_hp'])
			$this->data['health_point']+= 50;
		else
			$this->data['health_point'] = $this->data['max_hp'];
		$this->save();
	}

	public function looseGas(Player $enemy)
	{
		$this->data['skill'] = 'attack';
		
		if ($enemy->data['health_point'] > $this->data['intelligence'] + 10)
			$enemy->data['health_point'] -= $this->reduceDamage($this->data['intelligence'] + 10, $enemy);
		else
		{
			$enemy->data['health_point'] = 0;
			//echo $enemy->data['name']." is dead";
		}
		$enemy->save();
	}
}

?>