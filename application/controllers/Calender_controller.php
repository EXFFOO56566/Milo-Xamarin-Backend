<?php
    class Calender_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this -> load -> model('calender_model');
        $this -> load -> model('author_model');
        $this -> load -> model('subscription_model');
        $this -> load -> library('bigbluebutton_lib');
        $this -> load -> library('timezone');
    }

    public function meetting_schedule() {  
         
        if ($this->authchecking() != 0) {
            $data['title'] = 'Meeting Schedule';
            $data['meeting_id'] = $this -> calender_model -> getnextMeetingId();
            //$data['RegisterData'] = $this -> calender_model -> registerDataWithEmail();
            $data['plan_details'] = $this -> subscription_model -> getactivepackage();
            $this->load->adminTemplate('admin/calender', $data);
        } else {
            redirect('logout');
        }
    }
    
    public function meeting_create_success(){

     
       
      $ParticipateArray = getregisteridinarray($this -> input -> post('register_id'));
      
      array_push($ParticipateArray, $this -> session -> userdata('AyaUserLoginId'));
      $status = $this -> author_model -> activePackagename();
      if($status != 'No package'){     
      $totalMeeting = $this -> author_model -> totalMeeting();
      $createdMeeting = $this -> author_model -> createdMeeting();
      $plan_details = $this -> subscription_model -> getactivepackage();



     if($plan_details -> max_participants >= (count($ParticipateArray) - 1)){
     if(($totalMeeting - $createdMeeting) > 0){
     $activePackageId = $this -> db -> select('purchase_id') ->from('register')-> where(['id' => $this -> session -> userdata('AyaUserLoginId')]) -> get() -> result();
    
      $meetingId = $this -> input -> post('meeting_id').rand(10000, 99999);


      /* Send Mail */


      $data = [
        'title' => $this -> input -> post('title'),
        'starting_time' => date("h:i:s A", strtotime($this -> input -> post('starting_time'))),
        'ending_time' => date("h:i:s A", strtotime($this -> input -> post('ending_time'))),
        'meeting_start_date' => date('d/m/Y', strtotime($this -> input -> post('meeting_start_date'))),
        'url' => base_url('invite-meeting/'.$meetingId),
        'agenda' => $this -> input -> post('agenda')
        ];

        
        $this->load->library('email'); 
        
        $config = array(
        'protocol' => 'smtp',
        'smtp_host' => SMTP_HOST,
        'smtp_port' => 465,
        'smtp_user' => SMTP_USER,
        'smtp_pass' => SMTP_PASS,
        'mailtype' => 'html',
        'charset' => 'utf-8'
        );


      $emailIDExplode = explode(',', $this -> input -> post('register_id'));

      foreach($emailIDExplode as $s__email){
        $data['email_id'] = $s__email;
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        $message = $this -> load -> view('mail/invite_meeting_mail', $data, TRUE); 

        $this->email->to($s__email);
        $this->email->from(SMTP_USER,'Invite Link');

        $this->email->subject('Invite for new meeting');
        $this->email->message($message);
        $this->email->send();

      }







      $password = rand(1000, 9999);
    
      $timezone = gettimezone();
      $mettingStartDate = convertDate(date("Y-m-d H:i:s", strtotime($this -> input -> post('meeting_start_date').' '.$this -> input -> post('starting_time'))), 'Asia/Kolkata', $timezone);
      $mettingEndDate = convertDate(date("Y-m-d H:i:s", strtotime($this -> input -> post('meeting_end_date').' '.$this -> input -> post('ending_time'))), 'Asia/Kolkata', $timezone);     
      $startTime = convertTime(date("Y-m-d H:i:s", strtotime($this -> input -> post('meeting_start_date').' '.$this -> input -> post('starting_time'))), 'Asia/Kolkata', $timezone);
      $endTime = convertTime(date("Y-m-d H:i:s", strtotime($this -> input -> post('meeting_end_date').' '.$this -> input -> post('ending_time'))), 'Asia/Kolkata', $timezone);


      $InsertData = [
          'title' => $this -> input -> post('title'),
          'meeting_id' => $meetingId,
          'meeting_start_date' => $mettingStartDate,
          'meeting_end_date' => $mettingEndDate,
          'starting_time' => $startTime,
          'ending_time' => $endTime,
          'created_by' => $this -> session -> userdata('AyaUserLoginId'),
          'agenda' => $this -> input -> post('agenda'),
          'password' => $password,
          'plan_id' => $activePackageId[0] -> purchase_id,
          'internalMeetingID' => '',
          'parentMeetingID' => '',
          'attendeePW' => '',
          'moderatorPW' => '',
          'dialNumber' => '',
          'created_at' => date('Y-m-d', time()),
      ];
      
      
      $SheduleId =$this -> calender_model -> adddata($InsertData); 
      
      if($SheduleId != ''){
        foreach($ParticipateArray as $value){
          if($this -> session -> userdata('AyaUserLoginId') == $value){
          $detailsArray = [
              'schedule_id' => $SheduleId,
              'participate_id' => $value,
              'status' => '1',
              'created_at' => date('Y-m-d', time())
          ];
          }else{
            $detailsArray = [
              'schedule_id' => $SheduleId,
              'participate_id' => $value,
              'status' => '0',
              'created_at' => date('Y-m-d', time())
          ];  
          }
          
          $this -> calender_model -> adddetailsdata($detailsArray); 
        }
        $this -> session -> set_flashdata('successmsg', 'New meeting schedule has been created successfully.');
        redirect('author/meeting-schedule');  
      }else{
        $this -> session -> set_flashdata('errmsg', 'Data inster error.');
        redirect('author/meeting-schedule');   
      }
    
     }else{
        $this -> session -> set_flashdata('errmsg', 'Insufficient meeting limit.');
        redirect('author/meeting-schedule');   
     }
     }else{
        $this -> session -> set_flashdata('errmsg', 'You can add maximum '.$plan_details -> max_participants.' participants.');
        redirect('author/meeting-schedule');   
     }
     }else{
         $this -> session -> set_flashdata('errmsg', 'You have no active plan.');
         redirect('author/meeting-schedule'); 
     }
    }

    public function update_meeting_success(){
      $timezone = gettimezone();
      $mettingStartDate = convertDate(date("Y-m-d H:i:s", strtotime($this -> input -> post('meeting_start_date').' '.$this -> input -> post('starting_time'))), 'Asia/Kolkata', $timezone);
      $mettingEndDate = convertDate(date("Y-m-d", strtotime($this -> input -> post('meeting_end_date').' '.$this -> input -> post('ending_time'))), 'Asia/Kolkata', $timezone);
      $startTime = convertTime(date("Y-m-d H:i:s", strtotime($this -> input -> post('meeting_start_date').' '.$this -> input -> post('starting_time'))), 'Asia/Kolkata', $timezone);
      $endTime = convertTime(date("Y-m-d H:i:s", strtotime($this -> input -> post('meeting_end_date').' '.$this -> input -> post('ending_time'))), 'Asia/Kolkata', $timezone);
      $this -> db -> where('id', $this -> input -> post('update_id')) -> update('meeting_schedule', ['title' => $this -> input -> post('title'), 'starting_time' => $startTime, 'ending_time' => $endTime, 'agenda' => $this -> input -> post('agenda')]);
      $this -> db-> delete('meeting_schedule_details', ['schedule_id' => $this -> input -> post('update_id'), 'status !=' => '1']);


      $data = [
        'title' => $this -> input -> post('title'),
        'starting_time' => date("h:i:s A", strtotime($this -> input -> post('starting_time'))),
        'ending_time' => date("h:i:s A", strtotime($this -> input -> post('ending_time'))),
        'meeting_start_date' => date('d/m/Y', strtotime($this -> input -> post('meeting_start_date'))),
        'url' => base_url('invite-meeting/'.$meetingId),
        'agenda' => $this -> input -> post('agenda')
        ];

        
        $this->load->library('email'); 
        
        $config = array(
        'protocol' => 'smtp',
        'smtp_host' => SMTP_HOST,
        'smtp_port' => 465,
        'smtp_user' => SMTP_USER,
        'smtp_pass' => SMTP_PASS,
        'mailtype' => 'html',
        'charset' => 'utf-8'
        );


      $emailIDExplode = explode(',', $this -> input -> post('register_id'));

      foreach($emailIDExplode as $s__email){
        $data['email_id'] = $s__email;
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        $message = $this -> load -> view('mail/invite_meeting_mail', $data, TRUE); 

        $this->email->to($s__email);
        $this->email->from(SMTP_USER,'Invite Link');

        $this->email->subject('Invite for new meeting');
        $this->email->message($message);
        $this->email->send();

      }

      $ParticipateArray = getregisteridinarray($this -> input -> post('register_id'));

      foreach($ParticipateArray as $r__id){
        $this -> db -> insert('meeting_schedule_details', ['schedule_id' => $this -> input -> post('update_id'), 'participate_id' => $r__id, 'status' => '0', 'created_at' => date('Y-m-d', time())]);
      }

      redirect('author/dashboard');

    }

    public function get_meeting_details(){
      $meeting_id = $this -> input -> post('meeting_id');
      $result = $this -> calender_model -> meetingDetails($meeting_id);

      $email_id = $this -> db -> select('R.email_id') 
                        -> from('meeting_schedule_details as S') 
                        -> join('register as R', 'R.id = S.participate_id', 'inner')
                        -> where('S.schedule_id', $meeting_id)
                        -> where('S.participate_id !=', $result[0] -> created_by)
                        -> get()
                        -> result();

      $d__result = '';

      foreach($email_id as $e_value){
        if($d__result != ''){
          $d__result = $d__result.','.$e_value -> email_id;
        }else{
          $d__result = $e_value -> email_id;
        }
      }
    

      $r__array = [
        'title' => $result[0] -> title,
        'meeting_id' => $result[0] -> meeting_id,
        'meeting_start_date' => $result[0] -> meeting_start_date,
        'starting_time' => $result[0] -> starting_time,
        'ending_time' => $result[0] -> ending_time,
        'agenda' => $result[0] -> agenda,
        'p_id' => $d__result,
        'id' => $result[0] -> id
      ];
      echo json_encode(($r__array));
      die;

     
    }
      
    public function get_event_list(){        
        $Result = $this -> calender_model -> view('meeting_schedule');
        echo $Result;
    } 
    
    public function get_agenda(){
        $meeting_id = $this -> input -> post("meeting_id");
        $Result = $this -> db -> select('agenda') -> from('meeting_schedule') -> where('id', $meeting_id) -> get() -> result();  
        echo $Result[0] -> agenda;
    }
    
    public function get_meetingview($meeting_id){
      $meeting_id = decode($meeting_id);
      $this->load->library('pdf');
      $data['meeting_details'] = $this -> author_model -> meetingView(['m.id' => $meeting_id]);
      $html = $this -> load -> view('admin/meeting-pdf', $data, TRUE);
      $this->pdf->createPDF($html, $meeting_id, false);
    }

    public function cancelByCeratory(){       
      $scheduleId = $this -> input -> post('schedule_id');       
      $Status = $this -> input -> post('status');       
      $this -> db -> where(['meeting_id' => $scheduleId]) -> update('meeting_schedule', ['meeting_status' => $Status]);       
      echo 1;   
      }
    
    public function get_takeaway(){
        $meeting_id = $this -> input -> post("meeting_id");
        $Result = $this -> db -> select(['takeaways', 'created_by']) -> from('meeting_schedule') -> where('id', $meeting_id) -> get() -> result();  
        if($Result[0] -> created_by == $this -> session -> userdata('AyaUserLoginId')){
?>
    <div class="modal-body">
      <p class="mb-0"> </p>              
         <div class="form-group">

             <input type="hidden" name="meeting_id" id="meeting_id" value="<?= $meeting_id ?>"/>
             <label>Takeaway<span style="color:red"> *</span></label>
             <textarea name="takeaway" id="takeaway" class="form-control" placeholder="takeaway"><?= $Result[0]->takeaways ?></textarea>
          </div>                
     </div>
     <div class="modal-footer">    
         <button class="btn btn-primary" name="submit" onclick="takeawaysuccess()">Save</button>
         <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
     </div>
<?php
}else{
?>
   <div class="modal-body">
      <p class="mb-0" id="agenda">
          <?= $Result[0]->takeaways ?>
      </p>
   </div>
   <div class="modal-footer">
   <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
   </div>
<?php
        }
    }
    
    
    public function takeaway_success(){
       $this -> db -> update('meeting_schedule', ['takeaways' => $this -> input -> post('takeaway')], ['id' => $this -> input -> post('meeting_id')]); 
       echo 1;       
    }

    public function template(){
      $this -> load -> view('mail/invite_mail');

    }
    
    public function invite_email(){

      $exploadeData = explode('-100-', $this -> input -> post('invite_link'));
     
      $data = [
        'title' => $exploadeData[0],
        'name' => $exploadeData[1],
        'starting_time' => $exploadeData[2],
        'meeting_start_date' => $exploadeData[3],
        'ending_time' => $exploadeData[4],
        'agenda' => $exploadeData[5],
        'url' => $exploadeData[6]
      ];
      

    // $this -> load -> view('mail/invite_mail', $data);

      
    $this->load->library('email'); 

    $config = array(
      'protocol' => 'smtp',
      'smtp_host' => SMTP_HOST,
      'smtp_port' => 465,
      'smtp_user' => SMTP_USER,
      'smtp_pass' => SMTP_PASS,
      'mailtype' => 'html',
      'charset' => 'utf-8'
  );

   $mulEmail = explode(",", $this -> input -> post('email_id'));

   foreach($mulEmail as $s__email){
    $data['email_id'] = $s__email;
    $this->email->initialize($config);
    $this->email->set_mailtype("html");
    $this->email->set_newline("\r\n");
    $message = $this -> load -> view('mail/invite_mail', $data, TRUE);                

    $this->email->to($s__email);
    $this->email->from(SMTP_USER,'Invite Link');

    $this->email->subject('Invite for new meeting');
    $this->email->message($message);
    if(!$this->email->send()){
    $this -> session -> set_flashdata('successmsg', 'Invaild Email ID.');
    redirect('author/dashboard');
    }
    }
    
      $this -> session -> set_flashdata('successmsg', 'Invite mail has been sent successfully.');
      redirect('author/dashboard');
    } 
    
    
    
    public function accept_metting_by_user(){
      $scheduleId = $this -> input -> post('schedule_id');
      $Status = $this -> input -> post('status');
      $this -> db -> where(['schedule_id' => $scheduleId, 'participate_id' => $this -> session -> userdata('AyaUserLoginId')]) -> update('meeting_schedule_details', ['status' => $Status]);
      $meetingStatus = __getmeetingPresentstatus($scheduleId); 
      $meetingDetails = __getmeetingDetails($scheduleId);
?>
 <?php
  if($meetingStatus == 1){
  $url = $this -> bigbluebutton_lib -> joinMeeting($meetingDetails -> meeting_id, $meetingDetails -> attendeePW, $this -> session -> userdata('AyaUserName'));

  ?>
   <a href="<?=$url?>" class="btn btn-sm badge bg-success m-b-5">Join</a>
  <?php
    }else if($meetingStatus == 0){
  ?>
  <button type="button" name="" onclick="acceptmeeting('todayMeeting', '<?=$scheduleId;?>');" class="btn btn-sm badge bg-success m-b-5">Accept</button>
  <button type="button" name="" class="btn btn-sm badge bg-danger m-b-5">Cancel</button>
  <?php
    }
  ?>  
  <button type="button" name="" onclick="getagenda('<?=$scheduleId;?>')" class="btn btn-sm badge bg-primary m-b-5">Agenda</button>
  <button type="button" name="" class="btn btn-sm badge bg-pink m-b-5">Takeaways</button>
  <button type="button" name="" class="btn btn-sm badge bg-warning m-b-5">View</button>

<?php 
    }
    
    private function authchecking(){
       if($this -> session -> userdata('AyaUserLoginId') != ''){
           return 1;
       }else{
           return 0;
       }
    }

    public function meeting_active(){
      $meetingDetails = __getmeetingDetails($this -> input -> post('meeting_id'));
      $api__res = $this -> bigbluebutton_lib -> createMeeting($meetingDetails -> meeting_id, $meetingDetails -> title, $meetingDetails -> password);
      if($api__res['returncode'] == 'SUCCESS'){
        $this -> db -> where('id', $this -> input -> post('meeting_id')) -> update('meeting_schedule', ['internalMeetingID' => $api__res['internalMeetingID'], 'parentMeetingID' => $api__res['parentMeetingID'], 'attendeePW' => $api__res['attendeePW'], 'moderatorPW' => $api__res['moderatorPW'], 'dialNumber' => $api__res['dialNumber']]);
        echo $this -> meetingurl($api__res['meetingID'], $api__res['attendeePW'], $this -> session -> userdata('AyaUserName'));
      }else{
        echo 0;
      }
    }

    public function get_share_details(){
      $meetingDetails = __getmeetingDetails($this -> input -> post('schedule_id'));
      $meetingCreatorName = $this -> db -> select('name') -> from('register') -> where(['id' => $meetingDetails -> created_by]) -> get() -> result();      
      echo $meetingDetails -> title.'-100-'.$meetingCreatorName[0] -> name.'-100-'.$meetingDetails -> starting_time.'-100-'.$meetingDetails -> meeting_start_date.'-100-'.$meetingDetails -> ending_time.'-100-'.$meetingDetails -> agenda.'-100-'.$this -> meetingurl($meetingDetails -> meeting_id, $meetingDetails -> attendeePW, $this -> session -> userdata('AyaUserName'));
    }

    public function meetingurl($meetingID, $attendeePW, $username){
      return $this -> bigbluebutton_lib -> joinMeeting($meetingID, $attendeePW, $username);
    }

    public function invite_meeting($meeting_id){
       $meetingHistory = $this -> db -> select(['attendeePW', 'created_by']) -> from('meeting_schedule') -> where('meeting_id', $meeting_id) -> get() -> result();
       
       $meetingCreatorName = $this -> db -> select('name') -> from('register') -> where(['id' => $meetingHistory[0] -> created_by]) -> get() -> result();      

       if(count($meetingHistory)){

          $meetingurl = $this -> meetingurl($meeting_id, $meetingHistory[0] -> attendeePW, $meetingCreatorName[0] -> name);
        
          echo "<script>window.location.href='$meetingurl'</script>";
          die;
       }else{
         echo "Meeting is not start yet";
       }
    }

}

?>