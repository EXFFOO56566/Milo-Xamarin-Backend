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
                                    <form method="post" class="form-horizontal" action="<?php echo base_url('subscription_controller/updatesuccess'); ?>" enctype="multipart/form-data" onsubmit="return valid()">
                            <input type="hidden" id="update_id" name="update_id" value="<?=$SubscriptionList[0] -> id?>"/>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Subscription Name<span style="color:red"> *</span></label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Subscription Name" value="<?= $SubscriptionList[0] -> name ? $SubscriptionList[0] -> name : '' ?>"/>
                                    </div>
                                </div>   
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Valid For (In day)<span style="color:red"> *</span></label>
                                        <input type="number" name="valid_for" id="valid_month" class="form-control" placeholder="Valid Month" value="<?= $SubscriptionList[0] -> valid_for  ? $SubscriptionList[0] -> valid_for  : '' ?>"/>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Price<span style="color:red"> *</span></label>
                                        <input type="number" name="price" id="price" class="form-control" placeholder="Price" value="<?= $this->session->flashdata('price') ? $this->session->flashdata('price') : $SubscriptionList[0] -> price  ?>"/>
                                    </div>
                                </div>
                                
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Max Meeting<span style="color:red"> *</span></label>
                                        <input type="number" name="max_meeting" id="max_meeting" class="form-control" placeholder="Max Meeting" value="<?= $this->session->flashdata('max_meeting') ? $this->session->flashdata('max_meeting') :  $SubscriptionList[0] -> max_meeting ?>"/>
                                    </div>
                                </div>
                                
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Max Participants (at a time) <span style="color:red"> *</span></label>
                                        <input type="number" name="max_participants" id="max_participants" class="form-control" placeholder="Max Participants" value="<?= $this->session->flashdata('max_participants') ? $this->session->flashdata('max_participants') : $SubscriptionList[0] -> max_participants ?>"/>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Details<span style="color:red"> *</span></label>
                                        <textarea class="form-control" name="rules" id="rules" placeholder="Details"><?=$SubscriptionList[0] -> rules?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Save"/>
                                </div>


                            </div>
                        </form>

                    </div>
								</div>
							</div>
						</div>
						<!--row closed-->

					</section>
				</div>

<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('rules');
    CKEDITOR.config.autoParagraph = false;
</script>


<script>
    function valid() {
        if ($("#name").val() == '') {
            $("#errmsg").html("Subscription name must be require!");
            $("#name").css("border-color", "red");
            return false;
        } else if ($("#valid_month").val() == '') {
            $("#errmsg").html("Valid month must be require.");
            $("#valid_month").css("border-color", "red");
            return false;
        } else if ($("#price").val() == '') {
            $("#errmsg").html("Subscription price must be require!");
            $("#price").css("border-color", "red");
            return false;
        } else if ($("#max_meeting").val() == '') {
            $("#errmsg").html("Enter the max meeting limit.");
            $("#max_meeting").css("border-color", "red");
            return false;
        } else if ($("#max_participants").val() == '') {
            $("#errmsg").html("Enter the max participants limit!");
            $("#max_participants").css("border-color", "red");
            return false;
        }
    }
</script>
