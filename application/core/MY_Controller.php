<?php
	class MY_Controller extends CI_Controller
	{
		protected $data;
		
		public function __construct()
		{
			parent::__construct();
			
			//Load in site models
			$this->load->model("organization_model");
			$this->load->model("nav_model");
			$this->load->model("theme_model");
			$this->load->helper("url");
			
			//Load the data property
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
			$data["side_menu"] = $this->nav_model->get_nav("side_menu");
			$data["theme"] = $this->theme_model->get_theme();
			
			//include assets for pages
			$data["base_url"] = $this->config->item("base_url");
			$data["css"] = $this->config->item("css");
			$data["js"] = $this->config->item("js");
			$data["images"] = $this->config->item("images");
			$data["profiles"] = $this->config->item("profiles");
			
			//$data = array(
			//	"css" => $this->config->item("css"),
			//	"js" => $this->config->item("js"),
			//	"images" => $this->config->item("images")
			//);
			
			//Load the side nav for all pages
			//$data["page"] = "/".$this->uri->segment(2);
			//$this->load->view("templates/side_menu", $data);
			if(base_url(uri_string()) == $this->config->item("base_url"))
			{
				$this->load->view("templates/header", $data);
				$this->load->view("templates/side_menu", $data);
			}
			else
			{
				$this->load->view("templates/header_small", $data);
				$this->load->view("templates/side_menu", $data);
			}
			
		}
	}