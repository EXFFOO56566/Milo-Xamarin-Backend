<?php
  $masterArray = [];
  foreach($master_features as $mvalue){
      $masterArray[$mvalue -> id] = $mvalue -> name;
  }
?>
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
                                                    <th>Master Features</th>
                                                    <th>Title</th>
                                                    <th>Details</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($featuresList as $value) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i++ ?></td>
                                                        <td><?php echo $masterArray[$value->master_id]; ?></td>
                                                        <td><?php echo $value->title; ?></td>
                                                        <td><?php echo $value->details; ?></td>
                                                        <td>
                                                            <a onclick="updatemaster(<?=$value -> id?>)" href="javascript:void(0)"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> | <a href="#" onclick="return del_conn('<?php echo $value->id; ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i>
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


<!-- modal Start -->
<div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Our Feature</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <span id="errmsg" style="color:red"></span>
                <form action="<?=site_url('features_controller/addfeaturessuccess')?>" enctype="multipart/form-data" method="post" onsubmit="return valid();">
                    <input type="hidden" name="update_id" id="update_id" value=""/>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Master Feature<span style="color:red"> *</span></label>
                                <select name="master_id" id="master_id" class="form-control">
                                    <option value="">Select Master</option>
                                    <?php
                                     foreach($master_features as $mval){
                                    ?>
                                    <option value="<?=$mval -> id?>"><?=$mval -> name?></option>
                                    <?php
                                     }
                                    ?>
                                </select>
                            </div>
                        </div>                       
                    </div>
                    
                     <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Title<span style="color:red"> *</span></label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Features title" required=""/>
                            </div>
                        </div>                       
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Details<span style="color:red"> *</span></label>
                                <textarea name="details" id="details" placeholder="Details" class="form-control" required=""></textarea>
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
<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace('details');
  CKEDITOR.config.autoParagraph = false;
   </script>

<script type="text/javascript">
    function del_conn(delid) {
        var delid = delid;
        if (confirm('Are you sure want to delete this data!!')) {
            window.location.href = '<?php echo base_url('author/features-delete/') ?>' + delid;
        }
    }
    
    function updatemaster(update_id){
        $.ajax({
            type: 'POST',
            url: '<?=base_url('Features_controller/updatefeatures/')?>',
            data: {'update_id': update_id},
            dataType: "json",
            success: function(data){
                $("#update_id").val(data.id);
                $("#master_id").val(data.master_id);
                $("#title").val(data.title);
                CKEDITOR.instances['details'].setData(data.details);
                $('#ViewModal').modal('show');           
            }
        })
    }
</script>
