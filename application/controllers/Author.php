<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('author_model');
        date_default_timezone_set('GMT');
    }

    public function index() {

        if($this -> session -> userdata('AyaUserLoginId') == ''){
        $data['title'] = 'Admin Login';
        $this->load->view('admin/author', $data);
        }else{
            redirect('author/dashboard');
        }
    }
    
    public function send_verification_link(){      
       $this->load->library('email'); 
       $userCode = $this -> input -> post('user_id');       
       if($this -> db -> where('email_id', $userCode) -> count_all_results('register') > 0){
        if($this -> db -> where(['email_id' => $userCode, 'verified_email' => 0]) -> count_all_results('register') > 0){
        $details = $this -> db -> select(['email_id', 'name', 'user_id']) -> from('register') -> where('email_id', $userCode) -> get() -> result();
       
        /* Send Email */
               $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => SMTP_HOST,
                    'smtp_port' => 465,
                    'smtp_user' => SMTP_USER,
                    'smtp_pass' => SMTP_PASS,
                    'mailtype' => 'html',
                    'charset' => 'utf-8'
                );
                $this->email->initialize($config);
                $this->email->set_mailtype("html");
                $this->email->set_newline("\r\n");

                $htmlContent = $this -> load -> view('mail/welcome-mail', ['name' => $details[0] -> name, 'userCode' => $details[0] -> email_id], TRUE);                

                $this->email->to($details[0] -> email_id);
                $this->email->from(SMTP_USER, COMPANY_NAME);
                $this->email->subject('Registered Email Id verification link');
                $this->email->message($htmlContent);
                if($this->email->send()){
                    echo 1;
                }else{
                    echo "Mail send error";
                }
            
        }else{
            echo "Email ID already verified.";
        }
       }else{
           echo "Invalid Email ID entered.";
       } 
    }
    
    public function email_verified($userId){
        $user_code = decode($userId);
        $this -> load -> model('master_model');
        if($this -> master_model -> update('register', ['verified_email' => 1], ['email_id' => $user_code])){
        ?>
       Thanks for verifying your registered Email ID &nbsp;<a href="javascript:window.open('','_self').close();">Close</a>
        <?php
        }else{
            echo '<script>alert("User id not found.")</script>';
        }
    }

    public function loginsuccess() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_name', 'Email ID', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('errmsg', validation_errors());
            redirect('author');
        } else {
            if($this -> db -> where(['email_id'=> $this->input->post('user_name')]) -> count_all_results('register') > 0){
            if (__duplicatechecking('register', array('email_id' => $this->input->post('user_name'), 'verified_email' => 1)) > 0) {

                if (__duplicatechecking('register', array('password' => hashcode($this->input->post('password')))) > 0) {

                    $ConditionArray = array('email_id' => $this->input->post('user_name'), 'password' => hashcode($this->input->post('password')), 'status' => 1);
                    $Result = $this->author_model->author_login($ConditionArray);
                    if ($Result != 0) {
                        redirect('author/dashboard');
                    } else {
                        $this->session->set_flashdata('errmsg', 'Your Account is Disabled, Please contact Admin for more info');
                        redirect('author');
                    }
                } else {
                    $this->session->set_flashdata('errmsg', 'Incorrect Email ID or Password.');
                    redirect('author');
                }
            } else {
                $this->session->set_flashdata('errmsg', 'Please enter a verified Email ID.');
                redirect('author');
            }
            }else{
                $this->session->set_flashdata('errmsg', 'Enter a registered Email ID');
                redirect('author');
            }
        }
    }

    public function change_password() {
        if($this -> session -> userdata('AyaUserRole') != 3){
        $data['title'] = 'Change Password';
        $this->load->adminTemplate('admin/change-password', $data);
        }else{
            $this -> logout();
        }
    }

    public function changepasswordsuccess() {
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[new_password]');
        if ($this->form_validation->run() == false) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('author/change-password');
        } else {
            $Result = $this->author_model->changepassword(hashcode($this->input->post('old_password')), hashcode($this->input->post('new_password')));

            if ($Result == 1) {
                $this->session->set_flashdata('successmsg', 'Password Change Successfully');
                redirect('author/change-password');
                die;
            } else {
                $this->session->set_flashdata('errmsg', 'Current password does not match');
                redirect('author/change-password');
                die;
            }
        }
        die;
    }
    
    /*
     * For Distributer account.
    */
    
    public function dis_change_password() {
        if($this -> session -> userdata('AyaUserRole') == 3){
        $data['title'] = 'Change Password';
        $this->load->adminTemplate('admin/dis-change-password', $data);
        }else{
            $this ->logout();
        }
    }
    /*
     * For Distributer account.
    */
    public function dischangepasswordsuccess() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[new_password]');
        if ($this->form_validation->run() == false) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('dis-change-password');
        } else {
            $Result = $this->author_model->dischangepassword($this->input->post('old_password'), $this->input->post('new_password'));

            if ($Result == 1) {
                $this->session->set_flashdata('successmsg', 'Password Change Successfully');
                redirect('dis-change-password');
                die;
            } else {
                $this->session->set_flashdata('errmsg', 'Current password does not match');
                redirect('dis-change-password');
                die;
            }
        }
        die;
    }

    public function logout() {
        $this->session->unset_userdata('AyaUserLoginId');
        $this->session->unset_userdata('AyaUserRole');
        $this->session->unset_userdata('AyaUserBranch');
        redirect('author');
    }

}

?>
