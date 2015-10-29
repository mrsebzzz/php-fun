<?php
// Objects

class Validate
{
    
    /**
     * @var array $_error keeps track of errors
     */
    
    private $_error =[];
    
    public function __construct()
    {
        
    }
    
    /**
     * validate length ofs tring based off an arary
     * @param string $str
     * @param array $array first value is min, second value is max
     * @return boolean
     * 
     */
    
    public function length($str, $array) //Method
    {
        if(!is_array($array) && count($array) != 2) {
            die("length \$array parameters must be twovalues for min/max");
        }
        if (strlen($str) < $array[0] || strlen($str) > $array[1] ) {
            $this->_error("Min length is {$array[0]} and Max length is {$array[1]}");
            return false;
        }
        return true;
    }
    
    /**
     * 
     * Validate the min length of string
     * 
     * @param string $str
     * @param integer $int
     * 
     * @return boolean
     * 
     */
    
    public function min_length($str, $int) //Method
    {
        if (strlen($str) < $int) {
            $this->_error("Min length is $int");
            return false;
        }
        return true;
    }
    
    /**
     * 
     * Validate the max length of string
     * 
     * @param string $str
     * @param integer $int
     * 
     * @return boolean
     * 
     */
     
    public function max_length($str, $int) //Method
    {
        if (strlen($str) > $int) {
            $this->_error("$str min length is $int");
            return false;
        }
        return true;
    }


    /**
     * Validate if a string is numberico nly
     * 
     * @param string $str
     * @return boolean
     */
     
    public function is_numeric() {
        if (!is_numeric($str)) {
            $this->_error("Not numberic");
            return false;
        }
        return true;
    }
    
    public function is_alpha($str) {
        if (!ctype_alpha($str)) {
            $this->_error("not alpha");
            return false;
        }
        return true;
    }
    
    public function is_alphanum($str) {
        if (!ctype_alnum($str)) {
            $this->_error("not alphanum");
            return false;
        }
        return true;
    }
    
    /**
     * Returns any errors that may have happened.
     * @return mixed true for succes or array for error list
     */
    
    public function submit() 
    {
        if (empty($this->_error)) {
            return true;
        }
        return false;
    }

    /**
     * Getter for fetching error list
     * @return array
     */
     
    public function get_errors() {
        return $this->_error;
    }
    
    /**
     * Privately collects errors
     * @param string $details
     */
    
    private function _error($details) 
    {
        $this->_error[] = $details;
    }
}


echo "<hr />";

    $val = new Validate();
    
    echo "<br />";
    $val->max_length("Sebastian", 2);
    echo "<br />";
    $val->min_length("Sebastian", 12);
    echo "<br />";
    $val->length("Sebastian", [9, 12]);
    
    $val->is_alpha("dog");
    $val->is_alphanum("dog");
    $val->is_numeric("sebastian");

    if (!$val->submit()) {
        $errors = $val->get_errors();
        echo "<pre>";
        print_r($errors);
    }