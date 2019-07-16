<?php
	class MY_Controller extends CI_Controller
	{
		protected $data;
		
		public function __construct()
		{
			parent::__construct();

			//Load helpers for all pages
			$this->load->helper("url");

			//Load in data models for all pages
			$this->load->model("organization_model");
			$this->load->model("nav_model");
			$this->load->model("theme_model");
			//$this->load->model("menu_item");

			//Load the default organization object if current one doesn't exist
			$data["organization"] = $this->organization_model->get_organization();
			if(!isset($data["organization"])){
				$organization = (object)array(
					"name"=>"Default Organization", 
					"chapter"=>"Default Chapter", 
					"slogan"=>"Default Slogan",
					"phone"=>"(000) 000-0000",
					"fax"=>"(000) 000-0000",
					"email"=>"email@domain.com",
					"address_line_1"=>"",
					"address_line_2"=>"",
					"city"=>"",
					"state"=>"",
					"zip"=>"",
				);
				
				$data["organization"] = $organization;
			}
			
			//Set the $data properties for all pages
			$data["side_menu"] = $this->nav_model->get_nav("side_menu");
			$data["theme"] = $this->theme_model->get_theme();
			$data["base_url"] = $this->config->item("base_url");
			$data["css"] = $this->config->item("css");
			$data["js"] = $this->config->item("js");
			$data["images"] = $this->config->item("images");
			$data["profiles"] = $this->config->item("profiles");
			//$data["current_menu_item"] = $this->config->item("menu_item");
			
			//Load in template views for all pages (!important: views must be loaded in correct order)
			$this->load->view("templates/head", $data);
			
			//Select header size based on location in app
			if(base_url(uri_string()) == $this->config->item("base_url"))
			{
				$this->load->view("templates/header_large", $data);
			}
			else
			{
				$this->load->view("templates/header_small", $data);
			}

			//Include the side menu
			$this->load->view("templates/side_menu", $data);
			
		}
	}