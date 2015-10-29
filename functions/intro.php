<?php
//Intro to function

//A function is something you can call over and over.



function mother() {
    //All code for the function goes here
    echo 'hello mother!';
    echo '<br />';
    for($i = 0; $i < 10; $i++) {
        echo 'father';
        echo '<br />';
    }
}

mother();
