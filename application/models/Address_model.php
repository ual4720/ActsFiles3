<?php
	class Address_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
        }

        public function get_addresses($filter = FALSE, $address = FALSE, $asList = false)
		{
            //If $filter is empty, declare a filter array
			if($filter === FALSE){
				$filter = array();
			}
			
			if($asList)
			{
				//Get all addresses if specific addresses is not requested
				if($address === FALSE)
				{
					$filter = $this->input->get("q");

					$this->db->select("*");
	
					$this->db->group_start();
					$this->db->like('line1',$filter);
					$this->db->or_like('line2',$filter);
					$this->db->or_like('city',$filter);
					$this->db->or_like('state',$filter);
					$this->db->or_like('zip',$filter);
					$this->db->or_like('country',$filter);
					$this->db->group_end();
					$this->db->limit(10);

					$query = $this->db->get("addresses");
					$addresses = $query->result_array();
					
					//Perform housekeeping on address
					if(isset($addresses)){
						for($i = 0; $i < count($addresses); $i++){
							$addresses[$i] = $this->address_housekeeping($addresses[$i]);
						}
					}
					

					$tmpAddresses = array();

					foreach($addresses as $address)
					{
	
						//Associative array for JSON person
						$tmpAddress = Array( 'id' => '', 'text' => '' );
						$tmpAddress['id'] = $address["id"];
	
						//Create the json text
						$tmpAddress['text'] = $address["mailing_address"];

						array_push($tmpAddresses, $tmpAddress);
					}

					//Return addresses for json format
					return $tmpAddresses;
				}
			}	
            
            //If specific address is included add to filter array
			$filter = array("id" => $address);
            
            //Get the individual address
			$query = $this->db->get_where("addresses", $filter);
			$person = $query->row_array();
            
            //Perform some housekeeping on the address
			if(isset($address)){
				$address = $this->address_housekeeping($address);
			}
			
			return $address;
        }
        
        private function address_housekeeping($address = FALSE){
			if($address != FALSE){
                $address["mailing_address"] = $address["line1"] . ", ";

                if($address["line2"] != NULL AND $address["line2"] != "")
                    $address["mailing_address"] .= $address["line2"] . ", ";

                $address["mailing_address"] .= $address["city"] . " ";
                $address["mailing_address"] .= $address["state"] . " ";
                $address["mailing_address"] .= $address["zip"] . ", ";
                $address["mailing_address"] .= $address["country"] . "";
			}
			
			return $address;
		}
    }