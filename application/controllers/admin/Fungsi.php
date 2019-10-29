<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fungsi extends CI_Controller {

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

		paginationPage($perpage,'admin/Fungsi/index','fungsi');

		$data['fungsi'] = $this->Model_anantahira->getDataPage('fungsi',$perpage, $data['page'],'id_fungsi')->result();
		$data['pagination'] = $this->pagination->create_links();
    $this->load->view('backend/data/fungsi',$data);
	}
	
	public function tambah()
	{
		if (!$this->session->userdata('status_log')) {
			redirect('admin/login/logout');
		}

		$this->load->view('backend/form/tambah_fungsi');
	}

	public function prosestambah()
	{
		if (!$this->session->userdata('status_log')) {
			redirect('admin/login/logout');
		}

		$data = array(
			'nama_fungsi' => $this->input->post('fungsi'),
		);

		if ($this->Model_anantahira->insert('fungsi',$data)) {
			$this->session->set_flashdata('success','<strong>Selesai!</strong> Data Anda Berhasil Di Input!</span>');
			redirect('admin/Fungsi');
		}else{
			redirect('admin/Fungsi');
		}
	}

	public function hapus()
	{
		if (!$this->session->userdata('status_log')) {
			redirect('admin/login/logout');
		}

		$id = $this->uri->segment(4);

		if ($this->Model_anantahira->delete('fungsi',array('id_fungsi' => $id))) {
			$this->session->set_flashdata('success','<strong>Selesai!</strong> Data Anda Berhasil Di Hapus!</span>');
			redirect('admin/Fungsi');
		}else{
			redirect('admin/Fungsi');
		}
	}

	public function edit()
	{
		if (!$this->session->userdata('status_log')) {
			redirect('admin/login/logout');
		}

		$id = $this->uri->segment(4);
		$data['fungsi'] = $this->Model_anantahira->getWhere('fungsi',array('id_fungsi' => $id))->row();
		$this->load->view('backend/form/edit_fungsi',$data);
	}

	public function prosesedit()
	{
		if (!$this->session->userdata('status_log')) {
			redirect('admin/login/logout');
		}

		$data = array(
			'nama_fungsi' => $this->input->post('fungsi'),
		);
		
		$id = $this->uri->segment(4);

		if ($this->Model_anantahira->update('fungsi',$data,array('id_fungsi' => $id))) {
			$this->session->set_flashdata('success','<strong>Selesai!</strong> Data Anda Berhasil Di Input!</span>');
			redirect('admin/Fungsi');
		}else{
			redirect('admin/Fungsi');
		}
	}
}