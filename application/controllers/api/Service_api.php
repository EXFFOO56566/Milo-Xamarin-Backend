<?php
  class Service_api extends CI_Controller{
      public function __construct() {
          parent::__construct();
          $this -> load ->model('master_model');
          $this -> load ->library(['json', 'app_authorization']);
      }
      
       public function category(){
          if($this ->input -> method() == 'get'):              
              $Result = $this -> master_model -> getAllData('category');
              die($this -> json -> encode(['status' => 1, 'data' => $Result]));
          else:
              die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.']));
          endif;
      }
      
       public function video_category(){
          if($this ->input -> method() == 'get'):              
              $Result = $this -> master_model -> getAllData('sub_category', ['category_id' => 1]);
              die($this -> json -> encode(['status' => 1, 'data' => $Result]));
          else:
              die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.']));
          endif;
      }
      
        public function news_category(){
          if($this ->input -> method() == 'get'):              
              $Result = $this -> master_model -> getAllData('sub_category', ['category_id' => 2]);
              die($this -> json -> encode(['status' => 1, 'data' => $Result]));
          else:
              die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.']));
          endif;
      }
      
       public function news(){
          
          if($this ->input -> method() == 'post'):              
              $Result = $this -> master_model -> getAllData('news', ['sub_category_id' => $this -> input -> post('sub_category_id')]);
              die($this -> json -> encode(['status' => 1, 'data' => $Result]));
          else:
              die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.']));
          endif;
      }
      
       public function video(){
          
          if($this ->input -> method() == 'post'):              
              $Result = $this -> master_model -> getAllData('video', ['sub_category_id' => $this -> input -> post('sub_category_id')]);
              die($this -> json -> encode(['status' => 1, 'data' => $Result]));
          else:
              die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.']));
          endif;
      }
      
       public function all_news(){          
          if($this ->input -> method() == 'get'):              
              $Result = $this -> master_model -> getAllData('news');
              die($this -> json -> encode(['status' => 1, 'data' => $Result]));
          else:
              die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.']));
          endif;
      }
      
       public function newsbyId(){          
          if($this ->input -> method() == 'post'):              
              $Result = $this -> master_model -> getAllData('news', ['id' => $this -> input -> post('news_id')]);
              die($this -> json -> encode(['status' => 1, 'data' => $Result]));
          else:
              die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.']));
          endif;
      }
      
        public function videobyId(){          
          if($this ->input -> method() == 'post'):              
              $Result = $this -> master_model -> getAllData('video', ['id' => $this -> input -> post('video_id')]);
              die($this -> json -> encode(['status' => 1, 'data' => $Result]));
          else:
              die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.']));
          endif;
      }
      
       public function all_video(){          
          if($this ->input -> method() == 'get'):              
              $Result = $this -> master_model -> getAllData('video');
              die($this -> json -> encode(['status' => 1, 'data' => $Result]));
          else:
              die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.']));
          endif;
      }
      
        public function latest_news(){          
          if($this ->input -> method() == 'get'):              
              $Result = $this -> master_model -> latestnew();
              die($this -> json -> encode(['status' => 1, 'data' => $Result]));
          else:
              die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.']));
          endif;
      }
      
       public function latest_video(){          
          if($this ->input -> method() == 'get'):              
              $Result = $this -> master_model -> latestvideo();
              die($this -> json -> encode(['status' => 1, 'data' => $Result]));
          else:
              die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.']));
          endif;
      }
      
     
  }
?>