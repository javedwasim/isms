<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
Class Student_model extends CI_Model {
	public function get_all_students() {
        $this->db->select('s.*,b.arm,b.session,c.code');
        $this->db->from('students s');
        $this->db->join('batches b', 'b.id=s.batch_no', 'left');
        $this->db->join('classes c', 'c.id=b.course_id', 'left');
        $this->db->order_by('s.student_id','desc');
        $this->db->where('s.status',1);
        $result = $this->db->get();
		if($result) {
			return $result->result_array();
		} else {
			return array();
		}
	}

	public function add_form_fields($data) {
		$this->db->insert('profile_fields', $data);
		return $this->db->insert_id();
	}

	public function get_form_fields($id) {
		$result = $this->db->select('*')
                    ->from('profile_group_detail')
                    ->where('profile_setting_id',$id)
                    ->get();
		if ($result) {
			return $result->result_array();
		} else {
			return array();
		}
		
	}

	public function update_form_fields($data, $where) {
		$this->db->where('profile_field_type', $where)
		->update('profile_fields', $data);
		return $this->db->affected_rows();
	}

    public function update_student_form_fields($data) {
	    $update_data = array();

        $student_fields = $this->get_form_fields(1);
        foreach ($data as $key=>$value){
            $update_data[] = $key;
        }

	    foreach ($student_fields as $field){
            if(array_search($field['field_name'],$update_data)){

                $this->db->where('field_name', $field['field_name'])->where('profile_setting_id', 1)->update('profile_group_detail', array('add_view'=>1));
            }else{
                $this->db->where('field_name', $field['field_name'])->where('profile_setting_id', 1)->update('profile_group_detail', array('add_view'=>0));
            }
        }
        return $this->db->affected_rows();
    }

    public function update_guardian_form_fields($data) {
        $update_data = array();
        $guardian_fields = $this->get_form_fields(2);
        foreach ($data as $key=>$value){
            $update_data[] = $key;
        }
        //print_r($update_data); die();
        foreach ($guardian_fields as $field){
            if(array_search($field['field_name'],$update_data)){

                $this->db->where('field_name', $field['field_name'])->where('profile_setting_id', 2)->update('profile_group_detail', array('add_view'=>1));
            }else{
                $this->db->where('field_name', $field['field_name'])->where('profile_setting_id', 2)->update('profile_group_detail', array('add_view'=>0));
            }
        }
        return $this->db->affected_rows();
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

	public function add_new_student($student_data) {
	    $created_by = $this->session->userdata('userdata');
		$this->db->insert('students', $student_data);
		$student_id = $this->db->insert_id();
		//create user of student.
        $password = password_hash('s'.$student_id, PASSWORD_BCRYPT);
		$user_data = array('name'=>'s'.$student_id,'created_by'=>$created_by['login_id'],
                        'email'=>$student_data['email'],'password'=>$password,'login_rights_group_id'=>1);
        $this->db->insert('login', $user_data);
        //create student demographic
        $this->db->insert('demographics',array('student_id'=>$student_id,'batch_id'=>$student_data['batch_no']));

        $this->db->where('student_id', $student_id)->update('students', array('username' => 's' . $student_id));
        return $student_id;
	}

	public function save_student_guardian($data){
        $student_id = $data['student_id'];
        $guardian_id = $data['guardian_id'];
	    $retuslt = $this->db->select('*')->from('student_guardians')
                    ->where('student_id',$student_id)
                    ->where('guardian_id',$guardian_id)
                    ->limit(1)
                    ->get();
	    if($retuslt->num_rows()>0){
            return false;
        }else{

            $this->db->insert('student_guardians', $data);
            return $this->db->insert_id();
        }
    }

	public function get_student_by_id($student_id) {
		$result = $this->db->select('students.*,login.email')
						->from('students')
                        ->join('login', 'login.name=students.username', 'left')
						->where('student_id', $student_id)
						->limit(1)
						->get();
		if ($result) {
			return $result->row_array();
		} else {
			return array();
		}
	}

	public function update_student($student_data, $student_id) {
		$this->db->where('student_id', $student_id)->update('students', $student_data);
		return $this->db->affected_rows();
	}

	public function delete_student($student_id) {
		$this->db->where('student_id', $student_id)->delete('students');
		//delete student guardians
        $query = $this->db->query("select id from student_guardians where student_id = $student_id ");
        if($query->num_rows() > 0)
        {
            $this->db->where('student_id', $student_id)->delete('student_guardians');
        }
        //delete user
        $login = $this->db->query("select login_id from login where user_id = $student_id ");
        if($login->num_rows() > 0)
        {
            $this->db->where('user_id', $student_id)->delete('login');
        }
		return $this->db->affected_rows();
	}

    public function delete_guardian($id) {
        $this->db->where('guardian_id', $id)->delete('guardians');
        //delete student guardians
        $query = $this->db->query("select id from student_guardians where student_id = $id ");
        if($query->num_rows() > 0)
        {
            $this->db->where('student_id', $id)->delete('student_guardians');
        }
        //delete user
        $login = $this->db->query("select login_id from login where user_id = $id ");
        if($login->num_rows() > 0)
        {
            $this->db->where('user_id', $id)->delete('login');
        }
        return $this->db->affected_rows();
    }



	public function add_new_guardian($guardian_data) {
        $this->db->insert('guardians', $guardian_data);
        $guardian_id = $this->db->insert_id();
        //create user of student.
        $password = password_hash('admin', PASSWORD_BCRYPT);
        $user_data = array('user_id'=>$guardian_id,'name'=>'s'.$guardian_id,
            'email'=>$guardian_data['email'],'password'=>$password);
        $this->db->insert('login', $user_data);
        return $guardian_id;
	}

	public function get_all_guardians() {
        $query = "SELECT g.*, GROUP_CONCAT(student.first_name) as st_name, 
                    st.created_at as activated_at
                    FROM guardians g 
                    LEFT JOIN student_guardians st ON st.guardian_id=g.guardian_id 
                    LEFT JOIN(
                      SELECT * from students
                      GROUP by students.student_id
                    )student on student.student_id = st.student_id
                    GROUP BY g.guardian_id 
                    ORDER BY g.guardian_id DESC";
        //print_r($this->db->last_query()); die();
        $result = $query = $this->db->query($query);
        if($result) {
            return $result->result_array();
        } else {
            return array();
        }
	}

    public function get_guardian_by_id($id) {
        $result = $this->db->select('guardians.*')
                    ->from('guardians')
                    ->where('guardian_id', $id)
                    ->limit(1)
                    ->get();
        if ($result) {
            return $result->row_array();
        } else {
            return array();
        }
    }



    public function get_all_student_guardian($student_id) {

        $sql = "select guardians.*,s.student_id from guardians 
                left join student_guardians s on s.guardian_id=guardians.guardian_id and student_id = $student_id
                GROUP BY guardians.guardian_id
                ORDER by guardians.guardian_id";
        $result = $query = $this->db->query($sql);

        if($result) {
            //echo "<pre>";  print_r($result->result_array()); die();
            return $result->result_array();
        } else {
            return array();
        }
    }

	public function  get_students_by_filters($filters){
	    $where = " 1 ";
	    if(isset($filters['search-employee']) && (!empty($filters['search-employee'])) ){
	       $name = $filters['search-employee'];
           $where =  "(surname LIKE '%$name%' or first_name LIKE '%$name%' or last_name LIKE '%$name%')";
        }
        if(isset($filters['admit_date']) && (!empty($filters['admit_date'])) ){
            $admit_date = $filters['admit_date'];
            $where .=  " AND (admission_date = '' OR admission_date = '$admit_date')";
        }

        if(isset($filters['batch_no']) && (!empty($filters['batch_no'])) ){
            $batch_no = $filters['batch_no'];
            $where .=  " AND (batch_no = '' OR batch_no = '$batch_no')";
        }

        if(isset($filters['dob']) && (!empty($filters['dob'])) ){
            $dob = $filters['dob'];
            $where .=  " AND (date_of_birth = '' OR date_of_birth = '$dob')";
        }

        if(isset($filters['gender']) && (!empty($filters['gender'])) ){
            $gender = $filters['gender'];
            $where .=  " AND (gender = '' OR gender = '$gender')";
        }

        if(isset($filters['status']) && (!empty($filters['status'])) ){
            $status = $filters['status'];
            $where .=  " AND (status = '' OR status = '$status')";
        }

        $sql = "SELECT students.*,batches.arm,batches.session,classes.code FROM students 
                left join batches on batches.id = students.batch_no
                left join classes on classes.id = batches.course_id
                where $where";
        $result = $query = $this->db->query($sql);
        if($result) {
            return $result->result_array();
        } else {
            return array();
        }

    }

    public function get_all_batches(){
        $this->db->select('b.*,c.code');
        $this->db->from('batches b');
        $this->db->join('classes c', 'c.id=b.course_id', 'left');
        $this->db->order_by('b.session','asc');
        $result = $this->db->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }

    }

    public function add_student_category($data) {
        $this->db->insert('student_categories', $data);
        return $this->db->insert_id();
    }

    public function update_category($data, $id) {
        $this->db->where('id', $id)
            ->update('student_categories', array('category'=>$data));
        return $this->db->affected_rows();
    }

    public function get_all_student_categories(){
        $result = $this->db->select('*')
                    ->from('student_categories')
                    ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }

    }

    public function delete_student_category($id) {
        $this->db->where('id', $id)->delete('student_categories');
        return $this->db->affected_rows();
    }

    public function unassign_sutdent_guardian($student_id,$guardian_id) {
        $this->db->where('student_id', $student_id)->where('guardian_id',$guardian_id)->delete('student_guardians');
        return $this->db->affected_rows();
    }


    public function get_country_states($country_id){
        $result = $this->db->select('*')
                    ->from('states')
                    ->where('country_id',$country_id)
                    ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function get_state_origins($state_id){
        $result = $this->db->select('*')
                    ->from('lga_origin')
                    ->where('state_id',$state_id)
                    ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function get_all_states(){
        $result = $this->db->select('*')
                    ->from('states')
                    ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function get_all_origins(){
        $result = $this->db->select('*')
                ->from('lga_origin')
                ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function change_pwd($data){
	    $id = $data['student_id'];
	    $new_pwd = password_hash($data['new_pwd'], PASSWORD_BCRYPT);
        $this->db->where('user_id', $id)->update('login', array('password'=>$new_pwd));
        return $this->db->affected_rows();
    }

    public function archive_student($data){
	    $id = $data['student_id'];
        $this->db->where('student_id', $id)->update('students',
            array('status'=>0,'status_updated_at'=>$data['status_updated_at'],'reason'=>$data['reason']));
        return $this->db->affected_rows();
    }

    public function  get_guardian_by_filters($filters){
        $where = " 1 ";
        if(isset($filters['search-guardian']) && (!empty($filters['search-guardian'])) ){
            $name = $filters['search-guardian'];
            $where =  "(g.surname LIKE '%$name%' or g.first_name LIKE '%$name%' or g.middle_name LIKE '%$name%')";
        }

        if(isset($filters['gender']) && (!empty($filters['gender'])) ){
            $gender = $filters['gender'];
            $where .=  " AND (g.gender = '' OR g.gender = '$gender')";
        }
        if(isset($filters['created_at']) && (!empty($filters['created_at'])) ){
            $created_at = $filters['created_at'];
            $where .=  " AND (DATE(g.created) = '' OR DATE(g.created) = '$created_at')";
        }
        $sql = "SELECT g.*, GROUP_CONCAT(student.first_name) as st_name, 
                    st.created_at as activated_at
                    FROM guardians g 
                    LEFT JOIN student_guardians st ON st.guardian_id=g.guardian_id 
                    LEFT JOIN(
                      SELECT * from students
                      GROUP by students.student_id
                    )student on student.student_id = st.student_id
                    where $where
                    GROUP BY g.guardian_id 
                    ORDER BY g.guardian_id DESC";
        $result = $this->db->query($sql);
        if($result) {
            return $result->result_array();
        } else {
            return array();
        }

    }

    public function update_guardian($data, $id) {
        $this->db->where('guardian_id', $id)->update('guardians', $data);
        return $this->db->affected_rows();
    }
    public function update_student_guardian($data){
        if(isset($data) && !empty($data)){
            $update_relation = array();
            foreach ($data as $relation){
                $values = explode("_",$relation);
                $update_relation[]= array('id'=>$values[0],'relation'=>$values[1]);
                $this->db->where('id', $values[0])->update('student_guardians', array('relation'=>$values[1]));
            }
        }
        return true;
    }

    public function get_guardian_wards($id){
        $result = $this->db->select('sg.*,s.surname,s.first_name,s.last_name,
                    s.admission_no,s.status,s.batch_no,s.admission_date,b.arm,b.session,c.code')
                    ->from('student_guardians sg')
                    ->join('students s','s.student_id=sg.student_id','left')
                    ->join('batches b', 'b.id=s.batch_no', 'left')
                    ->join('classes c', 'c.id=b.course_id', 'left')
                    ->where('sg.guardian_id',$id)
                    ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function select_student($data){
       $student_id = $data['student_id'];
       $result =  $this->db->select('*')->from('selected_recipients')
                    ->where('user_id',$student_id)
                    ->where('recipient_group','selected_students')
                    ->limit(1)
                    ->get();

        if($result->num_rows()>0){
            if($data['flag'] == 'deselect'){
                $this->db->where('user_id', $student_id)->where('recipient_group','selected_students')->delete('selected_recipients');
                return $this->db->affected_rows();
            }
            return false;
        }else{
            $this->db->insert('selected_recipients',
                array('user_id'=>$student_id,'recipient_group'=>'selected_students'));
            return $this->db->insert_id();
        }

    }



}