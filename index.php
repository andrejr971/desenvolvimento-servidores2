<?php
  $path = $_GET['url'] ?? 'dashboard';

  $pathExplode = explode('/', $path);

  if(file_exists("./{$path}.php")) {
    include_once("./{$path}.php");
  } else {
    include_once("./dashboard.php");
  }
?>