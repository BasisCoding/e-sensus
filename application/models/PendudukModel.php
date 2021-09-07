<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class PendudukModel extends CI_Model {
	
	function getAll($where=null)
	{
		if ($where != null) {
			$this->db->where($where);
		}
		return $this->db->get('penduduk');
	}	

	function addPenduduk($data)
	{
		return $this->db->insert('penduduk', $data);
	}

	function updatePenduduk($id, $data)
	{
		return $this->db->update('penduduk', $data, array('id' => $id));
	}

	function deletePenduduk($id)
	{
		return $this->db->delete('penduduk', array('id' => $id));
	}
	
	
}

/* End of file PendudukModel.php */
/* Location: ./application/models/PendudukModel.php */
?>