<?php

$locations = array(
  3 => array("Building1", 2),
  2 => array("Area1", 1),
  0 => array("Floor1", 3),
  1 => array("City1"),
  4 => array("Room1", 0),

  13 => array("Building2", 12),
  12 => array("Area2", 11),
  14 => array("Room2", 10),
  10 => array("Floor2", 13),
  11 => array("City2")
);

hierarchies($locations);

function hierarchies($locations)
{ 
  $index=[];
  $roots=[];
  $result='';
  foreach($locations as $k => $v) {
      if (count($v) == 2){
        $index[$v[1]] = $k;
      }else{
        $roots[] = $k; 
      }     
  }
  
  foreach($roots as $root) {
      $path = [];
      $node = $root;
      while (isset($index[$node])) {
          $path[] = $locations[$node][0];
          $node = $index[$node];
      }
      $path[] = $locations[$node][0];
      $result.= implode(" > ", $path) . PHP_EOL.'<br>';
  }

  echo $result;
}
?>