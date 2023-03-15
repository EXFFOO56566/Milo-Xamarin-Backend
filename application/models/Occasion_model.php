<?php
class Occasion_model extends CI_Model{
    
    public function view($Condition = []){
        $Result = $this -> db -> select(['id', 'name', 'occasion_type', 'start_date', 'end_date', 'note', 'relation', 'created_at']) -> from('occasion') -> where($Condition) -> get() -> result();  
        return $Result; 
    }
    
    public function add($InsertData){
       $this->db->insert('occasion', $InsertData);
       return $this->db->insert_id();
    }

    public function update($UpdateData, $condition){
      $this -> db -> where($condition) -> update('occasion', $UpdateData);
          return $this -> db -> affected_rows();
    }

    public function deletedata($TableName, $Condition) {
      return $this->db->delete($TableName, $Condition);
  }
    
}
?>