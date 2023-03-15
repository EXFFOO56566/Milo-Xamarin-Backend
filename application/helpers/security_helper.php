<?php
  function hashcode($Str){
      return base64_encode(base64_encode($Str).'|1|'.md5('SMARTTECHSOFTWARE'));
  }
  
function revhashcode($Str){
      $password = base64_decode($Str);
      $explodeData = explode('|1|', $password);
      return base64_decode($explodeData[0]);
}

function encode($srt){
    $TokenCode = 'SMARTTECHSOFTWARE';
    return base64_encode(base64_encode(md5($TokenCode).'|1|'.$srt.'|1|'.md5($TokenCode)));
}

function decode($EncodeStr){
   $Decodedata = base64_decode(base64_decode($EncodeStr));
   $ExplodeData = explode('|1|', $Decodedata);
   return $ExplodeData[1];
}
  

?>