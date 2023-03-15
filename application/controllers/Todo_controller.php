<?php
  class Todo_controller extends CI_Controller{
      
      public function __construct() {
          parent::__construct();
          $this -> load -> model('todo_model');
      }
      
      public function view(){
          if($this -> authchecking() != 0){
          $data['title'] = 'Todo list';
          $_SESSION['todo_list']=[];
          
          if($this -> session -> userdata('AyaUserRole') == 1){
          $data['fileList'] = $this -> todo_model -> view();
          }else{
          $data['fileList'] = $this -> todo_model -> view(['register_id'=> $this -> session -> userdata('AyaUserLoginId')]);   
          }
          $_SESSION['todo_list'] = [];
          $data['list'] = $this -> todo_model -> listview();
          $data['category'] = $this -> todo_model -> catview();
          $this -> load -> adminTemplate('admin/todo', $data);
          }else{
              redirect('logout');
          }
      }
      
       public function get_list_dropdown(){
        if($this -> authchecking() != 0){ 
             $categoryList = $this -> todo_model -> listview();
             $option = "<option value = ''>Select List</option>";
             foreach($categoryList as $value){
             $option .= "<option value=".$value -> id.">".$value -> name."</option>";  
             }             
             echo $option;
        }else{
            redirect('logout');
        }  
      }
      
      public function get_category_dropdown(){
        if($this -> authchecking() != 0){ 
             $categoryList = $this -> todo_model -> catview();
             $option = "<option value = ''>Select Category</option>";
             foreach($categoryList as $value){
             $option .= "<option value=".$value -> id.">".$value -> name."</option>";  
             }             
             echo $option;
        }else{
            redirect('logout');
        }  
      }
      
      public function get_category(){
        if($this -> authchecking() != 0){           
            $categoryList = $this -> todo_model -> catview();
           
?>

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add To Do Category</h5>
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
                                <label>Category Name<span style="color:red"> *</span></label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Category Name"/>
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
                                                   <th>Category Name</th>                                                    
                                                   <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                 foreach($categoryList as $value){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i++ ?></td>
                                                        <td><?php echo $value->name; ?></td>                                                        
                                                       <td>
                                                           <a href="javascript:void(0)" onclick="updatecategory('<?=$value -> id?>')" ><i class="fa fa-pencil-square" aria-hidden="true"></i></a> | <a href="javascript:void(0)" onclick="return delcategory('<?php echo $value->id; ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i>
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
    
            
        }else{
            redirect('logout');
        }  
      }
      
      
 public function get_list(){
 if($this -> authchecking() != 0){    
 $categoryList = $_SESSION['todo_list'];           
?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add To Do List</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>            
            <div class="modal-body">
                <span id="listerrmsg" style="color:red"></span>
                <span id="listsuccmsg" style="color:green"></span>                
                <form action="#" enctype="multipart/form-data" method="post" autocomplete="off">                   
                    <input type="hidden" name="list_update_id" id="list_update_id" value =""/>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>To do list<span style="color:red"> *</span></label>
                                <input type="text" name="list_name" id="list_name" class="form-control" placeholder="To do list"/>
                            </div>
                        </div>
                    </div>
                     <div class="modal-footer">
                <a class="btn btn-primary" onclick="addlist()">Submit</a>
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
                                                   <th>List Name</th>                                                    
                                                   <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                 foreach($categoryList as $key => $value){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i++ ?></td>
                                                        <td><?php echo $value['title']; ?></td>                                                        
                                                       <td>
                                                           <a href="javascript:void(0)" onclick="updatelist('<?=$key?>')" ><i class="fa fa-pencil-square" aria-hidden="true"></i></a> | <a href="javascript:void(0)" onclick="return dellist('<?php echo $key; ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i>
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
        }else{
            redirect('logout');
        }  
      }
      
    public function add_category(){
       if($this -> authchecking() != 0){ 
          
          if($this -> input -> post('update_id') != ''){
            if($this -> db -> where(['name'=> $this -> input -> post('cat_name'), 'id !=' => $this -> input -> post('update_id')]) -> count_all_results('todo_category') == 0){
              if($this -> todo_model -> updatecat(['name' => $this -> input -> post('cat_name')], ['id' => $this -> input -> post('update_id')])){
              echo 1;
          }else{
              echo 1;
          }   
          }else{
             echo 2;  
          }
          }else{
          if($this -> db -> where('name', $this -> input -> post('cat_name')) -> count_all_results('todo_category') == 0){
          
          if($this -> todo_model -> addcat(['name' => $this -> input -> post('cat_name'), 'created_at' => date('Y-m-d', time())])){
              echo 1;
          }else{
              echo 0;
          }
          }else{
              echo 2;
          }
          }
       }else{
        redirect('logout');
       }  
    }
    
    
     public function add_list(){
       if($this -> authchecking() != 0){ 
          if($this -> input -> post('update_id') != ''){              
              $pre_data = $_SESSION['todo_list'][$this -> input -> post('update_id')];
              
              $_SESSION['todo_list'][$this -> input -> post('update_id')] = ['title' => $this -> input -> post('cat_name'), 'status' => $pre_data['status']];
              echo 1;
          }else{
              $_SESSION['todo_list'][]= ['title' => $this -> input -> post('cat_name'), 'status' => 0];
              echo 1;             

          }
       }else{
        redirect('logout');
       }  
    }
      
      
      public function addsuccess(){
        if($this -> input -> post('submit') == 'Submit'){
            if($this -> input -> post('update_id') != ''){
                
              $t_array = [];  
              $i = 1;
              foreach($_SESSION['todo_list'] as $t_val){
                $t_array[] = [
                    'id' => $i++,
                    'list'=> $t_val['title'],
                    'status' => $t_val['status']
                ];
              }
                
                $insertData = [
                    'title' => $this -> input -> post('title'),
                    'location' => $this -> input -> post('location'),
                    'place_visit' => $this -> input -> post('place_visit'),
                    'date' => $this -> input -> post('date'),
                    'category_id' => $this -> input -> post('category_id'),
                    'start_time' => $this -> input -> post('start_time'),
                    'list' => json_encode($t_array),
                    'note' => $this -> input -> post('note')
                ];             

            if($this -> todo_model -> update($insertData, ['id' => $this -> input -> post('update_id')])){
                $this -> session -> set_flashdata("successmsg", "Data has been updated successfully.");
            }else{
                $this -> session -> set_flashdata("errmsg", "You have no chnage.");
            }

            }else{
              $t_array = [];  
              $i = 1;
              foreach($_SESSION['todo_list'] as $t_val){
                $t_array[] = [
                    'id' => $i++,
                    'list'=> $t_val['title'],
                    'status' => $t_val['status']
                ];
              }

                $insertData = [
                    'title' => $this -> input -> post('title'),
                    'location' => $this -> input -> post('location'),
                    'place_visit' => $this -> input -> post('place_visit'),
                    'date' => $this -> input -> post('date'),
                    'category_id' => $this -> input -> post('category_id'),
                    'start_time' => $this -> input -> post('start_time'),
                    'list' => json_encode($t_array),
                    'note' => $this -> input -> post('note'),
                    'register_id' => $this -> session -> userdata('AyaUserLoginId'),
                    'created_at' => date('Y-m-d', time())
                ];
                
                if($this -> todo_model -> add($insertData)){
                    $this -> session -> set_flashdata("successmsg", "Data has been added successfully.");
                }else{
                    $this -> session -> set_flashdata("errmsg", "Data insert error.");
                }
            }
           
           redirect('author/todo'); 
        }else{
            redirect('author'); 
        }
        
    }
    
    public function updatecategory(){
        if($this -> authchecking() != 0){  
          $updateId = $this -> input -> post('id');
          $catList = $this -> todo_model -> catview(['id' => $updateId]);   
          echo json_encode($catList[0]);
        }else{
            redirect('author');  
        }
    }
    
     public function updatelist(){
        if($this -> authchecking() != 0){  
          $updateId = $this -> input -> post('id');
          $catList =  $_SESSION['todo_list'][$updateId];    
          echo json_encode(['id'=> $updateId, 'name' => $catList['title']]);
        }else{
            redirect('author');  
        }
    }
      
       public function update(){
        if($this -> authchecking() != 0){  
          $updateId = $this -> input -> post('id');
          $docList = $this -> todo_model -> view(['id' => $updateId]); 
          $d_listjson = json_decode($docList[0] -> list);
          $_SESSION['todo_list'] = [];
          foreach($d_listjson as $d_list){
            $_SESSION['todo_list'][$d_list -> id] = ['title'=>$d_list -> list, 'status'=> $d_list -> status];
          }
          echo json_encode($docList[0]);
        }else{
            redirect('author');  
        }  
      }
      
      public function deletecategory(){
         if($this -> authchecking() != 0){ 
           $this -> todo_model -> deletedata('todo_category', ['id' => $this -> input -> post('cat_id')]);
           echo 1;
        }else{
            redirect('author'); 
        } 
      }
      
       public function deletelist(){
         if($this -> authchecking() != 0){ 
           $this -> todo_model -> deletedata('todo_list', ['id' => $this -> input -> post('cat_id')]);
           echo 1;
        }else{
            redirect('author'); 
        } 
      }
      
       public function delete($delId){
        if($this -> authchecking() != 0){ 
           $this -> todo_model -> deletedata('reminder', ['id' => $delId]);
           $this -> session -> set_flashdata('successmsg', 'Data has been deleted.');
           redirect('author/reminder');
        }else{
            redirect('author'); 
        }  
      }

      public function updateTodolistByid(){
         
          $data = $this -> input -> post('list');
          $json_data = json_encode($data);
          $updateId = $this -> input -> post('id');
          $this -> db -> update('todo', ['list' => $json_data], ['id' => $updateId]);
          echo 1;
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