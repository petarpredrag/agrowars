<?php

class Melon extends Soldier
{
	public function __construct()
	{
		$this->name = random_int(1,1000);
    $this->type = "Melon";
		$this->baseAttack = 0;
		$this->freezeThresh = random_int(5,10);
	}

	public function rollCombat(): int
	{
		$this->currentAttack = random_int(1,6);
		$this->rollFreeze();
		return $this->currentAttack;
	}

}
