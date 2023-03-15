    <section class="home-section" id="home_wrapper">

        <div class="home-section-overlay"></div>

        <!--begin container -->

        <div class="container">

            <!--begin row -->

            <div class="row">

                <!--begin col-md-7-->

                <div class="col-md-12 padding-top-80 text-center">
                    <h1> Pricing & Plans</h1>

                </div>

                <!--end col-md-7-->



            </div>

            <!--end row -->



        </div>

        <!--end container -->



    </section>

  


    <section class="section-white bottom-shape z-100" id="pricing">



        <!--begin container -->

        <div class="container">



            <!--begin row -->

            <div class="row">



                <!--begin col-md-12 -->

                <div class="col-md-12 text-center padding-bottom-40">



                    <h2 class="section-title"> Pricing & Plans</h2>



                    <p class="section-subtitle">Honest and Transparent Pricing, No Surprises
Pick which video conferencing plan is best for your business.</p>

                    

                </div>

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