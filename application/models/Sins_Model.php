<?php 
class Sins_Model extends CI_Model {
	
	function getAllSins(){ //This function returns all available sins
		
		$sins = $this->db->get('sins')->result();  //Codeigniter function for mySql Select
		$sins = json_encode($sins); //Convert to json for output
		return $sins; //Output to controller
	
	}	
	
	function getSinsByUserId($userId){ //Returns sins committed by this user (by user_id)
		
		//Get access to sinIds via sins_meta
		$sinIds = $this->db->get_where('sins_meta', array('user_id' => $userId))->result();
		
		//Set up empty array to which we can push results
		$sins = array();
		
		//Loop through results to get each sin and push to array
		foreach($sinIds as $sin){
			//Gets the sins we need
			$result = $this->db->get_where('sins', array('sin_id' => $sin->sin_id))->row();
			array_push($sins,$result); //Push the result to our array for each iteration
		}

		$sins = json_encode($sins); //Converts to json for output
		return $sins; //Output to our controller
	
	}
	
	function getSinsByUserName($userName){//Returns sins committed by this user (by username)
		
		//Gets the userid from the username provided
		$userId = $this->db->get_where('users', array('username' => $userName))->row()->user_id;
		
		//Get access to sinIds via sins_meta
		$sinIds = $this->db->get_where('sins_meta', array('user_id' => $userId))->result();
		
		//Set up empty array to which we can push results
		$sins = array();
		
		//Loop through results to get each sin and push to array
		foreach($sinIds as $sin){
			//Gets the sins we need
			$result = $this->db->get_where('sins', array('sin_id' => $sin->sin_id))->row();
			array_push($sins,$result); //Push the result to our array for each iteration
		}

		$sins = json_encode($sins); //Converts to json for output
		return $sins; //Output to controller
	
	}
}
?>