<?php

class Gallery_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('gallery_model');
    }

    public function view(){
        if ($this->authchecking() != 0) {
            $data['title'] = 'Album';

            if ($this->session->userdata('AyaUserRole') == 1) {
                $data['albumList'] = $this->gallery_model->catview();
            } else {
                $data['albumList'] = $this->gallery_model->catview(['register_id' => $this->session->userdata('AyaUserLoginId')]);
            }           
            $this->load->adminTemplate('admin/gallery', $data);
        } else {
            redirect('logout');
        }
    }

    public function get_category_dropdown() {
        if ($this->authchecking() != 0) {
            $categoryList = $this->gallery_model->catview(['register_id' => $this -> session -> userdata('AyaUserLoginId')]);
            $option = "<option value = ''>Select Category</option>";
            foreach ($categoryList as $value) {
                $option .= "<option value=" . $value->id . ">" . $value->name . "</option>";
            }
            echo $option;
        } else {
            redirect('logout');
        }
    }

    public function get_category() {
        if ($this->authchecking() != 0) {
            $categoryList = $this->gallery_model->catview(['register_id' => $this -> session -> userdata('AyaUserLoginId')]);
            ?>

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Album</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <span id="caterrmsg" style="color:red"></span>
                    <span id="catsuccmsg" style="color:green"></span>

                    <form action="#" enctype="multipart/form-data" method="post" autocomplete="off">

                        <input type="hidden" name="cat_update_id" id="cat_update_id" value =""/>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Album Name<span style="color:red"> *</span></label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Album Name"/>
                                </div>
                                <div class="form-group">
                                    <label>Album Details<span style="color:red"> *</span></label>
                                    <textarea name="details" id="details" class="form-control" placeholder="Album Details"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary" onclick="addcategory()">Submit</a>
                        </div>
                    </form>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <span style="color:red"><?php echo $this->session->flashdata('errmsg'); ?></span>

                            <div style="color:red; padding-left:50px "><?php echo $this->session->flashdata('msg'); ?></div>
                            <div>
                                <table id="customers2" class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>Serial No</th>
                                            <th>Album Name</th>                                                    
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($categoryList as $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i++ ?></td>
                                                <td><?php echo $value->name; ?></td>                                                        
                                                <td>
                                                    <a href="javascript:void(0)" onclick="updatecategory('<?= $value->id ?>')" ><i class="fa fa-pencil-square" aria-hidden="true"></i></a> | <a href="javascript:void(0)" onclick="return delcategory('<?php echo $value->id; ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php
        } else {
            redirect('logout');
        }
    }

    public function add_category() {
        if ($this->authchecking() != 0) {
            if ($this->input->post('update_id') != '') {
                if ($this->db->where(['name' => $this->input->post('cat_name'), 'id !=' => $this->input->post('update_id')])->count_all_results('gallery_category') == 0) {
                    if ($this->gallery_model->updatecat(['name' => $this->input->post('cat_name')], ['id' => $this->input->post('update_id')])) {
                        echo 1;
                    } else {
                        echo 1;
                    }
                } else {
                    echo 2;
                }
            } else {
               
                if ($this->db->where('name', $this->input->post('cat_name'))->count_all_results('gallery_category') == 0) {
                    
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
                                $config['upload_path'] = 'uploads/gallery/';
                                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                                $config['max_size'] = 50000;
                                $config['max_width'] = 50000;
                                $config['max_height'] = 50000;
                                $config['encrypt_name'] = true;
                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);

                                if (!$this->upload->do_upload('userfile')) {
                                    $this->session->set_flashdata('errmsg', $this->upload->display_errors());
                                    redirect('author/gallery');
                                } else {
                                    $UploadData = $this->upload->data();
                                    $UserFile[$i] = $UploadData['file_name'];
                                }
                            }
                        } else {
                            $UserFile[$i] = '';
                        }
                    }

                    if ($this->gallery_model->addcat(['name' => $this->input->post('name'), 'cover_image' => $UserFile[0],  'details' => $this -> input -> post('details'), 'register_id' => $this -> session -> userdata('AyaUserLoginId'), 'created_at' => date('Y-m-d', time())])) {
                        $this -> session -> set_flashdata('successmsg', 'Album has been created successfully.');
                        redirect('author/gallery');
                    } else {
                        $this -> session -> set_flashdata('successmsg', 'Album create error.');
                        redirect('author/gallery');
                    }
                } else {
                    echo 2;
                }
            }
        } else {
            redirect('logout');
        }
    }
    
    public function view_photo($catId = ''){
          if ($this->authchecking() != 0) {
            $data['title'] = 'Album';

            if ($this->session->userdata('AyaUserRole') == 1) {
                $categoryname = $this -> gallery_model -> catview(['id' => $catId]);

                $data['photoList'] = $this->gallery_model->view(['category_id' => $catId]);
            } else {
                $categoryname = $this -> gallery_model -> catview(['id' => $catId, 'register_id'=> $this->session->userdata('AyaUserLoginId')]);
                $data['photoList'] = $this->gallery_model->view(['category_id' => $catId, 'register_id' => $this->session->userdata('AyaUserLoginId')]);
            } 
            
            if(count($categoryname) > 0){
            $data['album_name'] = $categoryname[0];
            $this->load->adminTemplate('admin/photo', $data);
            }else{
                redirect('author/gallery');
            }
        } else {
            redirect('logout');
        }
    }



    public function addsuccess() {
        if ($this->input->post('submit') == 'Submit') {
            if ($this->input->post('update_id') != '') {

               

                $insertData = [
                    'title' => $this->input->post('title'),
                    'location' => $this->input->post('location'),
                    'place_visit' => $this->input->post('place_visit'),
                    'date' => $this->input->post('date'),
                    'category_id' => $this->input->post('category_id'),
                    'start_time' => $this->input->post('start_time'),
                    'list' => json_encode($t_array),
                    'note' => $this->input->post('note')
                ];

                if ($this->todo_model->update($insertData, ['id' => $this->input->post('update_id')])) {
                    $this->session->set_flashdata("successmsg", "Data has been updated successfully.");
                } else {
                    $this->session->set_flashdata("errmsg", "You have no chnage.");
                }
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
                            $config['upload_path'] = 'uploads/gallery/';
                            $config['allowed_types'] = 'gif|jpg|png|jpeg';
                            $config['max_size'] = 50000;
                            $config['max_width'] = 50000;
                            $config['max_height'] = 50000;
                            $config['encrypt_name'] = true;
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);

                            if (!$this->upload->do_upload('userfile')) {
                                $this->session->set_flashdata('errmsg', $this->upload->display_errors());
                                redirect('author/view-photo/'.$this -> input -> post('category_id'));
                            } else {
                                $UploadData = $this->upload->data();
                                $UserFile[$i] = $UploadData['file_name'];
                            }
                        }
                    } else {
                        $UserFile[$i] = '';
                    }
                }
                
                
                $insertData = [
                    'title' => $this->input->post('title'),
                    'category_id' => $this->input->post('category_id'),
                    'image' => $UserFile[0],
                    'register_id' => $this->session->userdata('AyaUserLoginId'),
                    'created_at' => date('Y-m-d', time())
                ];

                if ($this->gallery_model->add($insertData)) {
                    $this->session->set_flashdata("successmsg", "Data has been added successfully.");
                    redirect('author/view-photo/'.$this -> input -> post('category_id'));
                } else {
                    $this->session->set_flashdata("errmsg", "Data insert error.");
                    redirect('author/view-photo/'.$this -> input -> post('category_id'));
                }
            }

            redirect('author/gallery');
        } else {
            redirect('author');
        }
    }

    public function updatecategory() {
        if ($this->authchecking() != 0) {
            $updateId = $this->input->post('id');
            $catList = $this->todo_model->catview(['id' => $updateId]);
            echo json_encode($catList[0]);
        } else {
            redirect('author');
        }
    }

    public function updatelist() {
        if ($this->authchecking() != 0) {
            $updateId = $this->input->post('id');
            $catList = $_SESSION['todo_list'][$updateId];
            echo json_encode(['id' => $updateId, 'name' => $catList['title']]);
        } else {
            redirect('author');
        }
    }

    public function update() {
        if ($this->authchecking() != 0) {
            $updateId = $this->input->post('id');
            $docList = $this->todo_model->view(['id' => $updateId]);
            $d_listjson = json_decode($docList[0]->list);
            $_SESSION['todo_list'] = [];
            foreach ($d_listjson as $d_list) {
                $_SESSION['todo_list'][$d_list->id] = ['title' => $d_list->list, 'status' => $d_list->status];
            }
            echo json_encode($docList[0]);
        } else {
            redirect('author');
        }
    }

    public function deletecategory() {
        if ($this->authchecking() != 0) {
            $this->todo_model->deletedata('gallery_category', ['id' => $this->input->post('cat_id')]);
            echo 1;
        } else {
            redirect('author');
        }
    }

    public function delete($delId) {
        if ($this->authchecking() != 0) {
            $this->todo_model->deletedata('reminder', ['id' => $delId]);
            $this->session->set_flashdata('successmsg', 'Data has been deleted.');
            redirect('author/reminder');
        } else {
            redirect('author');
        }
    }

  

    private function authchecking() {
        if ($this->session->userdata('AyaUserLoginId') != '') {
            return 1;
        } else {
            return 0;
        }
    }

}
?>