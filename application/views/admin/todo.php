<div class="app-content">
    <div class="section">
        <!--page-header open-->
        <div class="page-header">
            <h4 class="page-title"><?php echo $title; ?></h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-light-color">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
            </ol>
        </div>
        <!--page-header closed-->

        <!--row open-->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4><?php echo $title; ?>
                            <a href="#" data-toggle="modal" data-target="#ViewModal" class="btn btn-primary m-b-5 m-t-5 pull-right"><i class="fa fa-plus" aria-hidden="true"></i></a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <span style="color:red"><?php echo $this->session->flashdata('errmsg'); ?></span>
                                    <span style="color:green"><?php echo $this->session->flashdata('successmsg'); ?></span>

                                    <div style="color:red; padding-left:50px "><?php echo $this->session->flashdata('msg'); ?></div>
                                    <div>
                                        <table id="customers2" class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>Serial No</th>
                                                    <th>Title</th>
                                                    <th>Location</th>
                                                    <th>Place Visit</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Category</th>
                                                    <th>List</th>
                                                    <th>Note</th>
                                                    <th>Status</th>
                                                   <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $catArray = [];
                                                foreach($category as $c_val){
                                                    $catArray[$c_val -> id]=$c_val -> name;
                                                }
                                                foreach ($fileList as $value) {
                                                     $list = json_decode($value -> list);
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i++ ?></td>
                                                        <td><?php echo $value->title; ?></td>
                                                        <td><?php echo $value->location; ?></td>
                                                        <td><?php echo $value->place_visit; ?></td>
                                                        <td><?php echo date('d/m/Y', strtotime($value->date)); ?></td>
                                                        <td><?php echo date('h:i A', strtotime($value->start_time)); ?></td>
                                                        <td><?php echo $catArray[$value->category_id]; ?></td>
                                                        <td>
                                                        <?php
                                                         $j = 1;
                                                         $listnStatus = 100;
                                                         $listpStatus = 200;
                                                         foreach($list as $t_val){
                                                            if($t_val->status == 0){
                                                                $listnStatus = 0;
                                                            }else{
                                                                $listpStatus = 1;
                                                            }
                                                        ?>
                                                       
                                                        <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
															<input class="custom-control-input todo_check_item_<?=$value->id?>" id="item-<?=$t_val->id.'_'.$value->id?>" <?=($t_val->status == 1)?'Checked':''?> type="checkbox" value=<?=$t_val -> list?>> 
                                                            <label class="custom-control-label" for="item-<?=$t_val->id.'_'.$value->id?>"><?=ucfirst($t_val -> list);?></label>
													    </div>
                                                        
                                                        <?php
                                                         }
                                                        ?>
                                                        </td>
                                                        <td><?php echo $value->note; ?></td>
                                                        <?php
                                                         if($listnStatus == 0 && $listpStatus == 200){
                                                             $status = 'Incompleted';
                                                         }else if($listnStatus == 0 && $listpStatus == 1){
                                                            $status = 'Proceed';
                                                         }else{
                                                            $status = 'Completed';
                                                         }
                                                        ?>
                                                        <td><?php echo $status; ?></td>

                                                       
                                                       <td>
                                                            <a href="javascript:void(0)" onclick="update('<?=$value -> id?>')" ><i class="fa fa-pencil-square" aria-hidden="true"></i></a> | <a href="javascript:void(0)" onclick="return del_conn('<?php echo $value->id; ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i> | <a href="javascript:void(0)" onclick="return toliststatusupdate('<?php echo $value->id; ?>');"><i class="fa fa-undo" aria-hidden="true"></i>
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
                </div>
            </div>
        </div>
    </div>
    <!--row closed-->
</div>
</div>

<!-- modal Start -->
<?php include('add_todo.php');?>
<?php include('add_todo_category.php');?>
<?php include('add_todo_list.php');?>



<script>
    function del_conn(delid) {
        var delid = delid;
        if (confirm('Are you sure want to delete this data!!')) {
            window.location.href = '<?php echo base_url('author/delete-reminder/') ?>' + delid;
        }
    }
    

    function toliststatusupdate(todoId){
        var cname = 'todo_check_item_'+todoId;
        var ary = [];
        var obj = {};
        var i = 1;
        $('.'+cname).each(function(){
        var $this = $(this);
        
        if ($this.is(':checked')) {
        obj = {id:i, list: $this.val(), status: 1}
        }else{
            obj = {id:i, list: $this.val(), status: 0}
        }
        ary.push(obj); 
        i = i+ 1;
        });

        $.ajax({ 
            type: 'POST', 
            dataType: "text", 
            data: {
                list: ary,
                id: todoId
                }, 
            url: "<?=base_url('todo_controller/updateTodolistByid')?>",
            cache:false,
            success:function(res){
              window.location.href= '<?=base_url('author/todo')?>';
            }
        });
         
    }
  

    function update(updateId){
        $.ajax({ type:'POST', dataType: 'json', data: {id: updateId}, url: "<?=base_url('author/todo-update')?>"})
         .done(function(res){
            $("#title").val(res.title);
            $("#location").val(res.location);
            $("#place_visit").val(res.place_visit);
            $("#date").val(res.date);
            $("#category_id").val(res.category_id);
            $("#start_time").val(res.start_time);
            $("#note").val(res.note);
            $("#update_id").val(res.id);
            $('#ViewModal').modal('show');
            $("#exampleModalLabel").html("Update Todo");
         })
         .fail(function(){
             alert("Some things error!");
         })
    }

    function valid(){
        if($("#title").val() == ''){
            $("#errmsg").html("Please enter reminder title!");
            $("#title").css("border-color", "red");
            return false;
       }else if($("#type").val() == ''){
            $("#errmsg").html("Please enter a type!");
            $("#type").css("border-color", "red");
            return false;
       }else if($("#start_date").val() == ''){
            $("#errmsg").html("Please enter start date!");
            $("#start_date").css("border-color", "red");
            return false;
       }else if($("#end_date").val() == ''){
            $("#errmsg").html("Please enter end date!");
            $("#end_date").css("border-color", "red");
            return false;
       }
    }
    
    
</script>
