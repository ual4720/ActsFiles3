<?php
	class Pages extends MY_Controller{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model("people_model");
		}
		
		public function login($page = "login")
		{
			//set the page name
			$data["title"] = ucfirst($page); // Capitalize the first letter
			
			
			$this->load->view("templates/top_menu", $data);
			$this->load->view("pages/login", $data);
			$this->load->view("templates/footer", $data);
		}
		
		public function home($page = "home")
		{
			//set the page name
			$data["title"] = ucfirst($page); // Capitalize the first letter
			
			$filter = array("active" => TRUE);
			$data["people"] = $this->people_model->get_people($filter);
			
			$this->load->view("templates/top_menu", $data);
			$this->load->view("pages/home", $data);
			$this->load->view("templates/footer", $data);
		}
	}