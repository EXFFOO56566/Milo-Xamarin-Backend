<?php
class Post_controller extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this -> load -> model('post_model');
    }
    
    public function index(){
        $CategoryId = 1;
        if($this ->authchecking() != 0){
        $CategoryList = getAllMasterDatawithId('category', ['id' => $CategoryId]); 
        $data['title'] = $CategoryList[$CategoryId]; 
        $data['category_id'] = $CategoryId;
        $data['PostDetails'] = $this -> post_model ->getAllData('video', ['category_id' => $CategoryId]);
        $this -> load -> adminTemplate('admin/post-list', $data);
        }else{
            redirect('logout');
        }
    }
    
    public function add_post(){
        $CategoryId = 1;
        if($this ->authchecking() != 0 && $CategoryId != ''){
        $data['SubCategoryList'] = getAllMasterDatawithId('sub_category', ['category_id' => $CategoryId]); 
        $data['title'] = "Add Post"; 
        $data['category_id'] = $CategoryId;

        $this -> load -> adminTemplate('admin/add-post', $data);
        }else{
            redirect('logout');
        }
    }
    
    public function addpostsuccess(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this -> form_validation-> set_rules('url', 'URL', 'trim|required');
        if ($this->form_validation->run() == false) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('author/add-post');
        } else {
            
             $files = $_FILES;
            $UserFileArray = $_FILES['userfile']['name'];
            for ($i = 0; $i < count($UserFileArray); $i++) {
                if ($UserFileArray[$i] != '') {
                    if (trim($_FILES['userfile']['name'][$i]) != '') {
                        $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
                        $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
                        $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                        $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
                        $_FILES['userfile']['size'] = $files['userfile']['size'][$i];
                        $config['upload_path'] = 'uploads/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['max_size'] = 50000;
                        $config['max_width'] = 50000;
                        $config['max_height'] = 50000;
                        $config['encrypt_name'] = true;
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);

                        if (!$this->upload->do_upload('userfile')) {
                            $this -> session -> set_flashdata('errmsg', $this->upload->display_errors());
                            redirect('add-news');
                        } else {
                            $UploadData = $this->upload->data();     
                            $UserFile[$i] = $UploadData['file_name'];
                        }
                    }
                } else {
                    $UserFile[$i] = '';
                }
            }
            
            $InsertData = [
                'category_id' => $this -> input -> post('category_id'),
                'sub_category_id' => $this -> input -> post('sub_category_id'),
                'title' => $this -> input -> post('title'),
                'url' => $this -> input -> post('url'),
                'details' => $this -> input -> post('details'),
                'status' => 1,
                'image' => $UserFile[0],
                'created_at' => date('Y-m-d', time())
            ];
            
            if($this -> post_model -> insert('video', $InsertData)){
                  $this -> session -> set_flashdata('successmsg', 'Data has been added successfully');
                  redirect('author/video-upload');
              }else{
                  $this -> session -> set_flashdata('errmsg', 'Data insert error. Please Try again.');
                  $this->session->set_flashdata($this->input->post(NULL, TRUE));
                  redirect('author/add-post');
              }
        }
    }
    
      public function update_video($updateId){
        if($this ->authchecking() != 0 && $updateId != ''){
        $data['SubCategoryList'] = getAllMasterDatawithId('sub_category', ['category_id' => 1]); 
        $data['VideoList'] = $this -> post_model ->getAllData('video', ['id' => $updateId]);
        $data['title'] = "Update Video"; 

        $this -> load -> adminTemplate('admin/update-video', $data);
        }else{
            redirect('logout');
        }
    }
    
    public function updatepostsuccess(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this -> form_validation-> set_rules('url', 'URL', 'trim|required');
        if ($this->form_validation->run() == false) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('author/update-video/'.$this -> input -> post('update_id'));
        } else {
            
             $files = $_FILES;
            $UserFileArray = $_FILES['userfile']['name'];
            for ($i = 0; $i < count($UserFileArray); $i++) {
                if ($UserFileArray[$i] != '') {
                    if (trim($_FILES['userfile']['name'][$i]) != '') {
                        $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
                        $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
                        $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                        $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
                        $_FILES['userfile']['size'] = $files['userfile']['size'][$i];
                        $config['upload_path'] = 'uploads/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['max_size'] = 50000;
                        $config['max_width'] = 50000;
                        $config['max_height'] = 50000;
                        $config['encrypt_name'] = true;
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);

                        if (!$this->upload->do_upload('userfile')) {
                            $this -> session -> set_flashdata('errmsg', $this->upload->display_errors());
                            redirect('add-news');
                        } else {
                            $UploadData = $this->upload->data();     
                            $UserFile[$i] = $UploadData['file_name'];
                        }
                    }
                } else {
                    $UserFile[$i] = '';
                }
            }
            
            if($UserFile[0] != ''){
            $InsertData = [
                'sub_category_id' => $this -> input -> post('sub_category_id'),
                'title' => $this -> input -> post('title'),
                'image' => $UserFile[0],
                'url' => $this -> input -> post('url'),
                'details' => $this -> input -> post('details')
            ];
            }else{
                $InsertData = [
                    'sub_category_id' => $this -> input -> post('sub_category_id'),
                    'title' => $this -> input -> post('title'),
                    'url' => $this -> input -> post('url'),
                    'details' => $this -> input -> post('details')
                ]; 
            }
            
            if($this -> post_model -> update('video', $InsertData, ['id' => $this -> input -> post('update_id')])){
                  $this -> session -> set_flashdata('successmsg', 'Data has been updated successfully');
                  redirect('author/video-upload');
              }else{
                  $this -> session -> set_flashdata('errmsg', 'Data update error or you have no change.');
                  $this->session->set_flashdata($this->input->post(NULL, TRUE));
                  redirect('author/video-upload');
              }
        } 
    }
    
    public function delete_video($deleteId){
      if($this ->authchecking() != 0 && $deleteId != ''){
          $this -> post_model -> delete('video', ['id' => $deleteId]);
          $this -> session -> set_flashdata('successmsg', 'Data has been deleted successfully');
          redirect('author/video-upload');
        }else{
            redirect('logout');
        }   
    }
    
    
      public function news_list(){
        $CategoryId = 2;
        if($this ->authchecking() != 0){
        $CategoryList = getAllMasterDatawithId('category', ['id' => $CategoryId]); 
        $data['title'] = $CategoryList[$CategoryId]; 
        $data['category_id'] = $CategoryId;
        $data['NewsList'] = $this -> post_model ->getAllData('news', ['category_id' => $CategoryId]);
        $this -> load -> adminTemplate('admin/news-list', $data);
        }else{
            redirect('logout');
        }
    }
    
    public function add_news(){
        $CategoryId = 2;
        if($this ->authchecking() != 0 && $CategoryId != ''){
        $data['SubCategoryList'] = getAllMasterDatawithId('sub_category', ['category_id' => $CategoryId]); 
        $data['title'] = "Add News"; 
        $data['category_id'] = $CategoryId;

        $this -> load -> adminTemplate('admin/add-news', $data);
        }else{
            redirect('logout');
        }
    }
    
    public function addnewssuccess(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this -> form_validation-> set_rules('details', 'details', 'trim|required');
        if ($this->form_validation->run() == false) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('author/add-news');
        } else {
            
            $files = $_FILES;
            $UserFileArray = $_FILES['userfile']['name'];
            for ($i = 0; $i < count($UserFileArray); $i++) {
                if ($UserFileArray[$i] != '') {
                    if (trim($_FILES['userfile']['name'][$i]) != '') {
                        $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
                        $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
                        $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                        $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
                        $_FILES['userfile']['size'] = $files['userfile']['size'][$i];
                        $config['upload_path'] = 'uploads/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['max_size'] = 50000;
                        $config['max_width'] = 50000;
                        $config['max_height'] = 50000;
                        $config['encrypt_name'] = true;
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);

                        if (!$this->upload->do_upload('userfile')) {
                            $this -> session -> set_flashdata('errmsg', $this->upload->display_errors());
                            redirect('author/add-news');
                        } else {
                            $UploadData = $this->upload->data();     
                            $UserFile[$i] = $UploadData['file_name'];
                        }
                    }
                } else {
                    $UserFile[$i] = '';
                }
            }
            
                   
            $InsertData = [
                'category_id' => 2,
                'sub_category_id' => $this -> input -> post('sub_category_id'),
                'title' => $this -> input -> post('title'),
                'details' => $this -> input -> post('details'),
                'status' => 1,
                'image' => $UserFile[0],
                'month'=> date('M j', time()),
                'created_date' => date('Y-m-d', time())
            ];
            
            if($this -> post_model -> insert('news', $InsertData)){
                  $this -> session -> set_flashdata('successmsg', 'Data has been added successfully');
                  redirect('author/news-list');
              }else{
                  $this -> session -> set_flashdata('errmsg', 'Data insert error. Please Try again.');
                  $this->session->set_flashdata($this->input->post(NULL, TRUE));
                  redirect('author/add-news');
              }
        }
    }
    
      public function update_news($updateId){
        if($this ->authchecking() != 0 && $updateId != ''){
        $data['SubCategoryList'] = getAllMasterDatawithId('sub_category', ['category_id' => 2]); 
        $data['NewsDetails'] = $this -> post_model ->getAllData('news', ['id' => $updateId]);
        $data['title'] = "Update News"; 

        $this -> load -> adminTemplate('admin/update-news', $data);
        }else{
            redirect('logout');
        }
    }
    
    public function updatenewssuccess(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this -> form_validation-> set_rules('details', 'Details', 'trim|required');
        if ($this->form_validation->run() == false) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            redirect('author/update-news/'.$this -> input -> post('update_id'));
        } else {
           
             $files = $_FILES;
            $UserFileArray = $_FILES['userfile']['name'];
            for ($i = 0; $i < count($UserFileArray); $i++) {
                if ($UserFileArray[$i] != '') {
                    if (trim($_FILES['userfile']['name'][$i]) != '') {
                        $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
                        $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
                        $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                        $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
                        $_FILES['userfile']['size'] = $files['userfile']['size'][$i];
                        $config['upload_path'] = 'uploads/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['max_size'] = 50000;
                        $config['max_width'] = 50000;
                        $config['max_height'] = 50000;
                        $config['encrypt_name'] = true;
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);

                        if (!$this->upload->do_upload('userfile')) {
                            $this -> session -> set_flashdata('errmsg', $this->upload->display_errors());
                            redirect('author/update-news/'.$this -> input -> post('update_id'));
                        } else {
                            $UploadData = $this->upload->data();     
                            $UserFile[$i] = $UploadData['file_name'];
                        }
                    }
                } else {
                    $UserFile[$i] = '';
                }
            }
            
            if($UserFile[0] != ''){       
            $InsertData = [
                'sub_category_id' => $this -> input -> post('sub_category_id'),
                'title' => $this -> input -> post('title'),
                'details' => $this -> input -> post('details'),
                'image' => $UserFile[0],
            ];
            }else{
                $InsertData = [
                'sub_category_id' => $this -> input -> post('sub_category_id'),
                'title' => $this -> input -> post('title'),
                'details' => $this -> input -> post('details'),
                ];
            }
            
            if($this -> post_model -> update('news', $InsertData, ['id' => $this -> input -> post('update_id')])){
                  $this -> session -> set_flashdata('successmsg', 'Data has been updated successfully');
                  redirect('author/news-list');
              }else{
                  $this -> session -> set_flashdata('errmsg', 'Data update error or you have no change.');
                  $this->session->set_flashdata($this->input->post(NULL, TRUE));
                  redirect('author/news-list');
              }
        } 
    }
    
    public function delete_news($deleteId){
      if($this ->authchecking() != 0 && $deleteId != ''){
          $this -> post_model -> delete('news', ['id' => $deleteId]);
          $this -> session -> set_flashdata('successmsg', 'Data has been deleted successfully');
          redirect('author/news-list');
        }else{
            redirect('logout');
        }   
    }

    private function authchecking(){
       if($this -> session -> userdata('AyaUserLoginId') != ''){
           return 1;
       }else{
           return 0;
       } 
    }
}
?>