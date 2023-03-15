 <!--begin home section -->

    <section class="home-section" id="home_wrapper">

		<div class="home-section-overlay"></div>

		<!--begin container -->

		<div class="container">

	        <!--begin row -->

	        <div class="row">

	            <!--begin col-md-7-->

	            <div class="col-md-7 padding-top-80">



	          		<h1>Have Your Best Call</h1>



	          		<p>Fast, easy and unlimited conference calls </p>


                    <?php
                        if ($this->session->userdata('AyaUserLoginId') != '') {
                    ?>
                    <a href="<?=site_url('author/meeting-schedule')?>" class="btn-green scrool">Calendar</a>
	        		<a href="<?=site_url('author/dashboard')?>" class="btn-green scrool button-dashboard">Dashboard</a>

                    <?php
                        }else{
                    ?>        
                    <a href="#"  data-toggle="modal" data-target="#myModal" class="btn-green scrool button-login">Login</a>
                    <a href="#" data-toggle="modal" data-target="#myModal" class="btn-green scrool">Calendar</a>
	        		<a href="#" data-toggle="modal" data-target="#myModal" class="btn-green scrool button-dashboard">Dashboard</a>

                    <?php
                        }
                    ?>

	            </div>

	            <!--end col-md-7-->

	       

				<!--begin col-md-5-->

	            <div class="col-md-5 wow bounceIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceIn;">



	          		<img src="<?=base_url('assest_front/')?>images/iphones-2-2.png" class="width-100" alt="pic">



	            </div>

	            <!--end col-md-5-->



	        </div>

	        <!--end row -->



		</div>

		<!--end container -->



    </section>

    <!--end home section -->


    <section class="area-work-new section-white">
        <div class="services-text text-center">
                           <h2 class="section-title">Amazing Features</h2>
                        </div>
        <div class="container"><!--  expert-container -->
            <div class="container no-padding">
                <div class="col-md-4 no-padding">
                    <ul class="list-group workprocess-list">
                        <li class="list-group-item">
                            <div class="workprocess-inner turn-right active">
                                <div class="workprocess-inner-content">
                                    <div class="workprocessInnerContent">
                                        <h4><strong>Unlimited Conference</strong></h4>

                                        <p><span class="text-all">
                                            <img src="<?=base_url('assest_front/')?>images/technology/01s.jpg">
                                        </span></p>
                                    </div>
                                    <div class="workprocess-inner-image">
                                        <div>
                                            <img src="<?=base_url('assest_front/')?>images/technology/1.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="workprocess-inner turn-right">
                                <div class="workprocess-inner-content">
                                    <div class="workprocessInnerContent">
                                        <h4><strong>Whiteboard</strong></h4>
                                        <p><span class="text-all"><img src="<?=base_url('assest_front/')?>images/technology/02s.jpg"> </span></p>
                                    </div>
                                    <div class="workprocess-inner-image">
                                        <div>
                                            <img src="<?=base_url('assest_front/')?>images/technology/2.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="workprocess-inner turn-right">
                                <div class="workprocess-inner-content">
                                    <div class="workprocessInnerContent">
                                        <h4><strong>Transfer of Files</strong></h4>
                                        <p><span class="text-all"><img src="<?=base_url('assest_front/')?>images/technology/03s.jpg"> </span></p>
                                    </div>
                                    <div class="workprocess-inner-image">
                                        <div>
                                            <img src="<?=base_url('assest_front/')?>images/technology/3.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="workprocess-inner turn-right">
                                <div class="workprocess-inner-content">
                                    <div class="workprocessInnerContent">
                                        <h4><strong>Group and One Chat</strong></h4>
                                        <p><span class="text-all"><img src="<?=base_url('assest_front/')?>images/technology/04s.jpg"> </span></p>
                                    </div>
                                    <div class="workprocess-inner-image">
                                        <div>
                                            <img src="<?=base_url('assest_front/')?>images/technology/4.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 no-padding visible-lg visible-md">
                    <div class="text-center">
                        <div class="workinner-middle-content">
                            <img src="<?=base_url('assest_front/')?>images/technology/mobile.png" alt="">
                            <div id="work-inner-pend-data">
                                <h4><strong>Live Video Chat</strong></h4>
                                <p><span class="text-all"><img src="<?=base_url('assest_front/')?>images/technology/01s.jpg"></span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- mobile part 99999999999999999999 -->

                <div class="col-md-4 no-padding">
                    <ul class="list-group workprocess-list">
                        <li class="list-group-item">
                            <div class="workprocess-inner turn-left">
                                <div class="workprocess-inner-content">
                                    <div class="workprocessInnerContent">
                                        <h4><strong>Unlimited Recording</strong></h4>
                                        <p><span class="text-all"><img src="<?=base_url('assest_front/')?>images/technology/06s.jpg"> </span></p>
                                        </div>
                                    <div class="workprocess-inner-image">
                                        <div>
                                            <img src="<?=base_url('assest_front/')?>images/technology/6.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="workprocess-inner turn-left">
                                <div class="workprocess-inner-content">
                                    <div class="workprocessInnerContent">
                                        <h4><strong>Screen Sharing</strong></h4>
                                        <p><span class="text-all"><img src="<?=base_url('assest_front/')?>images/technology/07s.jpg"> </span></p>
                                    </div>
                                    <div class="workprocess-inner-image">
                                        <div>
                                            <img src="<?=base_url('assest_front/')?>images/technology/7.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="workprocess-inner turn-left">
                                <div class="workprocess-inner-content">
                                    <div class="workprocessInnerContent">
                                        <h4><strong>Mute All from Admin</strong></h4>
                                        <p><span class="text-all"><img src="<?=base_url('assest_front/')?>images/technology/08s.jpg"> </span></p>
                                    </div>
                                    <div class="workprocess-inner-image">
                                        <div>
                                            <img src="<?=base_url('assest_front/')?>images/technology/8.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="workprocess-inner turn-left">
                                <div class="workprocess-inner-content">
                                    <div class="workprocessInnerContent">
                                        <h4><strong>Meeting History</strong></h4>
                                        <p><span class="text-all"><img src="<?=base_url('assest_front/')?>images/technology/09s.jpg"> </span></p>
                                    </div>
                                    <div class="workprocess-inner-image">
                                        <div>
                                            <img src="<?=base_url('assest_front/')?>images/technology/9.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section><!--.#area-work-->
    <!--begin features -->

	<!--begin video-wrapper -->

	<section class="video-wrapper">



    	<div class="video-wrapper-overlay"></div>



    	<div class="shape-image-top"></div>



		<!--begin container -->

		<div class="container">



	        <!--begin row -->

	        <div class="row">



	        	<!--begin col-md-12-->

                <div class="col-md-12 text-center">

                    

                    <!--begin popup-gallery-->

                    <div class="popup-gallery">

                        <a class="popup4 video-icon" href="https://www.youtube.com/watch?v=FPfQMVf4vwQ"><i class="fa fa-play"></i></a>

                    </div>

                    <!--end popup-gallery-->



                    <h3 class="video-title white">Watch Demo Video<br><span>Amazing Features, Unlimited Possibilities.</span></h3>

                    

                </div>

                <!--end col-md-12-->

	       

	        </div>

	        <!--end row -->



		</div>

		<!--end container -->



    </section>

    <!--end video-wrapper -->



    <!--begin faq section -->

	<section class="section-white small-padding-bottom">

        

        <!--begin container-->

        <div class="container">



            <!--begin row-->

            <div class="row">

            

                <!--begin col-md-6-->

                <div class="col-md-6 margin-top-10">



                    <img src="<?=base_url('assest_front/')?>images/faq-img.png" alt="picture" class="width-100">



                </div>

                <!--end col-sm-6-->

                

                <!--begin col-md-6-->

                <div class="col-md-6 margin-top-10">



                	<h3>Frequently Asked Questions</h3>



                    <!--begin panel-group -->

                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        

                        <!--begin panel-default -->

                        <div class="panel panel-default">

                            

                            <div class="panel-heading" role="tab" id="headingOne">

                                

                                <h4 class="panel-title">

                                    

                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                                      <i class="icon icon-rocket panel-icon"></i>1. Can <?=COMPANY_NAME;?> see your screen?

                                    </a>
                                </h4>
                            </div>

                            

                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">

                                

                                <div class="panel-body">

                                    <p>When sharing Your Entire Screen users will see your screen even when navigating to another browser or application window</p>

                                </div>

                                

                            </div>

                            

                        </div>

                        <!--end panel-default -->

                        

                        <!--begin panel-default -->

                        <div class="panel panel-default">

                            

                            <div class="panel-heading" role="tab" id="headingTwo">

                                

                                <h4 class="panel-title">

                                    

                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

                                      <i class="icon icon-prize-award panel-icon"></i>2.    Is <?=COMPANY_NAME;?> secure?

                                    </a>

                                    

                                </h4>

                                

                            </div>

                            

                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">

                                

                                <div class="panel-body">

                                    <p><?=COMPANY_NAME;?> has multiple security mechanics in place to keep streams secure. If <?=COMPANY_NAME;?> is installed on a server with a TLS certificate, it encrypts all content sent from the server to the web browser.
</p>

                                </div>

                                

                            </div>

                            

                        </div>

                        <!--end panel-default -->

                        

                        <!--begin panel-default -->

                        <div class="panel panel-default">

                            

                            <div class="panel-heading" role="tab" id="headingThree">

                                

                                <h4 class="panel-title">

                                    

                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">

                                      <i class="icon icon-present-gift panel-icon"></i> 3.  How do I turn my <?=COMPANY_NAME;?> camera on?

                                    </a>

                                    

                                </h4>

                                

                            </div>

                            

                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">

                                

                                <div class="panel-body">

                                    <p>Locate and select the webcam icon from the media bar, located in the bottom middle of the <?=COMPANY_NAME;?> interface, and follow the join prompts. If you are using Chrome browser on a laptop or desktop and receive the message “The webcam is in use by another application” be sure you have allowed the permissions</p>

                                </div>
                            </div>
                            

                        </div>

                        <!--end panel-default -->
                        

                        <!--begin panel-default -->

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFour">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">

                                      <i class="icon icon-present-gift panel-icon"></i>4.How do you invite people on <?=COMPANY_NAME;?>?

                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                <div class="panel-body">

                                    <p>Once you are logged into your <?=COMPANY_NAME;?> meeting, open the Chat Pane (if not already open) and select the text "Invite a guest to join this meeting". Only those users with the Moderator role can see this in the chat pane.
</p>

                                </div>
                            </div>
                        </div>

                        <!--end panel-default -->
                         <!--begin panel-default -->

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFive">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">

                                      <i class="icon icon-present-gift panel-icon"></i>5.   What are the features of <?=COMPANY_NAME;?> virtual classroom?

                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                <div class="panel-body">

                                    <p>For engagement, <?=COMPANY_NAME;?> supports real-time sharing of audio, video, screens, slides, emojis, and chat with students — all the core features you would expect from any web conferencing system. <?=COMPANY_NAME;?> extends these core features to include multi-user whiteboard, shared notes, polling, and breakout rooms.

</p>

                                </div>
                            </div>
                        </div>

                        <!--end panel-default -->
                    </div>

                    <!--end panel-group -->
                </div>

                <!--end col-sm-6-->
            </div>

            <!--end row-->
        </div>

        <!--end container-->

    

    </section>

    <!--end faq section -->


  	<!--begin services section -->

  	<section class="section-white small-padding-bottom" id="features">

	    <!--begin container -->

	    <div class="container">
	      

	      	<!--begin row -->

	      	<div class="row">



		        <!--begin col-md-12-->

		        <div class="col-md-12 padding-top-40">



					<img src="<?=base_url('assest_front/')?>images/iphone-v.png" alt="home-iphone" class="extra-image width-100 wow fadeInUp" data-wow-delay="1s" style="visibility: visible; animation-delay: 0.25s; animation-name: fadeInUp;">



		        </div>

		        <!--end col-md-4 -->



	      	</div>

	      	<!--end row -->



	    </div>

	    <!--end container -->



  	</section>

  	<!--end services section -->



	<!--begin newsletter section -->

  	<section class="section-lyla-shape" id="newsletter-section">



	    <!--begin container -->

	    <div class="container">



	      	<!--begin row -->

	      	<div class="row">



		        <!--begin col-md-12 -->

		        <div class="col-md-12 text-center padding-top-60 padding-bottom-20">



		    		<h3 class="white-text">
		    		Please enter your email to join the waiting list.</h3>



		        </div>

		        <!--end col-md-12 -->



		        <!--begin col-md-12-->

		        <div class="col-md-12">



		            <!--begin newsletter_form_wrapper -->

                    <div class="newsletter_form_wrapper">

                        

                        <!--begin newsletter_form_box -->

                        <div class="newsletter_form_box">

                            

                            <!--begin success_box -->
                            
                            <p class="newsletter_success_box" style="display:none;">We received your message and you'll hear from us soon. Thank You!</p>
                            <span style="color:green"><?=$this -> session -> flashdata('successmsg');?></span>
                            <!--end success_box -->

                            

                            <!--begin newsletter-form -->

                            <form id="newsletter-form" class="newsletter-form" action="<?=site_url('home_controller/sendnewslatter');?>" method="post">



                                <input id="email_newsletter" type="email" name="nf_email" placeholder="Enter Your Email Address" required>  



                                <input type="submit" value="GET STARTED!" id="submit-button-newsletter">



                            </form>

                            <!--end newsletter-form -->

                        

                        </div>

                        <!--end newsletter_form_box -->

            

                    </div>

                    <!--end newsletter_form_wrapper -->



		        </div>

		        <!--end col-md-12 -->



	      	</div>

	      	<!--end row -->



	    </div>

	    <!--end container -->



  	</section>

  	<!--end newsletter section -->



	<!--begin pricing section -->

  	<section class="section-white bottom-shape z-100" id="pricing">



	    <!--begin container -->

	    <div class="container">



			<!--begin row -->

			<div class="row">



				<!--begin col-md-12 -->

				<div class="col-md-12 text-center padding-bottom-40">



					<h2 class="section-title">Great Pricing Plans</h2>



					<p class="section-subtitle">Choose the right plan for your business, <?=COMPANY_NAME;?> is designed for all kinds of groups. Get started for free or get a plan to start with.</p>

					

				</div>

				<!--end col-md-12 -->

                <?php
              $plansList = json_decode($plans);
              foreach($plansList as $value){
            ?> 

                <div class="col-md-4 col-sm-4">



                    <div class="price-box-grey">



                        <ul class="pricing-list">
                            <li class="price-title"><?=$value -> name?></li>
                            <li class="price-value"><?=($value -> price > 0)?'$'.$value -> price:'Free'?></li>
                            <li class="price-subtitle">Per Month</li>
                            <li class="price-text">24/7 Support</li>
                            <li class="price-text"><?=$value -> rules?></li>
                            <?php
                             if($this -> session -> userdata('AyaUserLoginId') != ''){
                            ?>
                            <li class="price-tag"><a href="<?=site_url('pay-now/'.encode($value -> id))?>">GET STARTED</a></li>
                            <?php
                                }else{
                            ?>
                           <li class="price-tag"><a data-toggle="modal" data-target="#registerModal" href="javascript:void(0)">GET STARTED</a></li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            <?php
              }
            ?>

				 



			</div>

			<!--end row -->



	    </div>

	    <!--end container -->



  	</section>