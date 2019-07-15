<?php
	class Nav_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}
		
		public function get_nav($menu = "side_menu", $page = NULL)
		{
			//Only select pages from defined menu and page
			$where = "active=1 AND menu='".$menu."'";
			if($page != NULL)
				$where .= " AND page='".$page."'";
			
			//$query = $this->db->get_where("side_nav", array("active" => TRUE));
			$this->db->from("navigation");
			$this->db->where($where);
			$this->db->order_by("sort_order", "ASC");
			$query = $this->db->get();
			return $query->result();
		}
		
		public function set_order()
		{
			$this->load->helper("url");
			$nav = explode(",",$this->input->post("sort_order"));
			
			$data = array();
			
			for($i = 0; $i < count($nav); $i++)
			{
				array_push
				(
					$data,
					array(
						"id" => $nav[$i],
						"sort_order" => $i
					)
				);
			}
			
			return $this->db->update_batch("navigation", $data, "id");
		}
	}