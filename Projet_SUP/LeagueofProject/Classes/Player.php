<?php

	class Player extends Table
	{
		protected $classe;
		protected $max_hp;
		protected $max_mana;
		protected $baseStats;
		protected $inventory = array();
		protected $skills = array('attack' => 'Attack',
								  'heal' => 'Heal',
								  'protect' => 'Protect');

		public $data;
		protected $items = array();

		public function __construct()
		{
			$this->tableName = "players";

			parent::__construct();
		
			$this->data['strength'] = 100;
			$this->data['intelligence'] = 100;
			$this->data['health_point'] = 500;
		}

		public function reduceDamage($dmg, $enemy)
		{
			if ($enemy->data['skill'] == 'protect') {
				$dmgReduc = floor($dmg * 0.25);
				$enemy->data['skill'] == '';
				return $dmgReduc;
			}
			else
				return $dmg;
		}

		protected function addCaracWeapons()
		{
			foreach($this->inventory as $interface)
				foreach ($interface as $property => $value)
				{
					if($property=="strength")
						$this->data['strength']=$this->data['strength'] * $value;
					elseif($property=="intelligence")
						$this->data['intelligence']=$this->data['intelligence'] * $value;
					elseif($property=="health")
						$this->data['health_point']=$this->data['health_point'] * $value;
				}
		}

		protected function calcMaxHP()
		{
			$this->data['max_hp'] = $this->data['health_point'];

			foreach ($this->items as $key => $item)
			{
				$this->data['max_hp'] += $item->data['health_point'];
			}
		}

		public function computedStats()
		{
			$this->data['health_point'] = $this->computedStat('health_point');
			$this->data['strength'] = $this->computedStat('strength');
			$this->data['velocity'] = $this->computedStat('velocity');
			$this->data['intelligence'] = $this->computedStat('intelligence');
		}

		public function computedStat ($stat)
		{
			$power = $this->baseStats[$stat];

			/*foreach ($this->items as $key => $item)
			{*/
				if (array_key_exists($stat, $this->inventory[$this->data['classe']]))
				$power += ($power*$this->inventory[$this->data['classe']][$stat])/100;
			/*}*/

			return floor($power);
		}

		public function setItem ($id)
		{
			$item = new Items($id);
			$item->hydrate();
			$this->items[] = $item;
		}

		// public function dropWeapon ($type)
		// {
		// 	//drop
		// }
		
		public function setItems($weapons)
		{
			$this->weapons = $weapons;
		}

		public function setName($name)
		{
			$this->data['name'] = $name;
		}

		public function setStrengh($strength)
		{
			$this->data['strength'] = $strength;
		}
		
		public function setVelocity($velocity)
		{
			$this->data['velocity'] = $velocity;
		}

		public function setIntelligence($intelligence)
		{
			$this->data['intelligence'] = $intelligence;
		}

		public function setHealthPoint($hp)
		{
			$this->data['health_point'] = $hp;
		}

		public function getName()
		{
			return $this->data['name'];
		}

		public function getStrengh()
		{
			return $this->data['strength'];
		}
		
		public function getVelocity()
		{
			return $this->data['velocity'];
		}

		public function getIntelligence()
		{
			return $this->data['intelligence'];
		}

		public function getHealthPoint()
		{
			return $this->data['health_point'];
		}

		public function getSkills ()
		{
			return $this->skills;
		}

		public function attack ($enemy)
		{
			$this->data['loop'] = 0;
			$this->data['skill'] = "attack";
			
			if ($enemy->data['health_point'] > $this->data['strength'])
				$enemy->data['health_point'] -= $this->reduceDamage($this->data['strength'], $enemy);

			else 
			{
				$enemy->data['health_point'] = 0;
				echo $enemy->data['name']." is dead";
			}

			$this->save();

			$enemy->save();
		}

		public function heal ()
		{
			$this->data['loop'] = 0;
			$this->data['skill'] = "heal";

			if ($this->data['health_point'] != $this->data['max_hp'])
			{
				if (($this->data['max_hp'] - $this->data['health_point']) < $this->data['intelligence'])
				{
					$this->data['health_point'] = $this->data['max_hp'];
				}

				else
				{
					$this->data['health_point'] += $this->data['intelligence'];
				}
			}

			$this->save();
		}

		public function protect ()
		{
			$this->data['loop'] = 1;
			$this->data['skill'] = "protect";
			$this->save();
		}

	} 

	

?>