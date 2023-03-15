<ul class="breadcrumb">
    <li><a href="#">Home</a></li> 
    <li class="active"><?php echo $title; ?></li>
</ul>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">           
            <form method="post" class="form-horizontal" action="<?php echo base_url('master_controller/addcategorysuccess'); ?>" enctype="multipart/form-data" onsubmit="return valid()">  
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong><?php echo $title; ?></strong></h3>
                    </div>
                    <div class="panel-heading">
                        <span style="color:red"> * All Fields are required</span>
                    </div>
                    <div class="panel-body"> 
                        <div style="color:red"><?php echo $this->session->flashdata('errmsg'); ?></div>
                        <div style="color: green"><?php echo $this->session->flashdata('successmsg'); ?></div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Category Name<span style="color:red"> *</span></label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Category Name" value="<?=$this -> session -> flashdata('name')?$this -> session -> flashdata('name'):''?>"/>
                                </div>                                            
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Image<span style="color:red"> *</span></label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="file" name="userfile[]" id="userfile" class="form-control"/> 
                                </div>                                            
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">                       
                        <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Save"/>
                    </div>
                </div>
            </form>           
        </div>
    </div>   
</div>

<script>
    function valid() {
        if ($("#name").val() == '') {
            toastr.error("Please enter unique category name!");
            $("#name").css("border-color", "red");
            return false;
        }else if ($("#userfile").val() == '') {
            toastr.error("Please upload a image!");
            $("#userfile").css("border-color", "red");
            return false;
        }
    }
</script>