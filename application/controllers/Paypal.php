<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Paypal extends CI_Controller 
    {
         function  __construct(){
            parent::__construct();
            $this->load->library('paypal_lib');
            $this->load->model('subscription_model');
         }
         
        function success(){      
  $paypalInfo = $this->input->post();       
        $data['item_number'] = $paypalInfo['item_number'];
        $data['txn_id'] = $paypalInfo["txn_id"];
        $data['payment_amt'] = $paypalInfo["payment_gross"];
        $data['currency_code'] = $paypalInfo["mc_currency"];
        $data['status'] = $paypalInfo["payment_status"] == 'Completed'?1:0;
        $this -> subscription_model -> updatepayment(['payment_status' => 1, 'tx_id' =>$data['txn_id'],  'pay_by' => 'online', 'payment_date' => date('Y-m-d', time()), 'is_active' => 1], ['id' => $paypalInfo['item_number']]);
        $this -> db ->where('id', $paypalInfo['custom'])-> update('register', ['purchase_id' => $paypalInfo['item_number']]);
         redirect('/');
	die;
         $this->load->view('paypal/success', $data);
         }
         
         function cancel(){
	redirect('plans');
        die;
          
 // $this->load->view('paypal/cancel');
         }
         
         function ipn(){
            //paypal return transaction details array
            $paypalInfo    = $this->input->post();

            $data['user_id'] = $paypalInfo['custom'];
            $data['product_id']    = $paypalInfo["item_number"];
            $data['txn_id']    = $paypalInfo["txn_id"];
            $data['payment_gross'] = $paypalInfo["payment_gross"];
            $data['currency_code'] = $paypalInfo["mc_currency"];
            $data['payer_email'] = $paypalInfo["payer_email"];
            $data['payment_status']    = $paypalInfo["payment_status"];

            $paypalURL = $this->paypal_lib->paypal_url;        
            $result    = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
            
            //check whether the payment is verified
            if(preg_match("/VERIFIED/i",$result)){
                //insert the transaction data into the database
                $this->product->insertTransaction($data);
            }
        }
    }
?>
