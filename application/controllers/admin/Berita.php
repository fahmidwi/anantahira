<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

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
		
		$perpage = 10;
		$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		paginationPage($perpage,'admin/Berita/index','berita');

		$data['berita'] = $this->Model_anantahira->getDataPage('berita',$perpage, $data['page'],'id_berita')->result();
		$data['pagination'] = $this->pagination->create_links();
    $this->load->view('backend/data/berita',$data);
  }
}