<?php

Class Student extends Controller
{

	function index($action = '', $id = ''){
		$data['page_title'] = "Students";
		$student = $this->loadModel("student_model");
		
		if($action == "edit"){
			
			$data['course_available'] = $student->get_available_courses();
			
			if(isset($id) && $id != ""){
				$data['student_data'] = $student->get_student($id);
			}
			
			return $this->view("student/student_edit", $data);
		}
		else{
			$data['student_list'] = $student->get_all();
			
			return $this->view("student/student_view", $data);
		}
	}
}