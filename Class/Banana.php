<?php

class Banana extends Soldier
{
	public function __construct()
	{
		$this->name = random_int(1,1000);
    $this->type = "Banana";
		$this->baseAttack = random_int(0,3);
		$this->frozen = 0;
	}
}
