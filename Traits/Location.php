<?php

trait Location
{

  public function getLocation(): array
  {
    $array = json_decode(file_get_contents('json/'.rand(1,18).'.json'), true);
    $location['city'] = $array['location']['name'].", ".$array['location']['country'];
    $location['temp'] = $array['current']['temp_c'];
    $location['isDay']  = $array['current']['is_day'];
    if($array['current']['condition']['text'] == "sunny")
    {
      $location['sunny'] = TRUE;
    }
    else
    {
      $location['sunny'] = FALSE;
    }
    return $location;
  }
}
