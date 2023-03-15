<?php

class Loginchecking {
    public function ipchecking() {
            $this->CI =& get_instance();
          
        if ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == 'uglyconnect.com') {
     	   $Content = $this -> CI -> output->get_output();
     	   $Content = str_replace('Super Bowl', 'Dorado System', $Content);
     	  
        } else {
           redirect('home');
        }
    }

}
?>
