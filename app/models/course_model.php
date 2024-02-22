<?php 
Class Course_Model
{
	function get_all()
	{
		$query = "SELECT * FROM mdl_course;";

		$DB = new Database();
		$data = $DB->read($query);
		if(is_array($data))
		{
			return $data;
		}

		return false;
	}
	
	function get_course($id)
	{
		$query = "SELECT * FROM mdl_course where id = :id;";

		$params = ['id' => $id];
		
		$DB = new Database();
		$data = $DB->read($query, $params);
		if(is_array($data))
		{
			return $data;
		}

		return false;
	}
	
	function get_categories()
	{
		$query = "SELECT id, name, description FROM mdl_course_categories where visible = 1;";

		$DB = new Database();
		$data = $DB->read($query);
		if(is_array($data))
		{

			return $data;
		}

		return false;
	}
	
	function get_quiz_by_course($courseid){
		$query = "SELECT * FROM mdl_quiz where course = :courseid;";

		$params = ['courseid' => $courseid];
		
		$DB = new Database();
		$data = $DB->read($query, $params);
		if(is_array($data))
		{
			return $data;
		}

		return false;
	}
	
	
	function create_course($POST){
		$validation = $this->validate_course($POST);

		//if valid
		if($validation['isPosted'])
		{
			
				$DB = new Database();

				$arr['fullname'] = $POST['coursename'];
				$arr['shortname'] = $POST['courseshort'];
				$arr['idnumber'] = $POST['coursenumber'];
				$arr['category'] = $POST['coursecategory'];


				$query = "insert into mdl_course (fullname,		
												category,
												shortname,	
												idnumber) 
												VALUES
												(:fullname,		
												:category,
												:shortname,	
												:idnumber)";
				$data = $DB->write($query,$arr);
				
				
				if($data)
				{
					return $validation;
				}else{
					//failed insert

					$validation['isPosted'] = false;
					array_push($validation['errorMessages'], "Failed to save course");

					return $validation;
				}
		}else{
			return $validation;
		}
	}
	
	function edit_course($POST, $id){
		
		$validation = $this->validate_course($POST);

		//if valid
		if($validation['isPosted'])
		{
			 $DB = new Database();

				$arr['id'] = $id;
				$arr['fullname'] = $POST['coursename'];
				$arr['shortname'] = $POST['courseshort'];
				$arr['idnumber'] = $POST['coursenumber'];
				$arr['category'] = $POST['coursecategory'];

												
			    $query = "update mdl_course SET fullname = :fullname,		
											  shortname = :shortname,	
											  idnumber = :idnumber,
											  category = :category
										WHERE id = :id";
				
				$data = $DB->write($query,$arr); 
			
			
				if($data)
				{
					return $validation;
				}else{
					//failed insert

					$validation['isPosted'] = false;
					array_push($validation['errorMessages'], "Failed to update course");

					return $validation;
				}

		}else{

			return $validation;
		}
	
	}
	function validate_course($POST){
		
		$isValid['isPosted'] = true;
		$isValid['errorMessages'] = [];
		
		if($POST['coursename'] == ""){
			$isValid['isPosted'] = false;
			array_push($isValid['errorMessages'], "Missing Course Name");
		}
		
		if($POST['courseshort'] == ""){
			$isValid['isPosted'] = false;
			array_push($isValid['errorMessages'], "Missing Course Shortname");
		}
		
		if($POST['coursecode'] == ""){
			$isValid['isPosted'] = false;
			array_push($isValid['errorMessages'], "Missing Course Code");
		}
		
		if($POST['coursenumber'] == ""){
			$isValid['isPosted'] = false;
			array_push($isValid['errorMessages'], "Missing Course Number");
		}
		
		
		return $isValid;
	}
	
	
}