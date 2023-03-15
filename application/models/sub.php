<?php
class Subscription_model extends CI_Model{
    
    
    public function view($conditionArray = []){
        $Result = $this -> db -> get_where('subscription', $conditionArray) -> result();
        return $Result;
    }
    
    public function add($InsertData){
       $this->db->insert('subscription', $InsertData);
       return $this->db->insert_id();
    }
    
    public function update($data, $conditionArray){
        $this -> db -> where($conditionArray) -> update('subscription', $data);
        return $this -> db -> affected_rows();
    }
    
    public function updatepayment($data, $conditionArray){
        $this -> db -> where($conditionArray) -> update('purchase', $data);
        return $this -> db -> affected_rows();
    }
    
    public function delete($condition){
        $this -> db -> delete('subscription', $condition);
        return 1; 
    } 
    
    
    public function purchase($InsertData){
       $this->db->insert('purchase', $InsertData);
       return $this->db->insert_id();
    }
    
    public function activepanael($ConditionArray = []){
        $Result = $this -> db -> select(['P.purchase', 'P.expiry_date', 'R.name as user_name', 'R.email_id', 'S.price', 'S.name as plan_name', 'P.id', 'P.is_active'])
                                -> from('purchase as P')
                                -> join('subscription as S', 'P.sub_id = S.id', 'inner')
                                -> join('register as R', 'R.id = P.register_id', 'inner')
                                -> where($ConditionArray)
                                -> get()
                                -> result();
        return $Result;                     
    }
    
    public function getactivepackage(){
         $Result = $this -> db -> select(['S.max_meeting', 'S.max_participants'])
                                -> from('purchase as P')
                                -> join('subscription as S', 'P.sub_id = S.id', 'inner')
                                -> where('P.register_id', $this -> session -> userdata('AyaUserLoginId'))
                                -> where(['P.is_active' => 1, 'P.expiry_date >=' => date('Y-m-d', time())])
                                -> order_by('P.id', 'DESC')
                                 -> limit(1)
                                -> get()
                                -> result();
         if(count($Result) > 0){
         return $Result[0]; 
         }else{
         return ['max_meeting' => 0, 'max_participants' => 0];     
         }
    }
}
?>
