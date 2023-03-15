				<div class="container content-area">
					<section class="section">
						<div class="page-header">
							<h4 class="page-title"><?php echo $title; ?></h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#" class="text-light-color">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
							</ol>
						</div>
					
						<div class="row">
							<div class="col-md">
								<div class="card overflow-hidden">
									<div class="card-header">
                                    <h4><?php echo $title; ?>
                            <span style="color:red"> * All Fields are required</span>
                        </h4>
                         <h4>
                             <span style="color:red" id="errmsg"><?php echo $this->session->flashdata('errmsg'); ?></span>
                             <span style="color:green"><?php echo $this->session->flashdata('successmsg'); ?></span>
                        </h4>
									</div>
                                    <div class="card-body">
                                  <form method="post" action="<?php echo base_url('author_dashboard/addsuccess'); ?>" onsubmit="return valid()">
                            <div class="row">
                                <div class="col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Full Name<span style="color:red"> *</span></label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Full Name" value="<?= $this->session->flashdata('name') ? $this->session->flashdata('name') : '' ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label>User ID<span style="color:red"> *</span></label>
                                        <input type="text" name="user_id" id="user_id" class="form-control" placeholder="User ID" value="<?= $this->session->flashdata('user_id') ? $this->session->flashdata('user_id') : '' ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label>Mobile No<span style="color:red"> *</span></label>
                                        <input type="text" name="mobile_no" id="mobile_no" class="form-control" placeholder="Mobile No" value="<?= $this->session->flashdata('mobile_no') ? $this->session->flashdata('mobile_no') : '' ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label>Email ID<span style="color:red"> *</span></label>
                                        <input type="text" name="email_id" id="email_id" class="form-control" placeholder="Email ID" value="<?= $this->session->flashdata('email_id') ? $this->session->flashdata('email_id') : '' ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-8 col-xs-12">
                                    <div class="form-group">
                                        <label>Address<span style="color:red"> *</span></label>
                                        <input type="text" name="address" id="address" class="form-control" placeholder="Address" value="<?= $this->session->flashdata('address') ? $this->session->flashdata('address') : '' ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Password<span style="color:red"> *</span></label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?= $this->session->flashdata('password') ? $this->session->flashdata('password') : '' ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Confirm Password<span style="color:red"> *</span></label>
                                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" value="<?= $this->session->flashdata('confirm_password') ? $this->session->flashdata('confirm_password') : '' ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <input type="submit" class="btn btn-primary" name="Submit" id="Submit" value="Save"/>
                                </div>

                        </form>

                    </div>
								</div>
							</div>
						</div>
						<!--row closed-->

					</section>
				</div>
                <script>
    function valid() {
        if ($("#name").val() == '') {
            $("#errmsg").html("Please enter full name!");
            $("#name").css("border-color", "red");
            return false;
        } else if ($("#user_id").val() == '') {
            $("#errmsg").html("Please enter a user id!");
            $("#user_id").css("border-color", "red");
            return false;
        } else if ($("#mobile_no").val() == '') {
            $("#errmsg").html("Please enter mobile no!");
            $("#mobile_no").css("border-color", "red");
            return false;
        } else if ($("#email_id").val() == '') {
            $("#errmsg").html("Please enter a valid email id!");
            $("#email_id").css("border-color", "red");
            return false;
        } else if ($("#address").val() == '') {
            $("#errmsg").html("Please enter user address!");
            $("#address").css("border-color", "red");
            return false;
        } else if ($("#password").val() == '') {
            $("#errmsg").html("Please enter your password!");
            $("#password").css("border-color", "red");
            return false;
        } else if ($("#confirm_password").val() == '') {
            $("#errmsg").html("Please enter confirm password!");
            $("#confirm_password").css("border-color", "red");
            return false;
        }
    }
</script>