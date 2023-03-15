<?php
    class Bigbluebutton_lib{
        function __construct() {
            $this->CI = &get_instance();
            $this->CI->load->database();
            $this->CI->load->config('bigbluebutton');
        }


        public function meetingStatus(){
            
        }


        public function createMeeting($meetingId, $name, $password){
            $b__url = $this->CI->config->item('bb__base_url');
            /* Example */
            $params = [
                'meetingID'=> $meetingId,
                'name' => $name,
                'attendeePW' => $password,
                'isBreakout' => $meetingId,
                'parentMeetingID' => $meetingId,
                'sequence' => $meetingId,
                'joinViaHtml5'=> 'true',
                'moderatorPW' => $password,
                'record'=> 'true',
                'logoutURL'=> 'https://admin.joinme.co.in/author/dashboard',
                'welcome' => 'Thanks for join with uglyconnect',
                // 'autoStartRecording'=> 'true',
                'allowStartStopRecording' => 'true',
                // 'lockSettingsLockOnJoinConfigurable' => 'true',
                // 'guestPolicy'=> 'ALWAYS_ACCEPT',
                // 'guest'=>'true',
                // 'lockSettingsHideUserList'=> 'true'
            ];

            $queryBuild = http_build_query($params);  
                  
            $checkSum = sha1('create'.$queryBuild.$this->CI->config->item('BBB_SECRET'));

            $url = $b__url . "api/create?".$queryBuild."&checksum=" . $checkSum;
            
            $xml_response = file_get_contents($url);
            $xml = simplexml_load_string($xml_response);
            $json_response = json_encode($xml);
            $array_response = json_decode($json_response, true);
            return $array_response;
        }

        public function joinMeeting($meetingId, $password, $name){
            $b__url = $this->CI->config->item('bb__base_url');
            $params = [
                'meetingID'=> $meetingId,
                'fullName' => $name,
                'password' => $password,
                'joinViaHtml5'=> true,
            ];
            $queryBuild = http_build_query($params);  
                  
            $checkSum = sha1('join'.$queryBuild.$this->CI->config->item('BBB_SECRET'));

            $url = $b__url . "api/join?".$queryBuild."&checksum=" . $checkSum;

            return $url;
            die;


            $xml_response = file_get_contents($url);
            $xml = simplexml_load_string($xml_response);
            $json_response = json_encode($xml);
            $array_response = json_decode($json_response, true);
            return $array_response;

        }
        
        public function getRecording($meetingId){
            
            $b__url = $this->CI->config->item('bb__base_url');
            $params = [
                'meetingID'=> $meetingId,
            ];
            $queryBuild = http_build_query($params);  
                  
            $checkSum = sha1('getRecordings'.$queryBuild.$this->CI->config->item('BBB_SECRET'));

            $url = $b__url . "api/getRecordings?".$queryBuild."&checksum=" . $checkSum;     
            $xml_response = file_get_contents($url);
            $xml = simplexml_load_string($xml_response);
            $json_response = json_encode($xml);
            $array_response = json_decode($json_response, true);
            if(count($array_response['recordings']) > 0){
            return $array_response['recordings']['recording']['playback']['format']['url'];
            }else{
             return "#";   
            }
        }

        public function downloadRecording($recordingID){
			echo 'test';
die;
            $b__url = $this->CI->config->item('bb__base_url');
echo $b_url;
die;			           
 $params = [
                'recordID'=> $recordingID,
            ];
            $queryBuild = http_build_query($params);  
                  
            $checkSum = sha1('getRecordings'.$queryBuild.$this->CI->config->item('BBB_SECRET'));

            $url = $b__url . "api/getRecordings?".$queryBuild."&checksum=" . $checkSum;

        
            $xml_response = file_get_contents($url);
            $xml = simplexml_load_string($xml_response);
            $json_response = json_encode($xml);
            $array_response = json_decode($json_response, true);
		print_r($array_response);
die;
            if(count($array_response['recordings']) > 0){
            return $array_response['recordings']['recording']['playback']['format']['url'];
            }else{
             return "#";   
            }

        }

    }
?>
