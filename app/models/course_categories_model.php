<?php 
Class Course_Categories_Model
{
	function get_all()
	{
		$query = "SELECT id, name, description FROM mdl_course_categories where visible = 1";

		$DB = new Database();
		$data = $DB->read($query);
		if(is_array($data))
		{

			return $data;
		}

		return false;
	}
	
	
	function get_course_category($id){
		$query = "SELECT id, name, description FROM mdl_course_categories where id = :id";
		$params = ['id' => $id];
		
		$DB = new Database();
		$data = $DB->read($query, $params);
		if(is_array($data))
		{
			return $data;
		}

		return false;
		
	}
	
	
	function create_course_category($POST){
		
		$validation = $this->validate_course_category($POST);

		//if valid
		if($validation['isPosted'])
		{
				 $DB = new Database();

				$arr['name'] = $POST['name'];
				$arr['description'] = $POST['description'];

				$query = "insert into mdl_course_categories (name,		
												description) 
												VALUES
												(:name,		
												:description)";
				$data = $DB->write($query,$arr); 
				
				
				
				if($data)
				{
					return $validation;
				}else{
					//failed insert

					$validation['isPosted'] = false;
					array_push($validation['errorMessages'], "Failed to Save Course Category");

					return $validation;
				}

		}else{
			return $validation;
		}
		
	}
	
	function edit_course_category($POST, $id){
		$validation = $this->validate_course_category($POST);

		//if valid
		if($validation['isPosted'])
		{
			 $DB = new Database();

				$arr['id'] = $id;
				$arr['name'] = $POST['name'];
				$arr['description'] = $POST['description'];
				


				$query = "update mdl_course_categories SET name = :name,		
											  description = :description
										  WHERE id = :id";
				$data = $DB->write($query,$arr); 
			
				if($data)
				{
					return $validation;
				}else{
					//failed insert

					$validation['isPosted'] = false;
					array_push($validation['errorMessages'], "Failed to save user");

					return $validation;
				}

		}else{

			return $validation;
		}
	}
	
	function delete_course_category($id){
		
		//if valid
		$validation['isPosted'] = false;
		
		$DB = new Database();
		$arr['id'] = $id;

		$query = "update mdl_course_categories SET visible = 0
								  WHERE id = :id";
		$data = $DB->write($query,$arr); 

	
		if($data)
		{
			$validation['isPosted'] = true;
			return $validation;
		}else{
			//failed insert

			$validation['isPosted'] = false;
			array_push($validation['errorMessages'], "Failed to delete category");

			return $validation;
		}
	}
	
	function show_archives(){
		$query = "SELECT id, name, description FROM mdl_course_categories where visible = 0";

		$DB = new Database();
		$data = $DB->read($query);
		if(is_array($data))
		{

			return $data;
		}

		return false;
	}

	function restore_course_category($id){
		//if valid
		$validation['isPosted'] = false;
		
		$DB = new Database();
		$arr['id'] = $id;

		$query = "update mdl_course_categories SET visible = 1
								  WHERE id = :id";
		$data = $DB->write($query,$arr); 
	
		if($data)
		{
			$validation['isPosted'] = true;
			return $validation;
		}else{
			//failed insert

			$validation['isPosted'] = false;
			array_push($validation['errorMessages'], "Failed to restore category");

			return $validation;
		}
	}
	
	
	function validate_course_category($POST){
		
		$isValid['isPosted'] = true;
		$isValid['errorMessages'] = [];
		
		if($POST['name'] == ""){
			$isValid['isPosted'] = false;
			array_push($isValid['errorMessages'], "Missing Name");
		}
		
		if($POST['description'] == ""){
			$isValid['isPosted'] = false;
			array_push($isValid['errorMessages'], "Missing Description");
		}
		
	
		
		
		return $isValid;
	}
}