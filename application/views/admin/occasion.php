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
                                                    <th>Name</th>
                                                    <th>Type</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Note</th>
                                                    <th>Relation</th>
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
                                                        <td><?php echo $value->name; ?></td>
                                                        <td><?php echo $value->occasion_type; ?></td>
                                                        <td><?php echo date('d/m/Y', strtotime($value->start_date)); ?></td>
                                                        <td><?php echo date('d/m/Y', strtotime($value->end_date)); ?></td>
                                                        <td><?php echo $value->note; ?></td>
                                                        <td><?php echo $value->relation; ?></td>
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
                <h5 class="modal-title" id="exampleModalLabel">Add Occasion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <span id="errmsg" style="color:red"></span>
                <form action="<?=site_url('author/occasion-success')?>" enctype="multipart/form-data" method="post" onsubmit="return valid();">
                    <input type="hidden" name="update_id" id="update_id" value =""/>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Occasion Name<span style="color:red"> *</span></label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Occasion Name"/>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Occasion Type<span style="color:red"> *</span></label>
                                <input type="text" name="occasion_type" id="occasion_type" class="form-control" placeholder="Occasion Type"/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Start Date<span style="color:red"> *</span></label>
                                <input type="date" name="start_date" id="start_date" class="form-control"/>
                            </div>
                        </div>

                        
                        <div class="col-md-6">
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

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Relation</label>
                                <input type="text" name="relation" id="relation" class="form-control" placeholder="Relation" />
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
            window.location.href = '<?php echo base_url('author/delete-occasion/') ?>' + delid;
        }
    }

    function update(updateId){
        $.ajax({ type:'POST', dataType: 'json', data: {id: updateId}, url: "<?=base_url('author/occasion-update')?>"})
         .done(function(res){
            $("#name").val(res.name);
            $("#start_date").val(res.start_date);
            $("#end_date").val(res.end_date);
            $("#occasion_type").val(res.occasion_type);
            $("#note").val(res.note);
            $("#relation").val(res.relation);
            $("#update_id").val(res.id);
            $("#exampleModalLabel").html('Update Occasion');
            $('#ViewModal').modal('show');
         })
         .fail(function(){
             alert("Some things error!");
         })
    }

    function valid(){
        if($("#name").val() == ''){
            $("#errmsg").html("Enter occasion name!");
            $("#name").css("border-color", "red");
            return false;
       }else if($("#occasion_type").val() == ''){
            $("#errmsg").html("Enter occasion type!");
            $("#occasion_type").css("border-color", "red");
            return false;
       }else if($("#start_date").val() == ''){
            $("#errmsg").html("Enter start date!");
            $("#start_date").css("border-color", "red");
            return false;
       }else if($("#end_date").val() == ''){
            $("#errmsg").html("Enter end date!");
            $("#end_date").css("border-color", "red");
            return false;
       }else if($("#note").val() == ''){
            $("#errmsg").html("Enter a note!");
            $("#note").css("border-color", "red");
            return false;
       }else if($("#relation").val() == ''){
            $("#errmsg").html("Enter relation!");
            $("#relation").css("border-color", "red");
            return false;
       }
    }
    
    
</script>
