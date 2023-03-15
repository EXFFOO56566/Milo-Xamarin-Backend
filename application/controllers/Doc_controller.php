<?php
  class Doc_controller extends CI_Controller{
      
      public function __construct() {
          parent::__construct();
          $this -> load -> model('doc_model');
      }
      
      public function view(){
          if($this -> authchecking() != 0){
          $data['title'] = 'Doc list';
          if($this -> session -> userdata('AyaUserRole') == 1){
          $data['fileList'] = $this -> doc_model -> view();
          }else{
          $data['fileList'] = $this -> doc_model -> view(['register_id'=> $this -> session -> userdata('AyaUserLoginId')]);    
          }
          $this -> load -> adminTemplate('admin/document', $data);
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
         $files = $_FILES;
        $UserFileArray = $_FILES['userfile']['name'];       
        for ($i = 0; $i < count($UserFileArray); $i++) {
            if ($UserFileArray[$i] != '') {
                if (trim($_FILES['userfile']['name'][$i]) != '') {
                    $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
                    $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
                    $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                    $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
                    $_FILES['userfile']['size'] = $files['userfile']['size'][$i];
                    $config['upload_path'] = 'uploads/doc/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|txt|docx|wps';
                    $config['max_size'] = 50000;
                    $config['max_width'] = 50000;
                    $config['max_height'] = 50000;
                    $config['encrypt_name'] = true;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('userfile')) {
                        $this->session->set_flashdata('errmsg', $this->upload->display_errors());
                        redirect('author/file-share');
                    } else {
                        $UploadData = $this->upload->data();
                        $UserFile[$i] = $UploadData['file_name'];
                    }
                }
            } else {
                $UserFile[$i] = '';
            }
        }
     
        
        if($this -> input -> post('submit') == 'Submit'){
            if($this -> input -> post('update_id') != ''){
                if($UserFile[0] != ''){
                    $insertData = [
                        'name' => $this -> input -> post('name'),
                        'doc_no' => $this -> input -> post('doc_no'),
                        'issue_date' => $this -> input -> post('issue_date'),
                        'expiry_date' => $this -> input -> post('expiry_date'),
                        'issued_by' => $this -> input -> post('issued_by'),
                        'country_issue' => $this -> input -> post('country_issue'),
                        'file' => $UserFile[0],
                    ];
                }else{
                    $insertData = [
                        'name' => $this -> input -> post('name'),
                        'doc_no' => $this -> input -> post('doc_no'),
                        'issue_date' => $this -> input -> post('issue_date'),
                        'expiry_date' => $this -> input -> post('expiry_date'),
                        'issued_by' => $this -> input -> post('issued_by'),
                        'country_issue' => $this -> input -> post('country_issue'),
                    ];
                }

            if($this -> doc_model -> update($insertData, ['id' => $this -> input -> post('update_id')])){
                $this -> session -> set_flashdata("successmsg", "Data has been updated successfully.");
            }else{
                $this -> session -> set_flashdata("errmsg", "You have no chnage.");
            }

            }else{
                $insertData = [
                    'name' => $this -> input -> post('name'),
                    'doc_no' => $this -> input -> post('doc_no'),
                    'issue_date' => $this -> input -> post('issue_date'),
                    'expiry_date' => $this -> input -> post('expiry_date'),
                    'issued_by' => $this -> input -> post('issued_by'),
                    'country_issue' => $this -> input -> post('country_issue'),
                    'register_id' => $this -> session -> userdata('AyaUserLoginId'),
                    'file' => $UserFile[0],
                    'created_at' => date('Y-m-d', time())
                ];
                
                if($this -> doc_model -> add($insertData)){
                    $this -> session -> set_flashdata("successmsg", "Data has been added successfully.");
                }else{
                    $this -> session -> set_flashdata("errmsg", "Data insert error.");
                }
            }
           
           redirect('author/doc'); 
        }else{
            redirect('author'); 
        }
        
    }
      
       public function update(){
        if($this -> authchecking() != 0){  
          $updateId = $this -> input -> post('id');
          $docList = $this -> doc_model -> view(['id' => $updateId]);   
          echo json_encode($docList[0]);
        }else{
            redirect('author');  
        }  
      }
      
       public function delete($delId){
        if($this -> authchecking() != 0){ 
           $this -> doc_model -> deletedata('documents', ['id' => $delId]);
           $this -> session -> set_flashdata('successmsg', 'Data has been deleted.');
           redirect('author/doc');
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