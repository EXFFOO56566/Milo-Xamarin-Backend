<section class="blog-full-page-area" style="background: linear-gradient(57deg, rgba(46,20,221,1) 0%, rgba(157,57,246,1) 100%);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-page-content-table">
                    <div class="blog-table-cell">
                        <h2><?=$title?></h2>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
<div id="contact-section" class="gray-bg">
    <div class="container">

        <div class="row">
                    <div class="col-md-6 mb-50">
                        
                        <div class="signup-group  contact-form-area homepage-2" style="min-height: 315px;">
                            <h2 class="text-capitalize m-top" style="font-size:25px;"><?=$title?></h2>
                            <span style="color:red"><?=$this -> session -> flashdata('errmsg')?></span>
                            <span style="color:green"><?=$this -> session -> flashdata('successmsg')?></span>
                            <form id="recover_password" action="<?=site_url('forgotton-password-success');?>" onsubmit="return modifypassword()" method="POST">
                                <input type="hidden" name="user_id" id="user_id" value="<?=$code?>"/>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password*">
                                    <small id="newpassworderror" style="color:red"></small>
                                </div>                                        
                                <div class="form-group">
                                    <input type="password" class="form-control" id="new_confirm_password" name="new_confirm_password" placeholder="New Confirm Password*">
                                    <small id="newconfirmpassworderror" style="color:red"></small>
                                </div>

                                <div class="text-center">
                                    <div>
                                        <input type="submit" name="submit" id="submit" value="Reset password" class="about-btn m-top"/>
                                        <br>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="login-img-holder">
                            <img src="<?= base_url('assest_front/') ?>assets/img/icons/login-bg2.png" alt="">
                        </div>
                    </div>
                </div> 
    </div>
</div>
<script>
function modifypassword() {
        if ($("#new_password").val() == '') {
            $("#newpassworderror").html("Enter a new password.");
            $("#new_password").css("border-color", "red");
            return false;
        } else if ($("#new_confirm_password").val() == '') {
            $("#newconfirmpassworderror").html("Enter a confirm password.");
            $("#new_confirm_password").css("border-color", "red");
            return false;
        } else if ($("#new_password").val() != $("#new_confirm_password").val()) {
            $("#newconfirmpassworderror").html("Confirm password does not match with new password.");
            $("#new_confirm_password").css("border-color", "red");
            return false;
        }
    }
</script>

