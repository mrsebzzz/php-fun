<?php

date_default_timezone_set('UTC');

//Required Files
require 'lib/crud.php';
// require 'lib/example.php';

// Always has a session going
session_start();

// Always have a connection available
$crud = new CRUD('mysql', 'userx', 'localhost', 'sebasw9');

// Constants
define('DATETIME', date('Y-m-d H:i:s'));
define('SALT', '123456789456123');


// Functions
function hash256($string) {
    return hash('sha256', $string, SALT);
}

function protected_area() {
    // Protects dashboard from unauthorized user
    if (!isset($_SESSION['user_id'])) {
        header('Location: index.php');
    }
}
