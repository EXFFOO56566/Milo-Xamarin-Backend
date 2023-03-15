<?php
 class Calender_model extends CI_Model{
     
     
     public function getnextMeetingId(){
        $Result = $this -> db -> select('user_id') -> from('register') -> where(['id' => $this -> session -> userdata('AyaUserLoginId'), 'status' => 1]) -> get() -> result();
        return 'MT20'.substr(time(), -4);        
     }
     
     public function registerData(){
        $UserArray = []; 
        $Result = $this -> db -> select(['name', 'id']) -> from('register') -> where(['id !=' => $this -> session -> userdata('AyaUserLoginId'), 'status' => 1]) -> get() -> result();
        foreach($Result as $value){
           $UserArray[$value -> id] = $value -> name; 
        } 
        
        return $UserArray;
     }

     public function registerDataWithEmail(){
        $UserArray = []; 
        $Result = $this -> db -> select(['email_id', 'id', 'image']) -> from('register') -> where(['id !=' => $this -> session -> userdata('AyaUserLoginId'), 'status' => 1]) -> get() -> result();
        return $Result;
     }
     
     public function adddata($InsertData) {
        $this->db->insert('meeting_schedule', $InsertData);
        return $this->db->insert_id();
    }
    
    public function adddetailsdata($InsertData){
       $this->db->insert('meeting_schedule_details', $InsertData);
       return $this->db->insert_id(); 
    }
    
    // Use only for calender view.
    public function view() {
       $timezone = gettimezone();
       $resultArray = [];
        $Result = $this->db->select(['m.id as id', 'm.title as title', 'm.meeting_start_date as start', 'm.starting_time'])
                           -> from('meeting_schedule as m') 
                           -> join('meeting_schedule_details as d', 'd.schedule_id = m.id', 'inner')                           
                           -> where(['d.participate_id' => $this -> session -> userdata('AyaUserLoginId'), 'm.meeting_status' => 1]) -> get();

        foreach($Result -> result() as $d){
           $date = convertDate(date('Y-m-d H:i:s', strtotime($d -> start.' '.$d -> starting_time)), $timezone);           
           $resultArray[] = [
              'id' => $d -> id,
              'title' => $d -> title,
              'start' => $date
           ];
        }

        return json_encode($resultArray);
        //return json_encode($Result->result());
    }

    public function meetingDetails($meeting_id){
      $Result = $this->db->get_where('meeting_schedule', ['id' => $meeting_id]) -> result();
      return $Result;
    }

    public function get_pid($meeting_id){
      $pArray = [];
      $Result = $this -> db -> select('participate_id') -> from('meeting_schedule_details')-> where('schedule_id', $meeting_id )-> get() -> result();
      foreach($Result as $value){
         $pArray[] = $value -> participate_id;
      }

      return $pArray;
    }
 }
?>