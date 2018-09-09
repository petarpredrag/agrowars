<?php

require('Banana.php');
require('Tomato.php');
require('Melon.php');

class Soldier //ne extenda Army
{


	protected $name;
  protected $type;
	protected $baseAttack;
	protected $currentAttack;
	protected $freezeThresh;
	protected $frozen;
	protected $dead;



	//public static function make(

  public function getType()
  {
    return $this->type;
  }

	public function die()
	{
		$this->dead = 1;
	}

	public function rollFreeze(int $temp)
	{
		if($this->freezeThresh > $temp)
		{
			if(random_int(1,3) == 1)
			{
				$this->frozen = 1;
			}
		}

	}

	public function reset()
	{
		$this->frozen = 0;
		$this->currentAttack = $this->baseAttack;
	}

}
