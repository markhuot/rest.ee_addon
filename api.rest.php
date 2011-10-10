<?php

class Rest_api
{
	
	public function __construct()
	{
		$this->EE =& get_instance();
	}
	
	public function _before()
	{
		$this->EE->load->api('recognize');
		return $this->EE->recognize->verify();
	}
	
	public function channels()
	{
		$this->EE->db->order_by('channel_title', 'asc');
		return $this->EE->db->get('exp_channels')->result();
	}
	
	public function entries($channel_id=FALSE)
	{
		if ($channel_id)
		{
			$this->EE->db->where('channel_id', $channel_id);
		}
		
		$this->EE->db->order_by('entry_date', 'desc');
		return $this->EE->db->get('exp_channel_titles')->result();
	}
	
}