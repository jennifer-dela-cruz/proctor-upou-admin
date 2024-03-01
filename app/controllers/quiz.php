<?php

Class Quiz extends Controller
{

	function index($action = '', $id = ''){
		$data['page_title'] = "Quizes";
		$quiz = $this->loadModel("quiz_model");
		
				
				
		//**	VIEW QUIZ		**//
		if(isset($action) && $action != ""){
			
			//** SAVE PROCTOR STATUS UPDATE **//
			if($action == "save_update"){
				
				$studentId = $_GET['studentId'];
				$quizId = $_GET['quizId'];
				
				
				
				$success = $quiz->update_proctor_student_quiz($quizId, $studentId, $_POST);
				
				$data['attempt_list'] = $quiz->get_quiz_attempt_list($quizId);	
				$data['proctor_status'] = $quiz->get_proctor_summary($quizId, $studentId);
				$data['attempt_data'] = $quiz->get_quiz_attempt_by_student($quizId, $studentId);
				$data['quiz_data'] = $quiz->get_quiz($quizId);
				
				if($success['isPosted'])
				{
					$data['successupdate'] = true;
					//return to quiz attempt view
					return $this->view("quiz/quiz_attempts", $data);
				}else{
					//returned with errors
					$data['errors'] = $success;
					
					return $this->view("quiz/quiz_update_status", $data);
				}
			}else{
			
				$data['attempt_list'] = $quiz->get_quiz_attempt_list($action);
				$data['proctor_status'] = $quiz->get_proctor_summary($action, $id);
				$data['quiz_data'] = $quiz->get_quiz($action);
				
				if(isset($id) && $id != ""){
					$data['attempt_data'] = $quiz->get_quiz_attempt_by_student($action, $id);
					
					
					//** VIEW UPDATE PROCTOR STATUS **//
					if(isset($_GET['update_status'])){
						
						return $this->view("quiz/quiz_update_status", $data);
					}
				}
				
				if(isset($_GET['successupdate'])){
					$data['successupdate'] = $_GET['successupdate'];
				}
				
				return $this->view("quiz/quiz_attempts", $data);
			}
		}
		
		else{
			
			$data['quiz_list'] = $quiz->get_all();
			
			return $this->view("quiz/quiz_view", $data);
		}
		
	}
}