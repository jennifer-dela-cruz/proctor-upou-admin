<?php

Class Home extends Controller
{

	function index()
	{
		$DB = new Database();
		$data['page_title'] = "Home";
		
		$this->view("home_view", $data);
	}
}