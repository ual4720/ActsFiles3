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
				
				if($active)
					$this->db->where("active = true");

				$this->db->group_start();
				$this->db->like('first_name',$filter);
    			$this->db->or_like('last_name',$filter);
				$this->db->or_like('nickname',$filter);
				$this->db->group_end();
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
					$tmpPerson['text'] .= "(" . $person["age"] . ")";
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