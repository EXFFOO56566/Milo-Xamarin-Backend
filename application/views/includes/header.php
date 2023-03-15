<body>


    <!--begin header -->

    <header class="header">



        <!--begin nav -->

        <nav class="navbar navbar-default navbar-fixed-top">
            <!--begin container -->

            <div class="container">
                <!--begin navbar -->

                <div class="navbar-header">



                    <button data-target="#navbar-collapse-02" data-toggle="collapse" class="navbar-toggle" type="button">

                        <span class="sr-only">Toggle navigation</span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                    </button>

                        

                    <!--logo -->

                    <a href="<?=site_url()?>" class="navbar-brand" id="logo">
                        <img src="<?=base_url('uploads/logo.png')?>" width="45px">
                    </a>
                </div>
                <div id="navbar-collapse-02" class="collapse navbar-collapse">



                    <ul class="nav navbar-nav navbar-right">

                        <li><a href="<?=site_url()?>">Home</a></li>

                        <li><a href="<?=site_url('features')?>">Features</a></li>
                         <li><a href="<?=site_url('plans');?>">Plans & Pricing</a></li>
                         <li><a href="<?=site_url('faq')?>">FAQ</a></li>
                         <?php
                          if ($this->session->userdata('AyaUserLoginId') != '') {
                         ?>
                         <li><a href="<?= site_url('user-logout') ?>">Logout</a></li>
                         <?php 
                          }else{
                         ?>
                            <li><a href="#"  data-toggle="modal" data-target="#myModal">Login</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#registerModal">Sign Up For Free</a></li>
                         <?php
                          }
                         ?>
                         
                         <li><a href="<?=site_url('contact-us')?>">Contact</a></li>

                    </ul>

                </div>

                <!--end navbar -->
            </div>

    		<!--end container -->
        </nav>

    	<!--end nav -->
    </header>

    <!--end header -->
       <!--begin header -->

       <header class="header">



<!--begin nav -->

<nav class="navbar navbar-default navbar-fixed-top">
    <!--begin container -->

    <div class="container">
        <!--begin navbar -->

        <div class="navbar-header">



            <button data-target="#navbar-collapse-02" data-toggle="collapse" class="navbar-toggle" type="button">

                <span class="sr-only">Toggle navigation</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

            </button>

                

            <!--logo -->

            <a href="<?=site_url()?>" class="navbar-brand" id="logo">
                <img src="<?=base_url('uploads/logo.png')?>" width="85px">
            </a>
        </div>
        <div id="navbar-collapse-02" class="collapse navbar-collapse">



            <ul class="nav navbar-nav navbar-right">

                <li><a href="<?=site_url()?>">Home</a></li>
                <li><a href="<?=site_url('features')?>">Features</a></li>
                 <li><a href="<?=site_url('plans')?>">Plans & Pricing</a></li>
                 <li><a href="<?=site_url('faq')?>">FAQ</a></li>
                 <?php
                          if ($this->session->userdata('AyaUserLoginId') != '') {
                         ?>
                         <li><a href="<?= site_url('user-logout') ?>">Logout</a></li>
                         <?php 
                          }else{
                         ?>
                            <li><a href="#"  data-toggle="modal" data-target="#myModal">Login</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#registerModal">Sign Up For Free</a></li>
                         <?php
                          }
                         ?>
               
                 <li><a href="<?=site_url('contact-us')?>">Contact</a></li>

            </ul>

        </div>

        <!--end navbar -->
    </div>

<!--end container -->
</nav>

<!--end nav -->
</header>

<!--end header -->
