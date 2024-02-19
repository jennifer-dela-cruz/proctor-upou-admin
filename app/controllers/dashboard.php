<?php

Class Dashboard extends Controller
{

	function index()
	{
		$DB = new Database();
		$data['page_title'] = "Dashboard";
		
		$this->view("dashboard_view", $data);
	}
}