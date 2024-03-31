<?php
/**************************************************************/
/* Quiz module controller			                          */
/* Checks the URL action parameter,                           */
/* then it displays the requested model and view 			  */
/* Has save and default views                                 */
/**************************************************************/

Class Quiz extends Controller
{

	function index($action = '', $id = ''){
		$data['page_title'] = "Quizzes";
		$quiz = $this->loadModel("quiz_model");


		$total_violations = 0;

		//	VIEW QUIZ
		if(isset($action) && $action != ""){

			// SAVE PROCTOR STATUS UPDATE
			if($action == "save_update"){

				$studentId = $_GET['studentId'];
				$quizId = $_GET['quizId'];



				$success = $quiz->update_proctor_student_quiz($quizId, $studentId, $_POST);

				$data['attempt_list'] = $quiz->get_quiz_attempt_list($quizId);
				$data['proctor_status'] = $quiz->get_proctor_summary($quizId, $studentId);
				$data['attempt_data'] = $quiz->get_quiz_attempt_by_student($quizId, $studentId);
				$data['quiz_data'] = $quiz->get_quiz($quizId);
				$data['proctoring_type'] = $quiz->get_proctoring_type($quizId);
				$data['total_violations'] = $quiz->get_total_violations($quizId, $studentId, $data['proctoring_type'][0]->proctoring_type);


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
				$data['proctoring_type'] = $quiz->get_proctoring_type($action);

				if(isset($id) && $id != ""){
					$data['attempt_data'] = $quiz->get_quiz_attempt_by_student($action, $id);

					$data['total_violations'] = $quiz->get_total_violations($action, $id, $data['proctoring_type'][0]->proctoring_type);

					// VIEW UPDATE PROCTOR STATUS
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