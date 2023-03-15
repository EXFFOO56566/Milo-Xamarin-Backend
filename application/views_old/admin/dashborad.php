<?php
    $prevMeeting = $todayMeeting;

?>
<div class="app-content">
    <div class="section">
        <!--page-header open-->
        <div class="page-header">
            <h4 class="page-title">Dashboard</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-light-color">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>
        <?php
          if($this -> session -> userdata('AyaUserRole') == 1){
        ?>
        <div class="row">
            <div class="col-lg-6 col-xl-3 col-sm-6 col-md-6">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md bg-primary mr-3">
                            <i class="fa fa-users"></i>
                        </span>
                        <div>
                            <h4 class="m-0"><strong><?= $activeUserCount ?></strong></h4>
                            <h6>Active Customer's</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-sm-6 col-md-6">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md bg-orange mr-3">
                            <i class="fa fa-cart-arrow-down"></i>
                        </span>
                        <div>
                            <h4 class="m-0"><strong><?=$inactiveUserCount?></strong></h4>
                            <h6>Disabled Customer's</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-sm-6 col-md-6">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md bg-warning mr-3">
                            <i class="fa fa-eye"></i>
                        </span>
                        <div>
                            <h4 class="m-0"><strong><?=$totalSubscription?></strong></h4>
                            <h6>Total Subscription</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-sm-6 col-md-6">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md bg-success mr-3">
                            <i class="fa fa-file-text"></i>
                        </span>
                        <div>
                            <h4 class="m-0"><strong><?=$totalRenewal?></strong></h4>
                            <h6>Subsc.. Renewal</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
          }

          if($this -> session -> userdata('AyaUserRole') == 2){
        ?>
        <!--row closed-->
        <!--row open-->
        <div class="row">
            <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                <div class="card bg-primary">
                    <div class="card-body">
                        <div class="card-order">
                            <h6 class="mb-2">Package name</h6>
                            <h2 class="text-right"><i class="fa fa-cart-plus mt-2 float-left"></i><span><?=$activePackage;?></span></h2>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                <div class="card bg-success">
                    <div class="card-body">
                        <div class="card-widget">
                            <h6 class="mb-2">Total meeting</h6>
                            <h2 class="text-right"><i class="fa fa-credit-card mt-2 float-left"></i><span><?= $totalMeeting; ?></span></h2>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                <div class="card bg-info">
                    <div class="card-body">
                        <div class="card-widget">
                            <h6 class="mb-2">Created meeting</h6>
                            <h2 class="text-right"><i class="fa fa-paper-plane mt-2 float-left"></i><span><?= $createdMeeting; ?></span></h2>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                <div class="card bg-info">
                    <div class="card-body">
                        <div class="card-widget">
                            <h6 class="mb-2">Remaining meeting</h6>
                            <h2 class="text-right"><i class="fa fa-paper-plane mt-2 float-left"></i><span><?= $remainingMeeting; ?></span></h2>

                        </div>
                    </div>
                </div>
            </div>
        
        <?php
          }
             if($this -> session -> userdata('AyaUserRole') == 1){
            ?>

         <!--row open-->
         <div class="row">
            <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                <div class="card bg-primary">
                    <div class="card-body">
                        <div class="card-order">
                            <h6 class="mb-2">Total Collection</h6>
                            <h2 class="text-right"><i class="fa fa-cart-plus mt-2 float-left"></i><span><?=$totalCollection;?></span></h2>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                <div class="card bg-success">
                    <div class="card-body">
                        <div class="card-widget">
                            <h6 class="mb-2"><?=date('M Y', time())?> Collection</h6>
                            <h2 class="text-right"><i class="fa fa-credit-card mt-2 float-left"></i><span><?= $presentMonthCollection; ?></span></h2>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                <div class="card bg-info">
                    <div class="card-body">
                        <div class="card-widget">
                            <h6 class="mb-2">Weekly Collection</h6>
                            <h2 class="text-right"><i class="fa fa-paper-plane mt-2 float-left"></i><span><?= $weeklyCollection; ?></span></h2>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                <div class="card bg-warning">
                    <div class="card-body">
                        <div class="card-widget">
                            <h6 class="mb-2">Today's Collection</h6>
                            <h2 class="text-right"><i class="fa fa-line-chart mt-2 float-left"></i><span><?=$todayCollection?></span></h2>

                        </div>
                    </div>
                </div>
            </div>           
        </div>    
        
        <!--row open-->
        <div class="row">
            <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                <div class="card bg-primary">
                    <div class="card-body">
                        <div class="card-order">
                            <h6 class="mb-2">Category</h6>
                            <h2 class="text-right"><i class="fa fa-cart-plus mt-2 float-left"></i><span><?=$CategoryCount;?></span></h2>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                <div class="card bg-success">
                    <div class="card-body">
                        <div class="card-widget">
                            <h6 class="mb-2">News</h6>
                            <h2 class="text-right"><i class="fa fa-credit-card mt-2 float-left"></i><span><?= $newsCount; ?></span></h2>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                <div class="card bg-info">
                    <div class="card-body">
                        <div class="card-widget">
                            <h6 class="mb-2">videos</h6>
                            <h2 class="text-right"><i class="fa fa-paper-plane mt-2 float-left"></i><span><?= $videoCount; ?></span></h2>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 col-12">
                <div class="card bg-warning">
                    <div class="card-body">
                        <div class="card-widget">
                            <h6 class="mb-2">Subc..Expiry Till Date</h6>
                            <h2 class="text-right"><i class="fa fa-line-chart mt-2 float-left"></i><span><?=$todayExpiry?></span></h2>

                        </div>
                    </div>
                </div>
            </div>           
        </div>
        <?php
             }
            ?>
        <!--row closed-->
        <?php
          if($this -> session -> userdata('AyaUserRole') == 1){
        ?>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-6">

                <div class="card overflow-hidden">
                    <div class="card-header">
                        <h4>Subscription and Unsubscription</h4>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <canvas id="canvas" class="overflow-hidden"></canvas>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-12">

                                <span class="badge badge-primary mt-1 mb-1">Subscription</span>

                                <span class="badge badge-warning mt-1 mb-1">Unsubscription</span>

                                <span class="badge badge-orange mt-1 mb-1">Renewal</span>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="col-12 col-md-12 col-lg-6">

                <div class="card overflow-hidden">
                    <div class="card-header">
                        <h4>Subscription and Unsubscription</h4>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <canvas id="canvas" class="overflow-hidden"></canvas>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-12">

                                <span class="badge badge-primary mt-1 mb-1">Subscription</span>

                                <span class="badge badge-warning mt-1 mb-1">Unsubscription</span>

                                <span class="badge badge-orange mt-1 mb-1">Renewal</span>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
           
        
        <?php
          }
        ?>
        </div>
        <div class="row">
             <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Meeting History</h4>
                        <span style="color:green" id="successmsg"></span>
                        <span style="color:red" id="errmsg"></span>
                    </div> 
                    
                    <div class="card-body">
                        <ul class="nav nav-pills pb-3" id="myTab3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Upcoming Meeting</a>
                            </li>
                          
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false">Meeting History</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Cancelled-tab3" data-toggle="tab" href="#cancelled3" role="tab" aria-controls="Cancelled" aria-selected="false">Canceled Meeting</a>
                            </li>
                        </ul>
                        <div class="tab-content border-top p-3">
                            <div class="tab-pane fade show active p-0" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                                <div class="e-table">
                                    <div class="table-responsive table-lg text-nowrap">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Title</th>
                                                    <th>Organizer</th>                                                    
                                                    <th>Meeting Participants </th>
                                                    <th>Meeting Password</th>
                                                    <th>Date & Time</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $index = 1;
                                                foreach ($todayMeeting as $value) {                                               
                                                $Pername = __getmeetingstatus($value -> id, $value -> created_by);                                           
                                                $meetingStatus = __getmeetingPresentstatus($value -> id);
                                                $timezone = gettimezone();
                                                $mettingStartDate = convertDate(date("Y-m-d H:i:s", time()), 'Asia/Kolkata', $timezone);
                                                $endTime = convertTimewithoutam(date("H:i:s", time()), 'Asia/Kolkata', $timezone);
                                                if($value -> meeting_end_date.' '.$value -> ending_time >= $mettingStartDate.' '.$endTime){                                                
                                                ?>
                                                    <tr>
                                                        <td class="text-dark"><?=$index++?></td>
                                                        <td><?= $value->title ?></td>
                                                        <td><?= $value->name ?></td>
                                                        <td>
                                                            <span><?=  array_key_exists(0, $Pername)?$Pername[0]:''?></span>
                                                            <span class="text-success"><?=array_key_exists(1, $Pername)?$Pername[1]:''?></span>
                                                            <span class="text-danger"><?=array_key_exists(2, $Pername)?$Pername[2]:''?></span>
                                                        </td>
                                                        <td><?=$value -> password;?></td>
                                                        <?php
                                                            $timeZone = $time_zone;
                                                            $mettingdate = date('Y-m-d H:i:s', strtotime($value -> meeting_start_date.' '.$value -> starting_time));
                                                            $finaltime = convertDateAndTime($mettingdate, $timeZone); 
                                                        ?>
                                                        <td class="fw-600"><?=$finaltime?></td>
                                                        <td class="text-center" id="todayMeeting">
                                                            <?php
                                                              if($meetingStatus == 1){
                                                            ?>
                                                            <a href="javascript:void(0)" data-id="<?=$value -> id?>" class="btn btn-sm badge bg-success m-b-5 join_meeting">Join</a>
                                                            <a href="javascript:void(0)" onclick="sendinvite('<?=$value -> id?>')" class="btn btn-sm badge bg-info m-b-5">Share</a>
                                                            <?php
                                                             if($value -> created_by == $this -> session -> userdata('AyaUserLoginId')){
                                                            ?>
                                                            <button type="button" name="" onclick="cancelmeetingbycreator('<?=$value -> meeting_id?>')" class="btn btn-sm badge bg-danger m-b-5">Cancel</button>
                                                            <button type="button" name="" onclick="editmeeting('<?=$value -> id?>')" class="btn btn-sm badge bg-info m-b-5">Edit</button>
                                                            <?php
                                                             }
                                                            ?>
                                                            <?php
                                                              }else if($meetingStatus == 0){
                                                            ?>
                                                            <button type="button" name="" onclick="acceptmeeting('todayMeeting', '<?=$value -> id;?>');" class="btn btn-sm badge bg-success m-b-5">Accept</button>
                                                            <button type="button" name="" onclick="cancelmeeting('todayMeeting', '<?=$value -> id;?>')" class="btn btn-sm badge bg-danger m-b-5">Reject</button>
                                                            <?php
                                                              }
                                                            ?>  
                                                            <button type="button" name="" onclick="getagenda('<?=$value -> id;?>')" class="btn btn-sm badge bg-primary m-b-5">Agenda</button>
                                                            <button type="button" onclick="takeaway('<?=$value -> id?>')"  class="btn btn-sm badge bg-pink m-b-5">Takeaways</button>
                                                            <?php
                                                              if($value -> takeaways != ''){
                                                            ?>
                                                            <a target="_blank" href="<?=site_url('author/get-meetingview/'.encode($value->id))?>" class="btn btn-sm badge bg-warning m-b-5">View</a>
                                                            <?php
                                                              }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    }
                                                 }
                                                ?>                                             
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                           

                            <div class="tab-pane fade p-0" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                                <div class="e-table">
                                    <div class="table-responsive table-lg text-nowrap">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Title</th>
                                                    <th>Organizer</th>
                                                    <th>Meeting Participants </th>
                                                    <th>Meeting Password</th>
                                                    <th>Date & Time</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                  $index = 1;
                                                  foreach($prevMeeting as $pvalue){
                                                  $Pername = __getmeetingstatus($pvalue -> id, $pvalue -> created_by);
                                                  $meetingStatus = 1;
                                                 
                                                  $timezone = gettimezone();
                                                  $mettingStartDate = convertDate(date("Y-m-d H:i:s", time()), 'Asia/Kolkata', $timezone);
                                                  $endTime = convertTimewithoutam(date("H:i:s", time()), 'Asia/Kolkata', $timezone);
                                                  if($pvalue -> meeting_end_date.' '.$pvalue -> ending_time < $mettingStartDate.' '.$endTime){   
                                                  
                                                ?>
                                                <tr>
                                                    <td class="text-dark"><?=$index++?></td>
                                                    <td><a href="<?= $this -> bigbluebutton_lib -> getRecording($pvalue -> meeting_id)?>" ><?=  ucfirst($pvalue -> title)?></a></td>
                                                    <td><?=ucfirst($pvalue -> name)?></td>
                                                    <td>
                                                        <span><?=array_key_exists(0, $Pername)?$Pername[0]:''?></span>
                                                        <span class="text-success"><?=array_key_exists(1, $Pername)?$Pername[1]:''?></span>
                                                        <span class="text-danger"><?=array_key_exists(2, $Pername)?$Pername[2]:''?></span>
                                                    </td>
                                                    <td><?=$pvalue -> password?></td>
                                                    <?php
                                                            $timeZone = $time_zone;
                                                            $pmettingdate = date('Y-m-d H:i:s', strtotime($pvalue -> meeting_start_date.' '.$pvalue -> starting_time));
                                                            $pfinaltime = convertDateAndTime($pmettingdate, $timeZone);
                                                        ?>
                                                    <td class="fw-600"><?=$pfinaltime;?></td>

                                                    <td class="text-center">                                                       
                                                        <button type="button" name="" onclick="getagenda('<?=$pvalue -> id;?>')" class="btn btn-sm badge bg-primary m-b-5">Agenda</button>
                                                        <button type="button" name="" onclick="takeaway('<?=$pvalue -> id?>')" class="btn btn-sm badge bg-pink m-b-5">Takeaways</button>
                                                        <?php
                                                            if ($pvalue->takeaways != '') {
                                                        ?>
                                                        <a target="_blank" href="<?=site_url('author/get-meetingview/'.encode($pvalue->id))?>" class="btn btn-sm badge bg-warning m-b-5">View</a>

                                                        <?php
                                                            }
                                                        ?>
                                                        <a href="<?= $this -> bigbluebutton_lib -> getRecording($pvalue -> meeting_id)?>" class="btn btn-sm badge bg-success m-b-5"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                        
                                                    </td>
                                                </tr>
                                                <?php
                                                  }
                                                  }
                                                ?>                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade p-0" id="cancelled3" role="tabpanel" aria-labelledby="contact-tab3">
                                <div class="e-table">
                                    <div class="table-responsive table-lg text-nowrap">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Title</th>
                                                    <th>Organizer</th>
                                                    <th>Meeting Participants </th>
                                                    <th>Meeting Password</th>
                                                    <th>Date & Time</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                               
                                                 foreach($cancelMeeting as $cvalue){
                                                  
                                                  $Pername = __getmeetingstatus($cvalue -> id, $cvalue -> created_by);
                                                  $meetingStatus = 1;     
                                                ?>
                                                <tr>
                                                    <td class="text-dark"><?=$index++?></td>
                                                    <td><?=$cvalue->title?></td>
                                                    <td><?=$cvalue->name?></td>
                                                    <td>
                                                        <span><?=array_key_exists(0, $Pername)?$Pername[0]:''?></span>
                                                        <span class="text-success"><?=array_key_exists(1, $Pername)?$Pername[1]:''?></span>
                                                        <span class="text-danger"><?=array_key_exists(2, $Pername)?$Pername[2]:''?></span>
                                                    </td>
                                                    <td><?=$cvalue -> password?></td>
                                                    <?php
                                                            $ctimeZone = $time_zone;
                                                            $cmettingdate = date('Y-m-d H:i:s', strtotime($cvalue -> meeting_start_date.' '.$cvalue -> starting_time));
                                                            $cfinaltime = convertTime($cmettingdate, $ctimeZone);
                                                        ?>
                                                    <td class="fw-600"><?=$cfinaltime?></td>
                                                    <td class="text-center">
                                                        <button type="button" name="" class="btn btn-sm badge bg-primary m-b-5" onclick="getagenda('<?=$cvalue -> id;?>')">Agenda</button>
                                                        <button type="button" onclick="takeaway('<?=$cvalue -> id?>')" class="btn btn-sm badge bg-pink m-b-5">Takeaway</button>
                                                         <?php
                                                            if ($cvalue->takeaways != '') {
                                                        ?>
                                                        <a target="_blank" href="<?=site_url('author/get-meetingview/'.encode($cvalue->id))?>" class="btn btn-sm badge bg-warning m-b-5">View</a>
                                                        <?php
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php
                                                 }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--                         Meeting Participants Status start -->
                        <div>
                            <p><b>Meeting Participants</b>
                                <span class="badge badge-success mt-1 mb-1">Accepted</span>
                                <span class="badge badge-danger mt-1 mb-1">Declined</span>
                            </p>
                        </div>
                        <!--                         Meeting Participants Status End -->
                    </div>
                </div>
            </div>
        </div>
        <!--         sales summary Start -->
        <?php
             if($this -> session -> userdata('AyaUserRole') == 0){
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Today's Sales Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="e-table">
                            <div class="table-responsive table-lg text-nowrap">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Client Name</th>
                                            <th>Product ID</th>
                                            <th>Subscription Duration</th>
                                            <th>Product Cost</th>
                                            <th>Payment Mode</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-dark">#01</td>
                                            <td>Sean Blank</td>
                                            <td>Pro1234</td>
                                            <td>12-03-2020 to 13-06-2020 (3 Month)</td>
                                            <td class="fw-600">$14,500</td>
                                            <td>Online Payment</td>
                                            <td class="text-center">
                                                <span class="badge badge-success m-b-5">Free</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-dark">#02</td>
                                            <td>Sean Blank</td>
                                            <td>Pro4534</td>
                                            <td>12-03-2020 to 13-06-2020 (3 Month)</td>
                                            <td class="fw-600">$30,500</td>
                                            <td>cash On Delivered</td>
                                            <td class="text-center">
                                                <span class="badge badge-primary m-b-5">Basic</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-dark">#03</td>
                                            <td>Sean Blank</td>
                                            <td>Pro4534</td>
                                            <td>12-03-2020 to 13-06-2020 (3 Month)</td>
                                            <td class="fw-600">$30,500</td>
                                            <td>cash On Delivered</td>
                                            <td class="text-center">
                                                <span class="badge badge-info m-b-5">Enterprise</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-dark">#03</td>
                                            <td>Sean Blank</td>
                                            <td>Pro4534</td>
                                            <td>12-03-2020 to 13-06-2020 (3 Month)</td>
                                            <td class="fw-600">$30,500</td>
                                            <td>cash On Delivered</td>
                                            <td class="text-center">
                                                <span class="badge badge-warning m-b-5">Demo</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--         sales summary End 
                 sales summary With Tab Strat ************************************ -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tabs with Horizontal nav-pills</h4>
                    </div> 
                    <div class="card-body">
                        <ul class="nav nav-pills pb-3" id="myTab3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="sales-tab3" data-toggle="tab" href="#sales" role="tab" aria-controls="home" aria-selected="true">Today's Sales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="renewal-tab3" data-toggle="tab" href="#renewal" role="tab" aria-controls="profile" aria-selected="false">Today's Renewal</a> </li>
                            <li class="nav-item">
                                <a class="nav-link" id="expiry-tab3" data-toggle="tab" href="#expiry" role="tab" aria-controls="contact" aria-selected="false">Today's Subscription Expiry</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="total-tab3" data-toggle="tab" href="#total" role="tab" aria-controls="contact" aria-selected="false">Total Sales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="totalexpiry-tab3" data-toggle="tab" href="#totalexpiry" role="tab" aria-controls="contact" aria-selected="false">Total Subscription Expiry</a>
                            </li>
                        </ul>

                        <div class="tab-content border-top p-3">
                            <div class="tab-pane fade show active p-0" id="sales" role="tabpanel" aria-labelledby="sales-tab3">
                                <div class="e-table">
                                    <div class="table-responsive table-lg text-nowrap">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Client Name</th>
                                                    <th>Product ID</th>
                                                    <th>Subscription Duration</th>
                                                    <th>Product Cost</th>
                                                    <th>Payment Mode</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-dark">#01</td>
                                                    <td>Sean Blank</td>
                                                    <td>Pro1234</td>
                                                    <td>12-03-2020 to 13-06-2020 (3 Month)</td>
                                                    <td class="fw-600">$14,500</td>
                                                    <td>Online Payment</td>
                                                    <td class="text-center">
                                                        <span class="badge badge-success m-b-5">Free</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark">#02</td>
                                                    <td>Sean Blank</td>
                                                    <td>Pro4534</td>
                                                    <td>12-03-2020 to 13-06-2020 (3 Month)</td>
                                                    <td class="fw-600">$30,500</td>
                                                    <td>cash On Delivered</td>
                                                    <td class="text-center">
                                                        <span class="badge badge-primary m-b-5">Basic</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark">#03</td>
                                                    <td>Sean Blank</td>
                                                    <td>Pro4534</td>
                                                    <td>12-03-2020 to 13-06-2020 (3 Month)</td>
                                                    <td class="fw-600">$30,500</td>
                                                    <td>cash On Delivered</td>
                                                    <td class="text-center">
                                                        <span class="badge badge-info m-b-5">Enterprise</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark">#03</td>
                                                    <td>Sean Blank</td>
                                                    <td>Pro4534</td>
                                                    <td>12-03-2020 to 13-06-2020 (3 Month)</td>
                                                    <td class="fw-600">$30,500</td>
                                                    <td>cash On Delivered</td>
                                                    <td class="text-center">
                                                        <span class="badge badge-warning m-b-5">Demo</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade p-0" id="renewal" role="tabpanel" aria-labelledby="renewal-tab3">
                                <div class="e-table">
                                    <div class="table-responsive table-lg text-nowrap">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Client Name</th>
                                                    <th>Product ID</th>
                                                    <th>Subscription Duration</th>
                                                    <th>Product Cost</th>
                                                    <th>Payment Mode</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-dark">#01</td>
                                                    <td>Sean Blank</td>
                                                    <td>Pro1234</td>
                                                    <td>12-03-2020 to 13-06-2020 (3 Month)</td>
                                                    <td class="fw-600">$14,500</td>
                                                    <td>Online Payment</td>
                                                    <td class="text-center">
                                                        <span class="badge badge-success m-b-5">Free</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark">#02</td>
                                                    <td>Sean Blank</td>
                                                    <td>Pro4534</td>
                                                    <td>12-03-2020 to 13-06-2020 (3 Month)</td>
                                                    <td class="fw-600">$30,500</td>
                                                    <td>cash On Delivered</td>
                                                    <td class="text-center">
                                                        <span class="badge badge-primary m-b-5">Basic</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark">#03</td>
                                                    <td>Sean Blank</td>
                                                    <td>Pro4534</td>
                                                    <td>12-03-2020 to 13-06-2020 (3 Month)</td>
                                                    <td class="fw-600">$30,500</td>
                                                    <td>cash On Delivered</td>
                                                    <td class="text-center">
                                                        <span class="badge badge-info m-b-5">Enterprise</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark">#03</td>
                                                    <td>Sean Blank</td>
                                                    <td>Pro4534</td>
                                                    <td>12-03-2020 to 13-06-2020 (3 Month)</td>
                                                    <td class="fw-600">$30,500</td>
                                                    <td>cash On Delivered</td>
                                                    <td class="text-center">
                                                        <span class="badge badge-warning m-b-5">Demo</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> 
                            </div>
                            <div class="tab-pane fade p-0" id="expiry" role="tabpanel" aria-labelledby="expiry-tab3">
                                <div class="e-table">
                                    <div class="table-responsive table-lg text-nowrap">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Client Name</th>
                                                    <th>Product ID</th>
                                                    <th>Subscription Duration</th>
                                                    <th>Product Cost</th>
                                                    <th>Payment Mode</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-dark">#01</td>
                                                    <td>Sean Blank</td>
                                                    <td>Pro1234</td>
                                                    <td>12-03-2020 to 13-06-2020 (3 Month)</td>
                                                    <td class="fw-600">$14,500</td>
                                                    <td>Online Payment</td>
                                                    <td class="text-center">
                                                        <span class="badge badge-success m-b-5">Free</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark">#02</td>
                                                    <td>Sean Blank</td>
                                                    <td>Pro4534</td>
                                                    <td>12-03-2020 to 13-06-2020 (3 Month)</td>
                                                    <td class="fw-600">$30,500</td>
                                                    <td>cash On Delivered</td>
                                                    <td class="text-center">
                                                        <span class="badge badge-primary m-b-5">Basic</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark">#03</td>
                                                    <td>Sean Blank</td>
                                                    <td>Pro4534</td>
                                                    <td>12-03-2020 to 13-06-2020 (3 Month)</td>
                                                    <td class="fw-600">$30,500</td>
                                                    <td>cash On Delivered</td>
                                                    <td class="text-center">
                                                        <span class="badge badge-info m-b-5">Enterprise</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark">#03</td>
                                                    <td>Sean Blank</td>
                                                    <td>Pro4534</td>
                                                    <td>12-03-2020 to 13-06-2020 (3 Month)</td>
                                                    <td class="fw-600">$30,500</td>
                                                    <td>cash On Delivered</td>
                                                    <td class="text-center">
                                                        <span class="badge badge-warning m-b-5">Demo</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade p-0" id="total" role="tabpanel" aria-labelledby="total-tab3">
                                <div class="e-table">
                                    <div class="table-responsive table-lg text-nowrap">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Client Name</th>
                                                    <th>Product ID</th>
                                                    <th>Subscription Duration</th>
                                                    <th>Product Cost</th>
                                                    <th>Payment Mode</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-dark">#01</td>
                                                    <td>Sean Blank</td>
                                                    <td>Pro1234</td>
                                                    <td>12-03-2020 to 13-06-2020 (3 Month)</td>
                                                    <td class="fw-600">$14,500</td>
                                                    <td>Online Payment</td>
                                                    <td class="text-center">
                                                        <span class="badge badge-success m-b-5">Free</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark">#02</td>
                                                    <td>Sean Blank</td>
                                                    <td>Pro4534</td>
                                                    <td>12-03-2020 to 13-06-2020 (3 Month)</td>
                                                    <td class="fw-600">$30,500</td>
                                                    <td>cash On Delivered</td>
                                                    <td class="text-center">
                                                        <span class="badge badge-primary m-b-5">Basic</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark">#03</td>
                                                    <td>Sean Blank</td>
                                                    <td>Pro4534</td>
                                                    <td>12-03-2020 to 13-06-2020 (3 Month)</td>
                                                    <td class="fw-600">$30,500</td>
                                                    <td>cash On Delivered</td>
                                                    <td class="text-center">
                                                        <span class="badge badge-info m-b-5">Enterprise</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark">#03</td>
                                                    <td>Sean Blank</td>
                                                    <td>Pro4534</td>
                                                    <td>12-03-2020 to 13-06-2020 (3 Month)</td>
                                                    <td class="fw-600">$30,500</td>
                                                    <td>cash On Delivered</td>
                                                    <td class="text-center">
                                                        <span class="badge badge-warning m-b-5">Demo</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade p-0" id="totalexpiry" role="tabpanel" aria-labelledby="totalexpiry-tab3">
                                <div class="e-table">
                                    <div class="table-responsive table-lg text-nowrap">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Client Name</th>
                                                    <th>Product ID</th>
                                                    <th>Subscription Duration</th>
                                                    <th>Product Cost</th>
                                                    <th>Payment Mode</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-dark">#01</td>
                                                    <td>Sean Blank</td>
                                                    <td>Pro1234</td>
                                                    <td>12-03-2020 to 13-06-2020 (3 Month)</td>
                                                    <td class="fw-600">$14,500</td>
                                                    <td>Online Payment</td>
                                                    <td class="text-center">
                                                        <span class="badge badge-success m-b-5">Free</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark">#02</td>
                                                    <td>Sean Blank</td>
                                                    <td>Pro4534</td>
                                                    <td>12-03-2020 to 13-06-2020 (3 Month)</td>
                                                    <td class="fw-600">$30,500</td>
                                                    <td>cash On Delivered</td>
                                                    <td class="text-center">
                                                        <span class="badge badge-primary m-b-5">Basic</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark">#03</td>
                                                    <td>Sean Blank</td>
                                                    <td>Pro4534</td>
                                                    <td>12-03-2020 to 13-06-2020 (3 Month)</td>
                                                    <td class="fw-600">$30,500</td>
                                                    <td>cash On Delivered</td>
                                                    <td class="text-center">
                                                        <span class="badge badge-info m-b-5">Enterprise</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark">#03</td>
                                                    <td>Sean Blank</td>
                                                    <td>Pro4534</td>
                                                    <td>12-03-2020 to 13-06-2020 (3 Month)</td>
                                                    <td class="fw-600">$30,500</td>
                                                    <td>cash On Delivered</td>
                                                    <td class="text-center">
                                                        <span class="badge badge-warning m-b-5">Demo</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        
             }
        ?>
    </div>
</div>


<div class="modal fade" id="invite" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Send your invite</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <span id="errmsg" style="color:red"></span>
                <form action="<?=site_url('calender_controller/invite_email')?>" method="post" onsubmit="return valid();">
                    <input type="hidden" name="invite_link" id="invite_link" />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Invite Email ID<span style="color:red"> *</span></label>
                                <input type="text" name="email_id" id="email_id" class="form-control" placeholder="Valid Email ID"/>
                            </div>
                        </div>           
                         
                    </div>
                     <div class="modal-footer">
                     <button type="submit" class="btn btn-primary">Send Invite</button>
                     <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
                </form>
            </div>           
        </div>
    </div>
</div>

<div class="modal fade" id="takeawayModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Takeaway</h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div id="takeawayblock">
              
               
            </div>
            
        </div>
    </div>
</div>


<div class="modal fade" id="editMeeting" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update meeting details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <span id="errmsg" style="color:red"></span>
                <form action="<?=site_url('calender_controller/update_meeting_success')?>" method="post" onsubmit="return valid();">
                <input type="hidden" name="update_id" id="update_id" />
                <input type="hidden" name="meeting_start_date" id="meeting_start_date" />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Meeting Title<span style="color:red"> *</span></label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Meeting Title"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Meeting ID<span style="color:red"> *</span></label>
                                <input type="text" readonly="readonly" name="meeting_id" id="meeting_id"  class="form-control" placeholder="Meeting ID"/>
                            </div>
                        </div>                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Email ID<span style="color:red"> *</span></label>
                                <input type="text" name="register_id" id="register_id" class="form-control" placeholder="Email ID"/>
                            </div>
                        </div>
                        
                         <div class="col-md-6">
                            <div class="form-group">
                                <label>Staring Time<span style="color:red"> *</span></label>
                                <input type="time" name="starting_time" id="starting_time"  class="form-control" placeholder="Starting Time"/>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label>Ending Time<span style="color:red"> *</span></label>
                                <input type="time" name="ending_time" id="ending_time"  class="form-control" placeholder="Ending Time"/>
                            </div>
                        </div>
                         <div class="col-md-12">
                            <div class="form-group">
                                <label>Agenda<span style="color:red"> *</span></label>
                                <textarea name="agenda" id="agenda" placeholder="Agenda" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                     <div class="modal-footer">
                     <button type="submit" onclick="getData();" class="btn btn-primary">Save changes</button>
                     <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
                </form>
   
            </div>           
        </div>
    </div>
</div>


<div class="modal fade" id="agendaModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Meeting Agenda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-0" id="view_agenda">
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">


$(document).ready(function(){
    $(".join_meeting").click(function(){
        var meeting_id = $(this).data('id');
        $.ajax({
            type: 'post',
            url: '<?=base_url('calender_controller/meeting_active')?>',
            data: 'meeting_id='+ meeting_id,
            cache: false,
            success: function(data){ 
            if(data != 0){
                window.location.href = data;
            }else{
                alert("Somethings wrong");
            }     
         }
        });
    })
})
   
   function takeaway(meetingid){       
       $.ajax({
           type: 'post',
           url: '<?=base_url('author/get-takeaway');?>',
           data: 'meeting_id='+ meetingid,
           cache: false,
         success: function(data){ 
          $("#takeawayblock").html(data);   
          $("#takeawayModel").modal('show');          
         }
       })
   }
   
   function takeawaysuccess(){
       var meeting_id = $("#meeting_id").val();
       var takeaway = $("#takeaway").val();
       if(meeting_id != 0){
       $.ajax({
           type: 'post',
           url: '<?=base_url('author/takeaway-success');?>',
           data: 'meeting_id='+ meeting_id+ '&takeaway='+ takeaway,
           cache: false,
         success: function(data){ 
          $('#takeawayModel').remove();
          window.location.href = '';
         }
       })
      }else{
        $('#takeawayModel').remove();
      }
   }
   function getagenda(meeting_id){
     $.ajax({
         type: 'post',
         url: '<?php echo base_url('author/get-agenda')?>',
         data: 'meeting_id='+ meeting_id,
         cache: false,
         success: function(data){
          $("#agendaModel"). modal('show');          
          $("#view_agenda").html(data);
         }
     })  
   }
   
   function acceptmeeting(id, schedule_id){
   if(confirm("Are you want to confirm the meeting request?")){
    $.ajax({
         type: 'post',
         url: '<?php echo base_url('author/accept-meeting')?>',
         data: 'schedule_id='+ schedule_id+ '&status=1',
         cache: false,
         success: function(data){
          $("#successmsg").html("Thanks for accepted the meeting request.");
          $("#"+id).html(data);
         }
     })
     }
   }

   function editmeeting(meeting_id){
    $.ajax({
        type: 'post',
        url: '<?=base_url('calender_controller/get_meeting_details')?>',
        data: 'meeting_id='+ meeting_id,
        dataType: "json",
        cache: false,
        success: function(data){
            
            $("#title").val(data.title);
            $("#meeting_id").val(data.meeting_id);
            $("#starting_time").val(data.starting_time);
            $("#ending_time").val(data.ending_time);
            $("#meeting_start_date").val(data.meeting_start_date);
            $("#agenda").val(data.agenda);
            $("#update_id").val(data.id);
            $("#register_id").val(data.p_id); 
            $("#editMeeting"). modal('show');
        }
    })    
   }

    function cancelmeetingbycreator(id){
    if(confirm("Are you realy want to cancel this meeting?")){
    $.ajax({
         type: 'post',
         url: '<?php echo base_url('calender_controller/cancelByCeratory')?>',
         data: 'schedule_id='+ id+ '&status=0',
         cache: false,
         success: function(data){
          window.location.href = '';
         }
     })
    }
   }
   
    function cancelmeeting(id, schedule_id){
    if(confirm("Are you realy want to reject the meeting request?")){
    $.ajax({
         type: 'post',
         url: '<?php echo base_url('author/accept-meeting')?>',
         data: 'schedule_id='+ schedule_id+ '&status=2',
         cache: false,
         success: function(data){
          $("#errmsg").html("You have canceled a meeting request.");
          $("#"+id).html(data);
         }
     })
    }
   }


   function sendinvite(schedule_id){

    $.ajax({
         type: 'post',
         url: '<?php echo base_url('calender_controller/get_share_details')?>',
         data: 'schedule_id='+ schedule_id,
         cache: false,
         success: function(data){
            $("#invite_link").val(data);
            $("#invite"). modal('show');       
         }
    })
    
   }
   
 

</script>
