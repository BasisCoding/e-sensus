<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPetugas extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') == false) {
			redirect('login','refresh');
		}

		$this->load->model('PetugasModel');
	}
	
	public function index()
	{
		$set['title'] = 'Data Petugas';

		$this->load->view('partials/head', $set);
		$this->load->view('partials/header');
		$this->load->view('partials/sidebar');
		$this->load->view('pages/datapetugas');
		$this->load->view('partials/core');
		$this->load->view('plugins/datapetugas');
	}

	public function getPetugas()
	{
		$html = '';
		$get = $this->PetugasModel->getAll();
		if ($get->num_rows() > 0) {
			foreach ($get->result() as $gt) {
				if ($gt->status == 1) {
					$status = 'Aktif';
				}else{
					$status = 'Tidak Aktif';
				}
				$html .= '<tr>
		                    <td>
		                    	<img class="img-rounded" width="30" height="30" src="'. site_url('assets/images/users/'.$gt->foto) .'">
		                    </td>
		                    <td>'.$gt->username.'</td>
		                    <td>'.$gt->nama_lengkap.'</td>
		                    <td>'.$status.'</td>
		                  </tr>';
			}
		}else{
			$html .= '<tr>
	                    <td colspan="3">Tidak Ada Data</td>
	                  </tr>';
		}

		echo $html;
	}

	public function getDataById()
	{
		$where['id'] = $this->input->post('id');

		$data = $this->PetugasModel->getAll($where)->row();
		echo json_encode($data);
	}

	public function addPetugas()
	{
		$data['nik'] = $this->input->post('nik');
		$data['no_kk'] = $this->input->post('no_kk');
		$data['nama_lengkap'] = $this->input->post('nama_lengkap');
		$data['tempat_lahir'] = $this->input->post('tempat_lahir');
		$data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
		$data['alamat'] = $this->input->post('alamat');
		$data['id_petugas'] = $this->session->userdata('id');

		$act = $this->PetugasModel->addPetugas($data);

		if ($act) {
			$response = array(
				'type' => 'success',
				'text' => 'Data Petugas sudah disimpan!'
			);
		}else{
			$response = array(
				'type' => 'danger',
				'text' => 'Data Petugas gagal disimpan!'
			);
		}

		echo json_encode($response);
	}

	public function updatePetugas()
	{
		$id 			= $this->input->post('id_update');
		$data['nik'] 	= $this->input->post('nik_update');
		$data['no_kk'] 	= $this->input->post('no_kk_update');
		$data['nama_lengkap'] 	= $this->input->post('nama_lengkap_update');
		$data['tempat_lahir'] 	= $this->input->post('tempat_lahir_update');
		$data['tanggal_lahir'] 	= $this->input->post('tanggal_lahir_update');
		$data['alamat'] = $this->input->post('alamat_update');
		$data['id_petugas'] = $this->session->userdata('id');
		$data['update_at'] = date('Y-m-d H:i:s');

		$act = $this->PetugasModel->updatePetugas($id, $data);

		if ($act) {
			$response = array(
				'type' => 'success',
				'text' => 'Data Petugas sudah diubah!'
			);
		}else{
			$response = array(
				'type' => 'danger',
				'text' => 'Data Petugas gagal diubah!'
			);
		}

		echo json_encode($response);
	}

	public function deletePetugas()
	{
		$id = $this->input->post('id_delete');

		$act = $this->PetugasModel->deletePetugas($id);

		if ($act) {
			$response = array(
				'type' => 'success',
				'text' => 'Data Petugas sudah dihapus!'
			);
		}else{
			$response = array(
				'type' => 'danger',
				'text' => 'Data Petugas gagal dihapus!'
			);
		}

		echo json_encode($response);

	}	

}

/* End of file DataPetugas.php */
/* Location: ./application/controllers/DataPetugas.php */
?>