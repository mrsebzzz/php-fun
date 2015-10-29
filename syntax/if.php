<?php
//If

$foo = 30;
$bar = 20;

//Ternary (Not required)
echo ($foo == $bar) ? 'True' : 'False';


echo '<hr />';

if ($foo == $bar) {
  echo "Match!";  
} else if ($foo > $bar) {
    echo "Less!";
} else {
    echo "Nope!";
}