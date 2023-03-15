<?php
class Reminder_model extends CI_Model{
    
    public function view($Condition = []){
        $Result = $this -> db -> select(['id', 'title', 'type', 'start_date', 'end_date', 'note', 'created_at']) -> from('reminder') -> where($Condition) -> get() -> result();  
        return $Result; 
    }
    
    public function add($InsertData){
       $this->db->insert('reminder', $InsertData);
       return $this->db->insert_id();
    }

    public function update($UpdateData, $condition){
      $this -> db -> where($condition) -> update('reminder', $UpdateData);
          return $this -> db -> affected_rows();
    }

    public function deletedata($TableName, $Condition) {
      return $this->db->delete($TableName, $Condition);
  }
    
}
?>