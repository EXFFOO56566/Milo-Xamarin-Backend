<?php
  class Appointment_controller extends CI_Controller{
      
      public function __construct() {
          parent::__construct();
          $this -> load -> model('appointment_model');
      }
      
      public function view(){
          if($this -> authchecking() != 0){
          $data['title'] = 'Appointment list';
          
          if($this -> session -> userdata('AyaUserRole') == 1){
          $data['fileList'] = $this -> appointment_model -> view();
          }else{
          $data['fileList'] = $this -> appointment_model -> view(['register_id'=> $this -> session -> userdata('AyaUserLoginId')]);    
          }
          $this -> load -> adminTemplate('admin/appointment', $data);
          }else{
              redirect('logout');
          }
      }
      
       public function add(){
          if($this -> authchecking() != 0){ 
          $data['title'] = 'File Share';
          $this -> load -> adminTemplate('admin/flist');
          }else{
              redirect('logout');
          }
      }
      
      public function addsuccess(){
        if($this -> input -> post('submit') == 'Submit'){
            if($this -> input -> post('update_id') != ''){
                
                    $insertData = [
                        'title' => $this -> input -> post('title'),
                        'date' => $this -> input -> post('date'),
                        'start_time' => $this -> input -> post('start_time'),
                        'end_time' => $this -> input -> post('end_time'),
                        'whom_meet' => $this -> input -> post('whom_meet'),
                        'location' => $this -> input -> post('location'),
                        'note' => $this -> input -> post('note')
                    ];             

            if($this -> appointment_model -> update($insertData, ['id' => $this -> input -> post('update_id')])){
                $this -> session -> set_flashdata("successmsg", "Data has been updated successfully.");
            }else{
                $this -> session -> set_flashdata("errmsg", "You have no chnage.");
            }

            }else{
                $insertData = [
                    'title' => $this -> input -> post('title'),
                    'date' => $this -> input -> post('date'),
                    'start_time' => $this -> input -> post('start_time'),
                    'end_time' => $this -> input -> post('end_time'),
                    'whom_meet' => $this -> input -> post('whom_meet'),
                    'location' => $this -> input -> post('location'),
                    'note' => $this -> input -> post('note'),
                    'register_id' => $this -> session -> userdata('AyaUserLoginId'),
                    'created_at' => date('Y-m-d', time())
                ];
                
                if($this -> appointment_model -> add($insertData)){
                    $this -> session -> set_flashdata("successmsg", "Data has been added successfully.");
                }else{
                    $this -> session -> set_flashdata("errmsg", "Data insert error.");
                }
            }
           
           redirect('author/appointment'); 
        }else{
            redirect('author'); 
        }
        
    }
      
       public function update(){
        if($this -> authchecking() != 0){  
          $updateId = $this -> input -> post('id');
          $docList = $this -> appointment_model -> view(['id' => $updateId]);   
          echo json_encode($docList[0]);
        }else{
            redirect('author');  
        }  
      }
      
       public function delete($delId){
        if($this -> authchecking() != 0){ 
           $this -> appointment_model -> deletedata('appointment', ['id' => $delId]);
           $this -> session -> set_flashdata('successmsg', 'Data has been deleted.');
           redirect('author/appointment');
        }else{
            redirect('author'); 
        }  
      }
      
       private function authchecking(){
       if($this -> session -> userdata('AyaUserLoginId') != ''){
           return 1;
       }else{
           return 0;
       }
    }
  }
?>