<?php
/*************************************************************/
/* Student module model			                  	         */
/* Loads data from MySQL                          			 */
/*************************************************************/

Class Student_Model
{

	function get_all()
	{
		$query = "select user.id, user.firstname, user.lastname, user.email,user.address, user.city, IFNULL(role.shortname, 'Unassigned') as role from mdl_user as user left JOIN mdl_role as role ON user.roleid = role.id where user.deleted = 0 and role.shortname = 'Student'";

		$DB = new Database();
		$data = $DB->read($query);
		if(is_array($data))
		{

			return $data;
		}

		return false;
	}
	function get_available_courses()
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

	function get_student($id){

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
}