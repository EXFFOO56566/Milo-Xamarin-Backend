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
                                                    <th>Type</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Note</th>
                                                   <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($fileList as $value) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i++ ?></td>
                                                        <td><?php echo $value->title; ?></td>
                                                        <td><?php echo $value->type; ?></td>
                                                        <td><?php echo date('h:i:s A', strtotime($value->start_date)); ?></td>
                                                        <td><?php echo date('h:i:s A', strtotime($value->end_date)); ?></td>
                                                        <td><?php echo $value->note; ?></td>
                                                       <td>
                                                            <a onclick="update('<?=$value -> id?>')" ><i class="fa fa-pencil-square" aria-hidden="true"></i></a> | <a href="#" onclick="return del_conn('<?php echo $value->id; ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i>
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
<div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Reminder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <span id="errmsg" style="color:red"></span>
                <form action="<?=site_url('author/reminder-success')?>" enctype="multipart/form-data" method="post" onsubmit="return valid();">
                    <input type="hidden" name="update_id" id="update_id" value =""/>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Title<span style="color:red"> *</span></label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Title"/>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Type<span style="color:red"> *</span></label>
                                <input type="text" name="type" id="type" class="form-control" placeholder="Type"/>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Start Date<span style="color:red"> *</span></label>
                                <input type="date" name="start_date" id="start_date" class="form-control"/>
                            </div>
                        </div>

                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>End Date<span style="color:red"> *</span></label>
                                <input type="date" name="end_date" id="end_date" class="form-control"/>
                            </div>
                        </div>

                         <div class="col-md-12">
                            <div class="form-group">
                                <label>Note</label>
                                <input type="text" name="note" id="note" class="form-control" placeholder="Note" />
                            </div>
                        </div>
                    </div>
                     <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Submit" name="submit"/>
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
                </form>
            </div>           
        </div>
    </div>
</div>

<script>
    function del_conn(delid) {
        var delid = delid;
        if (confirm('Are you sure want to delete this data!!')) {
            window.location.href = '<?php echo base_url('author/delete-reminder/') ?>' + delid;
        }
    }

    function update(updateId){
        $.ajax({ type:'POST', dataType: 'json', data: {id: updateId}, url: "<?=base_url('author/reminder-update')?>"})
         .done(function(res){
            $("#title").val(res.title);
            $("#start_date").val(res.start_date);
            $("#end_date").val(res.end_date);
            $("#type").val(res.type);
            $("#note").val(res.note);
            $("#update_id").val(res.id);
            $('#ViewModal').modal('show');
            $("#exampleModalLabel").html("Update reminder");
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
