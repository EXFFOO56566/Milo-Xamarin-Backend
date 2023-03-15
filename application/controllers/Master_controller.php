<?php
class Master_controller extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this -> load -> model('master_model');
    }
    
    public function category_list(){
      if($this ->authchecking() != 0){
        $data['title'] = 'Category List'; 
        $data['CategoryList'] = $this -> master_model -> getAllData('category');
        $this -> load -> adminTemplate('admin/category-list', $data);
        }else{
            redirect('logout');
        }
    }
    
    public function add_category(){
       if($this ->authchecking() != 0){
        $data['title'] = 'Add Category'; 
        $this -> load -> adminTemplate('admin/add-category', $data);
        }else{
            redirect('logout');
        }
    }
    
    public function addcategorysuccess(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Category Name', 'trim|required');       
        if ($this->form_validation->run() == false) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            $this->session->set_flashdata($this->input->post(NULL, TRUE));
            redirect('author/add-category');  
        }else{
            
           if(strtoupper($this -> input -> post('submit')) == 'SAVE'){
           if($this -> db -> where(['name' => $this -> input -> post('name')]) -> count_all_results('category') == 0){   
               
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
                            redirect('author/add-category');
                        } else {
                            $UploadData = $this->upload->data();     
                        /*
                         * 
                         * For Image compress.
                         */
                        
                        $config['image_library'] = 'gd2';  
                        $config['source_image'] = 'uploads/'.$UploadData["file_name"];  
                        $config['create_thumb'] = FALSE;  
                        $config['maintain_ratio'] = FALSE;  
                        $config['quality'] = '60%';  
                        $config['width'] = 600;  
                        $config['height'] = 600;  
                        $config['new_image'] = 'uploads/'.$UploadData["file_name"];  
                        $this->load->library('image_lib', $config);  
                        $this->image_lib->resize();
                        $UserFile[$i] = $UploadData['file_name'];
                        }
                    }
                } else {
                    $UserFile[$i] = '';
                }
            }     
               
            
               
           $InsertData = [
               'name' => $this -> input -> post('name'),
               'image' => $UserFile[0],
               'created_at' => date('Y-m-d', time())
           ]; 
           
           if($this -> master_model -> insert('category', $InsertData)):
            $this -> session -> set_flashdata('successmsg', INSERT_SUCCESS);
            redirect('author/category-list');
           else:
            $this -> session -> set_flashdata('errmsg', INSERT_ERROR);
            redirect('author/add-category');   
           endif;
           }else{
            $this -> session -> set_flashdata('errmsg', 'Duplicate Entry. Category Name already exists!!');
            redirect('author/add-category');     
           }
           }else{
              redirect('logout');  
           }           
        } 
    }
    
    public function update_category($updateID){
        if($this ->authchecking() != 0){
        $data['title'] = 'Update Category';
        $data['CategoryList'] = $this -> master_model -> getAllData('category', ['id' => $updateID]);
        $this -> load -> adminTemplate('admin/update-category', $data);
        }else{
            redirect('logout');
        }
    }
    
    public function updatecategorysuccess(){
          $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Category Name', 'trim|required');       
        if ($this->form_validation->run() == false) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            $this->session->set_flashdata($this->input->post(NULL, TRUE));
            redirect('author/update-category/'.$this -> input -> post('updateid'));  
        }else{
            
           if(strtoupper($this -> input -> post('submit')) == 'SAVE'){
               
           if($this -> db -> where(['name' => $this -> input -> post('name'), 'id !='=> $this-> input -> post('updateid')]) -> count_all_results('category') == 0){
           
               
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
                            redirect('author/add-category');
                        } else {
                            $UploadData = $this->upload->data();     
                        /*
                         * 
                         * For Image compress.
                         */
                        
                        $config['image_library'] = 'gd2';  
                        $config['source_image'] = 'uploads/'.$UploadData["file_name"];  
                        $config['create_thumb'] = FALSE;  
                        $config['maintain_ratio'] = FALSE;  
                        $config['quality'] = '60%';  
                        $config['width'] = 600;  
                        $config['height'] = 600;  
                        $config['new_image'] = 'uploads/'.$UploadData["file_name"];  
                        $this->load->library('image_lib', $config);  
                        $this->image_lib->resize();
                        $UserFile[$i] = $UploadData['file_name'];
                        }
                    }
                } else {
                    $UserFile[$i] = '';
                }
            }
               
             
            if($UserFile[0] != ''){
            $InsertData = [
               'name' => $this -> input -> post('name'),
               'image' => $UserFile[0] 
            ]; 
            }else{
             $InsertData = [
               'name' => $this -> input -> post('name')
            ];   
            }
           
           if($this -> master_model -> update('category', $InsertData, ['id' => $this -> input -> post('updateid')])):
            $this -> session -> set_flashdata('successmsg', UPDATE_SUCCESS);
            redirect('author/category-list');
           else:
            $this -> session -> set_flashdata('errmsg', UPDATE_ERROR);
            redirect('author/category-list');   
           endif;
           }else{
            $this -> session -> set_flashdata('errmsg', 'Duplicate Entry. Category Name already exists!!');
            redirect('author/update-category/'.$this-> input -> post('updateid'));   
           }
           }else{
              redirect('logout');  
           }           
        }  
    }
    
    
    public function delete_category(){
      
    }
    
    public function sub_category_list(){
        if($this ->authchecking() != 0){
        $data['title'] = 'Sub Category List'; 
        $data['SubCategoryList'] = $this -> master_model -> getAllData('sub_category');
        $this -> load -> adminTemplate('admin/sub-category-list', $data);
        }else{
            redirect('logout');
        } 
    }
    
    public function add_sub_category(){
       if($this ->authchecking() != 0){
        $data['title'] = 'Add Sub Category'; 
        $this -> load -> adminTemplate('admin/add-sub-category', $data);
        }else{
            redirect('logout');
        }  
    }
    
    public function addsubcategorysuccess(){
         $this->load->library('form_validation');
         $this->form_validation->set_rules('category_id', 'Category Name', 'trim|required'); 
        $this->form_validation->set_rules('name', 'Sub Category Name', 'trim|required');       
        if ($this->form_validation->run() == false) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            $this->session->set_flashdata($this->input->post(NULL, TRUE));
            redirect('author/add-sub-category');  
        }else{
            
           if(strtoupper($this -> input -> post('submit')) == 'SAVE'){
           if($this -> db -> where(['name' => $this -> input -> post('name')]) -> count_all_results('sub_category') == 0){

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
                            redirect('author/add-sub-category');
                        } else {
                            $UploadData = $this->upload->data();     
                        /*
                         * 
                         * For Image compress.
                         */
                        
                        $config['image_library'] = 'gd2';  
                        $config['source_image'] = 'uploads/'.$UploadData["file_name"];  
                        $config['create_thumb'] = FALSE;  
                        $config['maintain_ratio'] = FALSE;  
                        $config['quality'] = '60%';  
                        $config['width'] = 600;  
                        $config['height'] = 600;  
                        $config['new_image'] = 'uploads/'.$UploadData["file_name"];  
                        $this->load->library('image_lib', $config);  
                        $this->image_lib->resize();
                        $UserFile[$i] = $UploadData['file_name'];
                        }
                    }
                } else {
                    $UserFile[$i] = '';
                }
            }         
               
               
           $InsertData = [
               'category_id' => $this -> input -> post('category_id'),
               'name' => $this -> input -> post('name'),
               'image' => $UserFile[0],
               'created_at' => date('Y-m-d', time())
           ]; 
           
           if($this -> master_model -> insert('sub_category', $InsertData)):
            $this -> session -> set_flashdata('successmsg', INSERT_SUCCESS);
            redirect('author/sub-category-list');
           else:
            $this->session->set_flashdata($this->input->post(NULL, TRUE));
            $this -> session -> set_flashdata('errmsg', INSERT_ERROR);
            redirect('author/add-sub-category');   
           endif;
           }else{
            $this->session->set_flashdata($this->input->post(NULL, TRUE));
            $this -> session -> set_flashdata('errmsg', "Duplicate Entry! Sub category name already exists!!");
            redirect('author/add-sub-category');    
           }
           }else{
              redirect('logout');  
           }           
        }
    }
    
    public function update_sub_category($updateId){
        if($this ->authchecking() != 0){
        $data['title'] = 'Update Sub Category';
        $data['SubCategory'] = $this -> master_model -> getAllData('sub_category', ['id' => $updateId]);
        $this -> load -> adminTemplate('admin/update-sub-category', $data);
        }else{
            redirect('logout');
        } 
    }
    
    public function updatesubcategorysuccess(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Sub Category Name', 'trim|required');       
        if ($this->form_validation->run() == false) {
            $error = validation_errors();
            $this->session->set_flashdata('errmsg', $error);
            $this->session->set_flashdata($this->input->post(NULL, TRUE));
            redirect('author/updaye-sub-category/'.$this -> input -> post('updateid'));  
        }else{
           if(strtoupper($this -> input -> post('submit')) == 'SAVE'){
           if($this -> db -> where(['name' => $this -> input -> post('name'), 'id !=' => $this -> input -> post('updateid')]) -> count_all_results('sub_category') == 0){ 
           
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
                            redirect('author/updaye-sub-category/'.$this -> input -> post('updateid')); 
                        } else {
                            $UploadData = $this->upload->data();     
                        /*
                         * 
                         * For Image compress.
                         */
                        
                        $config['image_library'] = 'gd2';  
                        $config['source_image'] = 'uploads/'.$UploadData["file_name"];  
                        $config['create_thumb'] = FALSE;  
                        $config['maintain_ratio'] = FALSE;  
                        $config['quality'] = '60%';  
                        $config['width'] = 600;  
                        $config['height'] = 600;  
                        $config['new_image'] = 'uploads/'.$UploadData["file_name"];  
                        $this->load->library('image_lib', $config);  
                        $this->image_lib->resize();
                        $UserFile[$i] = $UploadData['file_name'];
                        }
                    }
                } else {
                    $UserFile[$i] = '';
                }
            } 
              
            if($UserFile[0] != ''){
            $InsertData = [
               'category_id' => $this -> input -> post('category_id'),
               'name' => $this -> input -> post('name'),
               'image' => $UserFile[0]
            ]; 
            }else{
            $InsertData = [
               'category_id' => $this -> input -> post('category_id'),
               'name' => $this -> input -> post('name')
            ];     
            }
           
           if($this -> master_model -> update('sub_category', $InsertData, ['id' => $this -> input -> post('updateid')])):
            $this -> session -> set_flashdata('successmsg', UPDATE_SUCCESS);
            redirect('author/sub-category-list');
           else:
            $this -> session -> set_flashdata('errmsg', UPDATE_ERROR);
            redirect('author/sub-category-list');   
           endif;
           }else{
             $this -> session -> set_flashdata('errmsg', "Duplicate Entry! Sub Category Already Exists!");
             redirect('author/update-sub-category/'.$this -> input -> post('updateid'));  
           }
           }else{
              redirect('logout');  
           }           
        }
    }
    
    public function delete_sub_category($deleteid){
       if($this ->authchecking() != 0){
          if ($this->master_model->delete('sub_category', array('id' => base64_decode(base64_decode($deleteid))))):
            $this->session->set_flashdata('successmsg', 'Data has been deleted successfully');
            redirect('author/sub-category-list');
        else:
            $this->session->set_flashdata('errmsg', 'Delete Error');
            redirect('author/sub-category-list');
        endif;
        }else{
            redirect('logout');
        }  
    }
    
    public function sub_category_ajax(){
        
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