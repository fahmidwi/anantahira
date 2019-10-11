<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriBerita extends CI_Controller {

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

    paginationPage($perpage,'admin/KategoriBerita/index','kategori_berita');

		$data['kategori'] = $this->Model_anantahira->getDataPage('kategori_berita',$perpage, $data['page'],'id_kategori')->result();
		$data['pagination'] = $this->pagination->create_links();
    $this->load->view('backend/data/kategori_berita',$data);
  }
}