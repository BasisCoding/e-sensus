<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			if ($this->session->userdata('logged') == false) {
				redirect('login','refresh');
			}
		}
	
		public function index()
		{
			$set['title'] = 'Dashboard';

			$this->load->view('partials/head', $set);
			$this->load->view('partials/header');
			$this->load->view('partials/sidebar');
			$this->load->view('partials/main');
			$this->load->view('partials/core');
			$this->load->view('plugins/dashboard');
		}
	
	}
	
	/* End of file Dashboard.php */
	/* Location: ./application/controllers/Dashboard.php */
?>