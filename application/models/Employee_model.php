<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('Dashboard_model');
    }

    public function get_all_employees() {
        $result = $this->db->select('employees.*,d.name as dept_name,c.category,p.name as position')
                ->from('employees')
                ->join('departments d', 'd.id=employees.department', 'left')
                ->join('employee_categories c', 'c.id=employees.category', 'left')
                ->join('positions p', 'p.id=employees.position', 'left')
                ->where('status', 1)
                ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function get_all_countries() {
        $result = $this->db->select('*')
                ->from('countries_list')
                ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function add_new_employee($data) {
        $created_by = $this->session->userdata('userdata');
        $this->db->insert('employees', $data);
        $employee_id = $this->db->insert_id();
        //create menu group
        $this->db->insert('menu_group', array(
            'menu_group_name' => $data['first_name'] . ' ' . $data['middle_name'],
            'created_by' => 1,
            'status' => 1,
        ));
        $menu_group_id = $this->db->insert_id();
        //menu group detail
        $emp_default_menu = $this->config->item('emp_default_menu');
        foreach ($emp_default_menu as $menu) {
            $this->db->insert('menu_group_detail', array('menu_group_id' => $menu_group_id, 'menu_id' => $menu));
        }
        //create login right group
        $this->db->insert('login_rights_group', array('menu_group_id' => $menu_group_id, 'other_rights_group_id' => $menu_group_id));
        $login_rights_group_id = $this->db->insert_id();
        //create user of student.
        $password = password_hash('e' . $employee_id, PASSWORD_BCRYPT);
        $user_data = array('name' => 'e' . $employee_id, 'created_by' => $created_by['login_id'],
            'email' => $data['email'], 'password' => $password, 'login_rights_group_id' => $login_rights_group_id);
        $this->db->insert('login', $user_data);
        $user_id = $this->db->insert_id();
        
        $this->db->where('employee_id', $employee_id)->update('employees', array('username' => 'e' . $employee_id));
        return $employee_id;
    }

    public function get_employee_by_id($id) {
        $result = $this->db->select('employees.*,d.name as dept_name,login.login_rights_group_id,login_rights_group.other_rights_group_id,
                    menu_group.menu_group_id,p.name as position_name,c.category as cat_name,b.name as bankname,
                    other_rights_group.status as org_status ')
                ->from('employees')
                ->join('departments d', 'd.id=employees.department', 'left')
                ->join('positions p', 'p.id=employees.position', 'left')
                ->join('employee_categories c', 'c.id=employees.category', 'left')
                ->join('banks b', 'b.id=employees.bank_name', 'left')
                ->join('login', "login.name=employees.username", 'left')
                ->join('login_rights_group', "login_rights_group.login_rights_group_id=login.login_rights_group_id", 'left')
                ->join('other_rights_group', "other_rights_group.other_rights_group_id=login_rights_group.other_rights_group_id", 'left')
                ->join('menu_group', "menu_group.menu_group_id=login_rights_group.menu_group_id", 'left')
                ->where('employee_id', $id)
                ->limit(1)
                ->get();
        if ($result) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    public function update_employee($data, $id) {
        $this->db->where('employee_id', $id)->update('employees', $data);
        return $this->db->affected_rows();
    }

    public function update_employee_form_fields($data) {
        $update_data = array();
        $employee_fields = $this->get_form_fields(3);
        foreach ($data as $key => $value) {
            $update_data[] = $key;
        }

        foreach ($employee_fields as $field) {
            if (array_search($field['field_name'], $update_data)) {
                $this->db->where('field_name', $field['field_name'])->where('profile_setting_id', 3)->update('profile_group_detail', array('add_view' => 1));
            } else {
                $this->db->where('field_name', $field['field_name'])->where('profile_setting_id', 3)->update('profile_group_detail', array('add_view' => 0));
            }
        }
        return $this->db->affected_rows();
    }

    public function get_form_fields($id) {
        $result = $this->db->select('*')
                ->from('profile_group_detail')
                ->where('profile_setting_id', $id)
                ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function get_employee_categories() {
        $result = $this->db->select('*')
                ->from('employee_categories')
                ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function add_employee_category($data) {
        $this->db->insert('employee_categories', $data);
        return $this->db->insert_id();
    }

    public function update_category($data, $id) {
        $this->db->where('id', $id)->update('employee_categories', array('category' => $data));
        return $this->db->affected_rows();
    }

    public function delete_employee_category($id) {
        $this->db->where('id', $id)->delete('employee_categories');
        return $this->db->affected_rows();
    }

    public function get_employee_departments() {
        $result = $this->db->select('*')
                ->from('departments')
                ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function add_employee_department($data) {
        $this->db->insert('departments', $data);
        return $this->db->insert_id();
    }

    public function update_department($data, $id) {
        $this->db->where('id', $id)->update('departments', $data);
        return $this->db->affected_rows();
    }

    public function delete_employee_department($id) {
        $this->db->where('id', $id)->delete('departments');
        return $this->db->affected_rows();
    }

    public function get_employee_positions() {
        $result = $this->db->select('*')
                ->from('positions')
                ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function add_employee_position($data) {
        $this->db->insert('positions', $data);
        return $this->db->insert_id();
    }

    public function update_position($data, $id) {
        $this->db->where('id', $id)->update('positions', $data);
        return $this->db->affected_rows();
    }

    public function delete_employee_position($id) {
        $this->db->where('id', $id)->delete('positions');
        return $this->db->affected_rows();
    }

    public function get_employee_by_filters($filters) {
        $where = " 1 ";
        if (isset($filters['search-employee']) && (!empty($filters['search-employee']))) {
            $name = $filters['search-employee'];
            $where = "(surname LIKE '%$name%' or first_name LIKE '%$name%' or middle_name LIKE '%$name%')";
        }
        if (isset($filters['gender']) && (!empty($filters['gender']))) {
            $gender = $filters['gender'];
            $where .= " AND (gender = '' OR gender = '$gender')";
        }

        if (isset($filters['category']) && (!empty($filters['category']))) {
            $category = $filters['category'];
            $where .= " AND (category = '' OR category = '$category')";
        }

        if (isset($filters['department']) && (!empty($filters['department']))) {
            $department = $filters['department'];
            $where .= " AND (department = '' OR department = '$department')";
        }

        if (isset($filters['position']) && (!empty($filters['position']))) {
            $position = $filters['position'];
            $where .= " AND (position = '' OR position = '$position')";
        }

        if (isset($filters['date_of_birth']) && (!empty($filters['date_of_birth']))) {
            $dob = $filters['date_of_birth'];
            $where .= " AND (date_of_birth = '' OR date_of_birth = '$dob')";
        }

        if (isset($filters['date_of_join']) && (!empty($filters['date_of_join']))) {
            $date_of_join = $filters['date_of_join'];
            $where .= " AND (date_of_join = '' OR date_of_join = '$date_of_join')";
        }
        $sql = "SELECT * FROM employees  where $where";
        $result = $query = $this->db->query($sql);
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function get_all_states() {
        $result = $this->db->select('*')
                ->from('states')
                ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function change_pwd($data) {
        $id = $data['employee_id'];
        $new_pwd = password_hash($data['new_pwd'], PASSWORD_BCRYPT);
        $this->db->where('user_id', $id)->update('login', array('password' => $new_pwd));
        return $this->db->affected_rows();
    }

    public function archive_employee($data) {
        $id = $data['employee_id'];
        $this->db->where('employee_id', $id)->update('employees', array('status' => 0, 'status_updated_at' => $data['status_updated_at'], 'reason' => $data['reason']));
        return $this->db->affected_rows();
    }

    public function delete_employee($id) {
        $this->db->where('employee_id', $id)->delete('employees');
        //delete user
        $login = $this->db->query("select login_id from login where user_id = $id ");
        if ($login->num_rows() > 0) {
            $this->db->where('user_id', $id)->delete('login');
        }
        return $this->db->affected_rows();
    }

    public function update_priviliges($data) {
        
        $this->remove_previous_rights($data);
        $menu_group_id = $data['menu_group_id'];
        $other_rights_group_id = $data['other_rights_group_id'];
        
        if (isset($data['batch_control'])) {
            $batch_control_rights = $this->config->item('batch_control_rights');
            $loggedin_user = $this->session->userdata('userdata');
            $created_by = $loggedin_user['login_id'];
            
            //assign other right
            $this->db->where('other_rights_name', 'batch')->update('other_rights', array('status' => 1));
            $result = $this->db->select('other_rights_id')->from('other_rights')->where('other_rights_name', 'batch')->get();
            $other_rights_id = $result->result_array();
            
            //other rights group
            $query = $this->db->select('other_rights_group_id')->from('other_rights_group')->where('other_rights_group_id', $other_rights_group_id)->limit(1)->get();
            //print_r($other_rights_group_id); die();
            if($query->num_rows()){
                $other_rights_group = $query->row_array();
                $this->db->where('other_rights_group_id', $other_rights_group['other_rights_group_id'])->update('other_rights_group', array('status' => 1));
                $other_rights_group_id = $other_rights_group['other_rights_group_id'];
                
            }else{
                $this->db->insert('other_rights_group',array(
                    'other_rights_group_name'=>$data['employee_name'],
                    'created_by'=>$created_by,
                    'status'=>1,
                ));
                $other_rights_group_id = $this->db->insert_id();
            }
            
            //other right group detail
            foreach ($other_rights_id as $id){
                $this->db->insert('other_rights_group_detail',array(
                    'other_rights_group_id'=>$other_rights_group_id,
                    'other_rights_id'=>$id['other_rights_id'],
                ));
            }            
            //update login rights group 
            $this->db->where('login_rights_group_id', $data['login_rights_group_id'])->update('login_rights_group', array('other_rights_group_id' => $other_rights_group_id));
            
        }
        $this->create_menu_list($data);
    }
    
    public function remove_previous_rights($data){   
        
        $other_rights_group_id = $data['other_rights_group_id'];
        $login_rights_group_id = $data['login_rights_group_id'];
        
        $this->db->where('other_rights_name', 'batch')->update('other_rights', array('status' => 0));
        
        //remove other right group
        $result = $this->db->select('other_rights_group_id')->from('other_rights_group')->where('other_rights_group_id', $other_rights_group_id)->limit(1)->get();
        if($result->num_rows()){
            $other_rights_group = $result->row_array();
            $this->db->where('other_rights_group_id', $other_rights_group['other_rights_group_id'])->update('other_rights_group', array('status' => 0));
        }
        
        //remove other right group detail
        $this->db->where('other_rights_group_id',$other_rights_group_id)->delete('other_rights_group_detail');
        
        // remove other right from loign right group
        //$this->db->where('login_rights_group_id', $login_rights_group_id)->update('login_rights_group', array('other_rights_group_id' => 0));
    }
    

    public function create_menu_list($data) {
        $menu_group_id = $data['menu_group_id'];
        $menu_list = '';
        if (isset($data['admin'])) {
            $admin_priviliges = $data['admin'];
            foreach ($admin_priviliges as $key => $val) {
                $menu = explode(',', $val);
                $val = ',' . $val;
                $menu_list .= $val;
            }
        }

        if (isset($data['student'])) {
            $student_priviliges = $data['student'];
            foreach ($student_priviliges as $key => $val) {
                $menu = explode(',', $val);
                $val = ',' . $val;
                $menu_list .= $val;
            }
        }
        
        $menu_arr = explode(',', $menu_list);
        $emp_admin_menu = array_unique($menu_arr);
        //delete last saved menu
        $this->db->where('menu_group_id', $menu_group_id)->delete('menu_group_detail');
        //insert new menu
        foreach ($emp_admin_menu as $menu) {
            $this->db->insert('menu_group_detail', array(
                'menu_group_id' => $menu_group_id,
                'menu_id' => $menu,
            ));
        }
    }

    public function get_menu_detail($menu_group_id) {
        $result = $this->db->select('menu_id')->from('menu_group_detail')->where('menu_group_id', $menu_group_id)->get();
        $menu_list = '';
        if ($result) {
            $menu_detail = $result->result_array();
            $last_element = end($menu_detail);
            foreach ($menu_detail as $detail) {
                if ($last_element['menu_id'] != $detail['menu_id']) {
                    $comma = ',';
                } else {
                    $comma = '';
                }
                $menu_list .= $detail['menu_id'] . $comma;
            }

            // echo "<pre>"; print_r($menu_list); die();
            return explode(',', $menu_list);
        } else {
            return array();
        }
    }

}

?>