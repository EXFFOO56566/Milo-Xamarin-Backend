<?php
  class Json{
      
       public function encode($str){
           return json_encode($str);
       }
       
       public function decode($str){
           return json_decode($str);
       }
  }
?>