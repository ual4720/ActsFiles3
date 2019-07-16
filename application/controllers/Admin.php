<?php
	class Admin extends MY_Controller{
		
		public function __construct()
		{
			parent::__construct();
			$this->data["top_menu"] = $this->nav_model->get_nav("top_menu", "admin");
		}
		
		public function index($page = "admin"){
			
			//set the page name
			$data["title"] = ucfirst($page); // Capitalize the first letter
			$data["top_menu"] = $this->nav_model->get_nav("top_menu");
			
			$this->load->view("templates/header_small", $data);
			$this->load->view("templates/top_menu", $data);
			$this->load->view("admin/index", $data);
			$this->load->view("templates/footer", $data);
		}
		
		public function manage_links($page = "Manage Links"){
			$this->load->helper("form");
			$this->load->library("form_validation");
			
			$this->form_validation->set_rules("sort_order", "Sort Order", "required");
			
			if($this->form_validation->run() === FALSE)
			{
				//set the page name and top nav
				$data["title"] = ucfirst($page); // Capitalize the first letter
				$data["top_menu"] = $this->nav_model->get_nav("top_menu");
				
				$this->load->view("templates/header_small", $data);
				$this->load->view("templates/top_menu", $data);
				$this->load->view("admin/manage_links", $data);
				$this->load->view("templates/footer", $data);
			}
			else
			{
				//set the page name and top nav
				$data["title"] = ucfirst($page); // Capitalize the first letter
				$data["message"] = "Link Menu Order Saved Successfully!";
				
				$this->nav_model->set_order();
				$this->load->model("nav_model");
				
				$data["side_menu"] = $this->nav_model->get_nav("side_menu");
				$data["top_menu"] = $this->nav_model->get_nav("top_menu");
				
				$this->load->view("templates/side_menu", $data);
				$this->load->view("templates/header_small", $data);
				$this->load->view("templates/top_menu", $data);
				$this->load->view("templates/success", $data);
				$this->load->view("admin/manage_links", $data);
				$this->load->view("templates/footer", $data);
			}
		}
		
		public function manage_users($page = "Manage Users"){
			//Load the people model
			$this->load->model("people_model");
			
			//Get users
			$filter = array("user" => TRUE);
			$data["users"] = $this->people_model->get_people($filter);
			
			//set the page name and top nav
			$data["title"] = ucfirst($page); // Capitalize the first letter
			$data["top_menu"] = $this->nav_model->get_nav("top_menu");
			
			$this->load->view("templates/header_small", $data);
			$this->load->view("templates/top_menu", $data);
			$this->load->view("admin/manage_users/index", $data);
			$this->load->view("templates/footer", $data);
		}
		
		public function manage_organization($page = "Manage Organization"){			
			$this->load->helper("form");
			$this->load->library("form_validation");
			
			$this->form_validation->set_rules("name", "Organization Name", "required");
			$this->form_validation->set_rules("chapter", "Sub-Organization", "required");
			$this->form_validation->set_rules("slogan", "Slogan", "required");
			$this->form_validation->set_rules("phone", "Phone", "required");
			$this->form_validation->set_rules("email", "Email", "required");
			
			if($this->form_validation->run() === FALSE)
			{
				//set the page name and top nav
				$data["title"] = ucfirst($page); // Capitalize the first letter
				$data["top_menu"] = $this->nav_model->get_nav("top_menu");
				
				$this->load->view("templates/header_small", $data);
				$this->load->view("templates/top_menu", $data);
				$this->load->view("admin/manage_organization", $data);
				$this->load->view("templates/footer", $data);
			}
			else
			{
				//set the page name, top nav, and success message
				$data["title"] = ucfirst($page); // Capitalize the first letter
				$data["top_menu"] = $this->nav_model->get_nav("top_menu");
				$data["message"] = "Organization Saved Successfully!";
				
				$this->organization_model->set_organization();
				$data["organization"] = $this->organization_model->get_organization();
				
				$this->load->view("templates/header_small", $data);
				$this->load->view("templates/top_menu", $data);
				$this->load->view("templates/success", $data);
				$this->load->view("admin/manage_organization", $data);
				$this->load->view("templates/footer", $data);
			}
		}
	}