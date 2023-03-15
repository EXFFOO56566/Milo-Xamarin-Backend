<?php

class Home_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('author_model');
         $this->load->library('email');
         $this -> load -> library('timezone');
    }

    public function send_contact_mail(){
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
        $htmlContent = $this -> load -> view('mail/contact-mail', ['name' => $this->input->post('name'), 'email_id' => $this -> input -> post('email_id'), 'mobile_no' => $this -> input -> post('mobile_no'),'message' => $this -> input -> post('message')], TRUE);

        $this->email->to('info@uglyconnect.com');
        $this->email->from(SMTP_USER, COMPANY_NAME);
        $this->email->subject('Welcome To '.COMPANY_NAME);
        $this->email->message($htmlContent);
        
        /* End welcome mail */
        if($this->email->send()){
            $this -> session -> set_flashdata('successmsg', 'Message send successfully.');
            redirect('contact-us');
        }else{
            $this -> session -> set_flashdata('errmsg', 'Email send error');
            redirect('contact-us');
        }

    }

    public function sendnewslatter(){

    
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

            $htmlContent = $this -> load -> view('mail/news_company_mail', ['email_id' => $this -> input -> post('nf_email')], TRUE);

    

           // $this->email->to('info@uglyconnect.com');
           $this->email->to('sankar.sb008@gmail.com');

            $this->email->from(SMTP_USER, COMPANY_NAME);

            $this->email->subject('Welcome To '.COMPANY_NAME);

            $this->email->message($htmlContent);

            $this->email->send();
	
           
             $this->email->initialize($config);

            $this->email->set_mailtype("html");

            $this->email->set_newline("\r\n");

            $htmlContent = $this -> load -> view('mail/news_mail', ['email_id' => $this -> input -> post('nf_email')], TRUE);

 

            $this->email->to($this -> input -> post('nf_email'));

            $this->email->from(SMTP_USER, COMPANY_NAME);

            $this->email->subject('Welcome To '.COMPANY_NAME);

            $this->email->message($htmlContent);

           $this->email->send();
$this -> session -> set_flashdata('successmsg', 'Thanks for your subscription.');

            redirect('home');
    }

    public function index() {
        $data['title'] = 'Home';
        $data['timezoneArray'] = $this -> timezone -> gettimezone();
        $data['plans'] = $this -> author_model -> view('subscription', ['id >' => 1], 'valid_for');
        $this->load->MyTemplate('home.php', $data);
    }

    public function registration_success() {       
                if ($this->db->where(['email_id'=> $this->input->post('email_id')])->count_all_results('register') == 0):

                    $InsertData = [
                        'name' => $this->input->post('name'),
                        'mobile_no' => $this->input->post('mobile_no'),
                        'email_id' => $this->input->post('email_id'),
                        'password' => hashcode($this->input->post('password')),
                        'time_zone' => $this -> input -> post('time_zone'),
                        'role_id' => 2,
                        'created_at' => date('Y-m-d H:i:s', time())
                    ];

                    if ($this->author_model->adddata('register', $InsertData)):

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
                        
                        echo '1';
                    else:
                        echo "Registration Error. Please try again.";
                    endif;

                else:

                    if($this -> db -> where(['email_id'=> $this->input->post('email_id'), 'is_registered' => 0]) -> count_all_results('register')  == 1){
                        $InsertData = [
                            'name' => $this->input->post('name'),
                            'mobile_no' => $this->input->post('mobile_no'),
                            'email_id' => $this->input->post('email_id'),
                            'password' => hashcode($this->input->post('password')),
                            'time_zone' => $this -> input -> post('time_zone'),
                            'role_id' => 2,
                            'is_registered' => 1
                        ];
    
                        if ($this->author_model->updateregdata('register', $InsertData, ['email_id' => $this -> input -> post('email_id')])):
    
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
                            
                            echo '1';
                        else:
                            echo "Registration Error. Please try again.";
                        endif;

                    }else{
                        echo "Email ID already registered. Please try with a new email id.";
                    }
                    
                endif;      
    }

    public function get_meeting_data() {
        if($this->session->userdata('AyaUserLoginId') != ''):
        $MeetingId = $this->input->post('meeting_id');
       
        $insertData = [
            'meeting_id' => $MeetingId,
            'register_id' => $this->session->userdata('AyaUserLoginId'),
            'meeting_date' => date('Y-m-d', time()),
            'start_time' => date('H:i:s', time()),
            'created_date' => date('Y-m-d H:i:s A', time())
        ];
        if ($this->db->insert('meeting_history', $insertData)):
            echo 1;
        else:
            echo 0;
        endif;
        else:
            echo 1;
        endif;
    }

    public function login_success() {
        
         if ($this->db->where('email_id', $this->input->post('email_id'))->count_all_results('register') > 0):
            if($this -> db -> where(['email_id'=> $this->input->post('email_id'), 'verified_email' => 1]) -> count_all_results('register') > 0): 
            if ($this->db->where(['password' => hashcode($this->input->post('password')), 'email_id' => $this->input->post('email_id')])->count_all_results('register') > 0):
                $LoginResult = $this->db->get_where('register', ['email_id' => $this->input->post('email_id')])->result_array();
                $this->session->set_userdata('AyaUserLoginId', $LoginResult[0]['id']);
                $this->session->set_userdata('AyaUserRole', $LoginResult[0]['role_id']);
                $this->session->set_userdata('AyaUserName', $LoginResult[0]['name']);
                $this->session->set_userdata("UserLogo", $LoginResult[0]['image']);
                $this->session->set_userdata('REGISTEREDUSERID', $this->input->post('email_id'));
                echo "1";
            else:
                echo "Password does not match with your entered Email id.";
            endif;
        else:
            echo "Unverified registered Email Id.";
        endif;
        else:
            echo "Please enter your registered Email Id.";
        endif;
    }

    public function forgotton_password_success() {
       
        if ($this->db->where('email_id', decode($this -> input -> post('user_id')))->count_all_results('register') > 0):
            if ($this->db->where('email_id', decode($this -> input -> post('user_id')))->update('register', ['password' => hashcode($this->input->post('new_password'))])):
               $this -> session -> set_flashdata('successmsg', 'Your password has been changed successfully.'); 
                redirect('reset-password/'.$this -> input -> post('user_id'));
            else:
                $this -> session -> set_flashdata('errmsg', 'Invalid user id entered.');
                redirect('reset-password/'.$this -> input -> post('user_id'));
            endif;
        else:
            $this -> session -> set_flashdata('errmsg', 'Invalid user id entered.');
            redirect('reset-password/'.$this -> input -> post('user_id'));
        endif;
    }
    
    public function reset_password($userId){
        $this -> load -> MyTemplate('reset-password', ['title' => 'Reset password', 'code' => $userId]);
    }

    public function forgotton_password() {

        if ($this->db->where('email_id', $this->input->post('user_id'))->count_all_results('register') > 0):
            $details = $this -> db -> select(['email_id', 'name']) -> from('register') -> where('email_id', $this->input->post('user_id')) -> get() -> result();
            /*
            * Mail send
            */
            $config = array(
            'protocol' => 'smtp',
            'smtp_host' => SMTP_HOST,
            'smtp_port' => 465,
            'smtp_user' => SMTP_USER,
            'smtp_pass' => SMTP_PASS,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'validation' => true
        );
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        $body = $this -> load ->view('mail/forgot-password', ['user_id' => $this->input->post('user_id')], TRUE);
        $this->email->to($details[0]->email_id);
        $this->email->from(SMTP_USER, COMPANY_NAME);
        $this->email->subject('Reset your password.');
        $this->email->message($body);
        $this->email->send();
        echo "1";
        else:
            echo "Please enter your registered user ID";
        endif;
    }

    public function user_logout() {
        $this->session->unset_userdata('REGISTEREDUSERID');
        $this -> session -> unset_userdata('AyaUserLoginId');
        redirect('home');
    }

    public function about() {
        $data['timezoneArray'] = $this -> timezone -> gettimezone();
        $data['title'] = 'About us';
        $this->load->MyTemplate('about-us.php', $data);
    }

    public function faq() {
        $data['timezoneArray'] = $this -> timezone -> gettimezone();
        $data['title'] = 'Faq';
        $this->load->MyTemplate('faq.php', $data);
    }

    public function plans() {
        $data['timezoneArray'] = $this -> timezone -> gettimezone();
        $data['title'] = 'Plans';
        $data['plans'] = $this -> author_model -> view('subscription', ['id >' => 1], 'valid_for');
        $this->load->MyTemplate('plans.php', $data);
    }

    public function contact() {
        $data['timezoneArray'] = $this -> timezone -> gettimezone();
        $data['title'] = 'Contact';
        $this->load->MyTemplate('contact.php', $data);
    }

    public function privacy() {
        $data['timezoneArray'] = $this -> timezone -> gettimezone();
        $data['title'] = 'Privacy';
        $this->load->MyTemplate('privacy.php', $data);
    }
    
     public function terms(){
        $data['timezoneArray'] = $this -> timezone -> gettimezone();
       $data['title'] = 'Terms';
       $this -> load -> MyTemplate('terms.php', $data);
    }

    public function cookies() {
        $data['timezoneArray'] = $this -> timezone -> gettimezone();
        $data['title'] = 'Cookies';
        $this->load->MyTemplate('cookies.php', $data);
    }

    public function products() {
        $data['timezoneArray'] = $this -> timezone -> gettimezone();
        $data['title'] = 'Products';
        $this->load->MyTemplate('Products.php', $data);
    }

    public function industries() {
        $data['timezoneArray'] = $this -> timezone -> gettimezone();
        $data['title'] = 'Industries';
        $this->load->MyTemplate('industries.php', $data);
    }

    public function partners() {
        $data['timezoneArray'] = $this -> timezone -> gettimezone();
        $data['title'] = 'Partners';
        $this->load->MyTemplate('partners.php', $data);
    }

}
?>
