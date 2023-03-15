<?php
  class Register_api extends CI_Controller{
      
      function __construct() {
          parent::__construct();
          $this -> load ->library(['json', 'app_authorization']);
          $this -> load -> model('register_model');
          $this -> load -> model('author_model');
          $this->load->library('email');
          $this -> load -> library('timezone');
      }

      public function getCity(){
        if($this ->input -> method() == 'get'):  
            $timezoneArray = [];            
            $Result = $this -> timezone -> gettimezone();
            foreach($Result as $key => $value){
                $timezoneArray[] = [
                  'TimezoneName' => $value,
                  'TimezoneValue' => $key
                ];
            }

            die($this -> json -> encode(['status' => 1, 'data' => $timezoneArray]));
        else:
            die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.']));
        endif;
      }
      
      public function update_profile(){
        if($this ->input -> method() == 'post'): 
            if($this ->app_authorization->loginchecking($this -> input -> post('token_code')) == true): 
               if(count($_FILES) > 0){
                $files = $_FILES;
                $UserFileArray = $_FILES['userfile']['name'];
                if ($UserFileArray != '') {
                    if (trim($_FILES['userfile']['name']) != '') {
                        $_FILES['userfile']['name'] = $files['userfile']['name'];
                        $_FILES['userfile']['type'] = $files['userfile']['type'];
                        $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'];
                        $_FILES['userfile']['error'] = $files['userfile']['error'];
                        $_FILES['userfile']['size'] = $files['userfile']['size'];
                        $config['upload_path'] = 'uploads/';
                        $config['allowed_types'] = 'jpg|png|jpeg';
                        $config['max_size'] = 50000;
                        $config['max_width'] = 50000;
                        $config['max_height'] = 50000;
                        $config['encrypt_name'] = true;
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        if (!$this->upload->do_upload('userfile')) {
                        die($this -> json-> encode(['status'=> 0, 'msg' => 'Image only allows file types of PNG, JPG and JPEG.']));
                        } else {
                            $UploadData = $this->upload->data();     
                            $UserFile = $UploadData['file_name'];
                        }
                    }
                } else {
                    $UserFile = '';
                }
               }else{
                   $UserFile = '';
               }
                
                 if ($this->input->post('name') != ''):
                    $InsertData['name'] = $this->input->post('name');
                else:
                    die($this->json->encode(['status' => 0, 'msg' => 'Require full name.']));
                endif;

                if ($this->input->post('time_zone') != ''):
                    $InsertData['time_zone'] = $this->input->post('time_zone');
                else:
                    die($this->json->encode(['status' => 0, 'msg' => 'Require country name.']));
                endif;
                
                 if ($this->input->post('address') != ''):
                    $InsertData['address'] = $this->input->post('address');
                else:
                  $InsertData['address'] = '';  
                endif;
                
                 if ($this->input->post('pincode') != ''):
                    $InsertData['pincode'] = $this->input->post('pincode');
                else:
                  $InsertData['pincode'] = '';  
                endif;
                
                 if ($this->input->post('mobile_no') != ''):
                    $InsertData['mobile_no'] = $this -> input -> post('mobile_no');
                else:
                    $InsertData['mobile_no'] = '';
                endif;
                if($UserFile != ''){
                $Updatedata = [
                    'name' => $this -> input -> post('name'),
                    'mobile_no' => $this -> input -> post('mobile_no'),
                    'address' => $this -> input -> post('address'),
                    'pincode' => $this -> input -> post('pincode'),
                    'state' => $this -> input -> post('state'),
                    'city' => $this -> input -> post('city'),
                    'time_zone' => $this -> input -> post('time_zone'),
                    'image' => $UserFile,
                    'is_registered' => 1
                ];
                }else{
                 $Updatedata = [
                    'name' => $this -> input -> post('name'),
                    'mobile_no' => $this -> input -> post('mobile_no'),
                    'address' => $this -> input -> post('address'),
                    'pincode' => $this -> input -> post('pincode'),
                    'state' => $this -> input -> post('state'),
                    'time_zone' => $this -> input -> post('time_zone'),
                    'city' => $this -> input -> post('city'), 
                    'is_registered' => 1
                ];   
                }
                
              $this -> db -> update('register', $Updatedata, ['id' => $this -> app_authorization -> getRegisterId($this->input->post('token_code'))]);  
              die($this -> json-> encode(['status'=> 1, 'msg' => 'Profile update successfully.']));   
            else:
             die($this -> json-> encode(['status'=> 0, 'msg' => 'Unauthorized User.']));   
            endif;
        else:
          die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.']));  
        endif;  
      }
      
      public function register_by_media(){
        if($this ->input -> method() == 'post'): 
            if($this -> input -> post('email_id') != ''):              
              $InsertData['email_id'] = $this -> input -> post('email_id');                           
            else:
               die($this -> json-> encode(['status'=> 0, 'msg' => 'Require valid Email ID.']));   
            endif;
            
            if($this -> input -> post('name') != ''):              
              $InsertData['name'] = $this -> input -> post('name');                           
            else:
               die($this -> json-> encode(['status'=> 0, 'msg' => 'Require full name.']));   
            endif;
            
             if($this -> input -> post('platform_id') != ''):              
              $InsertData['platform_id'] = $this -> input -> post('platform_id');                           
            else:
               die($this -> json-> encode(['status'=> 0, 'msg' => 'Require platform id.']));   
            endif;
            
             if($this -> input -> post('platform_name') != ''):              
              $InsertData['platform_name'] = $this -> input -> post('platform_name');                           
            else:
               die($this -> json-> encode(['status'=> 0, 'msg' => 'Require platform name.']));   
            endif; 
            
            $InsertData['token_code'] = '';
            $InsertData['created_at'] = date('Y-m-d', time());
            $InsertData['status'] = 1;
            $InsertData['role_id'] = 2;
            $InsertData['register_by'] = 2;
            $InsertData['verified_email'] = 1;
            $InsertData['user_id'] = $this -> input -> post('email_id');
            
           if($this -> db -> where(['email_id' => $this -> input -> post('email_id')]) -> count_all_results('register') > 0){    
               $whereClouse = ['email_id' => $this -> input -> post('email_id')];
               $TokenCode = $this -> register_model -> login($whereClouse);
               if ($TokenCode != ''):
                    die($this->json->encode(['status' => 1, 'msg' => 'Login Success.', 'token_code' => $TokenCode]));
                else:
                    die($this->json->encode(['status' => 0, 'msg' => 'Login error.']));
                endif;
            }else{
                if ($this->register_model->register($InsertData)):
                    $whereClouse = ['email_id' => $this -> input -> post('email_id')];
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
            
        else:
        die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.']));    
        endif;  
      }
      
      public function register(){
        if($this ->input -> method() == 'post'): 
            
        //   $files = $_FILES;
        //   $UserFileArray = $_FILES['userfile']['name'];
        //         if ($UserFileArray != '') {
        //             if (trim($_FILES['userfile']['name']) != '') {
        //                 $_FILES['userfile']['name'] = $files['userfile']['name'];
        //                 $_FILES['userfile']['type'] = $files['userfile']['type'];
        //                 $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'];
        //                 $_FILES['userfile']['error'] = $files['userfile']['error'];
        //                 $_FILES['userfile']['size'] = $files['userfile']['size'];
        //                 $config['upload_path'] = 'uploads/';
        //                 $config['allowed_types'] = 'jpg|png|jpeg';
        //                 $config['max_size'] = 50000;
        //                 $config['max_width'] = 50000;
        //                 $config['max_height'] = 50000;
        //                 $config['encrypt_name'] = true;
        //                 $this->load->library('upload', $config);
        //                 $this->upload->initialize($config);
        //                 if (!$this->upload->do_upload('userfile')) {
        //                 die($this -> json-> encode(['status'=> 0, 'msg' => 'Image only allows file types of PNG, JPG and JPEG.']));
        //                 } else {
        //                     $UploadData = $this->upload->data();     
        //                     $UserFile = $UploadData['file_name'];
        //                 }
        //             }
        //         } else {
        //             $UserFile = '';
        //         }             
            
          if($this -> input -> post('name') != ''):
              $InsertData['name'] = $this -> input -> post('name');
          else:
           die($this -> json-> encode(['status'=> 0, 'msg' => 'Require full name.']));
          endif;
          
          
          if($this -> input -> post('email_id') != ''):              
              if($this -> db -> where(['email_id' => $this -> input -> post('email_id')]) -> count_all_results('register') == 0):
                  $InsertData['email_id'] = $this -> input -> post('email_id');
              else:
                 die($this -> json-> encode(['status'=> 0, 'msg' => 'Email ID already exists.'])); 
              endif;              
          else:
           die($this -> json-> encode(['status'=> 0, 'msg' => 'Require valid email id.']));   
          endif;

          
          if($this -> input -> post('password') != ''):
              $InsertData['password'] = hashcode($this -> input -> post('password'));
          else:
           die($this -> json-> encode(['status'=> 0, 'msg' => 'Require password.']));   
          endif;
          
          if($this -> input -> post('confirm_password') != ''):
          else:
           die($this -> json-> encode(['status'=> 0, 'msg' => 'Require confirm password.']));   
          endif;

          if($this -> input -> post('time_zone') != ''):
            $InsertData['time_zone'] = $this -> input -> post('time_zone');
          else:
           die($this -> json-> encode(['status'=> 0, 'msg' => 'Require country name.']));   
          endif;
          
          if($this -> input -> post('password') != $this -> input -> post('confirm_password')):
           die($this -> json-> encode(['status'=> 0, 'msg' => 'Confirm password does not match.']));      
          endif;           
          
          $InsertData['registration_type'] = '';
          $InsertData['token_code'] = '';
          $InsertData['created_at'] = date('Y-m-d', time());
          $InsertData['status'] = 1;
          $InsertData['role_id'] = 2;
          $InsertData['register_by'] = 2;
          $InsertData['is_registered'] = 1;
          
          if($this -> register_model -> register($InsertData)):
              
              /* Send welcome mail */
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
                        $htmlContent = $this -> load -> view('mail/welcome-mail', ['name' => $this->input->post('name'), 'userCode' => $this -> input -> post('email_id')], TRUE);

                        $this->email->to($this->input->post('email_id'));
                        $this->email->from(SMTP_USER, COMPANY_NAME);
                        $this->email->subject('Welcome To '.COMPANY_NAME);
                        $this->email->message($htmlContent);
                        $this->email->send();
                        /* End welcome mail */
              
             die($this -> json-> encode(['status'=> 1, 'msg' => 'Please click on the link that has just been sent to your email account to verify your email and continue the registration Process.']));
          else:
             die($this -> json-> encode(['status'=> 0, 'msg' => 'Registration error. Please try again.']));
          endif;          
        else:
           die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.']));
        endif;
        
      }
      
      public function verifiedEmail() {
        if ($this->input->post('email_id') != ''):
            if ($this->db->where(['email_id' => $this->input->post('email_id')])->count_all_results('register') == 0):
                die($this->json->encode(['status' => 1, 'msg' => 'Email Id not registered.']));
            else:
            endif;
            die($this->json->encode(['status' => 0, 'msg' => 'Email ID already registered.']));
        else:
            die($this->json->encode(['status' => 0, 'msg' => 'Invalid Email ID.']));
        endif;
    }
    
    public function verifiedMobileno(){
         if ($this->input->post('mobile_no') != ''):
            if ($this->db->where(['mobile_no' => $this->input->post('mobile_no')])->count_all_results('register') == 0):
                die($this->json->encode(['status' => 1, 'msg' => 'Mobile no not registered.']));
            else:
            endif;
            die($this->json->encode(['status' => 0, 'msg' => 'Mobile no Aready registered.']));
        else:
            die($this->json->encode(['status' => 0, 'msg' => 'Invalid mobile no.']));
        endif;
    }

    public function login(){           
           if($this -> input -> method() == 'post'):
             
             if($this -> input -> post('email_id') != ''):                 
             if($this -> db -> where(['email_id' => $this -> input -> post('email_id')]) -> count_all_results('register') > 0){ 
             if($this -> db -> where(['email_id' => $this -> input -> post('email_id'), 'verified_email' => 1]) -> count_all_results('register') > 0){
             $whereClouse['email_id'] = $this -> input -> post('email_id');
             }else{
               die($this -> json-> encode(['status'=> 0, 'msg' => 'Please verify the your email to login.']));   
             }
             }else{
               die($this -> json-> encode(['status'=> 0, 'msg' => 'Invalid registered Email ID.']));   
             }
             else:
             die($this -> json-> encode(['status'=> 0, 'msg' => 'Require registered Email ID.']));    
             endif;             
             if($this -> input -> post('password') != ''):
             $whereClouse['password'] = hashcode($this -> input -> post('password'));
             else:
             die($this -> json-> encode(['status'=> 0, 'msg' => 'Require password.']));
             endif; 
             $TokenCode = $this -> register_model -> login($whereClouse);            
             if($TokenCode != ''):
             die($this -> json-> encode(['status'=> 1, 'msg' => 'Login Success.', 'token_code' => $TokenCode]));
             else:
              die($this -> json-> encode(['status'=> 0, 'msg' => 'Login error.']));   
             endif;        
           else:
            die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.']));
           endif;
      }
      
      public function sendverificationlink(){
       $this->load->library('email'); 
       $emailId = $this -> input -> post('email_id');       
       if($this -> db -> where('email_id', $emailId) -> count_all_results('register') > 0){
        if($this -> db -> where(['email_id' => $emailId, 'verified_email' => 0]) -> count_all_results('register') > 0){
        $details = $this -> db -> select(['email_id', 'name', 'user_id']) -> from('register') -> where('email_id', $emailId) -> get() -> result();
       
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
                die($this -> json-> encode(['status'=> 1, 'msg' => "Please click on the link that has just been sent to your email account to verify your email and continue the registration Process."])); 
                }else{
                die($this -> json-> encode(['status'=> 0, 'msg' => 'Email send error.'])); 
                }
            
        }else{
            die($this -> json-> encode(['status'=> 0, 'msg' => 'Mail id already verified.'])); 
        }
       }else{
           die($this -> json-> encode(['status'=> 0, 'msg' => 'Enter register email id.'])); 
       } 
      }
      
      public function auto_login(){
        if($this -> input -> method() == 'post'):        
           if($this -> input -> post('token_code') != ''){               
               if($this -> app_authorization -> loginchecking($this -> input -> post('token_code')) == true):
               die($this -> json-> encode(['status'=> 1, 'msg' => 'Authorized user.']));
               else:
               die($this -> json-> encode(['status'=> 2, 'msg' => 'Unauthorized user.']));    
               endif;               
           }else{
            die($this -> json-> encode(['status'=> 2, 'msg' => 'Session expire.']));   
           }
        else:
           die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.']));    
        endif;  
      }
      
      public function forgotten_password(){
        if($this -> input -> method() == 'post'):        
           if($this -> input -> post('email_id') != ''){
               
               if($this -> db -> where(['email_id' => $this -> input -> post('email_id')]) -> count_all_results('register') > 0):
                 
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
                    $body = $this->load->view('mail/forgot-password', ['user_id' => $this -> input -> post('email_id')], TRUE);
                    $this->email->to($this -> input -> post('email_id'));
                    $this->email->from(SMTP_USER, COMPANY_NAME);
                    $this->email->subject('Reset your password.');
                    $this->email->message($body);
                    $this->email->send();



                    //$this -> session -> set_userdata('RegEmailID', $this -> input -> post('email_id'));  
                 die($this -> json-> encode(['status'=> 1, 'msg' => "If your email address exists in our database, you will receive a password recovery link at your email address in a few minutes. Please check your spam folder if you didn't receive this email."]));
               else:
                 die($this -> json-> encode(['status'=> 0, 'msg' => 'Invaild email id.']));  
               endif;             
               
           }else{
             die($this -> json-> encode(['status'=> 0, 'msg' => 'Require registered email id.']));   
           }
        else:
            die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.']));    
        endif;  
      }
      
      public function forgotten_password_success(){
         if($this -> input -> method() == 'post'):             
         
          if($this -> input -> post('email_id') != ''):              
              if($this -> db -> where(['email_id' => $this -> input -> post('email_id')]) -> count_all_results('register') == 1):
                  $regEmail_id = $this -> input -> post('email_id');
              else:
                 die($this -> json-> encode(['status'=> 0, 'msg' => 'Require registered Email ID.'])); 
              endif;              
          else:
           die($this -> json-> encode(['status'=> 0, 'msg' => 'Require registered Email ID.']));   
          endif;
          
          if($this -> input -> post('password') == ''){
            die($this -> json -> encode(["status" => 0, 'msg' => "Password must be require."]));  
          }
          
          
             
         if($this -> register_model -> resetpassword($regEmail_id, hashcode($this -> input -> post('password')))):
          die($this -> json-> encode(['status'=> 1, 'msg' => 'Password change successfully.']));   
         else:
          die($this -> json-> encode(['status'=> 0, 'msg' => 'Password change error.']));   
         endif; 
         die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.']));
         endif; 
      }


      public function view_profile(){
        if ($this->input->method() == 'post') {
          if ($this->app_authorization->loginchecking($this->input->post('token_code')) == 1) {
              
              $Result = $this -> db -> get_where('register', ['token_code' => $this -> input -> post('token_code')]) -> result();          
              die($this -> json-> encode(['status'=> 1, 'data' => $Result[0]]));
          } else {
              die($this->json->encode(['status' => 0, 'msg' => 'Unauthorized User.']));
          }
      } else {
          die($this->json->encode(['status' => 0, 'msg' => 'Unknown method.']));
      }
      }
      
      
  }
?>
