<?php 
class Sins_Model extends CI_Model {
	//Sort out the variables
	
	
	// Do the constructor class
	
	function get_all_sins(){
		
		$sins = $this->db->get('sins')->result();  // Produces: SELECT * FROM mytable
		$sins = json_encode($sins);
		return $sins;
	
	}	
	
	function get_sins($user){
		
		$sins = $this->db->get_where('sins', array('user_id' => $user))->result();
		$sins = json_encode($sins);
		return $sins;
	
	}
}
?>