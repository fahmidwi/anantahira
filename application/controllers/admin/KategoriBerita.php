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
	
	public function tambah()
	{
		if (!$this->session->userdata('status_log')) {
			redirect('admin/login/logout');
		}

		$this->load->view('backend/form/tambah_kategori');
	}

	public function prosestambah()
	{
		if (!$this->session->userdata('status_log')) {
			redirect('admin/login/logout');
		}

		$data = array(
			'nama_kategori' => $this->input->post('kategori_berita'),
			'urikategori' => str_replace(' ', '-', strtolower($this->input->post('kategori_berita'))),
		);

		if ($this->Model_anantahira->insert('kategori_berita',$data)) {
			$this->session->set_flashdata('success','<strong>Selesai!</strong> Data Anda Berhasil Di Input!</span>');
			redirect('admin/KategoriBerita');
		}else{
			redirect('admin/KategoriBerita');
		}
	}

	public function hapus()
	{
		if (!$this->session->userdata('status_log')) {
			redirect('admin/login/logout');
		}

		$id = $this->uri->segment(4);

		if ($this->Model_anantahira->delete('kategori_berita',array('id_kategori' => $id))) {
			$this->session->set_flashdata('success','<strong>Selesai!</strong> Data Anda Berhasil Di Hapus!</span>');
			redirect('admin/KategoriBerita');
		}else{
			redirect('admin/KategoriBerita');
		}
	}

	public function edit()
	{
		if (!$this->session->userdata('status_log')) {
			redirect('admin/login/logout');
		}

		$id = $this->uri->segment(4);
		$data['kategori'] = $this->Model_anantahira->getWhere('kategori_berita',array('id_kategori' => $id))->row();
		$this->load->view('backend/form/edit_kategori',$data);
	}

	public function prosesedit()
	{
		if (!$this->session->userdata('status_log')) {
			redirect('admin/login/logout');
		}

		$data = array(
			'nama_kategori' => $this->input->post('kategori_berita'),
			'urikategori' => str_replace(' ', '-', strtolower($this->input->post('kategori_berita'))),
		);
		
		$id = $this->uri->segment(4);

		if ($this->Model_anantahira->update('kategori_berita',$data,array('id_kategori' => $id))) {
			$this->session->set_flashdata('success','<strong>Selesai!</strong> Data Anda Berhasil Di Input!</span>');
			redirect('admin/KategoriBerita');
		}else{
			redirect('admin/KategoriBerita');
		}
	}

}