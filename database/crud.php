<?php
// CRUD - Create Read Update and Delete - Database

class CRUD extends PDO {
    
    //Define the table to use
    public $table = null;
    
    //-------------------------------------------------------------------------
    
    public function __construct($db_type, $db_name, $db_host, $db_user, $db_pass) {
        try {
            $dsn ="$db_type:dbname=$db_name;host=$db_host";
            parent::__construct($dsn, $db_user, $db_pass);
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            die($e->getMessage());
        }

    }
    
    //-------------------------------------------------------------------------
    
    public function select($columns, $where) {
        $this->_isTableSet();
        // $crud->select('*', ['project_id' => 2]);
    }
    
    //-------------------------------------------------------------------------
    
    
    /**
     * Inserts data into DB
     * 
     * @param array $data must be associate array ['column' => 'valiue]']
     * @return mixed Boolean or InsertID
     * 
     */
     
    public function insert($data) {
        $this->_isTableSet();

        $keys_array = array_keys($data);
        $keys       = '`' . implode('` , `', $keys_array) . '`';
        $params     = ':' . implode(' , :', $keys_array) . '';
        
        $sth = $this->prepare("INSERT INTO {$this->table} ($keys) VALUES($params)");
        $result = $sth->execute($data);
        
        if ($result == 1) {
            return$this->lastInsertId();
        }
        
        return false;

    }
    
    //-------------------------------------------------------------------------
    
    /**
     * 
     * @param array $data   associate key/value of values of change
     * @param mixed $where  Either an array or a number primary key index
     */
    
    public function update($data, $where) {
        $this->_isTableSet();
        
        
        // UPDATE table SET name = :something, other = :other
        // WHERE x = :x AND y = :y
        
        //return the true/false
        //$crud->update([
        //    'data' => 1,
        //    
        //], [
        //    'project_id' => 1    
       // ]);

    }
    
    //-------------------------------------------------------------------------
    
    public function delete($where) {
        $this->_isTableSet();
        
        if(is_numeric($where)) 
        {
            $primary = $this->table . '_id';
            echo $where_stmt = "`$primary` = :primary_key";
            $where = [
                'primary_key' => $where           
            ];
            
        } 
        elseif (is_array($where)) 
        {
            // Build the WHERE stmt
            $where_stmt = '';
                foreach ($where as $_key => $_value) {
                    $where_stmt .= "`$_key` = :$_key AND ";
                }
            $where_stmt = rtrim($where_stmt, ' AND ');            
        }
        

        
        $sth =$this->prepare("DELETE FROM {$this->table} WHERE $where_stmt");
        return $sth->execute($where);
    }
    
    //-------------------------------------------------------------------------
    
    private function _isTableSet() {
        if ($this->table == null) {
            die('you must set the $crud->table');
        }
    }
    
    //-------------------------------------------------------------------------
}

$crud = new CRUD('mysql', 'demo', 'localhost', 'sebasw9', '');

$crud->table = "phone";
//echo $crud->insert([
//    'name' => 'General',
//    'brand_id' => 2,
//]);

//echo $crud->delete(5);
//echo $crud->delete(['name' => 'General']);


$crud->update(['name' => 'Neux'], 8);


