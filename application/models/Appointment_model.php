<?php
class Appointment_model extends CI_Model{
    
    public function view($Condition = []){
        $Result = $this -> db -> select(['id', 'title', 'date', 'start_time', 'end_time', 'location', 'whom_meet', 'note', 'created_at']) -> from('appointment') -> where($Condition) -> get() -> result();  
        return $Result; 
    }
    
    public function add($InsertData){
       $this->db->insert('appointment', $InsertData);
       return $this->db->insert_id();
    }

    public function update($UpdateData, $condition){
      $this -> db -> where($condition) -> update('appointment', $UpdateData);
          return $this -> db -> affected_rows();
    }

    public function deletedata($TableName, $Condition) {
      return $this->db->delete($TableName, $Condition);
  }
    
}
?>