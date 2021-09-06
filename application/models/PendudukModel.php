<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class PendudukModel extends CI_Model {
	
	function getAll()
	{
		return $this->db->get('penduduk');
	}	
	
}

/* End of file PendudukModel.php */
/* Location: ./application/models/PendudukModel.php */
?>