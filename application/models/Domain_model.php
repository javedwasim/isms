<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
Class Domain_model extends CI_Model {
	public function get_domains() {
//        $this->db->select('s.*,b.arm,b.session,c.code');
//        $this->db->from('students s');
//        $this->db->join('batches b', 'b.id=s.batch_no', 'left');
//        $this->db->join('classes c', 'c.id=b.course_id', 'left');
//        $this->db->order_by('s.student_id','desc');
//        $result = $this->db->get();
		$result = $this->db->select('*')->from('domain_goup')->get();
		if($result) {
			return $result->result_array();
		} else {
			return array();
		}
	}
    public function save_domain_indicator($data){

        if(isset($data['domain_group_id']) && ($data['domain_group_id']>0)){
            $this->db->insert('domain_group_indicator', $data);
        }else{
            $maxid = 0;
            $row = $this->db->query('SELECT MAX(id) AS `maxid` FROM `domain_goup`')->row();
            if ($row) {
                $maxid = $row->maxid;
            }
            $next_domain_group_id = $maxid+1;
            $data['domain_group_id'] = $next_domain_group_id;
            $this->db->insert('temp_domain_group_indicator', $data);
        }

        return $this->db->insert_id();
    }

    public function save_indicators($domain_id){
        $indicators = $this->get_domain_indicators();
        foreach ($indicators as $indicator){
            $updated_fields = array('domain_group_id'=>$indicator['domain_group_id'],
                                'name'=>$indicator['name'],'code'=>$indicator['code'],
                                'description'=>$indicator['description']);
            $this->db->insert('domain_group_indicator',$updated_fields);
        }
        $this->db->truncate('temp_domain_group_indicator');
    }

    public function save_domain_group($data){
	    if(isset($data['domaingroup_id'])&&($data['domaingroup_id']>0)){
	        $update_field = array(
	                        'name'=>$data['name'],
                            'learning_domain'=>$data['learning_domain'],
                            'grade_scale_id'=>$data['grade_scale_id'],
                            'description'=>$data['description'],
                            );
            $this->db->where('id', $data['domaingroup_id'])->update('domain_goup', $update_field);
            return $data['domaingroup_id'];
        }else{
            $update_field = array(
                'name'=>$data['name'],
                'learning_domain'=>$data['learning_domain'],
                'grade_scale_id'=>$data['grade_scale_id'],
                'description'=>$data['description'],
            );
            $this->db->insert('domain_goup', $update_field);
            return $this->db->insert_id();
        }

    }


    public function get_domain_indicators(){
        $result = $this->db->select('*')
                    ->from('temp_domain_group_indicator')
                    ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function get_domain_indicators_by_id($id){
        $result = $this->db->select('*')
                    ->from('domain_group_indicator')
                    ->where('domain_group_id',$id)
                    ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function get_domain_group_by_id($id){
        $result = $this->db->select('*')
                    ->from('domain_goup')
                    ->where('id',$id)
                    ->limit(1)
                    ->get();
        if ($result) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    public function update_domain_indicator($data, $where) {
	    if(isset($where['status']) && ($where['status']=='update')){
            $this->db->where('id', $where['id'])->update('domain_group_indicator', $data);
        }else{
            $this->db->where('id', $where['id'])->update('temp_domain_group_indicator', $data);
        }
        return $this->db->affected_rows();
    }

    public function delete_indicator($id) {
        $this->db->where('id', $id)->delete('domain_group_indicator');
        return $this->db->affected_rows();
    }
    public function delete_temp_indicator($id) {
        $this->db->where('id', $id)->delete('temp_domain_group_indicator');
        return $this->db->affected_rows();
    }

    public function get_grade_scales(){
        $result = $this->db->select('*')
                    ->from('grade_scales')
                    ->where('type','behavioural')
                    ->get();
        if ($result) {
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
		$this->db->insert('students', $student_data);
		return $this->db->insert_id();
	}

	public function get_student_by_id($student_id) {
		$result = $this->db->select('*')
						->from('students')
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



	public function add_new_guardian($guardian_data) {
		$this->db->insert('guardians', $guardian_data);
		return $this->db->insert_id();
	}

	public function get_all_guardians() {
		$result = $this->db->select('*')
						->from('guardians')
						->get();
		if ($result) {
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
}