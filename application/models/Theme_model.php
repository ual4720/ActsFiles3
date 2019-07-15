<?php
	class Theme_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}
		
		public function get_theme()
		{
			$query = $this->db->get_where("themes", array("active" => TRUE), 1);
			return $query->row();
		}
	}