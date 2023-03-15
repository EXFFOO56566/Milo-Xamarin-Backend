<?php

class File_controller extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this -> load ->library(['json', 'app_authorization']);
        $this -> load -> model('File_model');
    }
    
  public function share_file(){
            if($this -> input -> method() == 'post'): 
                if($this ->app_authorization->loginchecking($this -> input -> post('token_code')) == true):
            
                        $files = $_FILES;
                        $UserFileArray = $_FILES['userfile']['name'];
                        $_FILES['userfile']['name'] = $files['userfile']['name'];
                        $_FILES['userfile']['type'] = $files['userfile']['type'];
                        $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'];
                        $_FILES['userfile']['error'] = $files['userfile']['error'];
                        $_FILES['userfile']['size'] = $files['userfile']['size'];
                        $config['upload_path'] = 'uploads/file/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|txt|docx|wps';
                        $config['max_size'] = 50000;
                        $config['max_width'] = 50000;
                        $config['max_height'] = 50000;
                        $config['encrypt_name'] = true;
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        if (!$this->upload->do_upload('userfile')) {
                        die($this -> json-> encode(['status'=> 0, 'msg' => 'Image only allows file types of PNG, JPG, JPEG, PDF, DOC, DOCX, TXT and WPS.']));
                        } else {
                            $UploadData = $this->upload->data();     
                            $UserFile = $UploadData['file_name'];
                        }
            
            if ($this->input->post('title') != ''):
                $InsertData['title'] = $this->input->post('title');
            else:
                die($this->json->encode(['status' => 0, 'msg' => 'Require meeting title.']));
            endif;
            
            if ($this->input->post('register_id') != ''):
                $registerId[] = $this->input->post('register_id');
            else:
                die($this->json->encode(['status' => 0, 'msg' => 'Require user name.']));
            endif; 
            
            if ($this->input->post('details') != ''):
                $InsertData['details'] = $this->input->post('details');
            else:
                die($this->json->encode(['status' => 0, 'msg' => 'Require details.']));
            endif;
            
            $InsertData['file_id'] = $this -> File_model -> getnextGroupId($this->input->post('token_code'));
            
            $InsertData['share_by'] = $this -> app_authorization -> getRegisterId($this->input->post('token_code'));
            $InsertData['upload_by'] = 2;
            $InsertData['created_at'] = date("Y-m-d H:i:s", time());
            $InsertData['image'] = $UserFile;
            array_push($registerId, $InsertData['share_by']);
            foreach($registerId as $value){
            $InsertData['register_id'] = $value;    
            $this -> File_model -> add($InsertData);
            }
            die($this -> json-> encode(['status'=> 1, 'msg' => 'File share done.']));
           
            else:
               die($this -> json-> encode(['status'=> 0, 'msg' => 'Unauthorized User.']));  
            endif;
            else:
                die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.']));
            endif;
        }
        
        public function file_list(){
            if($this -> input -> method() == 'post'): 
            if($this ->app_authorization->loginchecking($this -> input -> post('token_code')) == true):
            $registerdata = $this -> app_authorization -> getRegisterId($this->input->post('token_code'));  
            $shareList = $this -> File_model -> view(['register_id' => $registerdata]);
            die($this -> json-> encode(['status'=> 1, 'data' => $shareList])); 
            else:
            die($this -> json-> encode(['status'=> 0, 'msg' => 'Unauthorized User.']));                
            endif;                
            else:
              die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.']));  
            endif;
        }
}

