<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class PetugasModel extends CI_Model {
	
	function getAll($where=null)
	{
		if ($where != null) {
			$this->db->where($where);
		}
		
		$this->db->from('users');
		$this->db->join('users_group', 'users_group.id_group = users.level', 'left');
		$this->db->where('level', 2);
		return $this->db->get();
	}

	function addUsers($data)
	{
		return $this->db->insert('users', $data);
	}

	function updateUsers($id, $data)
	{
		return $this->db->update('users', $data, array('id' => $id));
	}

	function deleteUsers($id)
	{
		return $this->db->delete('users', array('id' => $id));
	}
	
	
}

/* End of file PetugasModel.php */
/* Location: ./application/models/PetugasModel.php */
?>