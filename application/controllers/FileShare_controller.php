<?php
  class FileShare_controller extends CI_Controller{
      
      public function __construct() {
          parent::__construct();
          $this -> load -> model('file_model');
      }
      
      public function view(){
          if($this -> authchecking() != 0){
          $data['title'] = 'File Share';
          $data['fileList'] = $this -> file_model -> view(['register_id'=>$this -> session -> userdata('AyaUserLoginId')]);
          $data['group_id'] = $this -> file_model -> getgroupId();
          $data['RegisterData'] = $this -> file_model -> registerData();
          $this -> load -> adminTemplate('admin/flist', $data);
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
                    $config['upload_path'] = 'uploads/file/';
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
            
            $registerData = getregisteridinarray($this -> input -> post('register_id'));
           array_push($registerData, $this -> session -> userdata('AyaUserLoginId'));
           foreach($registerData as $value){
            $insertData = [
                'title' => $this -> input -> post('title'),
                'file_id' => $this -> input -> post('file_id'),
                'details' => $this -> input -> post('details'),
                'register_id' => $value,
                'image' => $UserFile[0],
                'upload_by' => 1,
                'share_by' => $this -> session -> userdata('AyaUserLoginId'),
                'created_at' => date('Y-m-d', time())
            ];
            
            $this -> file_model -> add($insertData);
           }
           redirect('author/file-share'); 
        }else{
            redirect('author'); 
        }
        
        print_r($_POST);
    }
      
       public function update(){
          $data['title'] = 'File Share';
          $this -> load -> adminTemplate('admin/flist');
      }
      
       public function delete(){
          $data['title'] = 'File Share';
          $this -> load -> adminTemplate('admin/flist');
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