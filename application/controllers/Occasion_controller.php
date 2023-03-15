<?php
  class Occasion_controller extends CI_Controller{
      
      public function __construct() {
          parent::__construct();
          $this -> load -> model('occasion_model');
      }
      
      public function view(){
          if($this -> authchecking() != 0){
          $data['title'] = 'Occasion list';          
          if($this -> session -> userdata('AyaUserRole') == 1){
          $data['fileList'] = $this -> occasion_model -> view();
          }else{
          $data['fileList'] = $this -> occasion_model -> view(['register_id'=> $this -> session -> userdata('AyaUserLoginId')]);    
          }
          
          $this -> load -> adminTemplate('admin/occasion', $data);
          }else{
              redirect('logout');
          }
      }
            
      public function addsuccess(){
        if($this -> input -> post('submit') == 'Submit'){
            if($this -> input -> post('update_id') != ''){
                
                    $insertData = [
                        'name' => $this -> input -> post('name'),
                        'occasion_type' => $this -> input -> post('occasion_type'),
                        'start_date' => $this -> input -> post('start_date'),
                        'end_date' => $this -> input -> post('end_date'),
                        'relation' => $this -> input -> post('relation'),
                        'note' => $this -> input -> post('note')
                    ];             

            if($this -> occasion_model -> update($insertData, ['id' => $this -> input -> post('update_id')])){
                $this -> session -> set_flashdata("successmsg", "Data has been updated successfully.");
            }else{
                $this -> session -> set_flashdata("errmsg", "You have no chnage.");
            }

            }else{
                $insertData = [
                    'name' => $this -> input -> post('name'),
                    'occasion_type' => $this -> input -> post('occasion_type'),
                    'start_date' => $this -> input -> post('start_date'),
                    'end_date' => $this -> input -> post('end_date'),
                    'relation' => $this -> input -> post('relation'),
                    'note' => $this -> input -> post('note'),
                    'register_id' => $this -> session -> userdata('AyaUserLoginId'),
                    'created_at' => date('Y-m-d', time())
                ];
                
                if($this -> occasion_model -> add($insertData)){
                    $this -> session -> set_flashdata("successmsg", "Data has been added successfully.");
                }else{
                    $this -> session -> set_flashdata("errmsg", "Data insert error.");
                }
            }
           
           redirect('author/occasion'); 
        }else{
            redirect('author'); 
        }
        
    }
      
       public function update(){
        if($this -> authchecking() != 0){  
          $updateId = $this -> input -> post('id');
          $docList = $this -> occasion_model -> view(['id' => $updateId]);   
          echo json_encode($docList[0]);
        }else{
            redirect('author');  
        }  
      }
      
       public function delete($delId){
        if($this -> authchecking() != 0){ 
           $this -> occasion_model -> deletedata('occasion', ['id' => $delId]);
           $this -> session -> set_flashdata('successmsg', 'Data has been deleted.');
           redirect('author/occasion');
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