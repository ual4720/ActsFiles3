<?php
	class Events extends MY_Controller{
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function index($page = "events")
		{
			//set the page name
			$data["title"] = ucfirst($page); // Capitalize the first letter
			
			//$this->load->view("templates/header_small", $data);
			$this->load->view("templates/top_menu", $data);
			$this->load->view("events/index", $data);
			$this->load->view("templates/footer", $data);
		}

		public function checkin($event = FALSE, $page = "Event Check-In")
		{
			//set the page name
			$data["title"] = ucfirst($page); // Capitalize the first letter

			$this->load->view("templates/top_menu", $data);
			$this->load->view("events/checkin", $data);
			$this->load->view("templates/footer", $data);
		}
	}