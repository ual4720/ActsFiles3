<?php
	class People_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}
		
		public function get_people($filter = FALSE, $person = FALSE, $asList = FALSE, $active = false)
		{
			if($filter === FALSE){
				$filter = array();
			}

			//If the people need to be returned as a list
			if($asList)
			{
				$filter = $this->input->get("q");

				$this->db->select("id, profile, first_name, nickname, last_name, birthday");
				
				$this->db->where("concat_ws(' ', first_name, last_name) like '%".$filter."%' OR concat_ws(' ', first_name, nickname, last_name) like '%".$filter."%'");

				if($active)
					$this->db->and_where("active = true");

				$this->db->order_by("first_name", "ASC");
				$this->db->order_by("last_name", "ASC");
				$this->db->order_by("birthday", "ASC");
				$this->db->limit(10);
				$query = $this->db->get("people");
				$people = $query->result_array();
				
				//Perform housekeeping on person
				if(isset($people)){
					for($i = 0; $i < count($people); $i++){
						$people[$i] = $this->person_housekeeping($people[$i]);
					}
				}

				$tmpPeople = array();

				foreach($people as $person)
				{

					//Associative array for JSON person
					$tmpPerson = Array( 'id' => '', 'text' => '' );
					$tmpPerson['id'] = $person["id"];

					//Create the json text
					$tmpPerson['text'] = $person["first_name"];
					
					if($person["nickname"] != null && $person["nickname"] != "")
						$tmpPerson['text'] .= " '" . $person["nickname"] . "'";

					$tmpPerson['text'] .= " " . $person["last_name"];
					$tmpPerson['text'] .= "(a:" . $person["age"] . ")";
					//echo $tmpPerson["id"] . " => " . $tmpPerson["text"];

					array_push($tmpPeople, $tmpPerson);
				}

				return $tmpPeople;
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

				if(!isset($person["full_name"]))
				{
					$fullName = $person["first_name"];
					if(isset($person["middle_name"]) && $person["middle_name"] != "")
						$fullName .= " " . $person["middle_name"];
					if(isset($person["last_name"]) && $person["last_name"] != "")
						$fullName .= " " . $person["last_name"];
					
					$person["full_name"] = $fullName;
				}
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