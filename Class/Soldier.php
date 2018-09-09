<?php

require('Banana.php');
require('Tomato.php');
require('Melon.php');
require('../Traits/Location.php')

class Soldier
{
	use Location;

	protected $name;
  protected $type;
	protected $baseAttack;
	protected $currentAttack;
	protected $freezeThresh;
	protected $dead;



	//public static function make(

	public function getName()
  {
    return $this->name;
  }

  public function getType()
  {
    return $this->type;
  }

	public function die()
	{
		$this->dead = 1;
	}

	protected function rollFreeze()
	{
		if($this->freezeThresh > $this->$temp)
		{
			if(random_int(1,3) == 1)
			{
				$this->currentAttack = 0;
				echo $this->type." ".$this->name." froze and is unable to fight!".PHP_EOL;
			}
		}
	}

	public function reset()
	{
		$this->currentAttack = $this->baseAttack;
	}

}
