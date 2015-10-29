<?php

//Operators

//Math Operators (Arithmatic)

$num = 5;
$bum = 2;
$bum += 25;
echo $bum;
echo '<br />';

echo $num + $bum;
echo '<br />';

echo $num - $bum;
echo '<br />';

echo $num * $bum;
echo '<br />';

echo ($num / $bum) + 25;
echo '<br />';

//String operators;

$first_name = "Jehtro";
$last_name = "Tull";

$full = "$first_name $last_name";
echo $full;
echo '<br />';

$n = 'J';
$n .= 'e'; //add to string
$n .= 'f'; //add to string
$n .= 'f'; //add to string

echo $n;

echo '<hr />';
//Comparison Operators

$x = 5;
$y = 5;

echo (string) $x == $y;

/**
 * 
 * > Greater Than
 * < Less Than
 * == Equals
 * 
 * === Equals + type
 * 
 */