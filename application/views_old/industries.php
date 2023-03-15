<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?=COMPANY_NAME?></title>
        <link rel="icon" href="<?= base_url(FAV_ICON)?>">

        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="<?= base_url('assest_front/') ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url('assest_front/') ?>assets/css/venobox.css" rel="stylesheet">
        <link href="<?= base_url('assest_front/') ?>assets/css/elements.css" rel="stylesheet">
        <link href="<?= base_url('assest_front/') ?>style.css" rel="stylesheet">
        <link href="<?= base_url('assest_front/') ?>assets/css/responsive.css" rel="stylesheet">
    </head>
    <a href="#slider-section" class="scrolltotop homepage-2"><span class="fa fa-angle-up"></span></a>
    <body class="homepage-2">
        <script src="https://joinme.co.in/external_api.js"></script>
        <script>
          function video(){
        
          var meetingid = $("#meetingid").val();
          if(meetingid == ''){
              alert("Create a new meeting");
          }else{
          
          document.getElementById("video").style.display = "none";

          var domain = "joinme.co.in";
          var options = {
              roomName: meetingid,
              width: "100%",
              height: "750px",
              parentNode: undefined,
              configOverwrite: {

              },
              interfaceConfigOverwrite: {
              }
          }
           var api = new JitsiMeetExternalAPI(domain, options);
           api.executeCommand('displayName', 'joinme');
           api.executeCommand('toggleVideo');
           }
           }

        </script>
        
        <div id="video">
        <div class="preloader-wrapper">
            <div class="preloader-img">
                <img src="<?= base_url(COMPANY_LOGO) ?>" alt="<?=COMPANY_NAME?>">
            </div>
        </div>
        <!-- HEADER AREA -->
        <header id="sticker" class="header-top homepage-2 headroom">
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-header">
                        <a href="<?= base_url('home') ?>"  class="navbar-brand">
                            <img src="<?= base_url(COMPANY_LOGO)?>"  width="100"  alt="<?=COMPANY_NAME?>"> </a>
                    </div>
                    <div  id="navigation">
                        <div class="menu-main-menu-container">
                            <ul id="mainmenu" class="nav navbar-nav navbar-left">
                                 <li><a href="<?= site_url('home_controller/about') ?>"> About Us</a></li>
                                  <li><a href="<?= base_url('home_controller/plans') ?>"> Plans & Pricing</a></li>
                                   <li><a href="<?= base_url('home_controller/faq') ?>">FAQ</a></li>
                                   <li><a href="<?= base_url('home_controller/contact') ?>">Contact</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#My-Registr">Login</a></li>
                               

                            </ul>
                            <ul id="mainmenu" class="nav navbar-nav navbar-right">
                                 <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> <?=COMPANY_EMAIL?></a></li>
                              <!--  <li class="radius-menu"><a href="#work"><i class="fa fa-paypal"></i> PayPal</a></li> -->
                                <?php
                                  if($this -> session -> userdata('REGISTEREDUSERID') != ''){
                                ?>
                                <li class="radius-menu"><a  style="background: #ff7575;" href="<?=site_url('user-logout')?>"> <i class="fa fa-power-off"></i> Logout</a></li>
                                <?php
                                  }
                                ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <section class="blog-full-page-area" style="background: linear-gradient(57deg, rgba(46,20,221,1) 0%, rgba(157,57,246,1) 100%);">
        	<div class="container">
        		<div class="row">
        			<div class="col-md-12">
        				<div class="blog-page-content-table">
        					<div class="blog-table-cell">
        						<h2>About Us</h2>
        					
        					</div>
        				</div>
                 
               
        			</div>
        		</div>
        	</div>
        </section>
        <section id="about"  class="about-area">
              <div class="container">
                <div class="row">
                  <div class="col-md-6 col-sm-6 ">
                    <div class="about">
                      <img src="<?= base_url(COMPANY_LOGO) ?>" alt="place your img" class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="about-right">
                      <h2>The Company</h2>
                      <p>TELEFERENCE is a platform for recording and streaming audio and video conferences, webinars, online masterclasses, viewing online news in real-time, as well as for social interactions such as chats, file sharing and sending emails. Teleference is headquartered in Switzerland. </p>
                     
                      
                    </div>
                  </div>
                </div>
              </div>
        </section>
        <section class="team-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <div class="section-heading text-center">
                      <h2>Management Team</h2>
                      <img src="<?= base_url('assest_front/assets/img/section/section-icon.png') ?>" alt="place your img">
                    <!--  <p>Lorem ipsum madolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor coli incidit labore Lorem ipsum amet madolor sit amet.</p> -->
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="team-carosule-single-item">
                        <img src="<?= base_url('assest_front/assets/img/team/Don.png') ?>" alt="team member">
                        <div class="team-meta">
                            <h4>Don Chancellor </h4>
                            <p>Founder & President </p>
                        </div>
                         <div class="team-overlay">
                            <h5>M S Newaz</h5>
                       
                            <p class="meta-p">Chancellor is an IBM certified Blockchain Expert and is one of the early adopters and holders of Bitcoin. Though more inclined to the Medical Profession, but coming from the backdrop and admixture of Medical and Banking/Financial family, he is armed with the art of both worlds and thus lays acclaim to many years of practical experiences in related fields. While studying Medicine & Surgery, he single-handedly spearheaded the operations of FASTCASHIER EUROPE LIMITED, now renamed ZeroPay as its Managing Director in charge of Europe Continent</p>
                            <div class="team-social-links">
                                <div class="social-links">
                                   
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
                
                 <div class="col-md-4">
                    <div class="team-carosule-single-item">
                        <img src="<?= base_url('assest_front/assets/img/team/Madeleine.png') ?>" alt="Madeleine">
                        <div class="team-meta">
                            <h4>Madeleine Winkler</h4>
                            <p>Executive Secretary</p>
                        </div>
                        <div class="team-overlay">
                            <h5>Madeleine Winkler</h5>
                       
                            <p class="meta-p">Mrs. Madeleine Winkler is from Switzerland, an unflinching Defender of Global Children, an Ambassador and the current President of the Non-Governmental Organization, So.Sui.Ben, Switzerland, with massive projects and orphanage homes in the sub-Saharan Africa like Central African Republic, Congo, Cameroun, Senegal and a budding Foundation in Nigeria. She has in the past served in diverse Executive positions in Swiss, including but not limited to being an Assistant to the Executive in the Accountant services for the Financial Director at Reebok Switzerland which was later bought by Adidas; worked for the office of T.O. ADVISCO AG, Switzerland (A Switzerland Company in Accounting Services, Tax & Financial Advisor to Swiss Banks);</p>
                            <div class="team-social-links">
                                <div class="social-links">
                                   
                                </div>
                            </div>
                         </div>
                        
                    </div>
                </div>
                
                 <div class="col-md-4">
                    <div class="team-carosule-single-item">
                        <img src="<?= base_url('assest_front/assets/img/team/Dieter.png') ?>" alt="Dieter">
                        <div class="team-meta">
                            <h4>Dieter Wipf</h4>
                            <p>Business Development Director</p>
                        </div>
                         <div class="team-overlay">
                            <h5>Dieter Wipf</h5>
                       
                            <p class="meta-p">Dieter is an independent Auditor with banking background from Switzerland. Over the years he had various mandates, including political ones, and leadership tasks in African Countries for governmental and non governmental organizations where he played prominent roles in auditing, service & quality checks; establishment of new Companies in Medicine and Energy sectors.</p>
                            <div class="team-social-links">
                                <div class="social-links">
                                   
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
              

            
            </div>
        </div>
    </section>
    <!--TEAM AREA  END-->

      
        
        <!-- CONTACT SECTION -->
         <!-- CONTACT SECTION -->
        <section class="address-wrapper homepage-2">
            <div class="address-area">
                <div class="container">
                    <div>
                        <div class="row">
                            <div class="col-md-4 col-sm-4 ">
                                <div class="single-address">
                                    <div class="address-icon-bg">
                                        <span class="fa fa-phone"></span>
                                    </div>
                                    <p class="single-contact-info"><a href="#"><?=COMPANY_MOBILE?></a></p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 ">
                                <div class="single-address">
                                    <div class="address-icon-bg">
                                        <span class="fa fa-envelope"></span>
                                    </div>
                                    <p><?=COMPANY_EMAIL?></p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 ">
                                <div class="single-address">
                                    <div class="address-icon-bg">
                                        <span class="fa fa-globe"></span>
                                    </div>
                                    <p class="single-contact-info"><a href="#"><?=COMPANY_WEBSITE?></a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
        <section class="footer-bg">

            <!-- /CONTACT SECTION -->
            <section class="footer-area homepage-2">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="footer-center">
                                <div class="footer-term-link">
                                    <ul class="list-inline">
                                         <li><a href="<?= base_url('home_controller/terms') ?>">Terms of Use, </a></li>
                                        <li><a href="<?= base_url('home_controller/privacy') ?>">Privacy Policy</a></li>
                                        <li><a href="<?= base_url('home_controller/cookies') ?>">Cookies Policy</a></li> 
                                      
                                    </ul>
                                </div>    
                               
                            </div>
                        </div>        
                        <div class="col-xs-12">
                            <p class="copy-rights">Copyright @ 2020 <a href="#"><?=COMPANY_NAME?></a> all right resurved.</p>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <!-- Start Register Page ============ -->
        <div id="My-Registr" class="modal fade" role="dialog" tabindex="-1">
      <!--  <div class="modal fade" tabindex="-1" role="dialog" id="onload"> -->
            <div class="modal-dialog" role="document">
                <div class="modal-content homepage-6">
                    <!-- <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Modal title</h4>
                    </div> -->
                    <div class="modal-body">
                          <button type="button" class="mclose close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="signup-group  contact-form-area homepage-2">
                                    <h2 class="text-capitalize m-top">Registration</h2>

                                    <form id="register_from" action="#" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="reg_name" name="reg_name" placeholder="Your Full Name*">
                                            <small id="nameerror" style="color:red"></small>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="reg_user_id" name="reg_user_id" placeholder="Your User Id*">
                                             <small id="usererror" style="color:red"></small>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="reg_email_id" name="reg_email_id" placeholder="Email Address*">
                                             <small id="emailerror" style="color:red"></small>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="reg_mobile_no" id="reg_mobile_no" placeholder="Mobile No.">
                                             <small id="moberror" style="color:red"></small>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" id="reg_address" placeholder="Your Address*" name="reg_address"></textarea>
                                             <small id="adderror" style="color:red"></small>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="reg_password" name="reg_password" placeholder="Password*">
                                             <small id="passerror" style="color:red"></small>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="reg_confirm_password" name="reg_confirm_password" placeholder="Confirm Password*">
                                             <small id="cpasserror" style="color:red"></small>
                                        </div>
                                        <div class="text-center">
                                            <div>
                                                <a href="#" onclick="register()" class="about-btn m-top">Register</a>
                                                <br>
                                                <br>
                                                <a href="#" data-toggle="modal" data-target="#myModal" data-dismiss="modal" data-backdrop="static" data-keyboard="false"> Allready Register Login</a>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="login-img-holder">
                                  <!-- <img src="assets/img/logo/logo.png"  width="100"  alt="Oye Meet"> </a> -->
                                    <img src="<?= base_url('assest_front/') ?>assets/img/icons/login-bg.png" alt="">
                                </div>
                            </div>
                        </div> <!-- row -->
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- End Register Page ============ -->
        <!-- Start Login Page ============ -->
        <div class="modal fade" tabindex="-1" role="dialog" id="myModal" >
            <div class="modal-dialog" role="document">
                <div class="modal-content homepage-6">

                    <div class="modal-body">
                          <button type="button" class="mclose close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="row">
                            <div class="col-md-6 mb-50">
                                <div class="signup-group  contact-form-area homepage-2" style="min-height: 330px;">
                                    <h2 class="text-capitalize m-top">Login</h2>

                                    <form id="login_from" action="#" method="POST">

                                        <div class="form-group">
                                            <input type="text" class="form-control" id="login_user_id" name="login_user_id" placeholder="Your User Id*">
                                            <small id="loginusererror" style="color:red"></small>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control" id="login_password" name="login_password" placeholder="Password*">
                                            <small id="loginuserpassword" style="color:red"></small>
                                        </div>

                                        <div class="text-center">
                                            <div>
                                                <a href="#" class="about-btn m-top" onclick="login()">Login</a>
                                                <br>
                                                <br>
                                                <a href="#" data-toggle="modal" data-target="#onload" data-dismiss="modal" > Create new account Register</a>
                                                <br>
                                                <a href="#" data-toggle="modal" data-target="#forget-pass" data-dismiss="modal" data-backdrop="static" data-keyboard="false"> Forget Password</a>

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
                        </div> <!-- row -->
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- End Login Page ============ -->

        <!-- Start Forget  pass Page ============ -->
        <div class="modal fade" tabindex="-1" role="dialog" id="forget-pass" >
            <div class="modal-dialog" role="document">
                <div class="modal-content homepage-6">
                    <div class="modal-body">
                          <button type="button" class="mclose close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="row">
                            <div class="col-md-6 mb-50">
                                <div class="signup-group  contact-form-area homepage-2" style="min-height: 315px;">
                                    <h2 class="text-capitalize m-top" style="font-size:25px;">Enter your User ID</h2>
                                    <form id="forgot_from" action="#" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="forgot_user_id" name="forgot_user_id" placeholder="Your User Id*">
                                            <small id="forgotusererror"></small>
                                        </div>

                                        <div class="text-center">
                                            <div>
                                                <a href="#" class="about-btn m-top" onclick="forgotpassword()">Submit</a>

                                                <br>
                                                <br>
                                                <a href="#" data-toggle="modal" data-target="#onload" data-dismiss="modal"> Create new account Register</a>

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
                        </div> <!-- row -->
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        
        <div class="modal fade" tabindex="-1" role="dialog" id="ForgotModal" >
            <div class="modal-dialog" role="document">
                <div class="modal-content homepage-6">
                    <div class="modal-body">
                          <button type="button" class="mclose close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="row">
                            <div class="col-md-6 mb-50">
                                <div class="signup-group  contact-form-area homepage-2" style="min-height: 315px;">
                                    <h2 class="text-capitalize m-top" style="font-size:25px;">Enter your User ID</h2>
                                    <form id="recover_password" action="#" method="POST">
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
                                                <a href="#" class="about-btn m-top" onclick="modifypassword()">Submit</a>

                                                <br>
                                                <br>
                                                <a href="#" data-toggle="modal" data-target="#onload" data-dismiss="modal"> Create new account Register</a>

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
                        </div> <!-- row -->
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        </div>
        <script src="<?= base_url('assest_front/') ?>assets/js/jquery.min.js"></script>
        <script src="<?= base_url('assest_front/') ?>assets/js/bootstrap.min.js"></script>

        <script src="<?= base_url('assest_front/') ?>assets/js/venobox.js"></script>
        <script src="<?= base_url('assest_front/') ?>assets/js/plugins.js"></script>
        <script src="<?= base_url('assest_front/') ?>assets/js/headroom.js"></script>
        <?php
          if($this -> session -> userdata('REGISTEREDUSERID') == ''){
        ?>
        
        <!--
        <script type="text/javascript">
            $(window).load(function () {
                $('#onload').modal('show');
            });
            $('#onload').modal({backdrop: 'static', keyboard: false})

        </script> 
        -->
      
        <?php
          }
        ?>
        <script src="<?= base_url('assest_front/') ?>assets/js/main.js"></script>        
        
        <script type="text/javascript">
         function register(){
             if($("#reg_name").val() == ''){
               $("#nameerror").html("Enter your full name.");  
               $("#reg_name").css("border-color", "red");
               return false;
           }else if($("#reg_user_id").val() == ''){
               $("#usererror").html("Enter your user name.");  
               $("#reg_user_id").css("border-color", "red");
               return false;
           }else if($("#reg_email_id").val() == ''){
               $("#emailerror").html("Enter your valid email id.");  
               $("#reg_email_id").css("border-color", "red");
               return false;
           }else if($("#reg_mobile_no").val() == ''){
               $("#moberror").html("Enter your valid mobile no.");  
               $("#reg_mobile_no").css("border-color", "red");
               return false;
           }else if($("#reg_address").val() == ''){
               $("#adderror").html("Enter your valid email id.");  
               $("#reg_address").css("border-color", "red");
               return false;
           }else if($("#reg_password").val() == ''){
               $("#passerror").html("Enter your password.");  
               $("#reg_password").css("border-color", "red");
               return false;
           }else if($("#reg_confirm_password").val() == ''){
               $("#cpasserror").html("Enter your confirm password.");  
               $("#reg_confirm_password").css("border-color", "red");
               return false;
           }else if($("#reg_password").val() != $("#reg_confirm_password").val()){
               $("#cpasserror").html("Confirm password does not match.");  
               $("#reg_confirm_password").css("border-color", "red");
               return false;
            }else{
                var name = $("#reg_name").val();
                var user_id = $("#reg_user_id").val();
                var email_id = $("#reg_email_id").val();
                var mobile_no = $("#reg_mobile_no").val();
                var address = $("#reg_address").val();
                var password = $("#reg_password").val();
                $.ajax({
                    cache: false,
                    url: '<?php echo base_url('registration-success') ?>',
                    data:'name='+ name+ '&user_id='+ user_id+ '&email_id='+ email_id+ '&mobile_no='+ mobile_no+ '&address='+ address+ '&password='+ password, 
                    method: 'post',
                    success: function(data){
                       if(data == 1){
                           alert("Registration successfully!Please login with your register user id and password.");
                           $( '#onload' ).remove();
                           $('#myModal').modal('show');
                       }else{
                           alert(data);
                       }
                    }        
                });
           }
             
         }
        </script>
        
        <script>
          function login(){
                if($("#login_user_id").val() == ''){
               $("#loginusererror").html("Enter your registered user id.");  
               $("#login_user_id").css("border-color", "red");
               return false;
           }else if($("#login_password").val() == ''){
               $("#loginuserpassword").html("Enter your password.");  
               $("#login_password").css("border-color", "red");
               return false;
           }else{
                var user_id = $("#login_user_id").val();
                var password = $("#login_password").val();
                $.ajax({
                    cache: false,
                    url: '<?php echo base_url('login-success') ?>',
                    data:'user_id='+ user_id+ '&password='+ password, 
                    method: 'post',
                    success: function(data){
                      
                       if(data == 1){
                        $( '#myModal' ).remove();
                        window.location.href = '';
                       }else{
                           alert(data);
                       }
                    }        
                });
           } 
          }
        </script>
        
        <script>
        function forgotpassword(){
            if($("#forgot_user_id").val() == ''){
               $("#forgotusererror").html("Enter your registered user id.");  
               $("#forgot_user_id").css("border-color", "red");
               return false;
            }else{
                var user_id = $("#forgot_user_id").val();
                $.ajax({
                    cache: false,
                    url: '<?php echo base_url('forgotton-password') ?>',
                    data:'user_id='+ user_id, 
                    method: 'post',
                    success: function(data){ 
                       if(data == 1){
                        $('#forget-pass').remove();    
                        $('#ForgotModal').modal('show');
                       }else{
                           alert(data);
                       }
                    }        
                });
           } 
        }
        
        function modifypassword(){
        alert($("#new_confirm_password").val());
        alert($("#new_password").val())
            if($("#new_password").val() == ''){
               $("#newpassworderror").html("Enter a new password.");  
               $("#new_password").css("border-color", "red");
               return false;
            }else if($("#new_confirm_password").val() == ''){
               $("#newconfirmpassworderror").html("Enter a confirm password.");  
               $("#new_confirm_password").css("border-color", "red");
               return false;
            }else if($("#new_password").val() != $("#new_confirm_password").val()){
               $("#newconfirmpassworderror").html("Confirm password does not match with new password.");  
               $("#new_confirm_password").css("border-color", "red");
               return false;
            }else{
                var password = $("#new_password").val();
                $.ajax({
                    cache: false,
                    url: '<?php echo base_url('forgotton-password-success') ?>',
                    data:'password='+ password, 
                    method: 'post',
                    success: function(data){ 
                       if(data == 1){
                        $('#ForgotModal').remove();    
                        $('#myModal').modal('show');
                       }else{
                           alert(data);
                       }
                    }        
                });
           }
        }
        </script>

    </body>

</html>