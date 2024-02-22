<?php

Class Course extends Controller
{

	function index($action = '', $id = ''){
		$data['page_title'] = "Courses";
		$course = $this->loadModel("course_model");
	
		//**	CREATE COURSE 		**//
		if($action == "create"){
			$data['course_categories'] = $course->get_categories();
			
			return $this->view("course/course_create", $data);
		}
		
		//**	SAVE CREATE COURSE			**//
		else if($action =="save_create"){
			$success = $course->create_course($_POST);
			
			if($success['isPosted'])
			{
				//return to course view
				$this->redirect('course?success=1');
			}else{
				$data['course_categories'] = $course->get_categories();
				$data['errors'] = $success;
				
				return $this->view("course/course_create", $data);
			}
		}
		
		//**	EDIT COURSE 		**//
		if($action == "edit"){
			$data['course_categories'] = $course->get_categories();
			
			if(isset($id) && $id != ""){
				$data['course_data'] = $course->get_course($id);
			}
			
			
			return $this->view("course/course_edit", $data);
		}
		
		//**	SAVE EDIT COURSE			**//
		else if($action =="save_edit"){
			$success = $course->edit_course($_POST, $id);
			
			if($success['isPosted'])
			{
				//return to course view
				$this->redirect('course/'.$id.'?successedit=1');
			}else{
				$data['course_categories'] = $course->get_categories();
				$data['course_data'] = $course->get_course($id);
				$data['errors'] = $success;
				
				return $this->view("course/course_edit", $data);
			}
		}
		
		//**	DEFAULT VIEW			**//
		else{
			$data['course_list'] = $course->get_all();
			$data['course_categories'] = $course->get_categories();
			
			if(isset($_GET['success'])){
				$data['success'] = $_GET['success'];
			}else if(isset($_GET['successedit'])){
				$data['successedit'] = $_GET['successedit'];
			}
			
			if(isset($action) && $action != ""){
				$data['course_data'] = $course->get_course($action);
				$data['quiz_data'] = $course->get_quiz_by_course($action);
			}
			
			return $this->view("course/course_view", $data);
		}
	}

}