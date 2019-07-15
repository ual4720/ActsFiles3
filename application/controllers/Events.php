<?php
	class Events extends MY_Controller{
		
		public function __construct()
		{
			parent::__construct();
			$data["top_menu"] = $this->nav_model->get_nav("top_menu", "/events");
		}
		
		public function index($page = "events")
		{
			//set the page name
			$data["title"] = ucfirst($page); // Capitalize the first letter
			
			$this->load->view("templates/header_small", $data);
			$this->load->view("templates/top_menu", $data);
			$this->load->view("admin/index", $data);
			$this->load->view("templates/footer", $data);
		}
	}