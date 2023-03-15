<?php
$UrlName = $this->uri->segment(1);
$CompanyDetails = __companydetails()[0];
$CategoryArray = getAllMasterDatawithId('category');
?>
<nav class="navbar navbar-expand-lg main-navbar">
    <a class="header-brand" href="<?=site_url('home');?>">
        <img src="<?php echo base_url(COMPANY_LOGO); ?>" width="120px" alt="Logo"/>
    </a>
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-2">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link toggle"><i class="fa fa-reorder"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link d-md-none navsearch"><i class="fa fa-search"></i></a></li>
        </ul>
        <div class="search-element mr-3">
        <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
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
                    <h5 class="text-capitalize text-dark mb-1"><?=$this -> session -> userdata('AyaUserName')?></h5>
                    <small class="text-overflow m-0"><?=($this -> session -> userdata('AyaUserRole') == 1)?'Admin':'User'?></small>
                </div>
                <a class="dropdown-item" href="<?php echo site_url('author/update-profile'); ?>"><i class="mdi mdi-account-outline mr-2"></i> <span>My profile</span></a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="<?php echo base_url('logout') ?>"><i class="mdi  mdi-logout-variant mr-2"></i> <span>Logout</span></a>
            </div>
        </li>
    </ul>
</nav>
<!--nav closed-->

<!--aside open-->
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="nav-link pl-1 pr-1 leading-none ">
                <img src="<?=($this -> session -> userdata('UserLogo') != '')?base_url('uploads/'.$this -> session -> userdata('UserLogo')):base_url('assets/img/avatar/avatar-3.jpeg'); ?>" alt="user-img" class="avatar-xl rounded-circle mb-1">
                <span class="pulse bg-success" aria-hidden="true"></span>
            </div>
            <div class="user-info">
                <h6 class=" mb-1 text-dark"><?=$this -> session -> userdata('AyaUserName')?></h6>
                <span class="text-muted app-sidebar__user-name text-sm"><?=($this -> session -> userdata('AyaUserRole') == 1)?'Admin':'User'?></span>
            </div>
        </div>
    </div>
    <ul class="side-menu">
        <li>
            <a class="side-menu__item" href="<?php echo site_url('author/dashboard'); ?>"><i class="side-menu__icon fa fa-laptop"></i><span class="side-menu__label">Dashboard</span><span class="badge badge-orange nav-badge"></span></a>
        </li>
        <li>
            <a class="side-menu__item" href="<?php echo site_url('author/meeting-schedule'); ?>"><i class="side-menu__icon fe fe-calendar"></i><span class="side-menu__label">Calendar</span></a>
        </li>
        <?php
          if($this -> session -> userdata('AyaUserRole') == 1){
        ?>
        <li>
            <a class="side-menu__item" href="<?php echo site_url('author/user-list'); ?>"><i class="side-menu__icon fa fa-user"></i><span class="side-menu__label">Registered User</span></a>
        </li>
         <li>
            <a class="side-menu__item" href="<?php echo site_url('author/subscription'); ?>"><i class="side-menu__icon fa fa-newspaper-o"></i><span class="side-menu__label">Subscription</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-envelope-o"></i><span class="side-menu__label">Features</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="<?php echo site_url('author/features'); ?>" class="slide-item">Our Features</a></li>
                <li><a href="<?php echo site_url('author/master-features'); ?>" class="slide-item">Features master</a></li>
            </ul>
        </li>     
        <?php
          } 
        ?>
        <!-- <li>
            <a class="side-menu__item" href="<?php echo site_url('author/doc'); ?>"><i class="side-menu__icon fa fa-newspaper-o"></i><span class="side-menu__label">Doc List</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="<?php echo site_url('author/appointment'); ?>"><i class="side-menu__icon fa fa-newspaper-o"></i><span class="side-menu__label">Appointment List</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="<?php echo site_url('author/occasion'); ?>"><i class="side-menu__icon fa fa-newspaper-o"></i><span class="side-menu__label">Occasion List</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="<?php echo site_url('author/reminder'); ?>"><i class="side-menu__icon fa fa-newspaper-o"></i><span class="side-menu__label">Reminder List</span></a>
        </li> -->
         <!-- <li>
            <a class="side-menu__item" href="<?php echo site_url('author/todo'); ?>"><i class="side-menu__icon fa fa-newspaper-o"></i><span class="side-menu__label">Todo List</span></a>
        </li> -->
         <!-- <li>
            <a class="side-menu__item" href="<?php echo site_url('author/gallery'); ?>"><i class="side-menu__icon fa fa-newspaper-o"></i><span class="side-menu__label">Gallery</span></a>
        </li>

       <li>
            <a class="side-menu__item" href="<?php echo site_url('author/file-share'); ?>"><i class="side-menu__icon fa fa-sliders"></i><span class="side-menu__label">File Share</span></a>
       </li>  -->
       <li>
            <a class="side-menu__item" href="<?php echo site_url('author/active-plan'); ?>"><i class="side-menu__icon fa fa-sliders"></i><span class="side-menu__label">Active Plan</span></a>
       </li> 
      
        <li>
            <a class="side-menu__item" href="<?php echo site_url('author/change-password'); ?>"><i class="side-menu__icon fa fa-lock"></i><span class="side-menu__label">Change Password</span></a>
        </li>
    </ul>
</aside>

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