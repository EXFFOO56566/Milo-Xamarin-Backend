<?php
  class Email_controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('email');
        date_default_timezone_set('Asia/Calcutta');
    }
    public function sendEmail() {
      //'smtp_user' => 'noreplayjoinme@gmail.com',
            //'smtp_pass' => 'Ashokdash@1',
      $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'hablameetcol@gmail.com',
            'smtp_pass' => 'Abc123**',
            'mailtype' => 'html',
            'charset' => 'utf-8'
        );

        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");

		$message =  " hello";
		$this->email->to('sankar.sb008@gmail.com');
		$this->email->from('info@uglyconnect.com','Coupette Shop');
		$this->email->subject('Thank you For Your Order');
		$this->email->message($message);
    // echo $this->email->send();
    //             die;
		//sending email
		if($this->email->send()){
			//$this->session->set_flashdata('message','Activation code sent to email');
			//echo	$this->email->print_debugger();
			echo 'mail sent';
		}
		else{
			//$this->session->set_flashdata('message', $this->email->print_debugger());
			echo	$this->email->print_debugger();
		}
    }

}

?>
