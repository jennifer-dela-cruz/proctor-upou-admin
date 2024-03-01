<?php 
Class User_Model
{
	
	function login($POST)
	{
		$DB = new Database();

		$validation = $this->validate_user_login($POST);
		
		$_SESSION['error'] = "";
		if($validation['valid']){

			$arr['unameoremail'] = $POST['unameoremail'];
			$arr['password'] = $POST['password'];

	
			
			//$query = "select user.id, user.username, user.firstname, user.lastname, user.email,user.address, user.city, IFNULL(role.shortname, 'Unassigned') as role from mdl_user as user left JOIN mdl_role as role ON user.roleid = role.id where (user.username = :unameoremail OR user.email = :unameoremail) && user.password = :password limit 1";
			$query = "select user.id, user.username, user.firstname, user.lastname, user.email,user.address, user.city from mdl_user as user 
						left JOIN mdl_proctor_upou_admin_portal_professors as proctors ON user.id = proctors.user_id
						where (user.username = :unameoremail OR user.email = :unameoremail)  and user.id = proctors.user_id limit 1";
			
			$data = $DB->read($query,$arr);
				console($data);
			if(is_array($data))
			{
			
				if(count($data) > 0){
					//logged in
					$_SESSION['username'] = $data[0]->username;
					$_SESSION['firstname'] = $data[0]->firstname;
					$_SESSION['lastname'] = $data[0]->lastname;
					$_SESSION['email'] = $data[0]->email;
					$_SESSION['id'] = $data[0]->id;
					
					header("Location:". ROOT . "course");
					die;
				}else{
					$validation['valid'] = false;
					array_push($validation['errorMessages'], "Invalid username/email and password");
				
					return $validation;
				}

			}else{
				$validation['valid'] = false;
				array_push($validation['errorMessages'], "Invalid username/email and password");
			
				return $validation;
			}
			
		
		}else{
			return $validation;
		}

	}
	
	function logout(){
		unset($_SESSION['name']);
		unset($_SESSION['username']);
		unset($_SESSION['firstname']);
		unset($_SESSION['lastname']);
		unset($_SESSION['email']);
		unset($_SESSION['role']);
	}

	function get_all()
	{
		$query = "select user.id, user.firstname, user.lastname, user.email,user.address, user.city, IFNULL(role.shortname, 'Unassigned') as role from mdl_user as user left JOIN mdl_role as role ON user.roleid = role.id where user.deleted = 0;";

		$DB = new Database();
		$data = $DB->read($query);
		if(is_array($data))
		{

			return $data;
		}

		return false;
	}
	
	function get_roles()
	{
		$query = "select * from mdl_role";
		
		$DB = new Database();
		$data = $DB->read($query);
		if(is_array($data)){
			return $data;
		}
		
		return false;
	}
	
	function get_user($id){
		$query = "select user.id, user.firstname, user.lastname, user.username, user.phone1, user.password, user.roleid, user.email,user.address, user.city, IFNULL(role.shortname, 'Unassigned') as role from mdl_user as user left JOIN mdl_role as role ON user.roleid = role.id where user.id = :id;";
		$params = ['id' => $id];
		
		$DB = new Database();
		$data = $DB->read($query, $params);
		if(is_array($data))
		{
			return $data;
		}

		return false;
		
	}
	

	function create_user($POST){
		
		$validation = $this->validate_user($POST);

		//if valid
		if($validation['isPosted'])
		{
				$DB = new Database();

				$arr['username'] = $POST['uname'];
				$arr['password'] = $POST['password'];
				$arr['firstname'] = $POST['inputfname'];
				$arr['lastname'] = $POST['inputlname'];
				$arr['roleid'] = $POST['roleselect'];
				$arr['email'] = $POST['email1'];
				$arr['phone1'] = $POST['cono'];
				$arr['address'] = $POST['address1'];
				$arr['city'] = $POST['city'];


				$query = "insert into mdl_user (username,		
												password,	
												firstname,	
												lastname,	
												roleid,		
												email,		
												phone1,		
												address,		
												city) 
												VALUES
												(:username,		
												:password,	
												:firstname,	
												:lastname,	
												:roleid,	
												:email,		
												:phone1,	
												:address,		
												:city)";
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
	
	function edit_user($POST, $id){
		
		$validation = $this->validate_user($POST);

		//if valid
		if($validation['isPosted'])
		{
			 $DB = new Database();

				$arr['id'] = $id;
				$arr['username'] = $POST['uname'];
				$arr['password'] = $POST['password'];
				$arr['firstname'] = $POST['inputfname'];
				$arr['lastname'] = $POST['inputlname'];
				$arr['roleid'] = $POST['roleselect'];
				$arr['email'] = $POST['email1'];
				$arr['phone1'] = $POST['cono'];
				$arr['address'] = $POST['address1'];
				$arr['city'] = $POST['city'];


				$query = "update mdl_user SET username = :username,		
											  password = :password,	
											  firstname = :firstname,
											  lastname = :lastname,	
											  roleid = :roleid,		
											  email = :email,		
											  phone1 = :phone1,		
											  address = :address,		
											  city = :city
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
	
	function delete_user($id){
		
		//if valid
		$validation['isPosted'] = false;
		
		$DB = new Database();
		$arr['id'] = $id;

		$query = "update mdl_user SET deleted = 1
								  WHERE id = :id";
		$data = $DB->write($query,$arr); 

	
		if($data)
		{
			$validation['isPosted'] = true;
			return $validation;
		}else{
			//failed insert

			$validation['isPosted'] = false;
			array_push($validation['errorMessages'], "Failed to delete user");

			return $validation;
		}
	}
	
	function show_archives(){
		$query = "select user.id, user.firstname, user.lastname, user.email,user.address, user.city, IFNULL(role.shortname, 'Unassigned') as role from mdl_user as user left JOIN mdl_role as role ON user.roleid = role.id where user.deleted = 1;";

		$DB = new Database();
		$data = $DB->read($query);
		if(is_array($data))
		{

			return $data;
		}

		return false;
	}

	function restore_user($id){
		//if valid
		$validation['isPosted'] = false;
		
		$DB = new Database();
		$arr['id'] = $id;

		$query = "update mdl_user SET deleted = 0
								  WHERE id = :id";
		$data = $DB->write($query,$arr); 
	
		if($data)
		{
			$validation['isPosted'] = true;
			return $validation;
		}else{
			//failed insert

			$validation['isPosted'] = false;
			array_push($validation['errorMessages'], "Failed to restore user");

			return $validation;
		}
	}
	
	function validate_user($POST){
		
		$isValid['isPosted'] = true;
		$isValid['errorMessages'] = [];
		
		if($POST['inputfname'] == ""){
			$isValid['isPosted'] = false;
			array_push($isValid['errorMessages'], "Missing First Name");
		}
		
		if($POST['inputlname'] == ""){
			$isValid['isPosted'] = false;
			array_push($isValid['errorMessages'], "Missing Last Name");
		}
		
		if($POST['uname'] == ""){
			$isValid['isPosted'] = false;
			array_push($isValid['errorMessages'], "Missing Username");
		}
		
		if($POST['password'] == ""){
			$isValid['isPosted'] = false;
			array_push($isValid['errorMessages'], "Missing Password");
		}
		
		if($POST['confirmpassword'] == ""){
			$isValid['isPosted'] = false;
			array_push($isValid['errorMessages'], "You did not confirm your password");
		}else if($POST['password'] != $POST['confirmpassword']){
			$isValid['isPosted'] = false;
			array_push($isValid['errorMessages'], "Your password did not match");
		}
		
		
		return $isValid;
	}
	
	function validate_user_login($POST){
		$isValid['valid'] = true;
		$isValid['errorMessages'] = [];
		
		if($POST['password'] == ""){
			$isValid['valid'] = false;
			array_push($isValid['errorMessages'], "You did not enter any password");
		}
		
		if($POST['unameoremail'] == ""){
			$isValid['valid'] = false;
			array_push($isValid['errorMessages'], "You did not enter any username/email");
		}
		
		return $isValid;
		
	}
	

}