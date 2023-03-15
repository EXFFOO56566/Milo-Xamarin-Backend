<?php
class User_controller extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this -> load -> model('author_model');
        date_default_timezone_set('Asia/Calcutta');
        $this -> load -> library('timezone');
    }
    
    public function update_profile(){
        if($this ->authchecking() != 0){
        $data['title'] = 'User List';
        $data['UserList'] = $this -> author_model -> view('register', ['id' => $this -> session -> userdata('AyaUserLoginId')]);
        $data['time_zone'] = $this -> timezone -> gettimezone();        
        $this -> load -> adminTemplate('admin/user-profile', $data);
        }else{
            redirect('logout');
        }
    }
    
    public function update_profile_success(){
       
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
                        $config['upload_path'] = 'uploads/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['max_size'] = 50000;
                        $config['max_width'] = 50000;
                        $config['max_height'] = 50000;
                        $config['encrypt_name'] = true;
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);

                        if (!$this->upload->do_upload('userfile')) {
                            $this -> session -> set_flashdata('errmsg', $this->upload->display_errors());
                            redirect('author/update-profile');
                        } else {
                            $UploadData = $this->upload->data();     
                            $UserFile[$i] = $UploadData['file_name'];
                        }
                    }
                } else {
                    $UserFile[$i] = '';
                }
            }
            
            if($UserFile[0] != ''){
              $UpdateData = [
                  'name' => $this -> input -> post('name'),
                  'email_id' => $this -> input -> post('email_id'),
                  'mobile_no' => $this -> input -> post('mobile_no'),
                  'pincode' => $this -> input -> post('pincode'),
                  'image' => $UserFile[0],
                  'address' => $this -> input -> post('address'),
                  'user_id' => $this -> input -> post('user_id'),
                  'time_zone' => $this -> input -> post('time_zone')
              ];  
              
              $this -> session -> set_userdata("UserLogo", $UserFile[0]);
              $this -> session -> set_userdata("AyaUserName", $this -> input -> post('name'));
            }else{
                $UpdateData = [
                  'name' => $this -> input -> post('name'),
                  'email_id' => $this -> input -> post('email_id'),
                  'mobile_no' => $this -> input -> post('mobile_no'),
                  'pincode' => $this -> input -> post('pincode'),
                  'address' => $this -> input -> post('address'),
                  'user_id' => $this -> input -> post('user_id'),
                  'time_zone' => $this -> input -> post('time_zone') 
              ]; 
                $this -> session -> set_userdata("AyaUserName", $this -> input -> post('name'));
            }
            
            if($this -> author_model -> updatedata('register', $UpdateData, $this -> input -> post('update_id'))){
                  $this -> session -> set_flashdata('successmsg', 'Data has been updated successfully');
                  redirect('author/update-profile');
            }else{
                  $this -> session -> set_flashdata('errmsg', 'Data update error or you have no change.');
                  redirect('author/update-profile');
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