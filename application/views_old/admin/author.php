<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- META SECTION -->
        <title><?= COMPANY_NAME ?></title>
        <link rel="icon" href="favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/icons.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/plugins/scroll-bar/jquery.mCustomScrollbar.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/plugins/toggle-menu/sidemenu.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/plugins/morris/morris.css'); ?>">
        <script>
            function valid() {
                if ($("#user_name").val() == '') {
                    $("#errmsg").html("Enter a registered Email ID!!");
                    $("#user_name").css("border-color", "red");
                    return false;
                } else if ($("#password").val() == '') {
                    $("#errmsg").html("Enter your password!!");
                    $("#password").css("border-color", "red");
                    return false;
                }
            }
        </script>
    </head>
    <body class="bg-primary">
        <!--app open-->
        <div id="app" class="page">
            <section class="section">
                <div class="container">
                    <div class="">

                        <!--single-page open-->
                        <div class="single-page">
                            <div>
                                <div class="wrapper wrapper2">
                                    <form  id="login" class="card-body" tabindex="500" method="post" action="<?php echo base_url('author/loginsuccess'); ?>" class="form-horizontal" onsubmit="return valid();">
                                        <div class="">
                                            <img src="<?php echo base_url(COMPANY_LOGO); ?>" width="120px" alt="Logo"/>
                                        </div>
                                        <h3 class="text-dark">Login to your account</h3>
                                        <div class="text-left">
                                        <span style="color:red" id="errmsg"><?= $this->session->flashdata('errmsg'); ?></span>
                                        </div>
                                        <div class="mail">
                                            <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Email ID" autocomplete="off"/>
                                        </div>
                                        <div class="passwd">
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                        </div>
                                        <div class="submit">
                                            <input class="btn btn-primary btn-block" type="submit" name="login" value="Sign In"/>

                                        </div>
                                        <div class="signup mb-0" >
                                            <p class="text-dark mb-0">Don't have account?<a href="<?=site_url('/home')?>" class="text-primary ml-1">Sign UP</a></p>
                                        </div>

                                    </form>

                                </div>
                            </div>
                            <div class="login-footer">
                                <br>
                                <div class="text-center">
                                    &copy; 2020 <?= COMPANY_NAME ?>
                                </div>
                            </div>
                        </div>
                        <!--single-page closed-->

                    </div>
                </div>
            </section>


            <!--Jquery.min js-->
            <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
            
            <script src="<?php echo base_url('assets/js/toastr.min.js'); ?>" type=""></script>

            <!--popper js-->
            <script src="<?php echo base_url('assets/js/popper.js'); ?>"></script>

            <!--Bootstrap.min js-->
            <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>

            <!--Tooltip js-->
            <script src="<?php echo base_url('assets/js/tooltip.js'); ?>"></script>

            <!-- Jquery star rating-->
            <script src="<?php echo base_url('assets/plugins/rating/jquery.rating-stars.js'); ?>"></script>

            <!--Sidemenu js-->
            <script src="<?php echo base_url('assets/plugins/toggle-menu/sidemenu.js'); ?>"></script>

            <!--Othercharts js-->
            <script src="<?php echo base_url('assets/plugins/othercharts/jquery.knob.js'); ?>"></script>
            <script src="<?php echo base_url('assets/plugins/othercharts/jquery.sparkline.min.js'); ?>"></script>

            <!--Chart js-->
            <script src="<?php echo base_url('assets/plugins/Chart.js/dist/Chart.min.js'); ?>"></script>
            <script src="<?php echo base_url('assets/plugins/Chart.js/dist/Chart.extension.js'); ?>"></script>

            <!--Morris js-->
            <script src="<?php echo base_url('assets/plugins/morris/morris.min.js'); ?>"></script>
            <script src="<?php echo base_url('assets/plugins/morris/raphael.min.js'); ?>"></script>

            <!--mCustomScrollbar js-->
            <script src="<?php echo base_url('assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>

            <!--Dashboard js-->
            <script src="<?php echo base_url('assets/js/dashboard2.js'); ?>"></script>

            <!--Showmore js-->
            <script src="<?php echo base_url('assets/js/jquery.showmore.js'); ?>"></script>

            <!--Sparkline js-->
            <script src="<?php echo base_url('assets/js/sparkline.js'); ?>"></script>
            <!--Barcharts js-->
            <script src="assets/js/barcharts.js"></script>
            <!--OtherCharts js-->
            <script src="<?php echo base_url('assets/js/othercharts.js'); ?>"></script>

            <!--Scripts js-->
            <script src="<?php echo base_url('assets/js/scripts.js'); ?>"></script>

    </body>
</html>
