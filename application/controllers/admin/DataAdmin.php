<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataAdmin extends CI_Controller {

	public function __contruct()
	{
		parent::__contruct();
		$this->load->model('Model_anantahira','mdananta');
	}

	public function index()
	{

		if (!$this->session->userdata('status_log')) {
			redirect('admin/login/logout');
		}

		$data['admin'] = $this->Model_anantahira->getWhere('admin',array('level_akses' => 'admin' ))->result();
    $this->load->view('backend/data/admin',$data);
  }
}