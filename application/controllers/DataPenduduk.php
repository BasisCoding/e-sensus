<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPenduduk extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') == false) {
			redirect('login','refresh');
		}

		$this->load->model('PendudukModel');
	}

	public function generate_qrcode()
	{
		$this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/qrcode/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
        $image_name= '3604042009876532.png'; //buat name dari qr code sesuai dengan nim
 
        $params['data'] = base_url('ScanQRCode/3604042009876532'); //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
	}
	
	public function index()
	{
		$set['title'] = 'Data Penduduk';

		$this->load->view('partials/head', $set);
		$this->load->view('partials/header');
		$this->load->view('partials/sidebar');
		$this->load->view('pages/datapenduduk');
		$this->load->view('partials/core');
		$this->load->view('plugins/datapenduduk');
	}

	public function getPenduduk()
	{
		$html = '';
		$get = $this->PendudukModel->getAll();
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

				$html .= '<tr>
		                    <td>'.$gt->nik.'</td>
		                    <td>'.$gt->no_kk.'</td>
		                    <td>'.$gt->nama_lengkap.'</td>
		                    <td>'.$gt->tempat_lahir.'</td>
		                    <td>'.date('d-m-Y', strtotime($gt->tanggal_lahir)).'</td>
		                    <td>'.$gt->jenis_kelamin.'</td>
		                    <td>'.$gt->kab.'</td>
		                    <td>'.$gt->kec.'</td>
		                    <td>'.$gt->desa.'</td>
		                    <td>'.$gt->rt.'/'.$gt->rw.'</td>
		                    <td>'.$gt->alamat.'</td>
		                    <td>'.$status.'</td>
		                    <td>
		                    	<div class="d-flex">
			                    	<button class="btn btn-warning btn-xs update-data" data-id="'.$gt->id.'">
			                    		<i class="material-icons" style="font-size:12px;">content_cut</i>
			                    	</button>
			                    	<button class="btn btn-danger btn-xs delete-data" data-id="'.$gt->id.'">
			                    		<i class="material-icons" style="font-size:12px;">clear</i>
			                    	</button>
			                   	</div>
		                    </td>
		                  </tr>';
			}
		}else{
			$html .= '<tr>
	                    <td colspan="12">Tidak Ada Data</td>
	                  </tr>';
		}

		echo $html;
	}

	public function getDataById()
	{
		$where['id'] = $this->input->post('id');
		$data = $this->PendudukModel->getAll($where)->row();
		echo json_encode($data);
	}

	public function addPenduduk()
	{
		$data['nik'] = $this->input->post('nik');
		$data['no_kk'] = $this->input->post('no_kk');
		$data['nama_lengkap'] = $this->input->post('nama_lengkap');
		$data['tempat_lahir'] = $this->input->post('tempat_lahir');
		$data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
		$data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
		$data['kab'] = $this->input->post('kab');
		$data['kec'] = $this->input->post('kec');
		$data['desa'] = $this->input->post('desa');
		$data['rt'] = $this->input->post('rt');
		$data['rw'] = $this->input->post('rw');
		$data['alamat'] = $this->input->post('alamat');
		$data['status'] = $this->input->post('status');
		$data['status_keluarga'] = $this->input->post('status_keluarga');

		$act = $this->PendudukModel->addPenduduk($data);

		if ($act) {
			$response = array(
				'type' => 'success',
				'text' => 'Data Penduduk sudah disimpan!'
			);
		}else{
			$response = array(
				'type' => 'danger',
				'text' => 'Data Penduduk gagal disimpan!'
			);
		}

		echo json_encode($response);
	}

	public function updatePenduduk()
	{
		$id 			= $this->input->post('id_update');
		$data['nik'] = $this->input->post('nik_update');
		$data['no_kk'] = $this->input->post('no_kk_update');
		$data['nama_lengkap'] = $this->input->post('nama_lengkap_update');
		$data['tempat_lahir'] = $this->input->post('tempat_lahir_update');
		$data['tanggal_lahir'] = $this->input->post('tanggal_lahir_update');
		$data['jenis_kelamin'] = $this->input->post('jenis_kelamin_update');
		$data['kab'] = $this->input->post('kab_update');
		$data['kec'] = $this->input->post('kec_update');
		$data['desa'] = $this->input->post('desa_update');
		$data['rt'] = $this->input->post('rt_update');
		$data['rw'] = $this->input->post('rw_update');
		$data['alamat'] = $this->input->post('alamat_update');
		$data['status'] = $this->input->post('status_update');
		$data['update_at'] = date('Y-m-d H:i:s');

		$act = $this->PendudukModel->updatePenduduk($id, $data);

		if ($act) {
			$response = array(
				'type' => 'success',
				'text' => 'Data Penduduk sudah diubah!'
			);
		}else{
			$response = array(
				'type' => 'danger',
				'text' => 'Data Penduduk gagal diubah!'
			);
		}

		echo json_encode($response);
	}

	public function deletePenduduk()
	{
		$id = $this->input->post('id_delete');

		$act = $this->PendudukModel->deletePenduduk($id);

		if ($act) {
			$response = array(
				'type' => 'success',
				'text' => 'Data Penduduk sudah dihapus!'
			);
		}else{
			$response = array(
				'type' => 'danger',
				'text' => 'Data Penduduk gagal dihapus!'
			);
		}

		echo json_encode($response);

	}

}

/* End of file DataPenduduk.php */
/* Location: ./application/controllers/DataPenduduk.php */
?>