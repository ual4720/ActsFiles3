<?php
	class People_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}
		
		public function get_people($filter = FALSE, $person = FALSE)
		{
			if($filter === FALSE){
				$filter = array();
			}
			
			if($person === FALSE)
			{
				$query = $this->db->get_where("people", $filter);
				$people = $query->result_array();
				
				//Perform housekeeping on person
				if(isset($people)){
					for($i = 0; $i < count($people); $i++){
						$people[$i] = $this->person_housekeeping($people[$i]);
					}
				}
				
				return $people;
			}

			$filter = array("id" => $person);
			
			$query = $this->db->get_where("people", $filter);
			$person = $query->row_array();
			
			if(isset($person)){
				$person = $this->person_housekeeping($person);
			}
			
			return $person;
		}
		
		public function get_age($birthday = FALSE){
			if($birthday != FALSE)
			{
				$today = date("Y-m-d");
				$age = date_diff(date_create($birthday), date_create($today));
				return $age->format("%y");
			}
		}
		
		private function person_housekeeping($person = FALSE){
			if($person != FALSE){
				if(isset($person["birthday"]))
							$person["age"] = $this->get_age($person["birthday"]);
				
				if($person["profile"] == NULL)
					if($person["profile"] = base_url($this->config->item("profiles") . "default.png"));
			}
			
			return $person;
		}
		
		public function set_user($person = FALSE, $enabled = false){
			if($person != FALSE) {
				
				if($enabled === TRUE){
					$data = array(
						"username" => $this->input->post("username"),
						"password" => password_hash($this->input->post("password"), PASSWORD_DEFAULT),
						"user" => $enabled
					);
				}
				else{
					$data = array(
						"username" => NULL,
						"password" => NULL,
						"user" => $enabled
					);
				}
				
				$this->db->set($data);
				$this->db->where('id', $person);
				return $this->db->update('people');
			}
			else
				return FALSE;
		}
	}