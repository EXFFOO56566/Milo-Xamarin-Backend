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
             <h4><?php echo $title;?> </h4>
             <h4>
              <span class="req" id="errmsg"><?php echo $this->session->flashdata('errmsg'); ?></span>
              <span style="color:green"><?php echo $this->session->flashdata('successmsg'); ?></span>
             </h4>
           </div>
            <div class="card-body">
              <form method="post" class="form-horizontal" action="<?php echo base_url('author/changepasswordsuccess');?>" onsubmit="return valid()">
                <div class="row">

                       <div class="col-md-4">
                          <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Old Password"/>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>New Password</label>
                              <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password"/>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Confirm Password</label>
                              <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password"/>
                          </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <input type="submit" class="btn btn-primary" name="Submit" id="Submit" value="Save"/>
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
 function valid(){
        if($("#old_password").val() == ''){
            $("#errmsg").html("Please enter old password!");
            $("#old_password").css("border-color", "red");
            return false;
       }else if($("#new_password").val() == ''){
            $("#errmsg").html("Please enter new password!");
            $("#new_password").css("border-color", "red");
            return false;
       }else if($("#confirm_password").val() == ''){
            $("#errmsg").html("Please enter confirm password!");
            $("#confirm_password").css("border-color", "red");
            return false;
       }else if($("#confirm_password").val() != $("#new_password").val()){
            $("#errmsg").html("Please check confirm password!");
            $("#confirm_password").css("border-color", "red");
            return false;
       }
   }
</script>
