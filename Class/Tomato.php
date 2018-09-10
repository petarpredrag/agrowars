<?php

require_once('Soldier.php');

class Tomato extends Soldier
{
    public function __construct()
    {
        $this->name = random_int(1, 1000);
        $this->type = "Tomato";
        $this->baseAttack = random_int(-1, 2);
        $this->freezeThresh = random_int(10, 15);
    }

    public function rollCombat(array $location): int
    {
        $this->currentAttack = random_int(1, 6);
        $this->checkBuffs($location);
        $this->rollFreeze($location);
        return $this->currentAttack;
    }

    protected function checkBuffs(array $location)
    {
        if (!$location['isDay']) {
            $this->currentAttack -= 2;
        }
        if ($location['sunny']) {
            $this->currentAttack += 3;
        }
    }
}
