<?php



class Army
{
    public $number;
    public $soldiers = [];
    public $graveyard = [];
    protected $bananaCount;   // doesn't dynamically change, shows initial state before battle
  protected $melonCount;    // -||-
  protected $tomatoCount;   // -||-

  public function __construct(int $number = 100)
  {
      if ($number > 10000) {
          $number = 10000;
          echo "This isn't War of the worlds, creating a bit smaller army:)".PHP_EOL;
      }
      $this->number = $number;
      $this->bananaCount = $number;
      $this->setTomatos();
      $this->setMelons();
      $this->makeArmy();
  }

    public function draftTroops(int $troopSize): array
    {
        $a = array_rand($this->soldiers, $troopSize);
        if (getType($a) == "integer") {
            $a = array($a);
        }
        return $a;
    }


    public function buryDead(array $array)
    {
        foreach ($array as $id) {
            if ($this->soldiers[$id]->isDead()) {
                $this->graveyard[$id] = $this->soldiers[$id];
                unset($this->soldier[$id]);
                $this->number -= 1;
            }
        }
    }


    protected function setTomatos()
    {
        $this->tomatoCount = ceil(($this->number / 100) * random_int(15, 25));
        $this->bananaCount -= $this->tomatoCount;
    }

    protected function setMelons()
    {
        $this->melonCount = ceil(($this->number / 100) * random_int(5, 15));
        $this->bananaCount -= $this->melonCount;
    }

    protected function makeArmy()
    {
        $this->makeBananas();
        $this->makeTomatos();
        $this->makeMelons();
        shuffle($this->soldiers);
    }

    protected function makeBananas()
    {
        for ($i = 0; $i < $this->bananaCount; $i++) {
            $this->soldiers[$i] = new Banana;
        }
    }

    protected function makeTomatos()
    {
        for ($i = 0; $i < $this->tomatoCount; $i++) {
            $this->soldiers[$i+$this->bananaCount] = new Tomato;
        }
    }

    protected function makeMelons()
    {
        for ($i = 0; $i < $this->melonCount; $i++) {
            $this->soldiers[$i+$this->bananaCount+$this->tomatoCount] = new Melon;
        }
    }
}
