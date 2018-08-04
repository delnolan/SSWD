<?php 
class Sins_Model extends CI_Model {
	
	function getAllSins(){
		
		$sins = $this->db->get('sins')->result();  // Produces: SELECT * FROM mytable
		$sins = json_encode($sins);
		return $sins;
	
	}	
	
	function getSinsByUserId($userId){
		
		$sins = $this->db->get_where('sins', array('user_id' => $userId))->result();
		$sins = json_encode($sins);
		return $sins;
	
	}
	
	function getSinsByUserName($userName){
		
		$userId = $this->db->get_where('users', array('username' => $userName))->row()->user_id;
		$sins = $this->db->get_where('sins', array('user_id' => $userId))->result();
		$sins = json_encode($sins);
		return $sins;
	
	}
}
?>