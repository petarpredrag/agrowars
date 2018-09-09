<?php

class Battle
{
	protected $turnCounter = 0;
	protected $troopSize;
	protected $turnTroops = [];
	protected $attacker;
  protected $army = [];


	public function __construct(Army $army1, Army $army2, int $troopSize = 0)
	{
		$this->army[0] = $army1;
		$this->army[1] = $army2;
    if(!$this->troopSize = $troopSize)
    {
      $this->troopSize = min($this->army[0]->number, $this->army[1]->number) / 10;
    }
	}


  public function fight()
  {
    while (($this->army[0]->number $$ $this->army[0]->number) > 0)
		{
			$this->newTurn();
		}
		if($this->army[0]->number)
		{
			echo "Army 1 wins! Army 2 is no more.".PHP_EOL;
			echo "Survivors:".PHP_EOL;
			foreach ($this->army[0]->soldiers as $soldier)
			{
				echo $soldier->getType()." ".$soldier->getName().PHPEOL;
			}
		}
		else
		{
			echo "Army 2 wins! Army 1 is no more.".PHP_EOL;
			echo "Survivors:".PHP_EOL;
			foreach ($this->army[1]->soldiers as $soldier)
			{
				echo $soldier->getType()." ".$soldier->getName().PHPEOL;
			}
		}
  }

  protected function newTurn()
  {
		$this->turnCounter += 1;
		$this->setAttacker();
		$this->draftTroops();
		$this->combat();
		$this->cleanUp()
  }

	protected function setAttacker()
	{
		if($this->turnCounter & 1)
		{
			$this->attacker = 0;
			echo "Army 1 attacks first this turn!";
		}
		else
		{
			$this->attacker = 1;
			echo "Army 2 attacks first this turn!";
		}
	}
	protected function draftTroops()
	{
		if(($last = min($this->army[0]->number, $this->army[1]->number)) < $this->troopSize)
		{
			$this->troopSize = $last;
		}
		foreach($this->army as $key => $army)
		{
			$this->$turnTroops[$key] = $army->draftTroops($this->troopSize);
		}
	}

	protected function combat()
	{
		foreach($this->turnTroops[0] as $id)
		{
			$a = $this->army[0]->soldiers[$id]->rollCombat();
			$b = $this->army[1]->soldiers[$id]->rollCombat();
			if(($a > $b) OR (($a = $b) && ($this->attacker == 0)))
			{
				$this->army[1]->soldiers[$id]->die();
				$this->army[0]->soldiers[$id]->reset()
				echo $this->army[0]->soldiers[$id]->getType()." ".$this->army[0]->soldiers[$id]->getName()." hits for ".$a." damage and squashes ".$this->army[1]->soldiers[$id]->getType()." ".$this->army[1]->soldiers[$id]->getName()." and his roll of ".$b.PHP_EOL;
			}
			elseif(($a < $b) OR (($a = $b) && ($this->attacker == 1)))
			{
				$this->army[0]->soldiers[$id]->die();
				$this->army[1]->soldiers[$id]->reset()
				echo $this->army[1]->soldiers[$id]->getType()." ".$this->army[1]->soldiers[$id]->getName()." hits for ".$b." damage and squashes ".$this->army[0]->soldiers[$id]->getType()." ".$this->army[0]->soldiers[$id]->getName()." and his roll of ".$a.PHP_EOL;
			}
		}
	}

	protected cleanUp()
	{
		foreach($this->army as $key => $army)
		{
			$army->buryDead($this->turnTroops[$key]);
		}
	}

}
