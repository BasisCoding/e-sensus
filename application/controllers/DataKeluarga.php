<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataKeluarga extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') == false) {
			redirect('login','refresh');
		}

		$this->load->model('PendudukModel');
	}
	public function index()
	{
		$set['title'] = 'Data Penduduk';

		$this->load->view('partials/head', $set);
		$this->load->view('partials/header');
		$this->load->view('partials/sidebar');
		$this->load->view('pages/datakeluarga');
		$this->load->view('partials/core');
		$this->load->view('plugins/datakeluarga');
	}

	public function getKeluarga()
	{
		$html = '';
		$get = $this->PendudukModel->getAllKeluarga();
		if ($get->num_rows() > 0) {
			
			foreach ($get->result() as $gt) {
				
				$html .= '<tr>
		                    <td>'.$gt->nik.'</td>
		                    <td>'.$gt->no_kk.'</td>
		                    <td>'.$gt->nama_lengkap.'</td>
		                    <td>'.$gt->tempat_lahir.'</td>
		                    <td>'.date('d-m-Y', strtotime($gt->tanggal_lahir)).'</td>
		                    <td>'.$gt->jenis_kelamin.'</td>
		                    <td>'.$gt->status_keluarga.'</td>
		                    <td>
		                    	<div class="d-flex">
			                    	<button class="btn btn-warning btn-xs view-penduduk" data-kk="'.$gt->no_kk.'">
			                    		<i class="material-icons" style="font-size:12px;">device_hub</i>
			                    	</button>
			                   	</div>
		                    </td>
		                  </tr>';
			}
		}else{
			$html .= '<tr>
	                    <td colspan="8">Tidak Ada Data</td>
	                  </tr>';
		}

		echo $html;
	}

	public function getPenduduk()
	{
		$html = '';
		$where['no_kk'] = $this->input->post('no_kk');
		$get = $this->PendudukModel->getAll($where);
		if ($get->num_rows() > 0) {
			
			foreach ($get->result() as $gt) {

				$html .= '<tr>
		                    <td>'.$gt->nik.'</td>
		                    <td>'.$gt->no_kk.'</td>
		                    <td>'.$gt->nama_lengkap.'</td>
		                    <td>'.$gt->tempat_lahir.'</td>
		                    <td>'.date('d-m-Y', strtotime($gt->tanggal_lahir)).'</td>
		                    <td>'.$gt->jenis_kelamin.'</td>
		                    <td>'.$gt->status_keluarga.'</td>
		                  </tr>';
			}
		}else{
			$html .= '<tr>
	                    <td colspan="7">Tidak Ada Data</td>
	                  </tr>';
		}

		echo $html;
	}
	
}

/* End of file DataKeluarga.php */
/* Location: ./application/controllers/DataKeluarga.php */
?>