<?php
function getregisteridinarray($emailId){

    $registeridArray = [];
    $CI = &get_instance();
    $CI -> load -> database();
    $arrayEmailID = explode(',', $emailId);
    foreach($arrayEmailID as $value){

        if(filter_var(trim($value), FILTER_VALIDATE_EMAIL)){
            $result = $CI -> db -> select('id') -> from('register')-> where(['email_id' => $value]) -> get() -> result();
            if(count($result) > 0){
                $registeridArray[] = $result[0] -> id;
            }else{
                $CI -> db -> insert('register', ['is_registered' => 0, 'role_id' => 2, 'email_id' => $value, 'name' => $value, 'created_at' => date('Y-m-d H:i:s', time())]);
                $registeridArray[] = $CI -> db -> insert_id();
            }
        }
    }
    return $registeridArray;
}





function convertDateAndTime($time, $toTz, $fromTz='Asia/Kolkata'){
        // $time = '17:32';
        //$fromTz = "Asia/Kolkata";
        // $toTz = "America/New_York";
       if($toTz != ''){
        $date = new DateTime($time, new DateTimeZone($fromTz));
        $date->setTimezone(new DateTimeZone($toTz));
        $time= $date->format('Y-m-d h:i:s A');
        return $time;
       }else{
           return '';
       }
}

function convertDate($time, $toTz, $fromTz='Asia/Kolkata'){
    if($toTz != ''){
        $date = new DateTime($time, new DateTimeZone($fromTz));
    $date->setTimezone(new DateTimeZone($toTz));
    $time= $date->format('Y-m-d');
    return $time;
    }else{
        return '';
    }
    
}


function convertTime($time, $toTz, $fromTz='Asia/Kolkata'){
    if($toTz != ''){
    $date = new DateTime($time, new DateTimeZone($fromTz));
    $date->setTimezone(new DateTimeZone($toTz));
    $time= $date->format('H:i:s A');
    return $time;
    }else{
        return '';
    }
}



function convertTimewithoutam($time, $toTz, $fromTz='Asia/Kolkata'){
    if($toTz != ''){
    $date = new DateTime($time, new DateTimeZone($fromTz));
    $date->setTimezone(new DateTimeZone($toTz));
    $time= $date->format('H:i:s');
    return $time;
    }else{
        return '';
    }
}


// function gettimezone(){
//     $client  = @$_SERVER['HTTP_CLIENT_IP'];
//     $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
//     $remote  = @$_SERVER['REMOTE_ADDR'];
//     $result  = array('country'=>'', 'city'=>'');
//     if(filter_var($client, FILTER_VALIDATE_IP)){
//         $ip = $client;
//     }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
//         $ip = $forward;
//     }else{
//         $ip = $remote;
//     }
//     $ip = "72.229.28.185";
//     $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));    
//     if($ip_data && $ip_data->geoplugin_countryName != null){        
//         $result['country'] = $ip_data->geoplugin_countryCode;
//         $result['city'] = $ip_data->geoplugin_city;
//         $result['timezone'] = $ip_data -> geoplugin_timezone;
//     }
//     return $result['timezone'];
// }

function gettimezone(){
    $CI = &get_instance();
    $CI -> load -> database();
    if($CI -> db -> where(['time_zone!=' => '', 'id' => $CI -> session -> userdata('AyaUserLoginId')]) -> count_all_results('register') > 0){
    $Result = $CI -> db -> from('register') -> where(['id' => $CI -> session -> userdata('AyaUserLoginId')]) -> get() -> result();
    $time_zone =  $Result[0] -> time_zone;
    }else{
        $time_zone = '';
    }

    return $time_zone;
}



function gettimezoneApi($token_code){
    $CI = &get_instance();
    $CI -> load -> database();
    if($CI -> db -> where(['time_zone!=' => '', 'token_code' => $token_code]) -> count_all_results('register') > 0){
    $Result = $CI -> db -> from('register') -> where(['token_code' => $token_code]) -> get() -> result();
    $time_zone =  $Result[0] -> time_zone;
    }else{
        $time_zone = '';
    }

    return $time_zone;
}


function __masterfeatures($ConditionArray = []){
       $CI = &get_instance();
       $CI -> load -> database();
       $Result = $CI -> db -> from('features_master') -> where($ConditionArray) -> get();
       return $Result -> result();
   }
   function __duplicatechecking($TableName, $ConditionArray = array()){
       $CI = &get_instance();
       $CI -> load -> database();
       $Result = $CI -> db -> from($TableName) -> where($ConditionArray) -> count_all_results();
       return $Result;
   }
   function getProductName($ProductId = ''){
      $CI = &get_instance();
      $CI -> load -> database();
      $Result = $CI -> db -> select('title') -> from('product_details')-> where(array('id' => $ProductId)) -> get() ->result_array();  
      return $Result[0]['title'];
   }
   
   function __getProductDetails($ConditionArray){
      $CI = &get_instance();
      $CI -> load -> database();
      $Result = $CI -> db -> select('*') -> from('product_stock') -> where($ConditionArray) -> get() -> result();
      return $Result;
   }
   
   function __getStockDetails($TableName, $ConditionArray){
      $CI = &get_instance();
      $CI -> load -> database();
      $Result = $CI -> db -> select_sum('stock') -> select('image') -> from($TableName) -> where($ConditionArray) -> get() -> result();
      return $Result[0];
   }   
   
   function getCustomerAddress($CustomerId){
      $CI = &get_instance();
      $CI -> load -> database();
      $CI -> db -> select("CONCAT(r.address, ',', c.name, ',', s.name)as customer_address")
                -> select('r.mobile_no')
                -> select('r.email_id')
                -> select('r.name')
                -> from('register as r')
                -> join('country as c', 'c.id = r.country_id', 'inner')
                -> join('state as s', 's.id = r.state_id', 'inner')
                -> where('r.id', $CustomerId);
      $Result = $CI -> db -> get();
      $FetchResult = $Result -> result_array();
      return $FetchResult[0];
   }
   
   function getCompanyDetails(){
      $ResultArray = array();
      $CI = &get_instance();
      $CI -> load -> database();
      $Result = $CI -> db -> get_where('company_details') -> result_array();  
      return $Result[0];
   }
   function getAllMasterDatawithId($TableName, $ConditionArray = array()){
      $ResultArray = array();
      $CI = &get_instance();
      $CI -> load -> database();
      $Result = $CI -> db -> get_where($TableName, $ConditionArray) -> result();
      
      foreach($Result as $value){
          $ResultArray[$value->id] = $value->name;
      }      
      return $ResultArray;
   }
   
   function __geturl($TableName, $ConditionArray){
      $ResultArray = array();
      $CI = &get_instance();
      $CI -> load -> database();
      $Result = $CI -> db -> get_where($TableName, $ConditionArray) -> result();
      return $Result[0] -> url;
   }
   
   function getProductDetails($ProductId){
       $CI = &get_instance();
       $CI -> load -> database();
       $Result = $CI -> db -> get_where('product_details', array('id' => $ProductId)) -> result();
       return $Result;
   }  
   
   function getProductTitle($ProductId){
       $CI = &get_instance();
       $CI -> load -> database();
       $Result = $CI -> db -> select('title') -> from('product_details') -> where(array('id' => $ProductId)) -> get() -> result();
       return $Result[0] -> title;
   }
   
   function __companydetails(){
       $ResultArray = array();
       $CI = &get_instance();
       $CI -> load -> database();
       $Result = $CI -> db -> get('company_details');
       return $Result-> result();
   }
   
   function unit(){
       $UnitArray = array(
           '1' => 'g',
           '2' => 'kg'
       );
       return $UnitArray;
   }
   
   function getbillingaddress($BillingId) {
    $CI = &get_instance();
    $CI->load->database();
    $CI->db->select('country_id')
            ->select('state_id')
            ->select('city_name')
            ->select('address')
            ->select('mobile_no')
            ->from('billing_details')
            ->where('id', $BillingId);
    $Query = $CI -> db -> get();
    return $Query -> result();
}

function getMasterCategoryId($TableName, $ConditionArray = array()){
    $CI = &get_instance();
    $CI->load->database();
    $CI -> db -> select('master_category_id')
              -> from($TableName)
              -> where($ConditionArray);
    $Result = $CI -> db -> get();
    if($Result -> num_rows() > 0){
    $SubCategoryResult = $Result -> result();
    return $SubCategoryResult[0] -> master_category_id;
    }else{
     return 0;
    }
           
}

function productCount($TableName, $ConditionArray = array()){
    $CI = &get_instance();
    $CI->load->database();
    return $CI -> db -> where($ConditionArray)-> count_all_results($TableName);    
}


function __getmeetingper($p_id, $created_id){
   $CI = &get_instance();
   $CI->load->database();
   $Result = $CI -> db -> select(['r.name', 'd.status'])
                       -> from('meeting_schedule_details as d')
                       -> join('register as r', 'r.id = d.participate_id', 'inner')
                       -> where(['d.schedule_id' => $p_id])
                       -> where('d.participate_id !=', $created_id)
                       -> get() -> result();
   return $Result;
}

/* news app */

function __getmeetingstatus($p_id, $created_id){
   $UserStatusArray = [];
   $CI = &get_instance();
   $CI->load->database();  
   $Result = $CI -> db -> select(['r.name', 'd.status']) 
                       -> from('meeting_schedule_details as d')
                       -> join('register as r', 'r.id = d.participate_id', 'inner')
                       -> where(['d.schedule_id' => $p_id])
                       -> where('d.participate_id !=', $created_id)
                       -> get() -> result();
  
   foreach($Result as $value){      
       if(array_key_exists($value -> status, $UserStatusArray)){
       $UserStatusArray[$value -> status] = $UserStatusArray[$value -> status].','.$value -> name;
       }else{
       $UserStatusArray[$value -> status] = $value -> name;    
       }        
   }
   
   return $UserStatusArray;
}

function __getmeetingPresentstatus($meeting_id){
   $CI = &get_instance();
   $CI->load->database();  
   $Result = $CI -> db -> select('status') -> from('meeting_schedule_details') -> where(['schedule_id' => $meeting_id, 'participate_id' => $CI -> session -> userdata('AyaUserLoginId')]) -> get() -> result();
   if(count($Result) > 0){
   return $Result[0] -> status;
   }else{
   return 0;    
   }
}

function __getmeetingDetails($meeting_id){
   $CI = &get_instance();
   $CI->load->database(); 
   $Result = $CI -> db -> get_where('meeting_schedule', ['id' => $meeting_id]) -> result();
   return $Result[0];
}



?>
