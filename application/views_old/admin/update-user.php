<?php
  $RegData = json_decode($RegisterData);
?>
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
              <form method="post" class="form-horizontal" action="<?php echo base_url('author_dashboard/updatesuccess'); ?>" onsubmit="return valid()">
                  <input type="hidden" name="updateid" id="updateid" value="<?=$RegData[0] -> id?>"/>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Full Name<span style="color:red"> *</span></label>
                          <input type="text" name="name" id="name" class="form-control" placeholder="Full Name" value="<?=$RegData[0] -> name?$RegData[0] -> name:''?>"/>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>User ID<span style="color:red"> *</span></label>
                          <input type="text" name="user_id" id="user_id" class="form-control" placeholder="User ID" value="<?=$RegData[0] -> user_id?$RegData[0] -> user_id:''?>"/>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Mobile No<span style="color:red"> *</span></label>
                          <input type="text" name="mobile_no" id="mobile_no" class="form-control" placeholder="Mobile No" value="<?=$RegData[0] -> mobile_no?$RegData[0] -> mobile_no:''?>"/>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Email ID<span style="color:red"> *</span></label>
                        <input type="text" name="email_id" id="email_id" class="form-control" placeholder="Email ID" value="<?=$RegData[0] -> email_id?$RegData[0] -> email_id:''?>"/>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Password<span style="color:red"> *</span></label>
                          <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?=$RegData[0] -> password?revhashcode($RegData[0] -> password):''?>"/>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Confirm Password<span style="color:red"> *</span></label>
                          <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" value="<?=$RegData[0] -> password?revhashcode($RegData[0] -> password):''?>"/>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Address<span style="color:red"> *</span></label>
                        <textarea name="address" id="address" class="form-control" placeholder="Address" rows="8" cols="80"><?=$RegData[0] -> address?$RegData[0] -> address:''?></textarea>

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
        if ($("#name").val() == '') {
            $("#errmsg").html("Please enter full name!");
            $("#name").css("border-color", "red");
            return false;
        }else if ($("#user_id").val() == '') {
            $("#errmsg").html("Please enter a user id!");
            $("#user_id").css("border-color", "red");
            return false;
        }else if ($("#mobile_no").val() == '') {
            $("#errmsg").html("Please enter mobile no!");
            $("#mobile_no").css("border-color", "red");
            return false;
        }else if ($("#email_id").val() == '') {
            $("#errmsg").html("Please enter a valid email id!");
            $("#email_id").css("border-color", "red");
            return false;
        }else if ($("#address").val() == '') {
            $("#errmsg").html("Please enter user address!");
            $("#address").css("border-color", "red");
            return false;
        }else if ($("#password").val() == '') {
            $("#errmsg").html("Please enter your password!");
            $("#password").css("border-color", "red");
            return false;
        }else if ($("#confirm_password").val() == '') {
            $("#errmsg").html("Please enter confirm password!");
            $("#confirm_password").css("border-color", "red");
            return false;
        }
    }
</script>
