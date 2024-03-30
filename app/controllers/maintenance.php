<?php
/**************************************************************/
/* User and course modules controller			              */
/* Checks the URL action parameter,                           */
/* then it displays the requested model and view			  */
/* Has create, save, edit, restore, delete, and default views */
/**************************************************************/

Class Maintenance extends Controller
{

	function user($action = '', $id = '')
	{

		$data['page_title'] = "User";
		$posts = $this->loadModel("user_model");
 	 	$data['archive'] = false;

		//	CREATE USER
		if($action == 'create'){
			$data['user_roles'] = $posts->get_roles();

			return $this->view("maintenance/users/maintenance_user_create_view", $data);
		}

		// CREATE USER SAVE
		else if($action == "save_create")
		{
			$success = $posts->create_user($_POST);
			if($success['isPosted'])
			{
				// return to user table
				$this->redirect('maintenance/user?success=1');
			}else{
				$data['user_roles'] = $posts->get_roles();
				$data['errors'] = $success;

				return $this->view("maintenance/users/maintenance_user_create_view", $data);
			}
		}

		//	EDIT USER
		else if($action == "edit"){
			$data['user_roles'] = $posts->get_roles();

			//user id must have value for editing
			if($id != ''){
				$data['user_data'] = $posts->get_user($id);
			}

			return $this->view("maintenance/users/maintenance_user_edit_view", $data);
		}

		//	EDIT USER SAVE
		else if($action == "save_edit"){

			$success = $posts->edit_user($_POST, $id);

			if($success['isPosted'])
			{

				//return to user table
				$this->redirect('maintenance/user?successedit=1');
			}else{
				$data['user_roles'] = $posts->get_roles();
				$data['user_data'] = $posts->get_user($id);
				$data['errors'] = $success;

				return $this->view("maintenance/users/maintenance_user_edit_view", $data);
			}


		}

		//	DELETE USER
		else if($action == "delete_user")
		{
			$success = $posts->delete_user($id);
			if($success['isPosted'])
			{
				$this->redirect('maintenance/user?successdelete=1');
			}else{
				$this->redirect('maintenance/user?successdelete=0');
			}
		}

		//	RESTORE USER
		else if($action == "restore_user")
		{
			$success = $posts->restore_user($id);
			if($success['isPosted'])
			{
				//return to user table
				$this->redirect('maintenance/user?successrestore=1');
			}else{
				//return to archives table
				$this->redirect('maintenance/user/archive?successrestore=0');
			}
		}

		//	SHOW ARCHIVES
		else if($action == "archive")
		{
			$data['users_data'] = $posts->show_archives($id);
			$data['archive'] = true;

			if(isset($_GET['successrestore'])){
				$data['successrestore'] = $_GET['successrestore'];
			}


			return $this->view("maintenance/users/maintenance_user_view", $data);
		}


		// DEFAULT
		else
		{
			$data['users_data'] = $posts->get_all();

			if(isset($_GET['success'])){
				$data['success'] = $_GET['success'];
			}else if(isset($_GET['successedit'])){
				$data['successedit'] = $_GET['successedit'];
			}else if(isset($_GET['successdelete'])){
				$data['successdelete'] = $_GET['successdelete'];
			}else if(isset($_GET['successrestore'])){
				$data['successrestore'] = $_GET['successrestore'];
			}


			return $this->view("maintenance/users/maintenance_user_view", $data);
		}

	}



	function course_categories($action = '', $id = ''){
		$data['page_title'] = "Course Categories";
		$course_categories = $this->loadModel("course_categories_model");
		$data['archive'] = false;

		// 	CREATE COURSE CATEGORY
		if($action == "create"){

			return $this->view("maintenance/course_categories/maintenance_course_categories_create", $data);
		}


		//	 CREATE COURSE CATEGORY SAVE
		else if($action == "save_create")
		{
			$success = $course_categories->create_course_category($_POST);
			console($success);
			if($success['isPosted'])
			{

				//return to user table
				$this->redirect('maintenance/course_categories?success=1');
			}else{

				$data['errors'] = $success;

				return $this->view("maintenance/course_categories/maintenance_course_categories_create", $data);
			}
		}

		//	EDIT COURSE CATEGORY
		else if($action == "edit"){


			console($id);
			//user id must have value for editing
			if($id != ''){
				$data['course_category_data'] = $course_categories->get_course_category($id);
			}

			return $this->view("maintenance/course_categories/maintenance_course_categories_edit", $data);

		}

		//	EDIT COURSE CATEGORY SAVE
		else if($action == "save_edit"){

			$success = $course_categories->edit_course_category($_POST, $id);

			if($success['isPosted'])
			{

				//return to user table
				$this->redirect('maintenance/course_categories?successedit=1');
			}else{

				if($id != ''){
					$data['course_category_data'] = $course_categories->get_course_category($id);
				}
				$data['errors'] = $success;

				return $this->view("maintenance/course_categories/maintenance_course_categories_edit", $data);
			}
		}

		//	DELETE COURSE CATEGORY
		else if($action == "delete_course_category")
		{
			$success = $course_categories->delete_course_category($id);
			if($success['isPosted'])
			{
				$this->redirect('maintenance/course_categories?successdelete=1');
			}else{
				$this->redirect('maintenance/course_categories?successdelete=0');
			}
		}

		//	RESTORE USER
		else if($action == "restore_course_category")
		{
			$success = $course_categories->restore_course_category($id);
			if($success['isPosted'])
			{
				//return to user table
				$this->redirect('maintenance/course_categories?successrestore=1');
			}else{
				//return to archives table
				$this->redirect('maintenance/course_categories/archive?successrestore=0');
			}
		}

		//	SHOW ARCHIVES
		else if($action == "archive")
		{
			$data['course_categories_data'] = $course_categories->show_archives($id);
			$data['archive'] = true;

			if(isset($_GET['successrestore'])){
				$data['successrestore'] = $_GET['successrestore'];
			}


			return $this->view("maintenance/course_categories/maintenance_course_categories_view", $data);
		}


		else{
			$data['course_categories_data'] = $course_categories->get_all();

			if(isset($_GET['success'])){
				$data['success'] = $_GET['success'];
			}else if(isset($_GET['successedit'])){
				$data['successedit'] = $_GET['successedit'];
			}else if(isset($_GET['successdelete'])){
				$data['successdelete'] = $_GET['successdelete'];
			}else if(isset($_GET['successrestore'])){
				$data['successrestore'] = $_GET['successrestore'];
			}

			return $this->view("maintenance/course_categories/maintenance_course_categories_view", $data);
		}
	}





	function students($action = '', $id = '')
	{
		$data['page_title'] = "Students";

		if($action == 'enroll'){
			//return enroll student view
			return $this->view("maintenance/students/maintenance_student_create_view", $data);
		}
		return $this->view("maintenance/students/maintenance_student_view", $data);
	}

}