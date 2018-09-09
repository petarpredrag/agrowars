<?php

class Melon extends Soldier
{
	public function __construct()
	{
		$this->name = random_int(1,1000);
    $this->type = "Melon";
		$this->baseAttack = 0;
		$this->frozen = 0;
	}
}
