Agro-wars
---------
Fruits and vegetables fight in this epic random battle!<br />

Script: battle.php<br />

Query strings:
int army1 - number of soldiers for Army 1<br />
int army2 - number of soldiers for Army 2<br />
int size - number of soldiers fighting per turn (optional)<br />

Logic:
Battle is set on a random location (actual readings taken from www.apixu.com API) with its own time and weather conditions.<br />
Each turn a group of soldiers fight, one on one. Each rolls a virtual 6-sided die. The result is added up to the soldier's base attack.<br />
After that any remaining extra buffs or debuffs are added (i.e. for tomato).<br />
Every soldier has a freeze threshold, if the temperature is below, soldiers fighting in a turn have 1/3 chance of freezing - rolling 0 on attack.<br />
Soldier with the higher roll squashes (or to put it bluntly, kills) his enemy who is removed from the army and buried.<br />
In case of a tie, soldier from the attacking army wins the roll - attacking armies swap each turn.<br />
Turns are repeated until one army has no soldiers left - the surviving army wins!<br />



Soldier types:<br />

Banana<br />
Base attack = 0-3<br />
Freeze threshold = 10-18 °C<br />

Melon<br />
Base attack = 0<br />
Freeze threshold = 5-10 °C<br />

Tomato<br />
Base attack = -1,2<br />
Freeze threshold = 10-15 °C<br />
On sunny days, tomato gets +3 on attack.<br />
At night, tomato suffers a -2 penalty on attack.<br />
