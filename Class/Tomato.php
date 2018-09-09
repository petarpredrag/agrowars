<?php

class Tomato extends Soldier
{
	public function __construct()
	{
		$this->name = random_int(1,1000);
  		$this->type = "Tomato";
		$this->baseAttack = random_int(-1,2);
		$this->frozen = 0;
	}

	protected function checkBuffs(bool $night, bool $sunny)
	{
		if($night)
		{
			$this->currentAttack -= 2;
		}
		if($sunny)
		{
			$this->currentAttack += 3;
		}
	}
}
