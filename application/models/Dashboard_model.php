<?php

class Dashboard_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        

    }

    function index()
    {

        
        
    }

    public function get_user_by_email($email)
    {
        $result = $this->db->select("*")
                ->from("login")
                ->where("email", $email)
                ->get();
        if($result) {
            return $result->row_array();
        }else{

            $result = $this->db->select("*")
                        ->from("login")
                        ->where("name", $email)
                        ->get();
            return $result->row_array();
        }
    }

    public function dasboard_menus(){
        $query = $this->db->select("*")
                ->from("menu")
                ->get();
        $result = $query->result();
        return $result;

    }
    public function get_other_rights_detail(){
        $loggedin_user = $this->session->userdata('userdata');
        $user_id = $loggedin_user['login_id'];
        $sql = "Select login.*,lrg.other_rights_group_id,lrgd.other_rights,lrgd.status
                FROM login
                LEFT JOIN login_rights_group lrg on lrg.login_rights_group_id = login.login_rights_group_id and lrg.other_rights_group_id > 0
                LEFT JOIN(
                    SELECT other_rights_group_detail.*, GROUP_CONCAT(other_rights.class) as other_rights,org.status
                    FROM other_rights_group_detail
                    LEFT JOIN other_rights ON other_rights.other_rights_id = other_rights_group_detail.other_rights_id
                    LEFT JOIN other_rights_group org  ON org.other_rights_group_id = other_rights_group_detail.other_rights_group_id
                    WHERE org.status = 1
                    Group BY other_rights_group_id
                )lrgd ON lrgd.other_rights_group_id = lrg.other_rights_group_id
                WHERE login_id = $user_id ";
        $result = $query = $this->db->query($sql);
        if ($result) {            
            return $result->result_array();
        } else {
            return array();
        }
    }

}

?>