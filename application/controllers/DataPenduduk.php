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
				
				$html .= '<div class="col-lg-5 col-md-5 col-sm-7 col-xs-12">
					        <div class="card">
					          <div class="header bg-light-blue">
					            <h2>
					              '.$gt->nama_lengkap.'<small>'.$gt->nik.'</small>
					            </h2>
					            <ul class="header-dropdown m-r--5">
					              <li class="dropdown">
					                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					                  <i class="material-icons">more_vert</i>
					                </a>
					                <ul class="dropdown-menu pull-right">
					                  <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
					                  <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
					                  <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
					                </ul>
					              </li>
					            </ul>
					          </div>
					          <div class="body">
					            
								<div class="table-responsive">
									<table class="table table-condensed">
										<tr>
											<td>NIK</td>
											<td>:</td>
											<td>'.$gt->nik.'</td>
										</tr>

										<tr>
											<td>NO KK</td>
											<td>:</td>
											<td>'.$gt->no_kk.'</td>
										</tr>

										<tr>
											<td>NAMA LENGKAP</td>
											<td>:</td>
											<td>'.$gt->nama_lengkap.'</td>
										</tr>

										<tr>
											<td>TEMPAT LAHIR</td>
											<td>:</td>
											<td>'.$gt->tempat_lahir.'</td>
										</tr>

										<tr>
											<td>TANGGAL LAHIR</td>
											<td>:</td>
											<td>'.date('d M Y', strtotime($gt->tanggal_lahir)).'</td>
										</tr>

										<tr>
											<td>ALAMAT</td>
											<td>:</td>
											<td style="word-break: break-all;">'.$gt->alamat.'</p></td>
										</tr>
									</table>
								</div>

					          </div>
					        </div>
					      </div>
					    </div>';
			}
		}else{
			$html .= '<div class="portlet-grid panel-primary">
							<div class="panel-body text-center">
								<h4>Tidak Ada Data</h4>
							</div>
						</div>';
		}
		

		echo $html;
	}
	
}

/* End of file DataPenduduk.php */
/* Location: ./application/controllers/DataPenduduk.php */
?>