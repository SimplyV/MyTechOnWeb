<?php
  global $match;
  if(file_exists($match['params']['pageslug'].'.php')){
    require $match['params']['pageslug'].'.php';
  }
  else{
    require '404.php';
  }
?>