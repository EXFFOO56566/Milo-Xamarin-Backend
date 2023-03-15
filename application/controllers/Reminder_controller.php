<?php
  class Reminder_controller extends CI_Controller{
      
      public function __construct() {
          parent::__construct();
          $this -> load -> model('reminder_model');
      }
      
      public function view(){
          if($this -> authchecking() != 0){
          $data['title'] = 'Reminder list';
          if($this -> session -> userdata('AyaUserRole') == 1){
          $data['fileList'] = $this -> reminder_model -> view();
          }else{
          $data['fileList'] = $this -> reminder_model -> view(['register_id'=> $this -> session -> userdata('AyaUserLoginId')]);    
          }
          
          $this -> load -> adminTemplate('admin/reminder', $data);
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
                        'start_date' => $this -> input -> post('start_date'),
                        'end_date' => $this -> input -> post('end_date'),
                        'type' => $this -> input -> post('type'),
                        'note' => $this -> input -> post('note')
                    ];             

            if($this -> reminder_model -> update($insertData, ['id' => $this -> input -> post('update_id')])){
                $this -> session -> set_flashdata("successmsg", "Data has been updated successfully.");
            }else{
                $this -> session -> set_flashdata("errmsg", "You have no chnage.");
            }

            }else{
                $insertData = [
                    'title' => $this -> input -> post('title'),
                    'start_date' => $this -> input -> post('start_date'),
                    'end_date' => $this -> input -> post('end_date'),
                    'type' => $this -> input -> post('type'),
                    'note' => $this -> input -> post('note'),
                    'register_id' => $this -> session -> userdata('AyaUserLoginId'),
                    'created_at' => date('Y-m-d', time())
                ];
                
                if($this -> reminder_model -> add($insertData)){
                    $this -> session -> set_flashdata("successmsg", "Data has been added successfully.");
                }else{
                    $this -> session -> set_flashdata("errmsg", "Data insert error.");
                }
            }
           
           redirect('author/reminder'); 
        }else{
            redirect('author'); 
        }
        
    }
      
       public function update(){
        if($this -> authchecking() != 0){  
          $updateId = $this -> input -> post('id');
          $docList = $this -> reminder_model -> view(['id' => $updateId]);   
          echo json_encode($docList[0]);
        }else{
            redirect('author');  
        }  
      }
      
       public function delete($delId){
        if($this -> authchecking() != 0){ 
           $this -> reminder_model -> deletedata('reminder', ['id' => $delId]);
           $this -> session -> set_flashdata('successmsg', 'Data has been deleted.');
           redirect('author/reminder');
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