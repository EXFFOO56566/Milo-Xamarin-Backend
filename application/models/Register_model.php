<?php
 class Register_model extends CI_Model{
     
     public function register($data){
         return $this -> db -> insert('register', $data);
     }
     
     public function login($ConditionArray){
         if($this -> db -> where($ConditionArray)-> count_all_results('register') == 1){             
             $RandNo = hashcode(rand(10000,99999));             
             $this -> db ->where($ConditionArray)-> update('register', ['token_code' => $RandNo]);
             return $RandNo;             
         }else{
             return 0;
         }
     }
     
     public function passwordupdate($Password){
         if($this -> db -> where(['email_id' => $this -> session -> userdata('RegEmailID')]) -> update('register', ['password' => $Password])):
         return 1;
         else:
         return 0;    
         endif;
     }
 }
?>