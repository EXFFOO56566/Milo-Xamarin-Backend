<?php

class Calender_app_model extends CI_Model{
    
     public function registerData($token_code){
        $UserArray = []; 
        $Result = $this -> db -> select(['name', 'id']) -> from('register') -> where(['token_code !=' => $token_code, 'status' => 1]) -> get() -> result();
        return $Result;
     }
     
     public function userdetails($token_code){
        $UserArray = []; 
        $Result = $this -> db -> select('*') -> from('register') -> where(['token_code' => $token_code, 'status' => 1]) -> get() -> result();
        return $Result;  
     }
     
     public function searchuserdetails($Search_key){
        $UserArray = []; 
        $Result = $this -> db -> select(['id', 'name', 'email_id']) -> from('register') -> like('email_id', $Search_key, 'after') -> where('status', 1) -> get() -> result();
        return $Result; 
     }
     
    public function adddata($InsertData) {
        $this->db->insert('meeting_schedule', $InsertData);
        return $this->db->insert_id();
    }
    
    public function addmeetinghistory($InsertData) {
        $this->db->insert('meeting_history', $InsertData);
        return $this->db->insert_id();
    }
    
    public function adddetailsdata($InsertData){
       $this->db->insert('meeting_schedule_details', $InsertData);
       return $this->db->insert_id(); 
    }
    
     public function getnextMeetingId($token_code){
        $Result = $this -> db -> select('user_id') -> from('register') -> where(['token_code' => $token_code]) -> get() -> result();
        return $Result[0] -> user_id.'_'.substr(time(), -4);        
     }
     
     
     public function getmeetinghistory($user_id){
        $MeetingArray= []; 
        $Result = $this -> db -> select(['R.name', 'R.image', 'S.title as meeting_title', 'S.meeting_id', 'S.meeting_start_date as starting_date', 'S.meeting_end_date as end_date', 'TIMEDIFF(S.ending_time, S.starting_time) as meeting_duration', 'S.starting_time as strating_time', 'S.agenda', 'S.takeaways', 'S.ending_time', 'S.title'])
                              -> from('meeting_schedule as S')
                              -> from('meeting_schedule_details as D', 'D.schedule_id = S.id', 'inner')
                              -> join('register as R', 'R.id = S.created_by', 'inner')
                              -> where('D.participate_id', $user_id)
                              -> group_by('S.meeting_id')
                              -> order_by('S.meeting_start_date', 'DESC')
                              -> get()
                              -> result();
        
         $MeetingArray = $Result;
       
        return $MeetingArray;
     }


     
    public function getMeetingList($participate_id, $startDate, $endTime){

        $date = $startDate.' '.$endTime;
        $MeetingArray = [];
        $Result = $this -> db -> select(['m.title', 'm.created_by', 'm.meeting_status','m.takeaways', 'm.agenda', 'r.name as created_by_name', 'm.agenda', 'm.id', 'm.password', 'm.meeting_id', 'm.meeting_start_date', 'm.meeting_end_date', 'm.starting_time', 'm.ending_time'])
                            -> from('meeting_schedule as m')
                            -> join('meeting_schedule_details as d', 'd.schedule_id = m.id', 'inner')
                            -> join('register as r', 'r.id = m.created_by', 'inner')
                            -> where(['d.participate_id' => $participate_id])
                            -> where(["CONCAT(meeting_start_date, ' ', ending_time) >="=> $date])
                             -> get()
                            -> result();
        
       
                
       
        foreach($Result as $value){
            
           $Details = $this -> db -> select(['r.name', 'r.id', 'r.name', 'r.email_id', 'd.status']) -> from('meeting_schedule_details as d')
                                  -> join('register as r', 'r.id = d.participate_id', 'inner')
                                  -> where('d.schedule_id', $value -> id)                               
                                  -> get()
                                  -> result();
          
           $MyStatus = $this -> db -> select(['t.status as my_status'])
                                   -> from('meeting_schedule as s')
                                   -> join('meeting_schedule_details as t', 't.participate_id = s.created_by', 'inner')
                                   -> where(['t.participate_id' => $participate_id])
                                   -> where('t.schedule_id', $value -> id) 
                                   -> get()
                                   -> result();          
          
           $MeetingArray[]=[
               'meeting_details' => $value,
               'perticipent_name' => $Details,
               'my_status' =>  ['status' => $MyStatus[0] -> my_status],              
           ];
        }        
        return $MeetingArray;       
    }
    
      public function update($Tablename, $data, $condition){
          $this -> db -> where($condition) -> update($Tablename, $data);
          return $this -> db -> affected_rows();
      }
}
?>
