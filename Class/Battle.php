<?php

class Battle
{
	protected $turnCounter;
	protected $troopSize;
	protected $turnTroops = []; // ( 0 => $army1[ 0 => $this->army1->soldiers[$id], ...], 1=> $army2[...])
	protected $attacker;
  protected $army = [];
	protected $location;

	public function __construct(Army $army1, Army $army2, Location $location, int $troopSize = 0)
	{
		$this->army[0] = $army1;
		$this->army[1] = $army2;
		$this->location = $location;
    if(!$this->troopSize = $troopSize)
    {
      $this->troopSize = min($this->army[0]->number, $this->army[1]->number) / 10;
    }
	}



  public function fight()
  {
    $this->newTurn();
  }

  protected function newTurn()
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



	protected function freezeCheck()
	{
		foreach($this->turnTroops as $key => $troop)
		{
			foreach($troop as $id)
			{
				if($this->armies[$key]->getSoldier($id)-> ==
