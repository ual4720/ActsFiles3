<?php
	class Event_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
        }
        
        public function get_events($filter = FALSE, $event = FALSE, $asList = FALSE, $active = false)
        {
            if($filter === FALSE){
				$filter = array();
            }
            
            if($asList)
            {

            }

            if($event === FALSE)
        }

        private function event_housekeeping($event = FALSE)
        {

        }