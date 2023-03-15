<?php
class Features_model extends CI_Model{
    
    public function view($tableName, $conditionArray = []){
        $Result = $this -> db -> select('*') -> from($tableName) -> where($conditionArray) -> get();
        return $Result -> result();
    }
    
     public function add($tablename, $insertData){
        $this -> db -> insert($tablename, $insertData);
        return $this->db->insert_id();
    }
    
    
     public function update($tablename, $UpdateDate, $conditionArray){
        $this -> db -> where($conditionArray) -> update($tablename, $UpdateDate);
        return $this -> db -> affected_rows();
    }
    
     public function delete($Tablename, $condition){
      $this -> db -> delete($Tablename, $condition);
          return 1;   
    }
}
?>
