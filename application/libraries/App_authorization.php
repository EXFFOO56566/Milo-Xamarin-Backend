<?php
class App_authorization{
    
    function __construct() {
        $this->CI = &get_instance();
        $this->CI->load->database();
    }
    public function loginchecking($tokenCode){
        if($this -> CI -> db -> where(['token_code' => $tokenCode, 'status' => 1, 'verified_email' => 1]) -> count_all_results('register')):
            return true;
        else:
            return false;
        endif;
    }
    
    public function getRegisterId($tokenCode){
        if($tokenCode != ''){
            $Reg = $this -> CI -> db -> select('id') -> from('register') -> where('token_code', $tokenCode)->get() -> result();
            return $Reg[0] -> id;
        }else{
            return 0;
        }        
    }
}
?>
