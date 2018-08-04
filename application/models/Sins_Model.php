<?php 
class Sins_Model extends CI_Model {
	
	function getAllSins(){
		
		$sins = $this->db->get('sins')->result();  // Produces: SELECT * FROM mytable
		$sins = json_encode($sins);
		return $sins;
	
	}	
	
	function getSinsByUserId($userId){
		$sinIds = $this->db->get_where('sins_meta', array('user_id' => $userId))->result();
		
		$sins = array();
		foreach($sinIds as $sin){
			$result = $this->db->get_where('sins', array('sin_id' => $sin->sin_id))->row();
			array_push($sins,$result);
		}

		$sins = json_encode($sins);
		return $sins;
	
	}
	
	function getSinsByUserName($userName){
		
		$userId = $this->db->get_where('users', array('username' => $userName))->row()->user_id;
		$sinIds = $this->db->get_where('sins_meta', array('user_id' => $userId))->result();
		
		$sins = array();
		foreach($sinIds as $sin){
			$result = $this->db->get_where('sins', array('sin_id' => $sin->sin_id))->row();
			array_push($sins,$result);
		}

		$sins = json_encode($sins);
		return $sins;
	
	}
}
?>