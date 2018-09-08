<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
Class General_model extends CI_Model {

    public function get_classes(){
        $result = $this->db->select('*')
            ->from('classes')
            ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }

    }

    public function add_new_class($data) {
        $this->db->insert('classes', $data);
        return $this->db->insert_id();
    }

    public function delete_class($id) {
        $this->db->where('id', $id)->delete('classes');
        return $this->db->affected_rows();
    }

    public function update_class($student_data, $student_id) {
        $this->db->where('id', $student_id)->update('classes', $student_data);
        return $this->db->affected_rows();
    }


    public function get_all_students() {
        $this->db->select('s.*,b.arm,b.session,c.code');
        $this->db->from('students s');
        $this->db->join('batches b', 'b.id=s.batch_no', 'left');
        $this->db->join('classes c', 'c.id=b.course_id', 'left');
        $this->db->order_by('s.student_id','desc');
        $result = $this->db->get();
		//$result = $this->db->select('*')->from('students')->get();
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

	public function delete_student($student_id) {
		$this->db->where('student_id', $student_id)->delete('students');
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

    public function add_new_subject($data) {
        $this->db->insert('subjects', $data);
        return $this->db->insert_id();
    }

    public function get_all_subjects() {
        $result = $this->db->select('*')
            ->from('subjects')
            ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }

    }

    public function update_subject($data, $id) {
        $this->db->where('id', $id)->update('subjects', $data);
        return $this->db->affected_rows();
    }

    public function delete_subject($id) {
        $this->db->where('id', $id)->delete('subjects');
        return $this->db->affected_rows();
    }

    public function save_institution($data) {
        $result = $this->db->select('id')->from('institutions')->where('id',1)->limit(1)->get();

        if ($result->num_rows()>0) {
            $this->db->where('id', 1)->update('institutions', $data);
            return 1;
        } else {
            $this->db->insert('institutions', $data);
            return $this->db->insert_id();
        }
    }

    public function add_new_session($data) {
        $this->db->insert('acadamic_sessions', $data);
        return $this->db->insert_id();
    }

    public function get_all_sessions(){
        $result = $this->db->select('*')
            ->from('acadamic_sessions')
            ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }

    }

    public function update_session($data, $id) {
        $this->db->where('id', $id)->update('acadamic_sessions', $data);
        return $this->db->affected_rows();
    }

    public function delete_session($id) {
        $this->db->where('id', $id)->delete('acadamic_sessions');
        return $this->db->affected_rows();
    }

    public function get_institution_detail(){
        $result = $this->db->select('*')
                    ->from('institutions')
                    ->get();
        if ($result) {
            return $result->row_array();
        } else {
            return array();
        }

    }

}