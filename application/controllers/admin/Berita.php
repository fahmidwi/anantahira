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
	
	public function tambah()
	{
		if (!$this->session->userdata('status_log')) {
			redirect('admin/login/logout');
		}

		$data['kategori'] = $this->Model_anantahira->getData('kategori_berita','id_kategori')->result();
		$this->load->view('backend/form/tambah_berita',$data);
	}

	public function prosestambah()
	{
		$uriberita = strtolower($this->input->post('judul_berita'));
    $uriberita = preg_replace('/[^A-Za-z0-9]/', '-', $uriberita);;

		$gambar = $this->uploadGambar('gambar');

		$data = array(
			'id_kategori' => $this->input->post('kategori_berita'),
			'id_admin' => $this->session->userdata('id_admin'),
			'headnews' => $this->input->post('judul_berita'),
			'caption_singkat' => $this->input->post('caption_singkat'),
			'gambar_berita' => $gambar,
			'isi_berita' => $this->input->post('isi_berita'),
			'create_date' => date('Y-m-d H:i:s'),
			'view' => 0,
			'sumber' => $this->input->post('sumber'),
			'jenis_berita' => $this->input->post('jenis_berita'),
			'uriberita' => $uriberita
		);

		if ($this->Model_anantahira->insert('berita',$data)) {
			$this->session->set_flashdata('success','<strong>Selesai!</strong> Data Anda Berhasil Di Tambahkan!</span>');
			redirect('admin/berita');
		}else{
			redirect('admin/berita');
		}
	}


	public function edit()
	{
		if (!$this->session->userdata('status_log')) {
			redirect('admin/login/logout');
		}

		$id = $this->uri->segment(4);
		$data['berita'] = $this->Model_anantahira->getWhere('berita',array('id_berita' => $id))->row();
		$data['kategori'] = $this->Model_anantahira->getData('kategori_berita','id_kategori')->result();
		$this->load->view('backend/form/edit_berita',$data);
	}

	public function prosesedit()
	{
		$uriberita = strtolower($this->input->post('judul_berita'));
		$uriberita = preg_replace('/[^A-Za-z0-9]/', '-', $uriberita);;
		
		$id = $this->uri->segment(4);
		
		$berita = $this->Model_anantahira->getWhere('berita',array('id_berita' => $id))->row();
		if (empty($_FILES['gambar']['name'])) {
			$gambar = $berita->gambar_berita;
		}else{
			unlink('./assets/img/berita/'.$berita->gambar_berita);
			$gambar = $this->uploadGambar('gambar');
		}

		$data = array(
			'id_kategori' => $this->input->post('kategori_berita'),
			'id_admin' => $this->session->userdata('id_admin'),
			'headnews' => $this->input->post('judul_berita'),
			'caption_singkat' => $this->input->post('caption_singkat'),
			'gambar_berita' => $gambar,
			'isi_berita' => $this->input->post('isi_berita'),
			'modified_date' => date('Y-m-d H:i:s'),
			'sumber' => $this->input->post('sumber'),
			'jenis_berita' => $this->input->post('jenis_berita'),
			'uriberita' => $uriberita
		);

		if ($this->Model_anantahira->update('berita',$data,array('id_berita' => $id))) {
			$this->session->set_flashdata('success','<strong>Selesai!</strong> Data Anda Berhasil Di perbarui!</span>');
			redirect('admin/berita');
		}else{
			redirect('admin/berita');
		}
	}

	public function hapus()
	{
		if (!$this->session->userdata('status_log')) {
			redirect('admin/login/logout');
		}

		$id = $this->uri->segment(4);

		$gambar = $this->Model_anantahira->getWhere('berita',array('id_berita' => $id))->row()->gambar_berita;
		unlink('./assets/img/berita/'.$gambar);

		if ($this->Model_anantahira->delete('berita',array('id_berita' => $id))) {
			$this->session->set_flashdata('success','<strong>Selesai!</strong> Data Anda Berhasil Di Hapus!</span>');
			redirect('admin/berita');
		}else{
			redirect('admin/berita');
		}
	}

	public function uploadGambar($name)
	{
		$nama_file = '';

		$file 			= $_FILES[$name]['name'];
		$pisah 			= explode(".",$file);
		$ext 			= end($pisah);
		$rename 		= date("YmdHis");
		$nama_file 		= $rename.".".$ext;
		
		$config['upload_path']	 = './assets/img/berita/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['file_name']  	 = $nama_file;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->upload->do_upload($name)) {
			$data = array('upload_data' => $this->upload->data());
        
      $this->resizeGambar($data['upload_data']['file_name']);
			return $nama_file = $config['file_name'];
		}else{
			echo 'gagal upload foto, silahkan kembali';
		}
	}

	public function resizeGambar($filename)
  {
    $config['image_library']='gd2';
    $config['source_image']='./assets/img/berita/'.$filename;
    $config['maintain_ratio']= TRUE;
    $config['quality']= '45%';
    $config['width']= 500;
    $config['height']= 266;
    $config['new_image']= './assets/img/berita/'.$filename;

		$this->load->library('image_lib', $config);
		$this->image_lib->initialize($config);
    $this->image_lib->resize();
    $this->image_lib->clear();
	}
	
	public function upload()
	{
		$this->load->helper('url');
		$funcNum = $this->input->get('CKEditorFuncNum');
		$source = $_FILES['upload']['tmp_name'];
		$file = $_FILES['upload']['name'];
		$ext = pathinfo($file, PATHINFO_EXTENSION);
		$newName = date('YmdHis').rand(1000, 9999); //新檔名
		$message = '';
		$url = '';

		$fileName = "{$newName}.{$ext}";
    $target = './assets/img/berita/'.$fileName;

		if (move_uploaded_file($source, $target)) {
			$url = base_url($target);
			$string = "<script type=\"text/javascript\">window.parent.CKEDITOR.tools.callFunction({$funcNum}, '{$url}', '{$message}');</script>";
			$this->output
          ->set_content_type('text/html')
          	->set_output($string);
		}else{
			echo 'gagal upload foto, silahkan kembali';
		}
	}
}
