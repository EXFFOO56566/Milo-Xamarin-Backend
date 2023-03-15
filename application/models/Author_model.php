<?php

class Author_model extends CI_Model {
    
    public function countData($tableName, $conditionArray = array()){
        return $this -> db -> where($conditionArray) -> count_all_results($tableName);
    }

    public function author_login($ConditionArray = array()) {
        $Result = $this->db->get_where('register', $ConditionArray);
        if ($Result->num_rows() > 0) {
            $LoginResult = $Result->result_array();
            $this->session->set_userdata('AyaUserLoginId', $LoginResult[0]['id']);
            $this->session->set_userdata('AyaUserRole', $LoginResult[0]['role_id']);
            $this->session->set_userdata('AyaUserName', $LoginResult[0]['name']);
            $this -> session -> set_userdata("UserLogo", $LoginResult[0]['image']);
            return 1;
        }
    }
    
    /*
     * For Didtributer account.
     */
    
    public function dischangepassword($OldPassword, $NewPassword) {
        $this->db->where('id', $this->session->userdata('AyaUserLoginId'))
                ->where('password', encode($OldPassword))
                ->update('register', array('password' => encode($NewPassword)));
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function changepassword($OldPassword, $NewPassword) {
        $this->db->where('id', $this->session->userdata('AyaUserLoginId'))
                ->where('password', $OldPassword)
                ->update('register', array('password' => $NewPassword));
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function view($TableName, $ConditionArray = array(), $OrderBy = '', $OrderType = '') {
        $Result = $this->db->order_by($OrderBy, $OrderType)->get_where($TableName, $ConditionArray);
        return json_encode($Result->result());
    }

    public function adddata($TableName, $InsertData) {
        $this->db->insert($TableName, $InsertData);
        return $this->db->insert_id();
    }

    public function updatedata($TableName, $UpdateData, $Updateid) {
        $this->db->where('id', $Updateid)
                ->update($TableName, $UpdateData);
        return 1;
    }

    public function updateregdata($TableName, $UpdateData, $conditionArray) {
        $this->db->where($conditionArray)
                ->update($TableName, $UpdateData);
        return 1;
    }
    
    public function deletedata($TableName, $Condition) {
        return $this->db->delete($TableName, $Condition);
    }
    
    public function meetingView($ConditionArray = []){
       
        $Result = $this -> db -> select(['m.attendeePW', 'r.name', 'm.title', 'm.takeaways', 'm.id', 'm.created_by', 'm.password', 'm.meeting_id', 'm.starting_time', 'm.meeting_start_date', 'm.meeting_end_date', 'm.ending_time', 'm.agenda']) 
                              -> from('meeting_schedule as m')
                              -> join('register as r', 'r.id = m.created_by', 'inner')
                              -> join('meeting_schedule_details as d', 'd.schedule_id = m.id', 'inner')
                              -> where($ConditionArray)                              
                              -> where(['d.participate_id' => $this -> session -> userdata('AyaUserLoginId')])
                              -> group_by('m.meeting_id')
                              -> order_by("m.id", "DESC")
                              -> get() 
                              -> result();        
        return $Result; 
    }
    
    public function totalSubscription($conditionArray = []){
        $Result = $this -> db -> select('COUNT(R.id) as totalSubscription')
                              -> from('register as R')
                              -> join('purchase as P', 'P.id = R.purchase_id', 'inner')
                              -> where(['P.is_active' => 1, 'R.id >' => 1, 'P.expiry_date >=' => date('Y-m-d', time())])
                              -> get()
                              -> result();
        return $Result[0] -> totalSubscription;        
    }
    
    public function totalRenewal($conditionArray = []){
        $Result = $this -> db -> select('COUNT(R.id) as totalSubscription')
        -> from('register as R')
        -> join('purchase as P', 'P.id = R.purchase_id', 'inner')
        -> where(['P.is_active' => 1, 'R.id >' => 1, 'P.expiry_date <' => date('Y-m-d', time())])
        -> get()
        -> result();
       return $Result[0] -> totalSubscription;         
    }
    
    public function todayExpiry($conditionArray = []){
        $Result = $this -> db -> select('COUNT(R.id) as totalSubscription')
        -> from('register as R')
        -> join('purchase as P', 'P.id = R.purchase_id', 'inner')
        -> where(['P.is_active' => 1, 'R.id >' => 1, 'P.expiry_date' => date('Y-m-d', time())])
        -> get()
        -> result();
       return $Result[0] -> totalSubscription; 
    }
    
    public function activePackagename(){
         $Result = $this -> db -> select('S.name as package_name')
        -> from('register as R')
        -> join('purchase as P', 'P.id = R.purchase_id', 'inner')
        -> join('subscription as S', 'S.id = P.sub_id', 'inner')
        -> where(['R.id' => $this -> session -> userdata('AyaUserLoginId'), 'P.is_active' => 1, 'P.expiry_date >=' => date('Y-m-d', time())])
        -> get();        
       if($Result -> num_rows() > 0){  
       $queryResult = $Result-> result();    
       $packageName = $queryResult[0] -> package_name; 
       }else{
       $packageName = 'No package';
       }
       return $packageName;
    }
    
    public function totalMeeting(){
         $Result = $this -> db -> select('P.total_meeting as total_meeting')
        -> from('register as R')
        -> join('purchase as P', 'P.id = R.purchase_id', 'inner')
        -> join('subscription as S', 'S.id = P.sub_id', 'inner')
        -> where(['R.id' => $this -> session -> userdata('AyaUserLoginId'), 'P.is_active' => 1, 'P.expiry_date >=' => date('Y-m-d', time())])
        -> get();        
       if($Result -> num_rows() > 0){  
       $queryResult = $Result-> result();    
       $totalMeeting = $queryResult[0] -> total_meeting; 
       }else{
       $totalMeeting = '0';
       }
       return $totalMeeting;
        
    }
    
    public function createdMeeting(){
        
        $Result = $this -> db ->select("COUNT(S.id) as total_cerated_meeting")
                              -> from('register as R')
                              -> join('purchase as P', 'P.id = R.purchase_id', 'inner')
                              -> join('meeting_schedule as S', 'S.plan_id = P.id', 'inner')
                              -> where('R.id', $this -> session -> userdata('AyaUserLoginId'))                            
                              -> get()
                              -> result();
        
        return $Result[0] -> total_cerated_meeting;
    }

    public function totalCollection(){
        $Result = $this -> db -> select_sum("amount") ->from('purchase')->  where(['payment_status' => 1]) -> get() -> result();
        return $Result[0] -> amount?$Result[0] -> amount:'0.00';
    }

    public function presentMonthCollection(){
        $startingDate = date('Y-m', time()).'-01';
        $endingDate = date('Y-m', time()).'-31';
        $Result = $this -> db -> select_sum("amount") ->from('purchase')->  where(['payment_status' => 1, 'payment_date >=' => $startingDate, 'payment_date <=' => $endingDate]) -> get() -> result();
        return $Result[0] -> amount?$Result[0] -> amount:'0.00'; 
    }

    public function weeklyCollection(){
        $r = $this -> getStartAndEndDate(date('W', time()), date('Y', time()));
        $Result = $this -> db -> select_sum("amount") ->from('purchase')->  where(['payment_status' => 1, 'payment_date >=' => $r['week_start'], 'payment_date <=' => $r['week_end']]) -> get() -> result();
        return $Result[0] -> amount?$Result[0] -> amount:'0.00';  
    }

    public function todayCollection(){
        $Result = $this -> db -> select_sum("amount") ->from('purchase')->  where(['payment_status' => 1, 'payment_date' => date('Y-m-d', time())]) -> get() -> result();
        return $Result[0] -> amount?$Result[0] -> amount:'0.00';   
    }

    public function getStartAndEndDate($week, $year) {
        $dto = new DateTime();
        $ret['week_start'] = $dto->setISODate($year, $week)->format('Y-m-d');
        $ret['week_end'] = $dto->modify('+6 days')->format('Y-m-d');
        return $ret;
      }

}
?>