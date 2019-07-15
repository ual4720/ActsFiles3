<?php
	class SideNav_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}
		
		public function get_sidenav()
		{
			//$query = $this->db->get_where("side_nav", array("active" => TRUE));
			$this->db->from("side_nav");
			$this->db->order_by("sort_order", "ASC");
			$query = $this->db->get();
			return $query->result();
		}
	}