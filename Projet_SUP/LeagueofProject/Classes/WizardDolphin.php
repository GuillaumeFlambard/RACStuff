<?php

class WizardDolphin extends Player implements WizardDolphinInterface
{
	const CLASSE = "WizardDolphin";

	function __construct ($name)
	{
		parent::__construct();

		$this->data['name'] = $name;
		$this->data['strength'] = $this->data['strength'] * 0.3;
		$this->data['intelligence'] = $this->data['intelligence'] * 1.6;
		$this->data['classe'] = self::CLASSE;
		$this->inventory['WizardDolphin'] = array(
			'name' => 'magic suit',
			'type' => 'magic object',
			'health' => '1',
			'strength' => '1',
			'intelligence' => '1.3',
		);

		$this->skills["crazyDolphin"] = "Crazy Dolphin";
		$this->skills["dolphinTail"] = "Dolphin Tail";

		$this->addCaracWeapons();

		$this->save();
		$this->baseStats = $this->data;
		$this->calcMaxHP();
		$this->computedStats();
	}

	public function crazyDolphin (Player $enemy)
	{
		$this->data['loop'] = 0;
		$this->data['skill'] = 'attack';
		
		if ($this->data['intelligence'] < $enemy->data['health_point'])
			$enemy->data['health_point'] -= $this->reduceDamage($this->data['intelligence'], $enemy);
		else
			$enemy->data['health_point'] = 0;
		
			$this->save();
			$enemy->save();
		
	}

	public function dolphinTail (Player $enemy)
	{	
		$this->data['skill'] = 'attack';
		$this->data['intelligence'] += 20;
		$this->save();
	}
}

?>