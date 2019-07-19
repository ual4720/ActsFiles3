<?php
    class Search extends CI_Controller
    {
        public function __construct()
		{
            parent::__construct();
            
            //Load Helpers
            $this->load->helper('date');
			$this->load->helper("url");

            //Load Models
            $this->load->model("organization_model");
			$this->load->model("nav_model");
			$this->load->model("theme_model");

            //Load Data
			$data["side_menu"] = $this->nav_model->get_nav("side_menu");
			$data["theme"] = $this->theme_model->get_theme();
			$data["base_url"] = $this->config->item("base_url");
			$data["css"] = $this->config->item("css");
			$data["js"] = $this->config->item("js");
			$data["images"] = $this->config->item("images");
			$data["profiles"] = $this->config->item("profiles");
        }
        
        public function people()
		{
			//Load the people model
			$this->load->model("people_model");

			$json = [];
			$json = json_encode($this->people_model->get_people("", false, true));
			echo $json;
		}

		public function addresses()
		{
			//Load the Address model
			$this->load->model("address_model");

			$json = [];
			$json = json_encode($this->address_model->get_addresses("", false, true));
			echo $json;
		}
    }