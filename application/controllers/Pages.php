<?php
	class Pages extends MY_Controller{
		
		public function __construct()
		{
			parent::__construct();

			//Load the models
			$this->load->model("people_model");
			$this->load->model("address_model");
		}
		
		public function login($page = "login")
		{
			//set the page name
			$data["title"] = ucfirst($page); // Capitalize the first letter
			
			
			$this->load->view("templates/top_menu", $data);
			$this->load->view("pages/login", $data);
			$this->load->view("templates/footer", $data);
		} //End login
		
		public function home($page = "home")
		{
			//set the page name
			$data["title"] = ucfirst($page); // Capitalize the first letter
			
			//Get people
			$filter = array("active" => TRUE);
			$data["people"] = $this->people_model->get_people($filter);
			$filter = NULL; //Reset the search filter

			//Get addresses
			$data["addresses"] = $this->address_model->get_addresses($filter);

			//Load the views
			$this->load->view("templates/top_menu", $data);
			$this->load->view("pages/home", $data);
			$this->load->view("templates/footer", $data);
		} //End home
	}