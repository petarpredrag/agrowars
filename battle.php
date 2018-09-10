<?php

require('Class/ClassLoader.php');

if(($army1 = $_GET["army1"]) && ($army2 = $_GET["army2"]))
{
  if($_GET["size"])
  {
    $battle = new Battle(new Army($army1), new Army($army2), $_GET["size"]);
  }
  else
  {
    $battle = new Battle(new Army($army1), new Army($army2));
  }
  $battle->fight();
}
else
{
  echo "Even a fruit war can't be fought without two armies - old fructose saying<br>";
}
