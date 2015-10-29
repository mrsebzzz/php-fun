<?php
//Databse PDO

//mysql_connect is old. mysqli_connect i = improved... shoulnd't use this either.

//Connect to an ODBC database
    //Variables
    $db_type = "mysql";
    $db_name = "demo";
    $db_host = "localhost";
    $db_user = "sebasw9";
    $db_pass = "";

//PDO connection
    $dsn ="$db_type:dbname=$db_name;host=$db_host";
    
    try {
        $dbh = new PDO($dsn, $db_user, $db_pass);
        $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        
        foreach($dbh->query('SELECT * FROM phone') as $row) {
            echo "<pre>";
            print_r($row);
            echo $row['name'];
        }
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }