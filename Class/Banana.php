<?php

class Banana extends Soldier
{
	public function __construct()
	{
		$this->name = random_int(1,1000);
    $this->type = "Banana";
		$this->baseAttack = random_int(0,3);
		$this->freezeThresh = random_int(10,18);
	}

	public function rollCombat(): int
	{
		$this->currentAttack = random_int(1,6);
		$this->rollFreeze();
		return $this->currentAttack;
	}

}
