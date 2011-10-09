<?php

class Rest
{
	
	public function __construct()
	{
		$this->EE =& get_instance();
	}
	
	public function entries()
	{
		header('Content-type: application/json');
		
		echo json_encode(array(
			(object)array(
				'title' => 'test'
			),
			(object)array(
				'title' => 'two'
			)
		));
		
		exit();
	}
	
}