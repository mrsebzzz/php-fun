<?php
//Scope

$phone = "Galaxy";

function box(&$phone) {
    $phone = "Nexus";
}

box($phone);

echo $phone;