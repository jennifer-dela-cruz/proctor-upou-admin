<?php
/*************************************************************/
/* Quiz module model			                  	         */
/* Loads data from MySQL                          			 */
/*************************************************************/

Class Quiz_Model
{
	function get_all()
	{
		$query = "select quiz.id, quiz.name, quiz.intro, IFNULL(course.fullname, 'Unassigned') as coursename
					from mdl_quiz as quiz
					left JOIN mdl_course as course ON quiz.course = course.id;";

		$DB = new Database();
		$data = $DB->read($query);
		if(is_array($data))
		{
			return $data;
		}

		return false;
	}

	function get_quiz($id){
		$query = "select quiz.id, quiz.name, quiz.intro,  course.id as courseid, IFNULL(course.fullname, 'Unassigned') as coursename
					from mdl_quiz as quiz
					left JOIN mdl_course as course ON quiz.course = course.id
					where quiz.id = :quizid;";

		$params = ['quizid' => $id];

		$DB = new Database();
		$data = $DB->read($query, $params);
		if(is_array($data))
		{
			return $data;
		}

		return false;
	}

	function get_quiz_attempt_list($quizid){
		$query = "select attemptlist.id as attemptid, student.id as studentid, student.firstname as studentfirstname, student.lastname as studentlastname, quiz.id as quizid, quiz.name as quizname, quiz.intro as quizintro, IFNULL(course.fullname, 'Unassigned') as coursename
					from mdl_proctor_upou_quiz_students as attemptlist
						left JOIN mdl_quiz as quiz ON quiz.id = attemptlist.quiz_id
						left join mdl_user as student ON student.id = attemptlist.user_id
						left JOIN mdl_course as course ON quiz.course = course.id
					where quiz.id = :quizid group by student.id;";

		$params = ['quizid' => $quizid];

		$DB = new Database();
		$data = $DB->read($query, $params);
		if(is_array($data))
		{
			return $data;
		}

		return false;
	}

	function get_quiz_attempt_by_student($quizid, $studentid){
		$query = "select attemptlist.id  as attemptid, attemptlist.created_datetime, attemptlist.violation, student.id as studentid, student.username, student.email, student.firstname as studentfirstname, student.lastname as studentlastname, quiz.id as quizid, quiz.name as quizname, quiz.intro as quizintro, IFNULL(course.fullname, 'Unassigned') as coursename, attemptlist.path
					from mdl_proctor_upou_quiz_student_evidences as attemptlist

						left JOIN mdl_quiz as quiz ON quiz.id = attemptlist.proctor_upou_quiz_id
						left join mdl_user as student ON student.id = attemptlist.proctor_upou_quiz_student_id
						left JOIN mdl_course as course ON quiz.course = course.id

					where attemptlist.proctor_upou_quiz_id = :quizid and
						  attemptlist.proctor_upou_quiz_student_id = :studentid and
						  attemptlist.violation != :violationmsg
						  ";

						  echo $query;
						  exit;

		$arr['quizid'] = $quizid;
		$arr['studentid'] = $studentid;
		$arr['violationmsg'] = "NO_VIOLATION";

		$DB = new Database();
		$data = $DB->read($query, $arr);
		if(is_array($data))
		{
			return $data;
		}

		return false;
	}

	function get_proctor_summary($quizId, $studentId){

		$query = "SELECT attempt.*, user.firstname, user.lastname FROM mdl_proctor_upou_quiz_students as attempt
					left join mdl_user as user on attempt.violation_approval_user_id = user.id
					where attempt.user_id = :studentid AND attempt.quiz_id = :quizid";



		$arr['quizid'] = $quizId;
		$arr['studentid'] = $studentId;

		$DB = new Database();
		$data = $DB->read($query, $arr);
		if(is_array($data))
		{
			return $data;
		}

		return false;
	}

	function get_proctoring_type($quizId) {

		$query = "SELECT proctoring_type FROM mdl_proctor_upou_quiz_config WHERE quiz_id = :quizid";

		$arr['quizid'] = $quizId;

		$DB = new Database();
		$data = $DB->read($query, $arr);
		if(is_array($data))
		{
			return $data;
		}

		return false;
	}

	function update_proctor_student_quiz($quizId, $studentId, $POST){


		//Start POST Validation
		$validation = $this->validate_status_update($POST, $quizId, $studentId);


		//if valid
		if($validation['isPosted'])
		{

			 $DB = new Database();

				$arr['violation_approval_status'] = $POST['statusselect'];
				$arr['violation_approval_reason'] = $POST['reason'];
				$arr['violation_approval_user_id'] = $_SESSION['id'];
				$arr['user_id'] = $studentId;
				$arr['quiz_id'] = $quizId;


			    $query = "update mdl_proctor_upou_quiz_students SET   violation_approval_status = :violation_approval_status,
																  violation_approval_reason = :violation_approval_reason,
																  violation_approval_user_id = :violation_approval_user_id,
																  violation_approval_datetime = NOW()
															WHERE user_id = :user_id AND quiz_id = :quiz_id";

				$data = $DB->write($query,$arr);


			if($data)
			{
				return $validation;
			}else{
				//failed insert

				$validation['isPosted'] = false;
				array_push($validation['errorMessages'], "Failed to update proctor status");


				return $validation;
			}

		}else{
			return $validation;
		}

	}

	function validate_status_update($POST, $quizId, $studentId){

		$isValid['isPosted'] = true;
		$isValid['errorMessages'] = [];

		//If Quiz ID param is empty, return error
		if(!isset($quizId) || $quizId == ""){
			$validation['isPosted'] = false;
			array_push($isValid['errorMessages'], "Missing Quiz ID");

		}

		//If Student ID param is empty, return error
		if(!isset($studentId) || $studentId == ""){
			$validation['isPosted'] = false;
			array_push($isValid['errorMessages'], "Missing Student ID");

		}

		if($POST['statusselect'] == ""){
			$isValid['isPosted'] = false;
			array_push($isValid['errorMessages'], "Select a Status");
		}

		if($POST['reason'] == ""){
			$isValid['isPosted'] = false;
			array_push($isValid['errorMessages'], "Missing Reason field");
		}

		return $isValid;
	}

}