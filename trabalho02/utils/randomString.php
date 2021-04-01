<?php 
  function randomString($lenght = 4): string {
    $keys = array_merge(range('a', 'z'));

    $string = '';
    for ($i = 0; $i <= $lenght; $i++) 
    {
        $string .= $keys[array_rand($keys)];
    }

    return substr($string, 0, $lenght);
  }