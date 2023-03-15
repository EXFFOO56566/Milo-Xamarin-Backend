<?php
$UrlName = $this->uri->segment(1);
$CompanyDetails = __companydetails()[0];
$CategoryArray = getAllMasterDatawithId('category');
?>
<div class="header">
					<!--nav open-->
					<nav class="navbar navbar-expand-lg main-navbar">
						<div class="container">
							<a id="horizontal-navtoggle" class="animated-arrow hor-toggle"><span></span></a>
							<a class="header-brand" href="index.html">
								<img src="<?php echo base_url(COMPANY_LOGO); ?>" class="header-brand-img" alt="Splite-Admin  logo">
							</a>
							<form class="form-inline mr-auto">
								<ul class="navbar-nav mr-2">
									<li><a href="#" data-toggle="search" class="nav-link  d-md-none navsearch"><i class="fa fa-search"></i></a></li>
								</ul>
								<div class="search-element mr-3">
									<input class="form-control" type="search" placeholder="Search" aria-label="Search">
									<span class="Search-icon"><i class="fa fa-search"></i></span>
								</div>
							</form>
							<ul class="navbar-nav navbar-right">
								
							
							
							
								<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg d-flex">
										<span class="mr-3 mt-2 d-none d-lg-block ">
											<span class="text-white">Hello,<span class="ml-1"><?=$this -> session -> userdata('AyaUserName')?></span></span>
										</span>
									<span><img src="<?=($this -> session -> userdata('UserLogo') != '')?base_url('uploads/'.$this -> session -> userdata('UserLogo')):base_url('assets/img/avatar/avatar-3.jpeg'); ?>" alt="profile-user" class="rounded-circle w-32 mr-2"></span>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<div class=" dropdown-header noti-title text-center border-bottom pb-3">
											<h5 class="text-capitalize text-white mb-1"><?=$this -> session -> userdata('AyaUserName')?></h5>
											<small class="text-overflow m-0"><?=($this -> session -> userdata('AyaUserRole') == 1)?'Admin':'User'?></small>
										</div>
										<a class="dropdown-item" href="<?=site_url('author/update-profile')?>"><i class="mdi mdi-account-outline mr-2"></i> <span>My profile</span></a>							
										<div class="dropdown-divider"></div><a class="dropdown-item" href="<?=site_url('logout')?>"><i class="mdi  mdi-logout-variant mr-2"></i> <span>Logout</span></a>
									</div>
								</li>
							</ul>
						</div>
					</nav>
					<!--nav closed-->
				</div>
                <div class="horizontal-main hor-menu clearfix">
					<div class="horizontal-mainwrapper container clearfix">
						<nav class="horizontalMenu clearfix">
							<ul class="horizontalMenu-list">
								<li aria-haspopup="true"><a href="<?php echo site_url('author/dashboard'); ?>" class="active"><i class="fa fa-laptop"></i> Dashboard</a></li>
                                <li aria-haspopup="true"><a href="<?php echo site_url('author/meeting-schedule'); ?>" class=""><i class="fa fa-calendar"></i> Calendar</a></li>
                                <?php
                                     if($this -> session -> userdata('AyaUserRole') == 1){
                                ?>
                                    <li aria-haspopup="true"><a href="<?php echo site_url('author/user-list'); ?>" class=""><i class="fa fa-user"></i> Registered User</a></li>
                                    <li aria-haspopup="true"><a href="<?php echo site_url('author/subscription'); ?>" class=""><i class="fa fa-newspaper-o"></i> Subscription</a></li>

                                <?php
                                     }
                                ?>
																	<li aria-haspopup="true"><a href="<?php echo site_url('author/active-plan'); ?>" class=""><i class="fa fa-sliders"></i> Active plan</a></li>


							
							
							
							</ul>
						</nav>
						<!--Menu HTML Code-->
					</div>
				</div>

<style>
    .clock {
    position: absolute;
    top: 50%;
    left: 23%;
    transform: translateX(-50%) translateY(-50%);
    color: white;
    font-size: 50px;
    font-family: Orbitron;
    letter-spacing: 7px;
}
</style>

<script>
    function showTime(){
    var date = new Date()
    var timezone = "<?=gettimezone()?>";
    var fdate = date.toLocaleString("en-US", {timeZone: timezone,  hour: '2-digit', minute:'2-digit', second:'2-digit'});
    var sdate = fdate.split(":");        
    var h = sdate[0]; // 0 - 23
    var m = sdate[1]; // 0 - 59
    var s = sdate[2]; // 0 - 59           
    if(h == 0){
        h = 12;
    }   
       
    var time = h + ":" + m + ":" + s + " ";
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;
    
    setTimeout(showTime, 1000);
    
}
$(document).ready(function(){
    showTime();
})
</script>