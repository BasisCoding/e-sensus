<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ScanQRCode extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('PendudukModel');
	}

	public function cameraQR()
	{
		$this->load->view('camera');
	}
	
	public function ScanData()
	{
		$username = $this->uri->segment(2);
		$this->load->view('pages/scan');
	}

	public function getDataByScan()
	{
		$html = '';
		$where['no_kk'] = $this->input->post('no_kk');
		$get = $this->PendudukModel->getAllNasional($where);
		// echo $this->db->last_query($get);
		if ($get->num_rows() > 0) {
			foreach ($get->result() as $gt) {


				if ($gt->status == 1) {
					$status = '<span class="badge bg-blue">Aktif</span>';
				}if ($gt->status == 2) {
					$status = '<span class="badge bg-red">Meninggal</span>';
				}if ($gt->status == 3) {
					$status = '<span class="badge bg-orange">Pindah</span>';
				}if ($gt->status == 4) {
					$status = '<span class="badge bg-purple">Ganda</span>';
				}

				$html .= '<div class="panel panel-warning">
                            <div class="panel-heading" role="tab" id="heading'.$gt->nik.'">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#view-data" href="#collapse'.$gt->nik.'"" aria-expanded="true" aria-controls="collapse'.$gt->nik.'"">
                                        '.$gt->nik.' | '.$gt->nama_lengkap.'
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse'.$gt->nik.'"" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$gt->nik.'">
                                <div class="panel-body">
                                    <ul class="list-group">
						                <li class="list-group-item">Nama Lengkap : '.$gt->nama_lengkap.'</li>
						                <li class="list-group-item">TTL : '.$gt->tempat_lahir.', '.date('d-M-Y', strtotime($gt->tanggal_lahir)).'</li>
						                <li class="list-group-item">Status Keluarga : '.$gt->status_keluarga.'</li>
						                <li class="list-group-item">Tanggal Lahir : '.$gt->tanggal_lahir.'</li>
						                <li class="list-group-item">Jenis Kelamin : '.$gt->jenis_kelamin.'</li>
						                <li class="list-group-item">Kabupaten : '.$gt->kab.'</li>
						                <li class="list-group-item">Kecamatan : '.$gt->kec.'</li>
						                <li class="list-group-item">Desa : '.$gt->desa.'</li>
						                <li class="list-group-item">RT/RW : '.$gt->rt.'/'.$gt->rw.'</li>
						                <li class="list-group-item">Alamat : <p>'.$gt->alamat.'</p></li>
						                <li class="list-group-item">Status : '.$status.'</li>
						            </ul>
      								<input type="hidden" name="id[]" value="'.$gt->id.'">
      								<input type="hidden" name="nik[]" value="'.$gt->nik.'">
      								<input type="hidden" name="no_kk[]" value="'.$gt->no_kk.'">
      								<input type="hidden" name="nama_lengkap[]" value="'.$gt->nama_lengkap.'">
      								<input type="hidden" name="tempat_lahir[]" value="'.$gt->tempat_lahir.'">
      								<input type="hidden" name="tanggal_lahir[]" value="'.$gt->tanggal_lahir.'">
      								<input type="hidden" name="jenis_kelamin[]" value="'.$gt->jenis_kelamin.'">
      								<input type="hidden" name="kab[]" value="'.$gt->kab.'">
      								<input type="hidden" name="kec[]" value="'.$gt->kec.'">
      								<input type="hidden" name="desa[]" value="'.$gt->desa.'">
      								<input type="hidden" name="rt[]" value="'.$gt->rt.'">
      								<input type="hidden" name="rw[]" value="'.$gt->rw.'">
      								<input type="hidden" name="alamat[]" value="'.$gt->alamat.'">
      								<input type="hidden" name="status[]" value="'.$gt->status.'">
      								<input type="hidden" name="status_keluarga[]" value="'.$gt->status_keluarga.'">
                                </div>
                            </div>
                        </div>';
			}
		}else{
			$html .= '<div class="text-center">Tidak Ada Data</div>';
		}

		echo $html;
	}

	public function SendToDataLokal()
	{
		$id = $this->input->post('id');
		
		foreach ($id as $gt => $value) {
			$where['no_kk'] = $_POST['no_kk'][$gt];
			$val = $this->PendudukModel->getAll($where);
		}

		if ($val->num_rows() > 0) {
			$response = array(
				'type' => 'danger',
				'text' => 'Data Penduduk sudah ada di lokal !'
			);
		}else{
			$act = $this->PendudukModel->sendDataFromNasional($id);

			if (!$act) {
				$response = array(
					'type' => 'success',
					'text' => 'Data Penduduk sudah dikirim ke lokal!'
				);
			}else{
				$response = array(
					'type' => 'danger',
					'text' => 'Data Penduduk gagal dikirim ke lokal!'
				);
			}
		}

		echo json_encode($response);
	}
	
}

/* End of file ScanQRCode.php */
/* Location: ./application/controllers/ScanQRCode.php */
?>