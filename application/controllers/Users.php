<?php
	class Users extends MY_Controller{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model("people_model");
		}
		
		public function disable($user = FALSE, $page = "Disable User")
		{
			//set the page name
			$data["title"] = ucfirst($page); // Capitalize the first letter
			$data["top_menu"] = $this->nav_model->get_nav("top_menu");
			$data["return_path"] = $this->config->item("base_url")."manage_users";
			
			$this->load->helper("form");
			$this->load->library("form_validation");
				
			$this->form_validation->set_rules("confirm", "Confirmation Selection", "required");
			
			if($this->form_validation->run() === FALSE)
			{
				//set data
				//echo $this->config->item("base_url");
				$data["target"] = $this->config->item("base_url")."manage_users/disable/".$user;
				$data["person"] = $this->people_model->get_people(FALSE, $user);
				
				$data["message"] = "Do you wish to disable " . $data["person"]["first_name"] . "'s User Access?";
				
				//$this->load->view("templates/header_small", $data);
				$this->load->view("templates/top_menu", $data);
				$this->load->view("templates/confirm", $data);
				$this->load->view("templates/footer", $data);
			}
			else
			{
				if($user != FALSE)
					$result = $this->people_model->set_user($user, FALSE);
				
				$data["return_path"] = $this->config->item("base_url")."manage_users";
				
				//$this->load->view("templates/header_small", $data);
				$this->load->view("templates/top_menu", $data);
				if($result)
					$this->load->view("templates/success", $data);
				else
					$this->load->view("templates/failed", $data);
				$this->load->view("templates/footer", $data);
			}
		}
		
		public function assign($page = "Assign User")
		{
			//Get people
			$filter = array("active" => TRUE);
			$data["people"] = $this->people_model->get_people($filter);
			
			
			//Page properties
			$data["title"] = ucfirst($page); // Capitalize the first letter
			$data["top_menu"] = $this->nav_model->get_nav("top_menu");
			
			//$this->load->view("templates/header_small", $data);
			$this->load->view("templates/top_menu", $data);
			$this->load->view("admin/manage_users/assign", $data);
			$this->load->view("templates/footer", $data);
		}
		
		public function set_assign($user = FALSE, $page = "Assign User")
		{
			//Page properties
			$data["title"] = ucfirst($page); // Capitalize the first letter
			$data["top_menu"] = $this->nav_model->get_nav("top_menu");
			
			//Get person
			$data["person"] = $this->people_model->get_people(FALSE, $user);
			
			//Form actions
			$data["target"] = "manage_users/set_assign/".$user; // dont use $this->config->item("base_url"). with confirm since form helper already loads site url.
			$data["return_path"] = $this->config->item("base_url")."manage_users/assign";
			
			//Form properties
			$this->load->helper("form");
			$this->load->library("form_validation");
			
			$this->form_validation->set_rules("confirm", "Confirmation Selection", "required");
			$this->form_validation->set_rules("username", "Username", "required");
			$this->form_validation->set_rules("password", "User Password", "required");
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
			
			if($this->form_validation->run() === FALSE)
			{
				//set data
				$data["target"] = "manage_users/set_assign/".$user;// dont use $this->config->item("base_url"). with confirm since form helper already loads site url.
				$data["person"] = $this->people_model->get_people(FALSE, $user);
				
				$data["message"] = "Do you wish to enable " . $data["person"]["first_name"] . "'s User Access?";
				$data["inputs"] = array( 
					array("name" => "username", "label" => "Set Username: ", "required" => "required", "type" => "text"),
					array("name" => "password", "label" => "Set User Password: ", "required" => "required", "type" => "password"), 
					array("name" => "confirm_password", "label" => "Confirm Password: ", "required" => "required", "type" => "password")
				);
				
				//$this->load->view("templates/header_small", $data);
				$this->load->view("templates/top_menu", $data);
				$this->load->view("templates/confirm", $data);
				$this->load->view("templates/footer", $data);
			}
			else
			{
				$data["person"] = $this->people_model->get_people(FALSE, $user);
				if($this->people_model->set_user($user, TRUE)){
					
					//$data["return_path"] = $this->config->item("base_url")."manage_users";
					$data["return_path"] = $this->config->item("base_url")."manage_users/set_permissions/".$user;
					$data["message"] = "<p>".$data["person"]["first_name"] . " was successfully set as a user.</p><p>Continue to set permissions.</p>";
					//$this->load->view("templates/header_small", $data);
					$this->load->view("templates/top_menu", $data);
					$this->load->view("templates/success", $data);
					$this->load->view("templates/footer", $data);
				}
				else
				{
					//$this->load->view("templates/header_small", $data);
					$this->load->view("templates/top_menu", $data);
					$this->load->view("templates/failed", $data);
					$this->load->view("templates/footer", $data);
				}
			}
		}
		
		public function set_permissions($user = FALSE, $page = "User Permissions")
		{
			//Page properties
			$data["title"] = ucfirst($page); // Capitalize the first letter
			$data["top_menu"] = $this->nav_model->get_nav("top_menu");
			
			//Get person
			$data["person"] = $this->people_model->get_people(FALSE, $user);

			//Include the footer
			$this->load->view("templates/top_menu", $data);
			$this->load->view("admin/manage_users/permissions", $data);
			$this->load->view("templates/footer", $data);
		}
	}