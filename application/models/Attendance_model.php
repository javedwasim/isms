<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
Class Attendance_model extends CI_Model {

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

    public function save_student_attendance($data){
        $result = $this->db->select('*')->from('attendance')
                                ->where('user_id',$data['user_id'])
                                ->where('batch_id',$data['batch_id'])
                                ->where('attendance_group','student')
                                ->where('attendance_date',$data['attendance_date'])
                                ->limit(1)
                                ->get();

        $student_attendance = $result->row_array();
        if($result->num_rows()>0){
            $this->db->where('id',$student_attendance['id'])->update('attendance',$data);
            return $this->db->affected_rows();
        }else{
            $this->db->insert('attendance',$data);
            return $this->db->insert_id();

        }
    }

    public function save_employee_attendance($data){
        $result = $this->db->select('*')->from('attendance')
                    ->where('user_id',$data['user_id'])
                    ->where('batch_id',$data['batch_id'])
                    ->where('attendance_group','employee')
                    ->where('attendance_date',$data['attendance_date'])
                    ->limit(1)
                    ->get();
        $employee_attendance = $result->row_array();
        if($result->num_rows()>0){
            $this->db->where('id',$employee_attendance['id'])->update('attendance',$data);
            return $this->db->affected_rows();
        }else{
            $this->db->insert('attendance',$data);
            return $this->db->insert_id();

        }
    }

    public function save_student_batch_attehdance($data){
        $students = $data['students'];
        $batch_id = $data['batch_id'];
        $attendance_date = $data['attendance_date'];
        foreach ($students as $student){
            $result = $this->db->select('*')->from('attendance')
                        ->where('user_id',$student['student_id'])
                        ->where('batch_id',$batch_id)
                        ->where('attendance_group','student')
                        ->where('attendance_date',$attendance_date)
                        ->limit(1)
                        ->get();

            if($result->num_rows()==0){
                $this->db->insert('attendance',
                    array(
                        'user_id'=>$student['student_id'],
                        'batch_id'=>$batch_id,
                        'attendance_date'=>$attendance_date,
                        'status'=>'present',
                        'attendance_group'=>'student',
                    ));
            }
        }
    }

    public function get_batch_student($batch_id,$attendance_date) {
        if(!empty($attendance_date)){
            $result = $this->db->select('students.*,attendance.status as astatus,attendance.user_id')
                        ->from('students')
                        ->join('attendance',"attendance.user_id = students.student_id 
                            and attendance_date = '$attendance_date' and attendance_group = 'student'",'left')
                        ->where('batch_no',$batch_id)
                        ->group_by('student_id')
                        ->order_by('student_id')
                        ->get();
        }
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }

    }

    public function get_batch_employee($batch_id,$attendance_date) {
        if(!empty($attendance_date)){
            $query = "SELECT employees.*, attendance.batch_id, attendance.status astatus ,attendance.id
                        FROM employees 
                        LEFT JOIN batch_assign_employee bas ON bas.employee_id = employees.employee_id 
                        LEFT JOIN attendance ON attendance.user_id = employees.employee_id 
                        and attendance_date = '$attendance_date' 
                        and attendance_group = 'employee' 
                        and attendance.batch_id= $batch_id
                        WHERE attendance.batch_id = $batch_id 
                        GROUP BY attendance.id
                        ORDER BY employees.employee_id";
            $result = $query = $this->db->query($query);
            $rows = $result->result_array();
        }
        if (!empty($rows)) {
            return $rows;
        } else {
            $query = "SELECT employees.*,bas.batch_id
                        From employees
                        LEFT JOIN batch_assign_employee bas on bas.employee_id = employees.employee_id 
                        WHERE bas.batch_id IS NOT NULL AND bas.batch_id = $batch_id";
            $result = $query = $this->db->query($query);
            return $result->result_array();
        }

    }


    public function get_student_attendance_report($form_data){

        $group = $form_data['attendance_group'];
        $month = $form_data['month'];
        $year = $form_data['year'];
        $batch = $form_data['batch'];
        $query = "SELECT s.student_id, CONCAT(s.first_name,' ', s.last_name) as student_name,a.status,a.attendance_date
                    FROM students s
                    LEFT JOIN(
                        SELECT a.user_id,a.attendance_date,
                        GROUP_CONCAT(CONCAT(a.attendance_date),'=',(a.status) 
                        ORDER BY a.attendance_date ASC) as status    
                        FROM attendance a    
                        WHERE a.attendance_group = '$group' 
                        AND batch_id  = $batch
                        AND YEAR(attendance_date) = $year
                        AND MONTH(attendance_date) = $month 
                        GROUP BY a.user_id
                        ORDER BY a.attendance_date
                    )a on s.student_id = a.user_id
                    WHERE attendance_date IS NOT NULL
                    GROUP BY student_name";
        $result = $query = $this->db->query($query);
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function get_teacher_attendance_report($form_data){

        $group = $form_data['attendance_group'];
        $month = $form_data['month'];
        $year = $form_data['year'];
        $batch = $form_data['batch'];
        $query = "SELECT e.employee_id, CONCAT(e.first_name,' ', e.middle_name) as employee_name,a.status,a.attendance_date
                    FROM employees e
                    LEFT JOIN(
                        SELECT a.user_id,a.attendance_date,
                        GROUP_CONCAT(CONCAT(a.attendance_date),'=',(a.status) 
                        ORDER BY a.attendance_date ASC) as status    
                        FROM attendance a    
                        WHERE a.attendance_group = '$group' 
                        AND batch_id  = $batch
                        AND YEAR(attendance_date) = $year
                        AND MONTH(attendance_date) = $month 
                        GROUP BY a.user_id
                        ORDER BY a.attendance_date
                    )a on e.employee_id = a.user_id
                    WHERE attendance_date IS NOT NULL
                    GROUP BY employee_name";
        $result = $query = $this->db->query($query);
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }



    public function save_employee_batch_attehdance($data){
        $employees = $data['employees'];
        $batch_id = $data['batch_id'];
        $attendance_date = $data['attendance_date'];
        foreach ($employees as $employee){
            $result = $this->db->select('*')->from('attendance')
                        ->where('user_id',$employee['employee_id'])
                        ->where('batch_id',$batch_id)
                        ->where('attendance_group','employee')
                        ->where('attendance_date',$attendance_date)
                        ->limit(1)
                        ->get();

            if($result->num_rows()==0){
                $this->db->insert('attendance',
                    array(
                        'user_id'=>$employee['employee_id'],
                        'batch_id'=>$batch_id,
                        'attendance_date'=>$attendance_date,
                        'status'=>'present',
                        'attendance_group'=>'employee',
                    ));
            }
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

    public function get_batch_by_id($id) {
        $result = $this->db->select('*')
                    ->from('batches')
                    ->where('id',$id)
                    ->limit(1)
                    ->get();
        if ($result) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    public function update_batch($data, $id) {
        $this->db->where('id', $id)->update('batches', $data);
        return $this->db->affected_rows();
    }

    public function delete_batch($id) {
        $this->db->where('id', $id)->delete('batches');
        return $this->db->affected_rows();
    }

    public function get_demographics($id){
        $this->db->select('d.*,s.*,b.*,c.code');
        $this->db->from('students s');
        $this->db->join('demographics d', 's.student_id=d.student_id', 'left');
        $this->db->join('batches b', 'b.id=d.batch_id', 'left');
        $this->db->join('classes c', 'c.id=b.course_id', 'left');
        $this->db->order_by('s.student_id','desc');
        $this->db->where('s.status',1);
        $this->db->where('b.id',$id);
        $result = $this->db->get();
        //print_r($this->db->last_query()); die();
        if($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function transfer_student_batch($data) {
        $batch_no = $data['batch_no'];
        $last_day_in_batch = $data['last_day_in_batch'];
        $reason_to_leave_batch = $data['reason_to_leave_batch'];
        $str = $data['ids'];
        $sids = explode(",",$str);
        if(isset($data['transfer_type']) &&($data['transfer_type']=='inter_batch')){
            foreach ($sids as $id){
                $this->db->where('student_id', $id)->update('students',
                    array(
                        'batch_no'=>$batch_no,
                        'last_day_in_batch'=>$last_day_in_batch,
                        'reason_to_leave_batch'=>$reason_to_leave_batch
                    ));
            }
        }else{
            foreach ($sids as $id){
                $this->db->where('student_id', $id)->update('students',
                    array(
                        'last_day_in_batch'=>$last_day_in_batch,
                        'reason_to_leave_batch'=>$reason_to_leave_batch,
                        'status'=>2
                    ));

            }
        }


        return $this->db->affected_rows();
    }


	public function get_all_students() {
        $this->db->select('s.*,b.arm,b.session,c.code');
        $this->db->from('students s');
        $this->db->join('batches b', 'b.id=s.batch_no', 'left');
        $this->db->join('classes c', 'c.id=b.course_id', 'left');
        $this->db->order_by('s.student_id','desc');
        $this->db->where('s.status',1);
        $result = $this->db->get();
		//$result = $this->db->select('*')->from('students')->get();
		if($result) {
			return $result->result_array();
		} else {
			return array();
		}
	}

	public function assign_new_employee($data){
        $batch = $this->db->select('id')->from('batch_assign_employee')
                    ->where('batch_id',$data['batch_id'])->limit(1)->get();
        if($batch){
            $this->db->where('batch_id',$data['batch_id'])->delete('batch_assign_employee');
        }
        $employees = $data['employee'];
        $role = $data['role'];
        for($i=0;$i<count($employees);$i++){
            $this->db->insert('batch_assign_employee',
            array(
                    'employee_id'=>$employees[$i],
                    'role_id'=>$role[$i],
                    'batch_id'=>$data['batch_id'])
            );
        }
        return $this->db->insert_id();
    }

    public function get_assigned_employees($id){

        $this->db->select('ae.*,e.first_name,e.middle_name,r.name as role_name,e.photo,e.gender');
        $this->db->from('batch_assign_employee ae');
        $this->db->join('employees e', 'e.employee_id=ae.employee_id', 'left');
        $this->db->join('roles r', 'r.id=ae.role_id', 'left');
        $this->db->order_by('e.first_name','desc');
        $this->db->where('ae.batch_id',$id);
        $result = $this->db->get();

        if($result) {
            return $result->result_array();
        } else {
            return array();
        }

    }

    public function get_grade_scale_level($id)
    {
        $this->db->select('gsl.*,gs.name as grade_name');
        $this->db->from('grade_scales gs');
        $this->db->join('grade_scale_level gsl', 'gsl.grade_scale_id=gs.id', 'left');
        $this->db->order_by('gsl.id', 'asc');
        $this->db->where('gsl.grade_scale_id', $id);
        $result = $this->db->get();

        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function save_student_behavioural_score($data){
        $query = $this->db->select('*')->from('student_grades')
                ->where('student_id',$data['student_id'])
                ->where('term_id',$data['term_id'])
                ->limit(1)->get();
        $result = $query->row_array();
        if($query->num_rows()>0){
            $id = $result['id'];
            //echo "<pre>";print_r($data); die();
            $this->db->where('id', $id)->update('student_grades', $data);
            return $this->db->affected_rows();
        }else{
            $this->db->insert('student_grades', $data);
            return $this->db->insert_id();
        }
    }
    
    public function get_student_behaviour_score($id,$term_id){        
       $result =  $this->db->select('student_grades.*,students.*')
                    ->from('student_grades')
                    ->join('students','students.student_id=student_grades.student_id')
                    ->where('student_grades.student_id',$id)
                    ->where('term_id',$term_id)
                    ->limit(1)->get();
       if($result){
           return $result->row_array();
       } else {
           return array();
       }
    }
           
}