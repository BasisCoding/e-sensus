<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class PendudukModel extends CI_Model {
	
	function getAll($where=null)
	{
		if ($where != null) {
			$this->db->where($where);
		}
		return $this->db->get('penduduk_lokal');
	}

	function sendDataFromNasional($id)
	{
		$this->db->trans_start();
    		$result = array();
    			foreach ($id as $key => $value) {
    				
    				$result[] = array(
    					'nik' => $_POST['nik'][$key],
						'no_kk' => $_POST['no_kk'][$key],
						'nama_lengkap' => $_POST['nama_lengkap'][$key],
						'tempat_lahir' => $_POST['tempat_lahir'][$key],
						'tanggal_lahir' => $_POST['tanggal_lahir'][$key],
						'jenis_kelamin' => $_POST['jenis_kelamin'][$key],
						'kab' => $_POST['kab'][$key],
						'kec' => $_POST['kec'][$key],
						'desa' => $_POST['desa'][$key],
						'rt' => $_POST['rt'][$key],
						'rw' => $_POST['rw'][$key],
						'alamat' => $_POST['alamat'][$key],
						'status' => $_POST['status'][$key],
						'status_keluarga' => $_POST['status_keluarga'][$key],
    				);
    			}

    		$this->db->insert_batch('penduduk_lokal', $result);
    	$this->db->trans_complete();	
	}

	function getAllNasional($where=null)
	{
		if ($where != null) {
			$this->db->where($where);
		}
		return $this->db->get('penduduk_nasional');
	}	

	function addPenduduk($data)
	{
		return $this->db->insert('penduduk_lokal', $data);
	}

	function updatePenduduk($id, $data)
	{
		return $this->db->update('penduduk_lokal', $data, array('id' => $id));
	}

	function deletePenduduk($id)
	{
		return $this->db->delete('penduduk_lokal', array('id' => $id));
	}
	
	
}

/* End of file PendudukModel.php */
/* Location: ./application/models/PendudukModel.php */
?>