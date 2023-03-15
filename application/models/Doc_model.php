<?php
class Doc_model extends CI_Model{
    
    public function view($Condition = []){
        $Result = $this -> db -> select(['id', 'name', 'doc_no', 'issue_date', 'expiry_date', 'issued_by', 'country_issue', 'file', 'created_at']) -> from('documents') -> where($Condition) -> get() -> result();  
        return $Result; 
    }
    
    public function add($InsertData){
       $this->db->insert('documents', $InsertData);
       return $this->db->insert_id();
    }

    public function update($UpdateData, $condition){
      $this -> db -> where($condition) -> update('documents', $UpdateData);
          return $this -> db -> affected_rows();
    }

    public function deletedata($TableName, $Condition) {
      return $this->db->delete($TableName, $Condition);
  }
    
}
?>