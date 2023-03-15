<?php

class Meeting_controller extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this -> load ->library(['json', 'app_authorization']);
    }
    
    public function insert_meeting_data(){
        if($this -> input -> post('meeting_id') != ''){
            $InsertData['meeting_id'] = $this -> input -> post('meeting_id');
        }else{
            die($this->json->encode(['status' => 0, 'msg' => 'Meeting Id must be required.']));
        }
        
        if($this -> input -> post('token_code') != ''){
            $InsertData['meeting_id'] = $this -> input -> post('meeting_id');
        }else{
            die($this->json->encode(['status' => 0, 'msg' => 'Meeting Id must be required.']));
        }
        
        
    }
    
    public function get_meeting_history(){
        
    }
}

