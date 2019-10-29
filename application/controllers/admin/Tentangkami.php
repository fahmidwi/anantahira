<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentangkami extends CI_Controller {

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

		$data['tentangkami'] = $this->Model_anantahira->getData('tentang_kami','id_tentang_kami')->row();
    $this->load->view('backend/data/tentangkami',$data);
	}

	public function prosesedit()
	{
		if (!$this->session->userdata('status_log')) {
			redirect('admin/login/logout');
		}

		$data = array(
			'tentang_kami' => $this->input->post('tentang_kami'),
		);
		
		$id = $this->uri->segment(4);

		if ($this->Model_anantahira->update('tentang_kami',$data,array('id_tentang_kami' => $id))) {
			$this->session->set_flashdata('success','<strong>Selesai!</strong> Data Anda Berhasil Di perbaharui! <a href="'.base_url('home/about').'" target="_blank"> Cek disini!</a></span>');
			redirect('admin/Tentangkami');
		}else{
			redirect('admin/Tentangkami');
		}
	}
}