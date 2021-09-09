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
                            	<input type="hidden" name="id[]"  value="'.$gt->id.'">
                                <div class="panel-body">
                                	<div class="form-group">
                                		<label>No KK</label>
                                		<div class="form-line">
                                			<input type="text" name="no_kk[]" class="form-control" value="'.$gt->no_kk.'" aria-required="true" aria-invalid="false">
                                		</div>
                                	</div>
                                	<div class="form-group">
                                		<label>NIK</label>
                                		<div class="form-line">
                                			<input type="text" name="nik[]" class="form-control" value="'.$gt->nik.'" aria-required="true" aria-invalid="false">
                                		</div>
                                	</div>
                                	<div class="form-group">
                                		<label>Nama Lengkap</label>
                                		<div class="form-line">
                                			<input type="text" name="nama_lengkap[]" class="form-control" value="'.$gt->nama_lengkap.'" aria-required="true" aria-invalid="false">
                                		</div>
                                	</div>
                                	<div class="form-group">
                                		<label>Tempat Lahir</label>
                                		<div class="form-line">
                                			<input type="text" name="tempat_lahir[]" class="form-control" value="'.$gt->tempat_lahir.'">
                                		</div>
                                	</div>
                                	<div class="form-group">
                                		<label>Tanggal Lahir</label>
                                		<div class="form-line">
                                			<input type="date" name="tanggal_lahir[]" class="form-control" value="'.$gt->tanggal_lahir.'">
                                		</div>
                                	</div>
                                	<div class="form-group">
                                		<label>Nama Lengkap</label>
                                		<div class="form-line">
                                			<select class="form-control" name="jenis_kelamin[]" value="'.$gt->jenis_kelamin.'">
	                                			<option value="Laki-Laki">Laki-Laki</option>
	                                			<option value="Perempuan">Perempuan</option>
	                                		</select>
	                                	</div>
                                	</div>
                                	<div class="form-group">
                                		<label>Kabupaten</label>
                                		<div class="form-line">
                                			<input type="text" name="kab[]" class="form-control" value="'.$gt->kab.'">
                                		</div>
                                	</div>
                                	<div class="form-group">
                                		<label>Kecamatan</label>
                                		<div class="form-line">
                                			<input type="text" name="kec[]" class="form-control" value="'.$gt->kec.'">
                                		</div>
                                	</div>
                                	<div class="form-group">
                                		<label>Desa</label>
                                		<div class="form-line">
                                			<input type="text" name="desa[]" class="form-control" value="'.$gt->desa.'">
                                		</div>
                                	</div>
                                	<div class="form-group">
                                		<label>RT</label>
                                		<div class="form-line">
                                			<input type="text" name="rt[]" class="form-control" value="'.$gt->rt.'">
                                		</div>
                                	</div>
                                	<div class="form-group">
                                		<label>RW</label>
                                		<div class="form-line">
                                			<input type="text" name="rw[]" class="form-control" value="'.$gt->rw.'">
                                		</div>
                                	</div>
                                	<div class="form-group">
                                		<label>Alamat</label>
                                		<div class="form-line">
                                			<textarea class="form-control" name="alamat[]">'.$gt->alamat.'</textarea>
                                		</div>
                                	</div>
                                	<div class="form-group">
                                		<label>Status</label>
                                		<div class="form-line">
							              <select name="status[]" class="form-control" value="'.$gt->status.'">
							                <option value="1">Aktif</option>
							                <option value="2">Meninggal</option>
							                <option value="3">Pindah</option>
							                <option value="4">Ganda</option>
							              </select>
							            </div>
                                	</div>
                                	<div class="form-group">
                                		<label>Status Keluarga</label>
                                		<div class="form-line">
							              <select name="status_keluarga[]" class="form-control" value="'.$gt->status_keluarga.'">
							                <option value="Kepala Keluarga">Kepala Keluarga</option>
							                <option value="Istri">Istri</option>
							                <option value="Anak">Anak</option>
							              </select>
							            </div>
                                	</div>
                                    
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