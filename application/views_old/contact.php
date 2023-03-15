    <section class="home-section" id="home_wrapper">

        <div class="home-section-overlay"></div>

        <!--begin container -->

        <div class="container">

            <!--begin row -->

            <div class="row">

                <!--begin col-md-7-->

                <div class="col-md-12 padding-top-80 text-center">
                    <h1> Contact </h1>

                </div>

                <!--end col-md-7-->



            </div>

            <!--end row -->



        </div>

        <!--end container -->



    </section>

  
    <!--begin services section -->

    
    <!--begin contact -->

    <section class="section-white no-padding-bottom" id="contact">

        

        <!--begin container-->

        <div class="container">

    

            <!--begin row-->

            <div class="row">

        

                <!--begin col-md-6 -->

                <div class="col-md-6">


                    <span style="color:green"><?=$this -> session -> flashdata('successmsg')?></span>
                    <span style="color:red"><?=$this -> session -> flashdata('errmsg')?></span>
                    <h4>Get in touch</h4>



                    <!--begin success message -->

                    <p class="contact_success_box" style="display:none;">We received your message and you'll hear from us soon. Thank You!</p>

                    <!--end success message -->

                    

                    <!--begin contact form -->

                    <form id="contact-form" class="contact" action="<?=base_url('home_controller/send_contact_mail')?>" method="post">

                    

                        <input class="contact-input white-input" required="" name="name" placeholder="Full Name*" type="text">



                        <input class="contact-input white-input" required="" name="email_id" placeholder="Email Adress*" type="email">



                        <input class="contact-input white-input" required="" name="mobile_no" placeholder="Phone Number*" type="text">



                        <textarea class="contact-commnent white-input" rows="2" cols="20" name="message" placeholder="Your Message..."></textarea>



                       <!-- contact-submit -->

                        <input value="Send Message" id="submit-button" class="contact-submit btn-green scrool button-login" type="submit">

                    </form>

                    <!--end contact form -->

                    

                </div>

                <!--end col-md-6 -->



                <!--begin col-md-6 -->

                <div class="col-md-6">



                    <h4>How to find us</h4>



                    <h5>Head Office</h5>



                    <p class="contact-info"><i class="fa fa-map-o"></i> B21 Centro Empresarial Metropolitano Cota - Cundinamarca Colombia </p>

                    

                    <p class="contact-info"><i class="fa fa-envelope-o"></i> <a href="#"><?=COMPANY_EMAIL?></a></p>

                    

                    <p class="contact-info"><i class="fa fa-phone"></i><?=COMPANY_MOBILE?></p>



                </div>

                <!--end col-md-6 -->



            </div>

            <!--end row-->

            

      </div>

      <!--end container-->

            

    </section>

    <!--end contact-->