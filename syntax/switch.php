<?php

//Switch

$age = 30;

switch($age) {
    case 25:
        echo "You are young!";
        break;
    case 30:
    case 50:
        echo "You are wise!";
        break;
    default:
        echo "You are unknown!";
        break;
}