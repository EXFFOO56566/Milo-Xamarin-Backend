<?php
  class Post_model extends CI_Model{
      
      public function getAllData($tableName, $Condition = []){
         $Result = $this -> db ->where($Condition)-> get($tableName); 
         return $Result -> result();
      }
      
      public function insert($tableName, $data){
          $this -> db -> insert($tableName, $data);
          return $this -> db -> insert_id();
      }
      
      public function update($Tablename, $data, $condition){
          $this -> db -> where($condition) -> update($Tablename, $data);
          return $this -> db -> affected_rows();
      }
      
      public function delete($Tablename, $condition){
          $this -> db -> delete($Tablename, $condition);
          return 1;
      }
  }
?>
