<?php
// CRUD - Create Read Update and Delete - Database

class CRUD extends PDO {
    
    public function __construct($db_type, $db_name, $db_host, $db_user, $db_pass) {
        try {
            $dsn ="$db_type:dbname=$db_name;host=$db_host";
            parent::__construct($dsn, $db_user, $db_pass);
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            die($e->getMessage());
        }

    }
    
    public function select() {
        
    }
    
    public function insert() {
        
    }
    
    public function update() {
        
    }
    
    public function delete() {
        
    }
}

$crud = new CRUD('mysql', 'demo', 'localhost', 'sebasw9', '');

$crud->insert();