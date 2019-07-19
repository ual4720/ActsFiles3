<?php
	class People extends MY_Controller{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('date');
			$this->load->model("people_model");
		}
		
		public function index($page = "people"){
			
			//set the page name
			$data["title"] = ucfirst($page); // Capitalize the first letter

			//$this->load->view("templates/header_small", $data);
			$this->load->view("templates/top_menu", $data);
			$this->load->view("people/index", $data);
			$this->load->view("templates/footer", $data);
		}
		
		public function person($person = FALSE)
		{
			//get single person from $people
			$data["person"] = $this->people_model->get_people(FALSE, $person);
			
			if(empty($data["person"]))
			{
				show_404();
			}
			
			$data["title"] = "View ". $data["person"]["first_name"] . "'s Profile";
			
			//$this->load->view("templates/header_small", $data);
			$this->load->view("templates/top_menu", $data);
			$this->load->view("people/person", $data);
			$this->load->view("templates/footer", $data);
		}
	}