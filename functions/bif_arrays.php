<?php
//BIF Arrays

$data = [
    "Walker",
    "Horse",
    "Cat",
    "Sebastian"
];


$data[] = "Man";
array_unshift($data, "Hello world");

$find = "Bob";

if (in_array($find, $data)) {
    echo "There is a $find!";
} else {
    echo "There is no $find!";
}


echo "<pre>";
print_r($data);