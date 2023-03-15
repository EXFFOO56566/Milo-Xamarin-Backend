<?php
class Todo_model extends CI_Model{
    
    public function view($Condition = []){
        $Result = $this -> db -> select(['id', 'title', 'location', 'place_visit', 'date', 'start_time', 'category_id', 'list', 'note', 'created_at']) -> from('todo') -> where($Condition) -> get() -> result();  
        return $Result; 
    }

    public function viewapi($Condition = []){
        $rArray = [];
        $Result = $this -> db -> select(['T.id', 'T.title', 'T.location', 'T.place_visit', 'T.date', 'T.start_time', 'C.name as category_name', 'T.list', 'T.list', 'T.created_at'])
                              -> from('todo as T')
                              -> join('todo_category as C', 'C.id = T.category_id', 'inner')
                              -> where($Condition)
                              -> get()
                              -> result();

        foreach($Result as $val){
            $rArray[] = [
                'title' => $val -> title,
                'id' => $val -> id,
                'location' => $val -> location,
                'place_visit' => $val -> place_visit,
                'date' => $val -> date,
                'start_time' => $val -> start_time,
                'category_name' => $val -> category_name,
                'list' => json_decode($val -> list)
            ];
        }

        return $rArray;
    }
    
    public function catview($Condition = []){
        $Result = $this -> db -> select(['id', 'name', 'created_at']) -> from('todo_category') -> where($Condition) -> get() -> result();  
        return $Result; 
    }
    
     public function listview($Condition = []){
        $Result = $this -> db -> select(['id', 'name', 'created_at']) -> from('todo_list') -> where($Condition) -> get() -> result();  
        return $Result; 
    }
    
    public function addcat($InsertData){
       $this->db->insert('todo_category', $InsertData);
       return $this->db->insert_id(); 
    }
    
    public function addlist($InsertData){
       $this->db->insert('todo_list', $InsertData);
       return $this->db->insert_id(); 
    }
    
    public function add($InsertData){
       $this->db->insert('todo', $InsertData);
       return $this->db->insert_id();
    }
    
    public function updatecat($UpdateData, $condition){
      $this -> db -> where($condition) -> update('todo_category', $UpdateData);
          return $this -> db -> affected_rows();
    }
    
     public function updatelist($UpdateData, $condition){
      $this -> db -> where($condition) -> update('todo_list', $UpdateData);
          return $this -> db -> affected_rows();
    }

    public function update($UpdateData, $condition){
      $this -> db -> where($condition) -> update('todo', $UpdateData);
          return $this -> db -> affected_rows();
    }

    public function deletedata($TableName, $Condition) {
      return $this->db->delete($TableName, $Condition);
  }
    
}
?>