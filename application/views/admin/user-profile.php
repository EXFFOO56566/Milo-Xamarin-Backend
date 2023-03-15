<?php
  $UserList = json_decode($UserList);
?>


                <!--app-content open-->
				<div class="container content-area">
					<section class="section">

					    <!--page-header open-->
						<div class="page-header">
							<h4 class="page-title">Edit Profile</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#" class="text-light-color">Pages</a></li>
								<li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
							</ol>
						</div>
						<!--page-header closed-->

                        <!--row open-->
						<div class="row">
							<div class="col-lg-12 col-xl-4 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">
										<h4>My Profile</h4>
									</div>
                                    <div class="card-body">
                        <div class="text-center">
                            <div class="userprofile social">
                                <div class="userpic"> <img src="<?=($UserList[0] -> image != '')?base_url('uploads/'.$UserList[0] -> image):base_url('assets/img/avatar/avatar-3.jpeg'); ?>" alt="" class="userpicimg"> </div>
                                <h3 class="username"><?=$UserList[0] -> name?></h3>
                                <p><?=$UserList[0] -> user_id;?></p>

                                <div class="socials text-center"> <a href="" class="btn btn-circle btn-primary ">
                                        <i class="fa fa-facebook"></i></a> <a href="" class="btn btn-circle btn-danger ">
                                        <i class="fa fa-google-plus"></i></a> <a href="" class="btn btn-circle btn-info ">
                                        <i class="fa fa-twitter"></i></a> <a href="" class="btn btn-circle btn-warning "><i class="fa fa-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
								</div>
							
							</div>
							<div class="col-lg-12 col-xl-8 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">
										<h4>Edit Profile</h4>
									</div>
                                    <div class="card-body">
                        <div class="row d-flex">
                            <div class="col-lg-6 col-md-12">
                                <h4>Personal Details</h4>
                                <span style="color:green"><?=$this -> session -> flashdata('successmsg');?></span>
                                <span style="color:red"><?=$this -> session -> flashdata('errmsg');?></span>
                            </div>
                            <div class="col-lg-6 col-md-12 follower">
                                <div class="float-right d-none d-lg-block">

                                    <a href="#"  data-toggle="modal" data-target="#exampleModal" class="btn btn-success mt-1"><i class="fe fe-edit followbtn ml-1"></i> Edit Profile</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <p><b>Full Name :</b>  <span class="pull-right"><?=$UserList[0] -> name?></span></p>
                                <p><b>User ID :</b> <span class="pull-right"><?=$UserList[0] -> user_id?></span></p>
                                <p><b>Mobile No :</b><span class="pull-right"><?=$UserList[0] -> mobile_no;?></span></p>
                                <p><b>Email ID :</b> <span class="pull-right"><?=$UserList[0] -> email_id?></span></p>
                                <p><b>Address :</b> <span class="pull-right"><?=$UserList[0] -> address?></span></p>
                                <p><b>Zip Code :</b> <span class="pull-right"><?=$UserList[0] -> pincode?></span></p>   
                                <p><b>Time Zone :</b> <span class="pull-right"><?=array_key_exists($UserList[0] -> time_zone, $time_zone)?$time_zone[$UserList[0] -> time_zone]:''?></span></p>                                
                            </div>
                        </div>
                    </div>
								
								</div>
							</div>
						</div>
						<!--row closed-->

					</section>
				</div>
				<!--app-content closed-->

			
<!-- Edit Profile  Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Personal Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <span id="errmsg" style="color:red"></span>
                <form enctype="multipart/form-data" action="<?=site_url('author/update-profile-success')?>" method="post" onsubmit="return valid();">
                    <input type="hidden" name="update_id" id="update_id" value="<?=$UserList[0] -> id?>"/>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Full Name<span style="color:red"> *</span></label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Full Name" value="<?=$UserList[0] -> name?>"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>User ID</label>
                                <input type="text" name="user_id" id="user_id"  class="form-control" placeholder="User ID" value="<?=$UserList[0] -> user_id?>"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mobile No</label>
                                <input type="text" name="mobile_no" id="mobile_no"  class="form-control" placeholder="Mobile No" value="<?=$UserList[0] -> mobile_no?>"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email ID<span style="color:red"> *</span></label>
                                <input type="email" name="email_id" readonly="readonly" id="email_id"  class="form-control" placeholder="Email ID" value="<?=$UserList[0] -> email_id?>"/>
                            </div>
                        </div>                       
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Zip Code</label>
                                <input type="text" name="pincode" id="pincode"  class="form-control" placeholder="Zip Code" value="<?=($UserList[0] -> pincode != 0)?$UserList[0] -> pincode:''?>"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Photo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="userfile[]" id="userfile">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="address" id="address"  rows="5" cols="40"><?=$UserList[0] -> address?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                            <div class="form-group">
                                <label>Time Zone</label>
                                <select name="time_zone" id="time_zone" class="form-control">
                                    <option value="">Select</option>
                                    <?php
                                        foreach($time_zone as $key => $value){
                                    ?>
                                        <option value="<?=$key?>" <?=$key == $UserList[0] -> time_zone?'Selected':''?>><?=$value?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                     <div class="modal-footer">
                         <button type="submit" onclick="getData();" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
                </form>
            </div>
           
        </div>
    </div>
</div>


<script>

 function valid(){
     if($("#name").val() == ''){
        $("#errmsg").html("Enter your full name!"); 
        $("#name").css("border-color", "red");
        return false;
     }else if($("#email_id").val() == ''){
        $("#errmsg").html("Enter your valid email ID!"); 
        $("#email_id").css("border-color", "red");
        return false;
     }else if($("#time_zone").val() == ''){
        $("#errmsg").html("Select your time zone !"); 
        $("#time_zone").css("border-color", "red");
        return false;
     }
 }

</script>