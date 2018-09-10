<?php

class Battle
{
    use Location;

    protected $turnCounter = 0;
    protected $troopSize;
    protected $turnTroops = [];
    protected $attacker;
    protected $army = [];
    protected $location = [];


    public function __construct(Army $army1, Army $army2, int $troopSize = 0)
    {
        $this->army[0] = $army1;
        $this->army[1] = $army2;
        if (!$this->troopSize = $troopSize) {
            $this->troopSize = ceil(min($this->army[0]->number, $this->army[1]->number) / 10);
        }
        $this->location = $this->getLocation();
    }


    public function fight()
    {
        $this->showLocation();
        while (($this->army[0]->number > 0) and ($this->army[1]->number > 0)) {
            $this->newTurn();
        }
        if ($this->army[0]->number) {
            echo "<br>";
            echo "Army 1 wins with ".$this->army[0]->number." survivors! Army 2 is no more.<br>";
        } elseif ($this->army[1]->number) {
            echo "<br>";
            echo "Army 2 wins with ".$this->army[1]->number." survivors! Army 1 is no more.<br>";
        } else {
            echo "<br>";
            echo "It's a tie! Meaning everyone's dead :(";
        }
    }

    protected function showLocation()
    {
        echo "<br>";
        echo "Battle location: ".$this->location['city']."<br>";
        if ($this->location['isDay']) {
            echo "Time: day";
            if ($this->location['sunny']) {
                echo ", sunny - tomatoes get +3 Attack";
            }
        } else {
            echo "Time: night - tomatoes suffer -3 Attack penalty";
        }
        echo "<br>";
        echo "Temperature: ".$this->location['temp']." °C<br>";
    }

    protected function newTurn()
    {
        $this->turnCounter += 1;
        $this->setAttacker();
        $this->draftTroops();
        $this->combat();
        $this->cleanUp();
    }

    protected function setAttacker()
    {
        echo "<br>";
        if ($this->turnCounter & 1) {
            $this->attacker = 0;
            echo "Turn ".$this->turnCounter.": Army 1 attacks first!<br>";
        } else {
            $this->attacker = 1;
            echo "Turn ".$this->turnCounter.": Army 2 attacks first!<br>";
        }
    }
    protected function draftTroops()
    {
        if (min($this->army[0]->number, $this->army[1]->number) < $this->troopSize) {
            $this->troopSize = min($this->army[0]->number, $this->army[1]->number);
        }
        foreach ($this->army as $key => $army) {
            $this->turnTroops[$key] = $army->draftTroops($this->troopSize);
        }
    }

    protected function combat()
    {
        foreach (array_combine($this->turnTroops[0], $this->turnTroops[1]) as $id1 => $id2) {
            $a = $this->army[0]->soldiers[$id1]->rollCombat($this->location);
            $b = $this->army[1]->soldiers[$id2]->rollCombat($this->location);
            if (($a > $b) or (($a == $b) && ($this->attacker == 0))) {
                $this->army[1]->soldiers[$id2]->die();
                $this->army[0]->soldiers[$id1]->reset();
                echo $this->army[0]->soldiers[$id1]->getType()." ".$this->army[0]->soldiers[$id1]->getName()." hits for ".$a." damage and squashes ".$this->army[1]->soldiers[$id2]->getType()." ".$this->army[1]->soldiers[$id2]->getName()." that rolled ".$b."<br>";
            } elseif (($a < $b) or (($a == $b) && ($this->attacker == 1))) {
                $this->army[0]->soldiers[$id1]->die();
                $this->army[1]->soldiers[$id2]->reset();
                echo $this->army[1]->soldiers[$id2]->getType()." ".$this->army[1]->soldiers[$id2]->getName()." hits for ".$b." damage and squashes ".$this->army[0]->soldiers[$id1]->getType()." ".$this->army[0]->soldiers[$id1]->getName()." that rolled ".$a."<br>";
            }
        }
    }

    protected function cleanUp()
    {
        foreach ($this->army as $key => $army) {
            $army->buryDead($this->turnTroops[$key]);
            unset($this->turnTroops[$key]);
        }
        echo "<br>";
        echo "Army 1: ".$this->army[0]->number." soldiers alive<br>";
        echo "Army 2: ".$this->army[1]->number." soldiers alive<br>";
    }
}
