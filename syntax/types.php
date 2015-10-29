<?php

//Types

/**
 * 
 * integers
 * decimals
 * strings
 * arrays
 * objects
 * 
 * */
 
 //Integer
 $i = 5;
 $i = -50000;
 
 //Decimals
 $d = 5.25;
 
 //Strings
 $s = "hello!";
 
 //Arrays (PHP 5.6)
 $calendar = []; //new way
 $calendar[1] = 'Monday';
 $calendar[2] = 'Tuesday';
 
 echo print_r($calendar);
 
 //Objects
 $obj = new stdClass();
 $obj->name = "Ted";
 print_r($obj);