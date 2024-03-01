<?php

Class Test extends Controller
{
	
	function index()
	{
		$data['page_title'] = "Test";
		
		
		
		return $this->view("test_view", $data);
		
	}
}