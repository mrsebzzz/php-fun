<?php
//PHP: Prepared statements

require "connection.php";

//DB Handler

$sql = "INSERT INTO phone (name) VALUES(:name)";


$stmt = $dbh->prepare($sql);
$stmt->execute(['name' => 'Udmey']);
echo $dbh->lastInsertId();
