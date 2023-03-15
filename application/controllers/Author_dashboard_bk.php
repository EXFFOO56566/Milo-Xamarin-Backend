<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author_dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this -> load -> model('author_model');
        date_default_timezone_set('Asia/Calcutta'); 
    }
    
    public function index(){       
        if($this ->authchecking() != 0){
        $data['title'] = 'Welcome to dashboard';  
        $this -> load -> adminTemplate('admin/dashborad', $data);
        }else{
            redirect('logout');
        }
    }
    
   public function user_list(){
        if($this ->authchecking() != 0){
        $data['title'] = 'User List'; 
        $data['UserList'] = $this -> author_model -> view('register');
        $this -> load -> adminTemplate('admin/user-list', $data);
        }else{
            redirect('logout');
        }
   }
   
   public function add_user(){
        if($this ->authchecking() != 0){
        $data['title'] = 'Add User'; 
        $this -> load -> adminTemplate('admin/add-user', $data);
        }else{
            redirect('logout');
        } 
   }
   
   public function addsuccess(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
        $this -> form_validation-> set_rules('user_id', 'User ID', 'trim|required|is_unique[register.user_id]');
        $this -> form_validation-> set_rules('mobile_no', 'Mobile No', 'trim|required|min_length[10]|max_length[10]|is_unique[register.mobile_no]');
        $this -> form_validation-> set_rules('email_id', 'Email ID', 'trim|required|valid_email|is_unique[register.email_id]');
        $this -> form_validation-> set_rules('address', 'User ID', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
        if ($this->form_validation->run() == false) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            $this->session->set_flashdata($this->input->post(NULL, TRUE));
            redirect('add-user');
        } else {
            
            if($this -> input -> post('Submit') == 'Save'){
                
                $InsertData = [
                    'name' => $this -> input -> post('name'),
                    'user_id' => $this -> input -> post('user_id'),
                    'mobile_no' => $this -> input -> post('mobile_no'),
                    'email_id' => $this -> input -> post('email_id'),
                    'address' => $this -> input -> post('address'),
                    'password' => $this -> input -> post('password'),
                    'created_at' => date('Y-m-d', time())
                ];
                
              if($this -> author_model -> adddata('register', $InsertData)){
                  $this -> session -> set_flashdata('successmsg', 'Data has been added successfully');
                  redirect('user-list');
              }else{
                  $this -> session -> set_flashdata('errmsg', 'Data insert error. Please Try again.');
                  $this->session->set_flashdata($this->input->post(NULL, TRUE));
                  redirect('add-user');
              }
                
            }else{
                redirect('logout');
            }
        }
       
   }
   
   public function update_user($UpdateId){
      if($this ->authchecking() != 0){
        $data['title'] = 'Update User';
        $data['RegisterData'] = $this -> author_model -> view('register', ['id' => base64_decode(base64_decode($UpdateId))]);
        $this -> load -> adminTemplate('admin/update-user', $data);
        }else{
            redirect('logout');
        }  
   }
   
   public function updatesuccess(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
        $this -> form_validation-> set_rules('user_id', 'User ID', 'trim|required');
        $this -> form_validation-> set_rules('mobile_no', 'Mobile No', 'trim|required|min_length[10]|max_length[10]');
        $this -> form_validation-> set_rules('email_id', 'Email ID', 'trim|required|valid_email');
        $this -> form_validation-> set_rules('address', 'User ID', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
        if ($this->form_validation->run() == false) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('update-user/'.base64_encode(base64_encode($this -> input -> post('updateid'))));
        } else {
            
            if($this -> input -> post('Submit') == 'Save'){
                
                $InsertData = [
                    'name' => $this -> input -> post('name'),
                    'user_id' => $this -> input -> post('user_id'),
                    'mobile_no' => $this -> input -> post('mobile_no'),
                    'email_id' => $this -> input -> post('email_id'),
                    'address' => $this -> input -> post('address'),
                    'password' => $this -> input -> post('password'),
                ];
                
              if($this -> author_model -> updatedata('register', $InsertData, $this -> input -> post('updateid'))){
                  $this -> session -> set_flashdata('successmsg', 'Data has been added successfully');
                  redirect('user-list');
              }else{
                  $this -> session -> set_flashdata('errmsg', 'Data update error or you have no change.');
                  redirect('user-list');
              }
                
            }else{
                redirect('logout');
            }
        }  
   }
   
   public function delete_user($deleteid){
      if($this ->authchecking() != 0){          
          if ($this->author_model->deletedata('register', array('id' => base64_decode(base64_decode($deleteid))))):
            $this->session->set_flashdata('successmsg', 'Data has been deleted successfully');
            redirect('user-list');
        else:
            $this->session->set_flashdata('errmsg', 'Delete Error');
            redirect('user-list');
        endif;          
        }else{
            redirect('logout');
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
