<?php
class File_model extends CI_Model{
    
    public function view($Condition = []){
        $Data = [];
        $Result = $this -> db -> select(['file_id', 'details', 'title', 'image', 'share_by', 'created_at']) -> from('file_share') -> where($Condition) -> get() -> result_array();
        foreach($Result as $value){
            
           $username = $shareby = ''; 
           $Fresult = $this -> db -> select(['R.name', 'R.id']) 
                                 -> from('file_share as F')
                                 -> join('register as R', 'R.id = F.register_id', 'inner')
                                 -> where('F.file_id', $value['file_id']) 
                                 -> get() 
                                 -> result();
         
           foreach($Fresult as $fvalue){
              if($value['share_by'] != $fvalue -> id){
              if($username != ''){
              $username .= ', '.$fvalue -> name;
              }else{
              $username = $fvalue -> name;    
              }
              }else{
                  $shareby = $fvalue -> name;
              }
           }
           $Data[] = (object) array_merge(['title' => $value['title'], 'date' => $value['created_at'], 'id' => $value['file_id'], 'file' => $value['image'], 'details' => $value['details']], ['share_with' => $username], ['share_by' => $shareby]);
           
        }
        $objectData = $Data;
        return $objectData; 
    }
    
    public function add($InsertData){
       $this->db->insert('file_share', $InsertData);
       return $this->db->insert_id();
    }
    
    public function getgroupId(){
        $Result = $this -> db -> select('user_id') -> from('register') -> where(['id' => $this -> session -> userdata('AyaUserLoginId'), 'status' => 1]) -> get() -> result();
        return substr(time(), -4);        
     }
    
     public function registerData(){
        $UserArray = []; 
        $Result = $this -> db -> select(['name', 'id']) -> from('register') -> where(['id !=' => $this -> session -> userdata('AyaUserLoginId'), 'status' => 1]) -> get() -> result();
        foreach($Result as $value){
           $UserArray[$value -> id] = $value -> name; 
        } 
        
        return $UserArray;
     }
     
     public function getnextGroupId($token_code){
        $Result = $this -> db -> select('user_id') -> from('register') -> where(['token_code' => $token_code, 'status' => 1]) -> get() -> result();
        return $Result[0] -> user_id.'_'.substr(time(), -4);        
     }
}
?>
