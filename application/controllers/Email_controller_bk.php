<?php
  class Email_controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('email');
        date_default_timezone_set('Asia/Calcutta');
    }
    public function sendEmail() {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'thesoniotel2020@gmail.com',
            'smtp_pass' => '300@4SMartmedia',
            'mailtype' => 'html',
            'charset' => 'utf-8'
        );
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");

//Email content
        $htmlContent = '<h1>Sending email via SMTP server</h1>';
        $htmlContent .= '<p>This email has sent via SMTP server from CodeIgniter application.</p>';

        $this->email->to('sankar.sb008@gmail.com');
        $this->email->from('thesoniotel2020@gmail.com', 'MyWebsite');
        $this->email->subject('How to send email via SMTP server in CodeIgniter');
        $this->email->message($htmlContent);

//Send email
        $this->email->send();
    }

}

?>
