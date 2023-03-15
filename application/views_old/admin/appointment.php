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
                                                    <th>Start time</th>
                                                    <th>End time</th>
                                                    <th>Location</th>
                                                    <th>Whom meet</th>
                                                    <th>Note</th>
                                                    <th>Date</th>
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
                                                        <td><?php echo date('h:i:s A', strtotime($value->start_time)); ?></td>
                                                        <td><?php echo date('h:i:s A', strtotime($value->end_time)); ?></td>
                                                        <td><?php echo $value->location; ?></td>
                                                        <td><?php echo $value->whom_meet; ?></td>
                                                        <td><?php echo $value->note; ?></td>
                                                        <td><?php echo date('d/m/Y', strtotime($value->date)); ?></td>                                                       
                                                       <td>
                                                            <a href="javascript:void(0)" onclick="update('<?=$value -> id?>')" ><i class="fa fa-pencil-square" aria-hidden="true"></i></a> | <a href="#" onclick="return del_conn('<?php echo $value->id; ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i>
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
                <h5 class="modal-title" id="exampleModalLabel">Add Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <span id="errmsg" style="color:red"></span>
                <form action="<?=site_url('author/appointment-success')?>" enctype="multipart/form-data" method="post" onsubmit="return valid();">
                    <input type="hidden" name="update_id" id="update_id" value =""/>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title<span style="color:red"> *</span></label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Appointment Title"/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date<span style="color:red"> *</span></label>
                                <input type="date" name="date" id="date" class="form-control"/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Start time<span style="color:red"> *</span></label>
                                <input type="time" name="start_time" id="start_time" class="form-control"/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>End Time<span style="color:red"> *</span></label>
                                <input type="time" name="end_time" id="end_time" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Location<span style="color:red"> *</span></label>
                                <input type="text" name="location" id="location" class="form-control" placeholder="Location"/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Whom Meet</label>
                                <input type="text" name="whom_meet" id="whom_meet" class="form-control" placeholder="Whom meet"/>
                            </div>
                        </div>

                         <div class="col-md-12">
                            <div class="form-group">
                                <label>Note</label>
                                <input type="text" name="note" id="note" class="form-control" placeholder="Enter a note" />
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
            window.location.href = '<?php echo base_url('author/delete-appointment/') ?>' + delid;
        }
    }

    function update(updateId){
        $.ajax({ type:'POST', dataType: 'json', data: {id: updateId}, url: "<?=base_url('author/appointment-update')?>"})
         .done(function(res){
            $("#title").val(res.title);
            $("#date").val(res.date);
            $("#start_time").val(res.start_time);
            $("#end_time").val(res.end_time);
            $("#location").val(res.location);
            $("#whom_meet").val(res.whom_meet);
            $("#note").val(res.note);
            $("#update_id").val(res.id);
            $("#exampleModalLabel").html('Update Appointment');
            $('#ViewModal').modal('show');

         })
         .fail(function(){
             alert("Some things error!");
         })
    }

    function valid(){
        if($("#title").val() == ''){
            $("#errmsg").html("Please enter a title!");
            $("#title").css("border-color", "red");
            return false;
       }else if($("#date").val() == ''){
            $("#errmsg").html("Please enter a date!");
            $("#date").css("border-color", "red");
            return false;
       }else if($("#start_time").val() == ''){
            $("#errmsg").html("Please enter start time!");
            $("#start_time").css("border-color", "red");
            return false;
       }else if($("#end_time").val() == ''){
            $("#errmsg").html("Please enter end time!");
            $("#end_time").css("border-color", "red");
            return false;
       }else if($("#location").val() == ''){
            $("#errmsg").html("Please enter location!");
            $("#location").css("border-color", "red");
            return false;
       }
    }
    
    
</script>
