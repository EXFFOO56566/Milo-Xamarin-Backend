<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class User_Authentication extends CI_Controller { 
    function __construct() { 
        parent::__construct(); 
         $this -> load ->library(['json','app_authorization']);
        // Load facebook oauth library 
        $this->load->library('facebook'); 
         
        // Load user model 
        $this->load->model('user'); 
        $this -> load -> model('register_model');
    } 
     
    public function index(){ 
        $userData = array(); 
        $data['title'] = 'Home';
        // Authenticate user with facebook 
       
        if($this->facebook->is_authenticated()){ 
            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture'); 
            
            $InsertData = [
                    'name' => $fbUser['first_name'].' '.$fbUser['last_name'],
                    'email_id' => $fbUser['email'],
                    'user_id' => $fbUser['email'],
                    'created_at' => date('Y-m-d', time()),
                    'status' => 1,
                    'role_id' => 2,
                    'register_by' => 2,
                    'verified_email' => 1
                ];
                
                
                
                
                if($this -> db -> where(['email_id' => $fbUser['email']]) -> count_all_results('register') > 0){    
               $whereClouse = ['email_id' => $fbUser['email']];
               $TokenCode = $this -> register_model -> login($whereClouse);
               if ($TokenCode != ''):
                    die($this->json->encode(['status' => 1, 'msg' => 'Login Success.', 'token_code' => $TokenCode]));
                else:
                    die($this->json->encode(['status' => 0, 'msg' => 'Login error.']));
                endif;
            }else{
                if ($this->register_model->register($InsertData)):
                    $whereClouse = ['email_id' => $fbUser['email']];
                    $TokenCode = $this -> register_model -> login($whereClouse);
               if ($TokenCode != ''):
                    die($this->json->encode(['status' => 1, 'msg' => 'Login Success.', 'token_code' => $TokenCode]));
                else:
                    die($this->json->encode(['status' => 0, 'msg' => 'Login error.']));
                endif;
                else:
                    die($this->json->encode(['status' => 0, 'msg' => 'Registration error. Please try again.']));
                endif;
            }
            
            die;
            

            $userData['oauth_provider'] = 'facebook'; 
            $userData['oauth_uid']    = !empty($fbUser['id'])?$fbUser['id']:'';; 
            $userData['first_name']    = !empty($fbUser['first_name'])?$fbUser['first_name']:''; 
            $userData['last_name']    = !empty($fbUser['last_name'])?$fbUser['last_name']:''; 
            $userData['email']        = !empty($fbUser['email'])?$fbUser['email']:''; 
            $userData['gender']        = !empty($fbUser['gender'])?$fbUser['gender']:''; 
            $userData['picture']    = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:''; 
            $userData['link']        = !empty($fbUser['link'])?$fbUser['link']:'https://www.facebook.com/'; 
             
            // Insert or update user data to the database 
            $userID = $this->user->checkUser($userData); 
             
            // Check user data insert or update status 
            if(!empty($userID)){ 
                $data['userData'] = $userData; 
                 
                // Store the user profile info into session 
                $this->session->set_userdata('userData', $userData); 
            }else{ 
               $data['userData'] = array(); 
            } 
             
            // Facebook logout URL 
            $data['logoutURL'] = $this->facebook->logout_url(); 
        }else{ 
            $data['authURL'] =  $this->facebook->login_url();
            $this->load->MyTemplate('home',$data); 
        }          
        // Load login/profile view 
        $this->load->MyTemplate('home',$data); 
    } 
 
    public function logout() { 
        // Remove local Facebook session 
        $this->facebook->destroy_session(); 
        // Remove user data from session 
        $this->session->unset_userdata('userData'); 
        // Redirect to login page 
        redirect('user_authentication'); 
    } 
}