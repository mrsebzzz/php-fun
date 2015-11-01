<?php

date_default_timezone_set('UTC');

//Required Files
require 'lib/crud.php';
// require 'lib/example.php';

// Always has a session going
session_start();

// Constants
define('DATETIME', date('Y-m-d H:i:s'));
define('SALT', '123456789456123');


// Functions
function hash256($string) {
    return hash('sha256', $string, SALT);
}