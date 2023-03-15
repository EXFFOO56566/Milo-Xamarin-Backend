<div class="app-content">
  <div class="section">
                <!--page-header open-->
    <div class="page-header">
      <h4 class="page-title"><?php echo $title;?></h4>
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
             <h4><?php echo $title;?>
                 <span class="req"> * All Fields are required</span>
             </h4>
             <h4>
             <span class="req" id="errmsg"><?php echo $this->session->flashdata('errmsg'); ?></span>
             <span style="color:green"><?php echo $this->session->flashdata('successmsg'); ?></span>
            </h4>   
           </div>
            <div class="card-body">
              <form method="post" class="form-horizontal" action="<?php echo base_url('Post_controller/updatenewssuccess'); ?>" enctype="multipart/form-data" onsubmit="return valid()">
                  <input type="hidden" name="update_id" id="update_id" value="<?=$NewsDetails[0] -> id?>"/>
                  <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>New Category<span style="color:red"> *</span></label>
                              <select name="sub_category_id" id="sub_category_id" class="form-control">
                                  <option value="">Select</option>
                                  <?php
                                    foreach($SubCategoryList as $key => $value){
                                  ?>
                                  <option value="<?=$key?>" <?=($NewsDetails[0] -> sub_category_id == $key)?'Selected':''?>><?=$value?></option>
                                  <?php
                                    }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Title<span style="color:red"> *</span></label>
                              <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="<?=$NewsDetails[0] -> title?>"/>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="row">

                            <div class="form-group col-md-6">
                              <label>Image<span style="color:red"> *</span></label>
                              <input type="file" name="userfile[]" id="image" class="form-control" placeholder="Image"/>
                            </div>
                            <div class="form-group col-md-6">
                              <span class="help-block">
                                  <img src="<?=base_url('uploads/'.$NewsDetails[0] -> image);?>" width="100px" height="100px" />
                              </span>
                            </div>
                          </div>

                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Details<span style="color:red"> *</span></label>
                              <textarea rows="10" cols="50" class="form-control" name="details" id="details" placeholder="Details"><?=$NewsDetails[0] -> details?></textarea>
                            </div>
                          </div>

                          <div class="col-md-12 text-center">
                              <input type="submit" class="btn btn-success" name="submit" id="submit" value="Save"/>
                              <a href="#" class="btn btn-danger">Cancel</a>

                          </div>

                  </div>
              </form>

            </div>
           </div>
         </div>
     </div>
    </div>
    <!--row closed-->
  </div>
</div>


<script>
    function valid() {
        if ($("#sub_category_id").val() == '') {
            $("#errmsg").html("Please select a sub category name!");
            $("#sub_category_id").css("border-color", "red");
            return false;
        }else if ($("#title").val() == '') {
            $("#errmsg").html("Please enter a title!");
            $("#title").css("border-color", "red");
            return false;
        }else if ($("#details").val() == '') {
            $("#errmsg").html("Please enter a news details!");
            $("#details").css("border-color", "red");
            return false;
        }
    }
</script>
