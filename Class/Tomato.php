<?php

class Tomato extends Soldier
{


	public function __construct()
	{
		$this->name = random_int(1,1000);
  	$this->type = "Tomato";
		$this->baseAttack = random_int(-1,2);
		$this->freezeThresh = random_int(10,20);
	}

	public function rollCombat(): int
	{
		$this->currentAttack = random_int(1,6);
		$this->checkBuffs();
		$this->rollFreeze();
		return $this->currentAttack;
	}

	protected function checkBuffs()
	{

		if($this->night)
		{
			$this->currentAttack -= 2;
		}
		if($this->sunny)
		{
			$this->currentAttack += 3;
		}
	}
}
