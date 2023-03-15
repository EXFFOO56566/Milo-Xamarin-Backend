<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   class MY_Loader extends CI_Loader{
       /*Use Only for Branch user  */
      public function adminTemplate($templateName, $data = array()){
         $this -> view('admin/includes/pre-header');
         $this -> view('admin/includes/header');
         $this -> view($templateName, $data);
         $this -> view('admin/includes/footer');
      }
      
      public function MyTemplate($templateName, $data = array()){  
         $Title['websitetitle'] = $data['title'];
         $this -> view('includes/pre-header', $Title);
         $this -> view('includes/header');
         $this -> view($templateName, $data);
         $this -> view('includes/footer');  
      }
   }
?>