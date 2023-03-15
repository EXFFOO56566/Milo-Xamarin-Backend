<?php

class Author_model extends CI_Model {

    public function author_login($ConditionArray = array()) {
        $Result = $this->db->get_where('admin', $ConditionArray);
        if ($Result->num_rows() > 0) {
            $LoginResult = $Result->result_array();
            $this->session->set_userdata('AyaUserLoginId', $LoginResult[0]['id']);
            $this->session->set_userdata('AyaUserRole', $LoginResult[0]['role_id']);
            return 1;
        }
    }
    
    /*
     * For Didtributer account.
     */
    
    public function dischangepassword($OldPassword, $NewPassword) {
        $this->db->where('id', $this->session->userdata('AyaUserLoginId'))
                ->where('password', encode($OldPassword))
                ->update('register', array('password' => encode($NewPassword)));
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function changepassword($OldPassword, $NewPassword) {
        $this->db->where('id', $this->session->userdata('AyaUserLoginId'))
                ->where('password', base64_encode(base64_encode($OldPassword)))
                ->update('admin', array('password' => base64_encode(base64_encode($NewPassword))));
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function view($TableName, $ConditionArray = array(), $OrderBy = '', $OrderType = '') {
        $Result = $this->db->order_by($OrderBy, $OrderType)->get_where($TableName, $ConditionArray);
        return json_encode($Result->result());
    }

    public function adddata($TableName, $InsertData) {
        $this->db->insert($TableName, $InsertData);
        return $this->db->insert_id();
    }

    public function updatedata($TableName, $UpdateData, $Updateid) {
        $this->db->where('id', $Updateid)
                ->update($TableName, $UpdateData);
        return 1;
    }
    
    public function deletedata($TableName, $Condition) {
        return $this->db->delete($TableName, $Condition);
    }

}

?>