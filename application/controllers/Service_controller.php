<?php
class Service_controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $data['title'] = 'Service';
        $this->load->MyTemplate('service.php', $data);
    }
}
?>