<?php
$SubCategoryArray = getAllMasterDatawithId('sub_category');
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
                                                    <th>Share by</th>
                                                    <th>Share with</th>
                                                    <th>Title</th>
                                                    <th>Details</th>
                                                    <th>File</th>
                                                    <th>Date</th>
<!--                                                    <th>Action</th>-->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($fileList as $value) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i++ ?></td>
                                                        <td><?php echo $value->share_by; ?></td>
                                                        <td><?php echo $value->share_with; ?></td>
                                                        <td><?php echo $value->title; ?></td>
                                                        <td>
                                                            <?php echo $value->details; ?>
                                                        </td>                                                       
                                                        <td><a target="_blank" href="<?=site_url('uploads/file/'.$value -> file)?>"><i class="fa fa-file-o" aria-hidden="true"></i></a></td>
                                                         <td>
                                                            <?php echo date('d-m-Y', strtotime($value->date)); ?>
                                                        </td>
<!--                                                        <td>
                                                            <a onclick="return confirm('Are you sure want to update this data?');" href="<?php echo site_url('author/update-news/' . $value->id); ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> | <a href="#" onclick="return del_conn('<?php echo $value->id; ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                                            </a>
                                                        </td>-->
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
                <h5 class="modal-title" id="exampleModalLabel">Share a new file</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <span id="errmsg" style="color:red"></span>
                <form action="<?=site_url('author/file-success')?>" enctype="multipart/form-data" method="post" onsubmit="return valid();">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Title<span style="color:red"> *</span></label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Title"/>
                            </div>
                        </div>
                        
                        <input type="hidden" readonly="readonly" value="<?=$group_id?>" name="file_id" id="file_id"  class="form-control" placeholder="Meeting ID"/>
                                               
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Email ID<span style="color:red"> *</span></label>
                                <input type="text" name="register_id" id="register_id" class="form-control" placeholder="Email ID">
                            </div>
                        </div>  
                         <div class="col-md-12">
                            <div class="form-group">
                                <label>File<span style="color:red"> *</span></label>
                                <input type="file" name="userfile[]" id="userfile" class="form-control" />
                            </div>
                        </div>
                         <div class="col-md-12">
                            <div class="form-group">
                                <label>Details<span style="color:red"> *</span></label>
                                <textarea name="details" id="details" placeholder="Details" class="form-control"></textarea>
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
<!-- modal End -->

<script>
    function del_conn(delid) {
        var delid = delid;
        if (confirm('Are you sure want to delete this data!!')) {
            window.location.href = '<?php echo base_url('author/delete-news/') ?>' + delid;
        }
    }
    
    
</script>
