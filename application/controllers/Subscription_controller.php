<?php

class Subscription_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('subscription_model');
        $this->load->library('paypal_lib');
    }

    public function view() {
        if ($this->authchecking() != 0) {
            $data['title'] = 'Subscription List';
            $data['SubscriptionList'] = $this->subscription_model->view(['id>' => 1]);
            $this->load->adminTemplate('admin/subscription', $data);
        } else {
            redirect('logout');
        }
    }

    public function add() {
        if ($this->authchecking() != 0) {
            $data['title'] = 'Add Subscription';
            $this->load->adminTemplate('admin/add-subscription', $data);
        } else {
            redirect('logout');
        }
    }

    public function addsuccess() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Subscription name', 'trim|required|is_unique[subscription.name]');
        $this->form_validation->set_rules('valid_for', 'Valid For', 'trim|required|numeric');
        $this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');
        $this->form_validation->set_rules('max_meeting', 'Max Meeting limit', 'trim|required|numeric');
        $this->form_validation->set_rules('max_participants', 'Max Participants', 'trim|required|numeric');
        if ($this->form_validation->run() == False):
            $this->session->set_flashdata('errmsg', validation_errors());
            $this -> session -> set_flashdata($this -> input -> post());
            redirect('author/add-subscription');
        else:

            if ($this->input->post('submit') == 'Save') {
                    $insertData = [
                        'name' => $this->input->post('name'),
                        'valid_for' => $this->input->post('valid_for'),
                        'price' => $this->input->post('price'),
                        'max_meeting' => $this->input->post('max_meeting'),
                        'max_participants' => $this->input->post('max_participants'),
                        'rules' => $this->input->post('rules'),
                        'created_at' => date('Y-m-d', time())
                    ];

                    if($this->subscription_model->add($insertData)):
                    $this -> session -> set_flashdata('successmsg', 'Data has been added successfully.');
                    redirect('author/subscription');
                    else:
                    $this -> session -> set_flashdata('errmsg', 'Data added error.');
                    redirect('author/add-subscription');    
                    endif;
                
            } else {
                redirect('author');
            }

        endif;
    }

    public function update($updateId) {
        $data['title'] = 'Update Subscription';
        $data['SubscriptionList'] = $this->subscription_model->view(['id' => $updateId]);
        $this->load->adminTemplate('admin/update-subscription', $data);
    }
    
    public function updatesuccess(){
       $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Subscription name', 'trim|required|is_unique[subscription.id!='.$this -> input -> post('update_id').' AND '.'name=]');
        $this->form_validation->set_rules('valid_for', 'Valid For', 'trim|required|numeric');
        $this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');
        $this->form_validation->set_rules('max_meeting', 'Max Meeting limit', 'trim|required|numeric');
        $this->form_validation->set_rules('max_participants', 'Max Participants', 'trim|required|numeric');
        if ($this->form_validation->run() == False):
            $this->session->set_flashdata('errmsg', validation_errors());
            redirect('author/update-subscription/'.$this -> input -> post('update_id'));
        else:

            if ($this->input->post('submit') == 'Save') {
                    $insertData = [
                        'name' => $this->input->post('name'),
                        'valid_for' => $this->input->post('valid_for'),
                        'price' => $this->input->post('price'),
                        'max_meeting' => $this->input->post('max_meeting'),
                        'max_participants' => $this->input->post('max_participants'),
                        'rules' => $this->input->post('rules'),
                    ];
                   
                    if($this->subscription_model->update($insertData, ['id' => $this -> input -> post('update_id')])):
                    $this -> session -> set_flashdata('successmsg', 'Data has been updated successfully.');
                    redirect('author/subscription');
                    else:
                    $this -> session -> set_flashdata('errmsg', 'You have no change.');
                    redirect('author/subscription');    
                    endif;
                
            } else {
                redirect('author');
            }

        endif;  
    }

    public function delete($deleteid) {
        
        if($this ->authchecking() != 0){
          if ($this->subscription_model->delete(array('id' => $deleteid))):
            $this->session->set_flashdata('successmsg', 'Data has been deleted successfully');
            redirect('author/subscription');
        else:
            $this->session->set_flashdata('errmsg', 'Delete Error');
            redirect('author/subscription');
        endif;
        }else{
            redirect('logout');
        }
    }

    public function paynow($subId){
    $data['title'] = 'Pay now';
    $sub_id = decode($subId);
    if($sub_id != '' && $this -> session-> userdata('AyaUserLoginId') != ''){ 
       $SubscriptionList = $this->subscription_model->view(['id' => decode($subId)]);
       
       $ExpiryDate = time() + $SubscriptionList[0] -> valid_for*24*3600; 
        
          $InserData = [
           'sub_id' => $sub_id,
           'register_id' => $this -> session-> userdata('AyaUserLoginId'),
           'purchase' => date('Y-m-d', time()),
           'expiry_date' => date('Y-m-d', $ExpiryDate),
           'amount' => $SubscriptionList[0] -> price,
           'total_meeting' =>$SubscriptionList[0] -> max_meeting,
           'max_participants'  => $SubscriptionList[0] -> max_participants, 
           'is_active' => $SubscriptionList[0] -> price == 0?'1':'0',
           'payment_status' => $SubscriptionList[0] -> price == 0?'1':'0',
           'created_at' => date('Y-m-d', time()),
       ];   
       
       
    
      if($SubscriptionList[0] -> price == 0){
          $InserData['is_active'] = 1;
      }
      $tbl_id = $this -> subscription_model -> purchase($InserData); 
      
      if($SubscriptionList[0] -> price > 0){
       /*Paypal Payment gateway */

       //Set variables for paypal form
       $returnURL = base_url().'paypal/success'; //payment success url
       $cancelURL = base_url().'paypal/cancel'; //payment cancel url
       $notifyURL = base_url().'paypal/ipn'; //ipn url
       
       $userID = $this -> session-> userdata('AyaUserLoginId'); //current user id
       $logo = base_url().'uploaded/logo.png';

       
       $this->paypal_lib->add_field('return', $returnURL);
       $this->paypal_lib->add_field('cancel_return', $cancelURL);
       $this->paypal_lib->add_field('notify_url', $notifyURL);
       $this->paypal_lib->add_field('item_name', $SubscriptionList[0] -> name);
       $this->paypal_lib->add_field('custom', $userID);
       $this->paypal_lib->add_field('item_number',  $tbl_id);
       $this->paypal_lib->add_field('amount',  $SubscriptionList[0] -> price);        
       $this->paypal_lib->image($logo);       
       $this->paypal_lib->paypal_auto_form();
//       echo "Test";
       die;
      }else{
        $this -> db -> where(['id' => $this -> session-> userdata('AyaUserLoginId')]) -> update('register', ['purchase_id' => $tbl_id]);
          $this -> session -> set_flashdata('successmsg', 'Right now you are using a free trail plan.');
          redirect('author/active-plan');
      }
    }
    
     
    }
    
    function success() {
        $paypalInfo = $this->input->get();
        $data['item_number'] = $paypalInfo['item_number'];
        $data['txn_id'] = $paypalInfo["tx"];
        $data['payment_amt'] = $paypalInfo["amt"];
        $data['currency_code'] = $paypalInfo["cc"];
        $data['status'] = $paypalInfo["st"];        
        $this -> subscription_model -> updatepayment(['payment_status' => 1, 'is_active' => 1], ['id' => $paypalInfo['custom']]);

    }
    
    public function active_plan(){
        if($this ->authchecking()){
           $data['title'] = 'Active Plan';
         if($this -> session -> userdata('AyaUserRole') == 1){
          $data['SubscriptionList'] = $this->subscription_model->activepanael(['R.id >' => 1]);
         }else{
          $data['SubscriptionList'] = $this->subscription_model->activepanael(['R.id' => $this -> session -> userdata('AyaUserLoginId')]);   
         }
          $this->load->adminTemplate('admin/active-plan', $data);  
        }else{
            redirect('logout');
        }
    }
    
    public function active_subscription($purchaseId){
       if($this ->authchecking()){
         if($this -> session -> userdata('AyaUserRole') == 1){
         $this -> db -> where(['id' =>  $purchaseId, 'expiry_date >' => date('Y-m-d')]) -> update('purchase', ['is_active' => 1]);
         }
         redirect('author/active-plan');
       }else{
           redirect('logout');
       }
    }
    
    public function deactive_subscription($purchaseId){
        if($this ->authchecking()){
         if($this -> session -> userdata('AyaUserRole') == 1){
         $this -> db -> where(['id' =>  $purchaseId, 'expiry_date >' => date('Y-m-d')]) -> update('purchase', ['is_active' => 0]);
         }
         redirect('author/active-plan');
       }else{
           redirect('logout');
       }
    }

    private function authchecking() {
        if ($this->session->userdata('AyaUserLoginId') != '') {
            return 1;
        } else {
            return 0;
        }
    }

}
?>
