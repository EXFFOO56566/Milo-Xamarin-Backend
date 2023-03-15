<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author_dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this -> load -> model('author_model');
        $this -> load -> library('bigbluebutton_lib');
        $this -> load -> library('timezone');
        date_default_timezone_set(gettimezone());
    }

    public function index(){
        $this -> load -> model('calender_model');
        if($this ->authchecking() != 0){
        $data['title'] = 'Welcome to dashboard';
        $data['time_zone'] = gettimezone();
        $this -> bigbluebutton_lib -> getRecording('MT20_409589209');        

        $data['todayMeeting'] = $this -> author_model -> meetingView(['m.meeting_status' => 1]); 
        $data['cancelMeeting'] = $this -> author_model -> meetingView(['m.meeting_status' => 0]);    
        $data['RegisterData'] = $this -> calender_model -> registerDataWithEmail();

        if($this -> session -> userdata('AyaUserRole') == 1){
        $data['newsCount'] = $this -> author_model -> countData('news');
        $data['videoCount'] = $this -> author_model -> countData('video');
        $data['CategoryCount'] = $this -> author_model -> countData('sub_category');      
        $data['activeUserCount'] = $this -> author_model -> countData('register', ['status' => 1, 'role_id' => 2]);
        $data['inactiveUserCount'] = $this -> author_model -> countData('register', ['status' => 0, 'role_id' => 2]);
        $data['totalSubscription'] = $this -> author_model -> totalSubscription();
        $data['totalRenewal'] = $this -> author_model -> totalRenewal();
        $data['todayExpiry'] = $this -> author_model -> todayExpiry();

        $data['totalCollection'] = $this -> author_model -> totalCollection();
        $data['presentMonthCollection'] = $this -> author_model -> presentMonthCollection();
        $data['weeklyCollection'] = $this -> author_model -> weeklyCollection();
        $data['todayCollection'] = $this -> author_model -> todayCollection();
        }else{
            $data['activePackage'] = $this -> author_model -> activePackagename();
            $data['totalMeeting'] = $this -> author_model -> totalMeeting();
            $data['createdMeeting'] = $this -> author_model -> createdMeeting();
            $data['remainingMeeting'] = $data['totalMeeting'] - $data['createdMeeting'];
        }

        $this -> load -> adminTemplate('admin/dashborad', $data);
        }else{
            redirect('logout');
        }
    }
    
   

   public function user_list(){
        if($this ->authchecking() != 0){
        $data['title'] = 'User List';
        $data['UserList'] = $this -> author_model -> view('register', ['role_id' => 2]);
        $this -> load -> adminTemplate('admin/user-list', $data);
        }else{
            redirect('logout');
        }
   }

   public function inbox(){
        if($this ->authchecking() != 0){
        $data['title'] = 'User List';
        $data['UserList'] = $this -> author_model -> view('register');
        $this -> load -> adminTemplate('admin/inbox', $data);
        }else{
            redirect('logout');
        }
   }

   public function new_mail(){
        if($this ->authchecking() != 0){
        $data['title'] = 'User List';
        $data['UserList'] = $this -> author_model -> view('register');
        $this -> load -> adminTemplate('admin/new_mail', $data);
        }else{
            redirect('logout');
        }
   }

   public function view_mail(){
        if($this ->authchecking() != 0){
        $data['title'] = 'User List';
        $data['UserList'] = $this -> author_model -> view('register');
        $this -> load -> adminTemplate('admin/view_mail', $data);
        }else{
            redirect('logout');
        }
   }

   public function user_dashboard(){
        if($this ->authchecking() != 0){
        $data['title'] = 'User List';
        $data['UserList'] = $this -> author_model -> view('register');
        $this -> load -> adminTemplate('admin/user_dashboard', $data);
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
        $this -> form_validation-> set_rules('mobile_no', 'Mobile No', 'trim|required|is_unique[register.mobile_no]');
        $this -> form_validation-> set_rules('user_id', 'User ID', 'trim|required|is_unique[register.user_id]');
        $this -> form_validation-> set_rules('email_id', 'Email ID', 'trim|required|is_unique[register.email_id]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
        if ($this->form_validation->run() == false) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            $this->session->set_flashdata($this->input->post(NULL, TRUE));
            redirect('author/add-user');
        } else {
            
            if($this -> input -> post('Submit') == 'Save'){

                $InsertData = [
                    'name' => $this -> input -> post('name'),
                    'user_id' => $this -> input -> post('user_id'),
                    'mobile_no' => $this -> input -> post('mobile_no'),
                    'email_id' => $this -> input -> post('email_id'),
                    'password' => hashcode($this -> input -> post('password')),
                    'address' => $this -> input -> post('address'),
                    'role_id' => 2,
                    'created_at' => date('Y-m-d', time())
                ];

              if($this -> author_model -> adddata('register', $InsertData)){
                  $this -> session -> set_flashdata('successmsg', 'Data has been added successfully');
                  redirect('author/user-list');
              }else{
                  $this -> session -> set_flashdata('errmsg', 'Data insert error. Please Try again.');
                  $this->session->set_flashdata($this->input->post(NULL, TRUE));
                  redirect('author/add-user');
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
        $this -> form_validation-> set_rules('mobile_no', 'Mobile No', 'trim|required|min_length[10]|max_length[10]');
        $this -> form_validation-> set_rules('email_id', 'Email ID', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
        if ($this->form_validation->run() == false) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('author/update-user/'.base64_encode(base64_encode($this -> input -> post('updateid'))));
        } else {
            if($this -> input -> post('submit') == 'Save'){
                $InsertData = [
                    'name' => $this -> input -> post('name'),
                    'user_id' => $this -> input -> post('user_id'),
                    'mobile_no' => $this -> input -> post('mobile_no'),
                    'email_id' => $this -> input -> post('email_id'),
                    'address' => $this -> input -> post('address'),
                    'password' => hashcode($this -> input -> post('password')),
                ];

              if($this -> author_model -> updatedata('register', $InsertData, $this -> input -> post('updateid'))){
                  $this -> session -> set_flashdata('successmsg', 'Data has been added successfully');
                  redirect('author/user-list');
              }else{
                  $this -> session -> set_flashdata('errmsg', 'Data update error or you have no change.');
                  redirect('author/user-list');
              }

            }else{
                redirect('logout');
            }
        }
   }

   public function changeStatus($status, $registerId){
       $this -> db -> where(['id' => $registerId]) -> update('register', ['status' => $status]);
       $this -> session -> set_flashdata('successmsg', 'Status update successfully.');
       redirect('author/user-list');
   }

   public function delete_user($deleteid){
      if($this ->authchecking() != 0){
          if ($this->author_model->deletedata('register', array('id' => base64_decode(base64_decode($deleteid))))):
            $this->session->set_flashdata('successmsg', 'Data has been deleted successfully');
            redirect('author/user-list');
        else:
            $this->session->set_flashdata('errmsg', 'Delete Error');
            redirect('author/user-list');
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
