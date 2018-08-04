<?php 
class Users_Model extends CI_Model {
	
	function get_all_users(){
		
		$users = $this->db->get('users')->result();  
		$users = json_encode($users);
		return $users;
	
	}	
	
	function getUsersBySinId($sinId){
		
		$userIds = $this->db->get_where('sins_meta', array('sin_id' => $sinId))->result();
		//$userIds = $this->db->get_where('users', array('sin_id' => $sinId))->row()->sin_id;
		
		$users = array();
		foreach($userIds as $user){
			$result = $this->db->get_where('users', array('user_id' => $user->user_id))->row();
			array_push($users,$result);
		}

		$users = json_encode($users);
		return $users;
		
	}

}
?>