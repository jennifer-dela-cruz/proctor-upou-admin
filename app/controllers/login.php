<?php

Class Login extends Controller
{

	function login(){
		
		$data['page_title'] = "Login";
		$data['validation']['valid'] = true;
		$user = $this->loadModel("user_model");
		
		
		if(isset($_POST['unameoremail'])){
 	 		$data['validation'] = $user->login($_POST);
 	 	}
		
		
		$this->view("login_view", $data);
		
		
		//If logging out
		if(isset($_SESSION['username']) && isset($_SESSION['firstname'])){
			$user->logout();
		}
	}
	
}