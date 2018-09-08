<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
Class Subject_model extends CI_Model {

    public function get_subjects_detail(){

        $elective = "SELECT sd.*, s.name as subject_name,count(ae.emp_id) as emp_count
                        FROM subjects_detail sd  
                        LEFT JOIN subjects s on s.id = sd.subject_id
                        LEFT JOIN (
                            select id as emp_id,subject_detail_id FROM subject_assign_employee 
                            GROUP by id
                        )ae on ae.subject_detail_id = sd.id
                        WHERE elective_group_id>0
                        GROUP By sd.id";

        $core = "SELECT sd.*, s.name as subject_name,count(ae.emp_id) as emp_count
                        FROM subjects_detail sd  
                        LEFT JOIN subjects s on s.id = sd.subject_id
                        LEFT JOIN (
                            select id as emp_id,subject_detail_id FROM subject_assign_employee 
                            GROUP by id
                        )ae on ae.subject_detail_id = sd.id
                        WHERE elective_group_id=0
                        GROUP By sd.id";

        $elective_subjects =  $this->db->query($elective);
        $core_subjects = $this->db->query($core);
        if($elective_subjects) {
            $subjects=array();
            $subjects['elective_subjects']=$elective_subjects->result_array();
            $subjects['core_subjects']=$core_subjects->result_array();
            return $subjects;
        } else {
            return array();
        }

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

    public function get_all_batches(){

        $query = "SELECT b.*, c.code,Count(students.student_id) as student_count 
                    FROM batches b 
                    LEFT JOIN classes c ON c.id=b.course_id 
                    LEFT JOIN (
                        select student_id,batch_no FROM students GROUP by student_id
                    )students on students.batch_no = b.id
                    GROUP By b.id
                    ORDER BY b.session ASC";
        $result = $query = $this->db->query($query);
        if($result) {
            return $result->result_array();
        } else {
            return array();
        }

    }


    public function get_all_sessions() {
        $result = $this->db->select('*')
                    ->from('acadamic_sessions')
                    ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }

    }

    public function get_all_employees() {
        $result = $this->db->select('*')
                    ->from('employees')
                    ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }

    }

    public function get_all_classes() {
        $result = $this->db->select('*')
                    ->from('classes')
                    ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }

    }

    public function get_elective_group(){
        $result = $this->db->select('*')
                    ->from('elective_groups')
                    ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function get_subject_by_id($id) {
        $result = $this->db->select('*')
                    ->from('subjects_detail')
                    ->where('id',$id)
                    ->limit(1)
                    ->get();
        if ($result) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    public function update_subject($data, $id) {
        $this->db->where('id', $id)->update('subjects_detail', $data);
        return $this->db->affected_rows();
    }

    public function save_subject($data) {
        $this->db->insert('subjects_detail', $data);
        return $this->db->insert_id();
    }

    public function save_elective_subject($data) {
        $this->db->insert('elective_groups', $data);
        return $this->db->insert_id();
    }

    public function delete_subject($id) {
        $this->db->where('id', $id)->delete('subjects_detail');
        return $this->db->affected_rows();
    }


	public function assign_new_employee($data){
        $result = $this->db->select('id')->from('subject_assign_employee')
                    ->where('subject_detail_id',$data['subject_detail_id'])->limit(1)->get();
        if($result){
            $this->db->where('subject_detail_id',$data['subject_detail_id'])->delete('subject_assign_employee');
        }
        $employees = $data['employee'];
        $role = $data['role'];
        for($i=0;$i<count($employees);$i++){
            $this->db->insert('subject_assign_employee',
            array(
                    'employee_id'=>$employees[$i],
                    'role_id'=>$role[$i],
                    'subject_detail_id'=>$data['subject_detail_id'])
            );
        }
        return $this->db->insert_id();
    }

    public function get_assigned_employees($id){
        $this->db->select('ae.*');
        $this->db->from('subject_assign_employee ae');
        $this->db->join('employees e', 'e.employee_id=ae.employee_id', 'left');
        $this->db->join('roles r', 'r.id=ae.role_id', 'left');
        $this->db->where('ae.subject_detail_id',$id);
        $result = $this->db->get();
        //print_r($this->db->last_query()); die();
        if($result) {
            return $result->result_array();
        } else {
            return array();
        }

    }

    public function get_assessment_categories() {
        $result = $this->db->select('*')
                    ->from('assessment_categories')
                    ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }

    }

    public function save_subject_assessments($data){
        $this->db->insert('subject_assessments', $data);
        return $this->db->insert_id();
    }

    public function get_subject_assessments($id){
        $result = $this->db->select('sa.*,ac.name as cate_name')
                    ->join('assessment_categories ac','ac.id=sa.assessment_category_id','left')
                    ->from('subject_assessments sa')
                    ->where('subject_detail_id',$id)
                    ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function get_subject_assessments_by_id($id){
        $result = $this->db->select('sa.*')
                    ->from('subject_assessments sa')
                    ->where('id',$id)
                    ->limit(1)
                    ->get();
        if ($result) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    public function update_publish_grade($data) {
        $id = $data['subject_detail_id'];
        $result = $this->db->select('publish_score,include_final_grade')->from('subject_assessments')->where('id',$id)->limit(1)->get();
        $row = $result->row_array();
        $update_data = array();
        if($data['data_update']=='publish'){
          $row['publish_score']==1? $update_data['publish_score']=0:$update_data['publish_score']=1;
          $this->db->where('id', $id)->update('subject_assessments', $update_data);
        }elseif($data['data_update']=='grade'){
            $row['include_final_grade']==1? $update_data['include_final_grade']=0:$update_data['include_final_grade']=1;
            $this->db->where('id', $id)->update('subject_assessments', $update_data);
        }
        return $this->db->affected_rows();
    }

    public function update_subject_assessments($data,$id){
        $this->db->where('id', $id)->update('subject_assessments', $data);
        return $this->db->affected_rows();
    }

    public function delete_subject_assessment($id) {
        $this->db->where('id', $id)->delete('subject_assessments');
        return $this->db->affected_rows();
    }

    public function get_score_sheet($id){
        $query = "SELECT s.student_id, batches.id as bacth_id,acs.id as session_id,
                    batches.session,sd.id as subj_detail_id,s.first_name,s.last_name,s.surname,
                    GROUP_CONCAT(sas.abbreviation ORDER BY sas.id ASC) as score_term,
                    GROUP_CONCAT(sas.points ORDER BY sas.id ASC) as score_points
                    FROM students s
                    LEFT JOIN batches on batches.id  = s.batch_no
                    LEFT JOIN acadamic_sessions acs on acs.id=s.batch_no
                    LEFT JOIN subjects_detail sd on sd.batch_id=batches.id
                    LEFT JOIN(
                     SELECT * FROM subject_assessments
                        GROUP BY subject_assessments.id 
                        ORDER BY subject_assessments.abbreviation DESC
                        
                    )sas on sas.subject_detail_id=sd.id 
                    WHERE (sd.id=1)
                    GROUP BY s.student_id";
        $result = $query = $this->db->query($query);
        if($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

}