<?php

require('Class/ClassLoader.php')

$army1 = 67//$_GET["army1"];
$army2 = 86//$_GET["army2"];
//$troopSize = //$_GET["size"];

$battle = new Battle(new Army($army1), new Army($army2));
$battle->fight();
