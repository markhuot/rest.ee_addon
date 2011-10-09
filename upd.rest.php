<?php

class Rest_upd
{
	
	var $module_name = 'Rest';
	var $version = '1.0.0';
	
	public function __construct() 
	{
		$this->EE =& get_instance();
	}
	
	public function install()
	{
		// install module
		$data = array(
			'module_name' => $this->module_name,
			'module_version' => $this->version,
			'has_cp_backend' => 'y',
			'has_publish_fields' => 'y'
		);
		
		$this->EE->db->insert('modules', $data);
		
		
		// install actions
		foreach (array(
			array('class' => $this->module_name, 'method' => 'entries')
		) as $action)
		{
			$this->EE->db->insert('actions', $action);
		}
		
		return TRUE;
	}
	
	public function update($current = '')
	{
		if ($current == $this->version)
		{
			return FALSE;
		}
			
		if ($current < 2.0) 
		{
			// Do your update code here
		} 
		
		return TRUE; 
	}
	
	public function uninstall()
	{
		// remove module
		$this->EE->db->where('module_name', $this->module_name);
		$this->EE->db->delete('modules');
		
		// remove actions
		// remove module
		$this->EE->db->where('class', $this->module_name);
		$this->EE->db->delete('actions');
		
		// remove publish page updates
		$this->EE->load->library('layout');
		$this->EE->layout->delete_layout_tabs($this->tabs(), $this->module_name);
		
		return TRUE;
	}
	
}