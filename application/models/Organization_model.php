<?php
	class Organization_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}
		
		public function get_organization()
		{
			$query = $this->db->get("organization", 1);
			return $query->row();
		}
		
		public function set_organization()
		{
			$this->load->helper("url");
			
			//$slug = url_title($this->input->post("title"), "dash", TRUE);
			
			$data = array(
				"name" => $this->input->post("name"),
				"chapter" => $this->input->post("chapter"),
				"slogan" => $this->input->post("slogan"),
				"phone" => $this->input->post("phone"),
				"fax" => $this->input->post("fax"),
				"email" => $this->input->post("email"),
				"address_line_1" => $this->input->post("address_line_1"),
				"address_line_2" => $this->input->post("address_line_2"),
				"city" => $this->input->post("city"),
				"state" => $this->input->post("state"),
				"zip" => $this->input->post("zip")
			);
			
			$this->db->empty_table("organization");
			return $this->db->insert("organization", $data);
		}
	}