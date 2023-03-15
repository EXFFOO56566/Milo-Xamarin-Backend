	
    
	<!--begin download-app-wrapper -->

	<section class="download-app-wrapper" id="download-app">



    	<div class="download-app-wrapper-overlay"></div>



    	<div class="shape-grey-image-top"></div>



		<!--begin container -->

		<div class="container">



	        <!--begin row -->

	        <div class="row">



	        	<!--begin col-md-5-->

                <div class="col-md-6 padding-top-100">



                	<h2 class="title-download-app-padding white-text">Video Conference tool in your pocket</h2>
                	<p class="white-text">UglyConnect is built on Responsive web design (RWD) platform, that makes web pages render well on a variety of devices and window or screen sizes from minimum to maximum display size and orientation of the device being used to view it.</p>               	
                </div>

                <!--end col-md-5-->

	       

	        	<!--begin col-md-7-->

                <div class="col-md-6 wow slideInRight" data-wow-delay="0.15s" style="visibility: visible; animation-delay: 0.15s; animation-name: slideInRight;">

                    

                    <img src="<?=base_url('assest_front/')?>images/download-app-iphone.png" alt="picture" class="download-app-iphone width-100">

                    

                </div>

                <!--end col-md-7-->

	       

	        </div>

	        <!--end row -->



		</div>

		<!--end container -->



    </section>

    <!--end download-app-wrapper -->
  	<!--begin contact -->
    <!--begin footer -->

    <div class="footer">

            

        <!--begin container -->

        <div class="container">

        

            <!--begin row -->

            <div class="row">

            

                <!--begin col-md-12 -->

                <div class="col-md-12 text-center">

                    <ul class="footer_social text-center">
                        <li> <a href="<?=site_url('terms-and-conditions')?>"> Terms of Use </a> </li>
                        <li> <a href="<?=site_url('privacy-policy')?>"> Privacy Policy </a> </li>
                        <li> <a href="<?=site_url('cookies')?>"> Cookies Policy </a> </li>

                    </ul>
                    <p>Copyright 2020 UglyConnect, Designed By <a href="https://www.morbiziq.com" target="_blank" style="color:white">MorBizI.Q.</a></p>

                                         

                    <!--begin footer_social -->

                    <ul class="footer_social">

                           <li>
                            <a href="https://www.facebook.com/uglylove72/" target="_blank"> <i class="fa fa-facebook"></i> </a>
                        </li>




                        <li> <a href="https://twitter.com/uglyinc72" target="_blank"> <i class="fa fa-twitter"></i> </a> </li>

                     
                        <li>
                            <a href="https://www.instagram.com/u.g.l.y._love/" target="_blank"> <i class="fa fa-instagram"></i> </a>
                        </li>

                    </ul>

                    <!--end footer_social -->

                    

                </div>

                <!--end col-md-6 -->

                

            </div>

            <!--end row -->

            

        </div>

        <!--end container -->

                

    </div>

    <!--end footer -->

<!-- login Modal start -->
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm loginmodal">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>
        <div class="modal-body">
         <div class="row">

        

                <!--begin col-md-6 -->

                <div class="col-md-12">

                    <!--begin success message -->

                    <p class="contact_success_box" style="display:none;">We received your message and you'll hear from us soon. Thank You!</p>

                    <!--end success message -->

                    

                    <!--begin contact form -->

                    <!-- <form id="contact-form" class="contact" action="" method="post"> -->

                    

                        <input class="contact-input white-input" required="" name="login_email_id" id="login_email_id" placeholder="Register Email ID*" type="text">



                        <input class="contact-input white-input" required="" name="login_password" id="login_password" placeholder="Password" type="password">

                        <button onclick="login()" id="submit-button" class="btn-block contact-submit btn-green scrool button-login">Login</button>


                         <p class="text-center extralink">


                            <a href="javascript:void(0)"  data-toggle="modal" data-target="#registerModal" data-dismiss="modal" > Create a new account</a>
                           
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#verified_email" data-dismiss="modal" >Resend verification link</a>

                            <a href="javascript:void(0)" data-toggle="modal" data-target="#forget-pass" data-dismiss="modal" data-backdrop="static" data-keyboard="false"> Forgot Password?</a>

                        </p> 

                    <!-- </form> -->

                    <!--end contact form -->
                </div>

                <!--end col-md-6 -->
        </div>
       
      </div>
    </div>
  </div>
</div>
<!-- login Modal end -->

<!-- Register  Modal start -->
<!-- Modal -->
  <div class="modal fade" id="registerModal" role="dialog">
    <div class="modal-dialog modal-sm loginmodal">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registration</h4>
        </div>
        <div class="modal-body">
         <div class="row">

                <!--begin col-md-6 -->

                <div class="col-md-12">

                    <!--begin contact form -->

                    <!-- <form id="contact-form" class="contact" action="" method="post"> -->
                        <small id='registererrormsg'></small>
                        <input class="contact-input white-input" required="" name="reg_name" id="reg_name" placeholder="Enter Your Full Name*" type="text"/>
                         <input class="contact-input white-input" required="" name="reg_email_id" id="reg_email_id" placeholder="Enter Your Email Address*" type="email"/>
                        <select name="time_zone" id="time_zone" class="contact-input white-input">
                            <option value="">Select</option>
                                <?php
                                    foreach($timezoneArray as $key => $timezone){
                                ?>
                                <option value="<?=$key?>"><?=$timezone?></option>
                                <?php
                                    }
                                ?>
                        </select>
                         <input class="contact-input white-input" required="" name="reg_password" id="reg_password" placeholder="Password" type="password"/>
                        <input class="contact-input white-input" required="" name="reg_confirm_password" id="reg_confirm_password" placeholder="Confirm Password" type="password"/>



                        <button onclick="register()" id="submit-button" class="btn-block contact-submit btn-green scrool button-login">Register</button>


                        <p class="text-center extralink">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id=""/>
                                <label class="form-check-label" for="">Accept allterms and conditions </label>
                              </div>
 <a href="javascript:void(0)"  data-toggle="modal" data-target="#myModal" data-dismiss="modal"> Already Registered? Login </a>
                        
                        </p> 
                    <!-- </form> -->

                    <!--end contact form -->
                </div>

                <!--end col-md-6 -->
        </div>
       
      </div>
    </div>
  </div>
</div>
<!-- Register Modal end -->


<!-- Verification  Modal start -->
<!-- Modal -->
<div class="modal fade" id="verified_email" role="dialog">
    <div class="modal-dialog modal-sm loginmodal">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Send verification link</h4>
        </div>
        <div class="modal-body">
         <div class="row">

                <!--begin col-md-6 -->

                <div class="col-md-12">
                        <input type="text" class="contact-input white-input" id="verified_user_id" name="verified_user_id" placeholder="Registered Email ID*">
                        <small id="verifiederror" style="color:red"></small>
                        <button onclick="resend()" id="submit-button" class="btn-block contact-submit btn-green scrool button-login">Send</button>
                      
                </div>
        </div>       
      </div>
    </div>
  </div>
</div>
<!-- verification Modal end -->


<!-- Fogot password  Modal start -->
<!-- Modal -->
<div class="modal fade" id="forget-pass" role="dialog">
    <div class="modal-dialog modal-sm loginmodal">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Forgotten Password</h4>
        </div>
        <div class="modal-body">
         <div class="row">

                <!--begin col-md-6 -->

                <div class="col-md-12">
               


                        <input type="text" class="contact-input white-input" id="forgot_user_id" name="forgot_user_id" placeholder="Registered Email ID*">
                        <small id="verifiederror" style="color:red"></small>
                        <button onclick="forgotpassword()" id="submit-button" class="btn-block contact-submit btn-green scrool button-login">Submit</button>
                      
                </div>
        </div>       
      </div>
    </div>
  </div>
</div>
<!-- Forgot password Modal end -->


<!-- Load JS here for greater good =============================-->

<script src="<?=base_url('assest_front/')?>js/jquery-1.11.3.min.js"></script>

<script src="<?=base_url('assest_front/')?>js/bootstrap.js"></script>

<script src="<?=base_url('assest_front/')?>js/owl.carousel.min.js"></script>

<script src="<?=base_url('assest_front/')?>js/jquery.scrollTo-min.js"></script>

<script src="<?=base_url('assest_front/')?>js/jquery.magnific-popup.min.js"></script>

<script src="<?=base_url('assest_front/')?>js/jquery.nav.js"></script>

<script src="<?=base_url('assest_front/')?>js/wow.js"></script>

<script src="<?=base_url('assest_front/')?>js/plugins.js"></script>

<script src="<?=base_url('assest_front/')?>js/custom.js"></script>



<!-- OUR TECHNOLOGY tab Start-->
<script>
        $(document).ready(function(){
            var _windowWidth = $(window).width();
            var _workprocessInner = $('.workprocess-inner');
            var _listgroupWorkspace = $('.list-group-item').find('.workprocess-inner');
            $(_workprocessInner).click(function(){
                $(_listgroupWorkspace).removeClass('active');
                $(this).addClass('active');
                if(_windowWidth < 990 ){
                    //alert(_windowWidth);
                    $(_listgroupWorkspace).find('.text-all').hide(500);
                    $(this).find('.text-all').show(500);
                }else{
                    var _contentDisplay = $(this).find('.workprocessInnerContent').html();
                    $(_contentDisplay).find('.text-all').show();
                    $('#work-inner-pend-data').html(_contentDisplay);
                }
            });
        });
    </script>
<!-- OUR TECHNOLOGY tab End -->

<script type="text/javascript">

function getloginpopup(){
    $('#myModal').modal('show');
    //$('#registerModal').remove();
}

function getsignuppopup(){
    $('#registerModal').modal('show');
    //$('#myModal').remove();
}


                                            function register() {
                                                if ($("#reg_name").val() == '') {
                                                    $("#registererrormsg").html("Enter your full name.");
                                                    $("#registererrormsg").css("color", "red");
                                                    return false;
                                                }if ($("#reg_email_id").val() == '') {
                                                    $("#registererrormsg").html("Enter your valid email id.");
                                                    $("#registererrormsg").css("color", "red");
                                                    return false;
                                                }if ($("#time_zone").val() == '') {
                                                    $("#registererrormsg").html("Select your timezone.");
                                                    $("#time_zone").css("color", "red");
                                                    return false;
                                                }else if ($("#reg_password").val() == '') {
                                                    $("#registererrormsg").html("Enter your password.");
                                                    $("#registererrormsg").css("color", "red");
                                                    return false;
                                                } else if ($("#reg_confirm_password").val() == '') {
                                                    $("#registererrormsg").html("Enter your confirm password.");
                                                    $("#registererrormsg").css("color", "red");
                                                    return false;
                                                } else if ($("#reg_password").val() != $("#reg_confirm_password").val()) {
                                                    $("#registererrormsg").html("Confirm password does not match.");
                                                    $("#registererrormsg").css("border-color", "red");
                                                    return false;
                                                } else {
                                                    var name = $("#reg_name").val();
                                                    var email_id = $("#reg_email_id").val();
                                                    var mobile_no = $("#reg_mobile_no").val();
                                                    var password = $("#reg_password").val();
                                                    var time_zone = $("#time_zone").val();
                                                    $.ajax({
                                                        cache: false,
                                                        url: '<?php echo base_url('registration-success') ?>',
                                                        data: 'name=' + name + '&email_id=' + email_id + '&mobile_no=' + mobile_no + '&password=' + password+ '&time_zone='+ time_zone,
                                                        method: 'post',
                                                        success: function (data) {
                                                           
                                                           
                                                            if (data == 1) {
                                                                alert("Registration successfully! Please check your Email ID to verify and activate your account.");
                                                                $('#registerModal').remove();
                                                                $('#myModal').modal('show');
                                                            } else {
                                                                $("#cpasserror").html(data);
                                                                $('#registerModal').modal('show');
                                                            }
                                                        }
                                                    });
                                                }

                                            }
</script>

<script>
    
    function resend(){
        if($("#verified_user_id").val() == ''){
           $("#verifiederror").html("Enter your registered Email ID.");
            $("#verified_user_id").css("border-color", "red");
            return false; 
        }else{
          var user_id = $("#verified_user_id").val();  
            $.ajax({
                cache: false,
                url: '<?php echo base_url('send-verified-link') ?>',
                data: 'user_id=' + user_id,
                method: 'post',
                success: function (data) {
                   if (data == 1) {
                    $("#verifiederror").html("Verification mail has been sent."); 
                    window.location.href = '';
                    } else {
                        alert(data);
                    }
                }
            });
        }
    }
    
    
    function login() {
        if ($("#login_email_id").val() == '') {
            $("#loginusererror").html("Enter your registered Email ID.");
            $("#login_email_id").css("border-color", "red");
            return false;
        } else if ($("#login_password").val() == '') {
            $("#loginuserpassword").html("Enter your password.");
            $("#login_password").css("border-color", "red");
            return false;
        } else {
            var email_id = $("#login_email_id").val();
            var password = $("#login_password").val();
            $.ajax({
                cache: false,
                url: '<?php echo base_url('login-success') ?>',
                data: 'email_id=' + email_id + '&password=' + password,
                method: 'post',
                success: function (data) {

                    if (data == 1) {
                        $('#myModal').remove();
                        window.location.href = '<?=base_url();?>';
                    } else {
                        alert(data);
                    }
                }
            });
        }
    }
</script>

<script>
    function forgotpassword() {
        if ($("#forgot_user_id").val() == '') {
            $("#forgotusererror").html("Enter your registered Email ID.");
            $("#forgot_user_id").css("border-color", "red");
            return false;
        } else {
            var user_id = $("#forgot_user_id").val();
            $.ajax({
                cache: false,
                url: '<?php echo base_url('forgotton-password') ?>',
                data: 'user_id=' + user_id,
                method: 'post',
                success: function (data) {
                    if (data == 1) {
                        alert('We have sent a mail in your registered Email ID.');
                        window.location.href = '';
                    } else {
                        alert(data);
                    }
                }
            });
        }
    }

</script>


</body>

</html>
 Ô