<?php
// Objects

// Class = template for an object
// Object is a class in use. Classes instantiate objects
// Function is a method.
// values at the top = properties.

// Think of: Single Item
// Box

//Permissions: private, public, protected

class Base
{
    public $_name = "Sebastian";
}

class Validate extends Base
{
    public function __construct() 
    {
        echo "Created! " . __CLASS__;
        echo "<br />";
        echo $this->_name;
    }
}

// Instance == a copy of a class
$val = new Validate();
echo $val->_name;

