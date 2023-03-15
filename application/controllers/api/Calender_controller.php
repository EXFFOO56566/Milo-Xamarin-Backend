<?php
    class Calender_controller extends CI_Controller{
        
        public function __construct() {
            parent::__construct();
            $this -> load ->library(['json','app_authorization']);
            $this -> load -> model('calender_app_model');
            $this -> load -> model('author_model');
            $this -> load -> library('timezone');
            
        }
        
        public function update_takeaway(){
          if($this -> input -> method() == 'post'): 
            if($this ->app_authorization->loginchecking($this -> input -> post('token_code')) == true):
             $RegisterId = $this -> app_authorization -> getRegisterId($this->input->post('token_code'));
             if($this -> db -> where(['created_by' => $RegisterId, 'id' => $this -> input -> post('meeting_id')]) -> count_all_results('meeting_schedule') > 0):
                 if($this -> calender_app_model -> update('meeting_schedule', ['takeaways' => $this -> input -> post('takeaways')], ['id' => $this -> input -> post('meeting_id')])):
                 die($this -> json-> encode(['status'=> 1, 'msg' => 'Takeaways update successfully.']));
                 else:
                   die($this -> json-> encode(['status'=> 0, 'msg' => 'Takeaways update error or you have no change.']));  
                 endif;                  
             else:
             die($this -> json-> encode(['status'=> 0, 'msg' => 'Unnkown meeting organizer.']));    
             endif;
            else:
             die($this -> json-> encode(['status'=> 0, 'msg' => 'Unauthorized User.']));   
            endif;
          else: 
           die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.']));    
          endif;  
        }
        
        public function registered_list(){
            if($this -> input -> method() == 'post'): 
            if($this ->app_authorization->loginchecking($this -> input -> post('token_code')) == true):
            $registerdata = $this ->calender_app_model -> registerData($this -> input -> post('token_code'));  
            if(count($registerdata) > 0):
            die($this -> json-> encode(['status'=> 1, 'data' => $registerdata]));
            else:
            die($this -> json-> encode(['status'=> 0, 'msg' => 'No records found']));    
            endif;
            else:
              die($this -> json-> encode(['status'=> 0, 'msg' => 'Unauthorized User.']));  
            endif;
            else:
               die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.'])); 
            endif;
        }
        
        public function user_details(){
            if($this -> input -> method() == 'post'): 
            if($this ->app_authorization->loginchecking($this -> input -> post('token_code')) == true):
            $registerdata = $this ->calender_app_model -> userdetails($this -> input -> post('token_code'));  
            if(count($registerdata) > 0):
            die($this -> json-> encode(['status'=> 1, 'data' => $registerdata[0]]));
            else:
            die($this -> json-> encode(['status'=> 0, 'msg' => 'No records found']));    
            endif;
            else:
              die($this -> json-> encode(['status'=> 0, 'msg' => 'Unauthorized User.']));  
            endif;
            else:
               die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.'])); 
            endif;
        }
        
        public function search_user(){
           if($this -> input -> method() == 'post'): 
            if($this ->app_authorization->loginchecking($this -> input -> post('token_code')) == true):
            $registerdata = $this ->calender_app_model -> searchuserdetails($this -> input -> post('search_key'));  
            if(count($registerdata) > 0):
            die($this -> json-> encode(['status'=> 1, 'data' => $registerdata]));
            else:
            die($this -> json-> encode(['status'=> 0, 'msg' => 'No records found']));    
            endif;
            else:
              die($this -> json-> encode(['status'=> 0, 'msg' => 'Unauthorized User.']));  
            endif;
            else:
               die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.'])); 
            endif; 
        }
        
        
          public function add_meeting(){
            if($this -> input -> method() == 'post'): 
            if($this ->app_authorization->loginchecking($this -> input -> post('token_code')) == true):
            
            if ($this->input->post('title') != ''):
                $InsertData['title'] = $this->input->post('title');
            else:
                die($this->json->encode(['status' => 0, 'msg' => 'Require meeting title.']));
            endif;           
            
            if ($this->input->post('register_id') != ''):
                $ParticipateId =  getregisteridinarray($this -> input -> post('register_id'));
            else:
                die($this->json->encode(['status' => 0, 'msg' => 'Require participate name.']));
            endif;            


            $timezone = gettimezoneApi($this -> input -> post('token_code'));   
            
            
            if ($this->input->post('meeting_start_date') != ''):
                if($this->input->post('meeting_start_date') >= date('Y-m-d')){
                $InsertData['meeting_start_date'] = convertDate(date("Y-m-d H:i:s", strtotime($this -> input -> post('meeting_start_date').' '.$this -> input -> post('starting_time'))), 'Asia/Kolkata', $timezone);
                }else{
                die($this->json->encode(['status' => 0, 'msg' => 'Require valid start date.']));    
                }
            else:
                die($this->json->encode(['status' => 0, 'msg' => 'Require meeting start date.']));
            endif;
            
             if ($this->input->post('meeting_end_date') != ''):
                if($this->input->post('meeting_start_date') <= $this->input->post('meeting_end_date')){
                $InsertData['meeting_end_date'] = convertDate(date("Y-m-d H:i:s", strtotime($this -> input -> post('meeting_end_date').' '.$this -> input -> post('ending_time'))), 'Asia/Kolkata', $timezone);
                }else{
                die($this->json->encode(['status' => 0, 'msg' => 'Invalid end date.']));    
                }
            else:
                die($this->json->encode(['status' => 0, 'msg' => 'Require meeting end date.']));
            endif;
            
            
            if ($this->input->post('starting_time') != ''):
                $InsertData['starting_time'] = convertTime(date("Y-m-d H:i:s", strtotime($this -> input -> post('meeting_start_date').' '.$this -> input -> post('starting_time'))), 'Asia/Kolkata', $timezone);
            else:
                die($this->json->encode(['status' => 0, 'msg' => 'Require meeting start time.']));
            endif;
            
             if ($this->input->post('ending_time') != ''):
                if($this->input->post('starting_time') <= $this->input->post('ending_time')){
                $InsertData['ending_time'] = convertTime(date("Y-m-d H:i:s", strtotime($this -> input -> post('meeting_end_date').' '.$this -> input -> post('ending_time'))), 'Asia/Kolkata', $timezone);
                }else{
                die($this->json->encode(['status' => 0, 'msg' => 'Invalid end time.']));    
                }
            else:
                die($this->json->encode(['status' => 0, 'msg' => 'Require meeting end time.']));
            endif;

            $ParticipateArray = [];
            foreach($ParticipateId as $pvalue){
               $ParticipateArray[] = $pvalue;
            }          
            
            if ($this->input->post('agenda') != ''):
                $InsertData['agenda'] = $this->input->post('agenda');
            else:
                die($this->json->encode(['status' => 0, 'msg' => 'Require meeting agenda.']));
            endif;            

            $InsertData['meeting_id'] = $this -> calender_app_model -> getnextMeetingId($this->input->post('token_code'));
            $InsertData['created_by'] = $this -> app_authorization -> getRegisterId($this->input->post('token_code'));
            $InsertData['created_at'] = date("Y-m-d H:i:s", time());
            $InsertData['password'] = rand(1000, 9999);
            array_push($ParticipateArray, $InsertData['created_by']);
            
            $data = [
                'title' => $this -> input -> post('title'),
                'starting_time' => date("h:i:s A", strtotime($this -> input -> post('starting_time'))),
                'ending_time' => date("h:i:s A", strtotime($this -> input -> post('ending_time'))),
                'meeting_start_date' => date('d/m/Y', strtotime($this -> input -> post('meeting_start_date'))),
                'url' =>  base_url('invite-meeting/'.$InsertData['meeting_id']),
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


            
            
            $InsertId = $this -> calender_app_model -> adddata($InsertData);
            if($InsertId != ''){
               foreach($ParticipateArray as $ivalue){
                if($ivalue != $InsertData['created_by']){
                $this -> calender_app_model -> adddetailsdata(['schedule_id' => $InsertId, 'participate_id' => $ivalue, 'status' => '0', 'created_at' => $InsertData['created_at'], 'insert_by' => 1]);
                }else{
                $this -> calender_app_model -> adddetailsdata(['schedule_id' => $InsertId, 'participate_id' => $ivalue, 'status' => '1', 'created_at' => $InsertData['created_at'], 'insert_by' => 1]);
                }                
            }                
            }else{
             die($this -> json-> encode(['status'=> 0, 'msg' => 'Meeting schedule error. please try again.']));   
            }
            die($this -> json-> encode(['status'=> 1, 'msg' => 'Meeting created successfully.']));
            else:
              die($this -> json-> encode(['status'=> 0, 'msg' => 'Unauthorized User.']));  
            endif;
            else:
               die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.'])); 
            endif;
        }

        public function update_meeting(){
          if($this -> input -> method() == 'post'): 
          if($this ->app_authorization->loginchecking($this -> input -> post('token_code')) == true):
          
          if ($this->input->post('title') != ''):
              $InsertData['title'] = $this->input->post('title');
          else:
              die($this->json->encode(['status' => 0, 'msg' => 'Require meeting title.']));
          endif;           
          
          if ($this->input->post('register_id') != ''):
              $ParticipateId =  getregisteridinarray($this -> input -> post('register_id'));
          else:
              die($this->json->encode(['status' => 0, 'msg' => 'Require participate name.']));
          endif;            
    
          $timezone = gettimezoneApi($this -> input -> post('token_code'));   
          
    
          
          if ($this->input->post('meeting_start_date') != ''):
              if($this->input->post('meeting_start_date') >= date('Y-m-d')){
              $InsertData['meeting_start_date'] = convertDate(date("Y-m-d H:i:s", strtotime($this -> input -> post('meeting_start_date').' '.$this -> input -> post('starting_time'))), 'Asia/Kolkata', $timezone);
              }else{
              die($this->json->encode(['status' => 0, 'msg' => 'Require valid start date.']));    
              }
          else:
              die($this->json->encode(['status' => 0, 'msg' => 'Require meeting start date.']));
          endif;
          
           if ($this->input->post('meeting_end_date') != ''):
              if($this->input->post('meeting_start_date') <= $this->input->post('meeting_end_date')){
              $InsertData['meeting_end_date'] = convertDate(date("Y-m-d H:i:s", strtotime($this -> input -> post('meeting_end_date').' '.$this -> input -> post('ending_time'))), 'Asia/Kolkata', $timezone);
              }else{
              die($this->json->encode(['status' => 0, 'msg' => 'Invalid end date.']));    
              }
          else:
              die($this->json->encode(['status' => 0, 'msg' => 'Require meeting end date.']));
          endif;
          
          
          if ($this->input->post('starting_time') != ''):
              $InsertData['starting_time'] = convertTime(date("Y-m-d H:i:s", strtotime($this -> input -> post('meeting_start_date').' '.$this -> input -> post('starting_time'))), 'Asia/Kolkata', $timezone);
          else:
              die($this->json->encode(['status' => 0, 'msg' => 'Require meeting start time.']));
          endif;
          
           if ($this->input->post('ending_time') != ''):
              if($this->input->post('starting_time') <= $this->input->post('ending_time')){
              $InsertData['ending_time'] = convertTime(date("Y-m-d H:i:s", strtotime($this -> input -> post('meeting_end_date').' '.$this -> input -> post('ending_time'))), 'Asia/Kolkata', $timezone);
              }else{
              die($this->json->encode(['status' => 0, 'msg' => 'Invalid end time.']));    
              }
          else:
              die($this->json->encode(['status' => 0, 'msg' => 'Require meeting end time.']));
          endif;

          $ParticipateArray = [];
          foreach($ParticipateId as $pvalue){
             $ParticipateArray[] = $pvalue;
          }       
          
          
          if ($this->input->post('agenda') != ''):
              $InsertData['agenda'] = $this->input->post('agenda');
          else:
              die($this->json->encode(['status' => 0, 'msg' => 'Require meeting agenda.']));
          endif;            
          
          $this -> db -> where('id', $this -> input -> post('update_id')) -> update('meeting_schedule', ['title' => $this -> input -> post('title'), 'meeting_start_date'=>$InsertData['meeting_start_date'], 'meeting_end_date'=>$InsertData['meeting_end_date'], 'starting_time' => $InsertData['starting_time'], 'ending_time' => $InsertData['ending_time'], 'agenda' => $this -> input -> post('agenda')]);
         
          $this -> db-> delete('meeting_schedule_details', ['schedule_id' => $this -> input -> post('update_id'), 'status !=' => '1']);

          $InsertData['meeting_id'] = $this -> calender_app_model -> getnextMeetingId($this->input->post('token_code'));
          $InsertData['created_by'] = $this -> app_authorization -> getRegisterId($this->input->post('token_code'));
          $InsertData['created_at'] = date("Y-m-d H:i:s", time());
          $InsertData['password'] = rand(1000, 9999);
          array_push($ParticipateArray, $InsertData['created_by']);
          
          $data = [
              'title' => $this -> input -> post('title'),
              'starting_time' => date("h:i:s A", strtotime($this -> input -> post('starting_time'))),
              'ending_time' => date("h:i:s A", strtotime($this -> input -> post('ending_time'))),
              'meeting_start_date' => date('d/m/Y', strtotime($this -> input -> post('meeting_start_date'))),
              'url' =>  base_url('invite-meeting/'.$InsertData['meeting_id']),
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

              foreach($ParticipateArray as $r__id){
                if($this -> db -> where(['schedule_id' => $this -> input -> post('update_id'), 'participate_id' => $r__id, 'status' => '1']) -> count_all_results('meeting_schedule_details') == 0){
                $this -> db -> insert('meeting_schedule_details', ['schedule_id' => $this -> input -> post('update_id'), 'participate_id' => $r__id, 'status' => '0', 'created_at' => date('Y-m-d', time())]);
                }
              }              
        
               die($this -> json-> encode(['status'=> 1, 'msg' => 'Meeting updated successfully.']));
            else:
               die($this -> json-> encode(['status'=> 0, 'msg' => 'Unauthorized User.']));  
          endif;
          else:
             die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.'])); 
          endif;
      }
        
        public function get_meeting_history() {
        if ($this->input->method() == 'post') {
            if ($this->app_authorization->loginchecking($this->input->post('token_code')) == 1) {
                
                $Result = $this -> calender_app_model -> getmeetinghistory($this -> app_authorization -> getRegisterId($this->input->post('token_code')));
                
                die($this -> json-> encode(['status'=> 1, 'data' => $Result]));
            } else {
                die($this->json->encode(['status' => 0, 'msg' => 'Unauthorized User.']));
            }
        } else {
            die($this->json->encode(['status' => 0, 'msg' => 'Unknown method.']));
        }
    }

    public function add_meeting_history(){
            if($this -> input -> method() == 'post'){
            if($this ->app_authorization->loginchecking($this -> input -> post('token_code')) == 1){
            
            if ($this->input->post('meeting_id') != ''):
                $InsertData['meeting_id'] = $this->input->post('meeting_id');
            else:
                die($this->json->encode(['status' => 0, 'msg' => 'Require meeting id.']));
            endif;
                     
            $InsertData['register_id'] = $this -> app_authorization -> getRegisterId($this->input->post('token_code'));
            $InsertData['meeting_date'] = date("Y-m-d", time());
            $InsertData['start_time'] = date("H:i:s", time());
            $InsertData['created_date'] = date("Y-m-d H:i:s", time());
           if($this -> calender_app_model -> addmeetinghistory($InsertData)){
            die($this -> json-> encode(['status'=> 1]));   
           }else{
             die($this -> json-> encode(['status'=> 0, 'msg' => 'Meeting history error. please try again.']));   
            }
            }else{
              die($this -> json-> encode(['status'=> 0, 'msg' => 'Unauthorized User.']));  
            }
            }else{
               die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.'])); 
            }
        }
        
        
        public function getMeetingList(){
            if($this -> input -> method() == 'post'): 
            if($this ->app_authorization->loginchecking($this -> input -> post('token_code')) == true): 
            
            $timezone = gettimezoneApi($this -> input -> post('token_code'));
            $mettingStartDate = convertDate(date("Y-m-d H:i:s", time()), 'Asia/Kolkata', $timezone);
            $endTime = convertTimewithoutam(date("H:i:s", time()), 'Asia/Kolkata', $timezone);

                  
            $Result = $this -> calender_app_model -> getMeetingList($this -> app_authorization -> getRegisterId($this->input->post('token_code')), $mettingStartDate, $endTime);
            die($this -> json-> encode(['status'=> 1, 'data' => $Result]));
            else:
              die($this -> json-> encode(['status'=> 0, 'msg' => 'Unauthorized User.']));  
            endif;
            else:
               die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.'])); 
            endif;
        }
        
        
        public function accept_meeting(){
           if($this -> input -> method() == 'post'): 
            if($this ->app_authorization->loginchecking($this -> input -> post('token_code')) == true):            
            if($this -> calender_app_model -> update('meeting_schedule_details', ['status' => '1'], ['schedule_id' => $this -> input -> post('id'), 'participate_id' => $this -> app_authorization -> getRegisterId($this->input->post('token_code'))])){
            die($this -> json-> encode(['status'=> 1, 'msg' => 'Thanks for accepted']));
            }else{
            die($this -> json-> encode(['status'=> 0, 'msg' => 'Update error']));   
            }
            else:
              die($this -> json-> encode(['status'=> 0, 'msg' => 'Unauthorized User.']));  
            endif;
            else:
               die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.'])); 
            endif;  
        }
        
          public function reject_meeting(){
           if($this -> input -> method() == 'post'): 
            if($this ->app_authorization->loginchecking($this -> input -> post('token_code')) == true):            
            if($this -> calender_app_model -> update('meeting_schedule_details', ['status' => '2'], ['schedule_id' => $this -> input -> post('id'), 'participate_id' => $this -> app_authorization -> getRegisterId($this->input->post('token_code'))])){    
            die($this -> json-> encode(['status'=> 1, 'msg' => 'You have rejected one meeting schedule']));
            }else{
             die($this -> json-> encode(['status'=> 0, 'msg' => 'Update error']));    
            }
            else:
              die($this -> json-> encode(['status'=> 0, 'msg' => 'Unauthorized User.']));  
            endif;
            else:
               die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.'])); 
            endif;  
        }

	   public function cancel_meeting(){
           if($this -> input -> method() == 'post'): 
            if($this ->app_authorization->loginchecking($this -> input -> post('token_code')) == true):            
            if($this -> calender_app_model -> update('meeting_schedule', ['meeting_status' =>0], ['id' => $this -> input -> post('id'), 'created_by' => $this -> app_authorization -> getRegisterId($this->input->post('token_code'))])){    
            die($this -> json-> encode(['status'=> 1, 'msg' => 'You have cancel one meeting schedule']));
            }else{
             die($this -> json-> encode(['status'=> 0, 'msg' => 'Update error']));    
            }
            else:
              die($this -> json-> encode(['status'=> 0, 'msg' => 'Unauthorized User.']));  
            endif;
            else:
               die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.'])); 
            endif;  
        }


        public function join_meeting_db(){
            if($this -> input -> method() == 'post'): 
                if($this ->app_authorization->loginchecking($this -> input -> post('token_code')) == true):
                    $userId = $this -> app_authorization -> getRegisterId($this->input->post('token_code'));
                    $meetingDetails = $this -> db -> select(['meeting_id', 'created_by', 'password', 'title', 'attendeePW']) -> from('meeting_schedule') -> where('id', $this -> input -> post('meeting_id')) -> get() -> result();
                 
                    if(count($meetingDetails) > 0){
                        $this -> load -> library('bigbluebutton_lib');
                        if($meetingDetails[0] -> created_by == $userId){
                            
                            $api__res = $this -> bigbluebutton_lib -> createMeeting($meetingDetails[0] ->meeting_id, $meetingDetails[0] ->title, $meetingDetails[0] ->password);

                            if($api__res['returncode'] == 'SUCCESS'){

                                $this -> db -> where('id', $this -> input -> post('meeting_id')) -> update('meeting_schedule', ['internalMeetingID' => $api__res['internalMeetingID'], 'parentMeetingID' => $api__res['parentMeetingID'], 'attendeePW' => $api__res['attendeePW'], 'moderatorPW' => $api__res['moderatorPW'], 'dialNumber' => $api__res['dialNumber']]);
                               
                                 $joinURL = $this -> meetingurl($api__res['meetingID'], $api__res['attendeePW'], 'sankar bera');
                                 die($this -> json-> encode(['status'=> 1, 'data' => $joinURL])); 
                            }else{
                                die($this -> json-> encode(['status'=> 0, 'msg' => 'Something wrong'])); 
                            }
                        }else{

                            if($meetingDetails[0] ->attendeePW != ''){
                            $joinURL = $this -> bigbluebutton_lib -> joinMeeting($meetingDetails[0] -> meeting_id, $meetingDetails[0] -> attendeePW, 'sankar bera');
                            die($this -> json-> encode(['status'=> 1, 'data' => $joinURL])); 
                            }else{
                                die($this -> json-> encode(['status'=> 0, 'msg' => "Meeting yet not started"])); 
                            }
                        }

                    }else{
                        die($this -> json-> encode(['status'=> 0, 'msg' => 'Invalid Meeting ID.']));  
                    }
                
                else:
                    die($this -> json-> encode(['status'=> 0, 'msg' => 'Unauthorized User.']));  
                endif;
            else:
                die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.'])); 

            endif;
        }

        public function meetingurl($meetingID, $attendeePW, $username){
            return $this -> bigbluebutton_lib -> joinMeeting($meetingID, $attendeePW, $username);
        }

        public function get_takeway($tokenCode, $meetingId){

            $this->load->library('pdf');

            $tokenCode = $tokenCode;
            $meetingId = $meetingId;
            if($this -> input -> method() == 'get'): 

            if($this ->app_authorization->loginchecking($tokenCode) == true):   

            $userId = $this -> app_authorization -> getRegisterId($tokenCode);



            $data['meeting_details'] =  $this -> db -> select(['m.attendeePW', 'r.name', 'm.title', 'm.takeaways', 'm.id', 'm.created_by', 'm.password', 'm.meeting_id', 'm.starting_time', 'm.meeting_start_date', 'm.meeting_end_date', 'm.ending_time', 'm.agenda']) 


                               -> from('meeting_schedule as m')

                               -> join('register as r', 'r.id = m.created_by', 'inner')

                               -> join('meeting_schedule_details as d', 'd.schedule_id = m.id', 'inner')

                               -> where(['m.id' => $meetingId])

                               -> where(['d.participate_id' => $userId])

                               -> group_by('m.meeting_id')

                               -> order_by("m.id", "DESC")

                               -> get() 

                               -> result(); 
                               $html = $this -> load -> view('admin/meeting-pdf', $data, TRUE);

                               $this->pdf->createPDF($html,  date('Y-m-d', time()).'_'.$meetingId);
                              die;
                               die($this -> json-> encode(['status'=> 1, 'msg' => 'Download success']));
                      
                              else:
                      
                                  die($this -> json-> encode(['status'=> 0, 'msg' => 'Unauthorized User.']));  
                      
                                endif;
                      
                                else:
                      
                                   die($this -> json-> encode(['status'=> 0, 'msg' => 'Unknown method.'])); 
                      
                                endif; 
                      
                               }
                          }
                          
                          
?>
                      

