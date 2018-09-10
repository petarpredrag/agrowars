<?php

require("./Traits/Location.php");

class Soldier
{
	use Location;

	protected $name;
  protected $type;
	protected $baseAttack;
	protected $currentAttack;
	protected $freezeThresh;
	protected $dead = FALSE;


	public function getName()
  {
    return $this->name;
  }

  public function getType()
  {
    return $this->type;
  }

	public function isDead(): bool
	{
		return $this->dead;
	}

	public function die()
	{
		$this->dead = 1;
	}

	protected function rollFreeze(array $location)
	{
		if($this->freezeThresh > $location['temp'])
		{
			if(random_int(1,3) == 1)
			{
				$this->currentAttack = 0;
				echo $this->type." ".$this->name." froze at ".$location['temp']." degrees and is unable to fight!<br>";
			}
		}
	}

	public function reset()
	{
		$this->currentAttack = $this->baseAttack;
	}

}
