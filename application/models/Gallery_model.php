<?php
class Gallery_model extends CI_Model{
    
    public function view($Condition = []){
        $Result = $this -> db -> select(['id', 'title', 'category_id', 'image', 'created_at']) -> from('gallery') -> where($Condition)-> get() -> result();  
        return $Result; 
    }
    
    public function catview($Condition = []){
        $Result = $this -> db -> select(['id', 'name', 'details', 'cover_image', 'created_at']) -> from('gallery_category') -> where($Condition) -> get() -> result();  
        return $Result; 
    }
    
    public function addcat($InsertData){
       $this->db->insert('gallery_category', $InsertData);
       return $this->db->insert_id(); 
    }
   
    
    public function add($InsertData){
       $this->db->insert('gallery', $InsertData);
       return $this->db->insert_id();
    }
    
    public function updatecat($UpdateData, $condition){
      $this -> db -> where($condition) -> update('gallery_category', $UpdateData);
          return $this -> db -> affected_rows();
    }
    
     public function updatelist($UpdateData, $condition){
      $this -> db -> where($condition) -> update('gallery_list', $UpdateData);
          return $this -> db -> affected_rows();
    }

    public function update($UpdateData, $condition){
      $this -> db -> where($condition) -> update('gallery', $UpdateData);
          return $this -> db -> affected_rows();
    }

    public function deletedata($TableName, $Condition) {
      return $this->db->delete($TableName, $Condition);
  }
    
}
?>