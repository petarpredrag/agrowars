Agro-wars
---------
Fruits and vegetables fight in this epic random battle!

Script: battle.php

Query strings:
int army1 - number of soldiers for Army 1<br />
int army2 - number of soldiers for Army 2<br />
int size - number of soldiers fighting per turn (optional)<br />

Logic:
Battle is set on a random location (actual readings taken from www.apixu.com API) with its own time and weather conditions.
Each turn a group of soldiers fight, one on one. Each rolls a virtual 6-sided die. The result is added up to the soldier's base attack.
After that any remaining extra buffs or debuffs are added (i.e. for tomato).
Every soldier has a freeze threshold, if the temperature is below, soldiers fighting in a turn have 1/3 chance of freezing - rolling 0 on attack.
Soldier with the higher roll squashes (or to put it bluntly, kills) his enemy who is removed from the army and buried.
In case of a tie, soldier from the attacking army wins the roll - attacking armies swap each turn.
Turns are repeated until one army has no soldiers left - the surviving army wins!



Soldier types:

Banana
Base attack = 0-3
Freeze threshold = 10-18 °C

Melon
Base attack = 0
Freeze threshold = 5-10 °C

Tomato
Base attack = -1,2
Freeze threshold = 10-15 °C
On sunny days, tomato gets +3 on attack.
At night, tomato suffers a -2 penalty on attack.
