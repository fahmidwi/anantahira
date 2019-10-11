<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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

		$stat = $this->input->get('user');
		if (!$stat) {
			$id_admin = $this->session->userdata('id_admin');
		}else{
			$getIdadminDetail = $this->Model_anantahira->getWhere('admin', array('username' => $stat));
			if ($getIdadminDetail->num_rows() > 0) {
				$id_admin = $getIdadminDetail->row()->id_admin;
			}else{
				redirect('admin/home','refresh');
			}
		}

		$dataanggota = $this->Model_anantahira->getAnggotaData($id_admin);
		
		if ($dataanggota->num_rows() > 0) {
			$data['id_anggota'] = $dataanggota->row()->id_anggota;
			$data['username'] = $dataanggota->row()->username;
			$data['email'] = $dataanggota->row()->email;
			$data['nama_lengkap'] = $dataanggota->row()->nama_lengkap;
			$data['no_hp'] = $dataanggota->row()->no_hp;
			$data['alamat'] = $dataanggota->row()->alamat;
			$data['foto_pribadi'] = $dataanggota->row()->foto_pribadi;
			$data['foto_keluarga'] = $dataanggota->row()->foto_keluarga;
			$data['id_provinsi'] = $dataanggota->row()->id_provinsi;
			$data['id_kotakab'] = $dataanggota->row()->id_kabkota;
			$data['jabatan'] = $dataanggota->row()->jabatan;
			$data['id_fungsi'] = $dataanggota->row()->id_fungsi;
			$data['instagram'] = $dataanggota->row()->instagram;
			$data['facebook'] = $dataanggota->row()->facebook;
			$data['twitter'] = $dataanggota->row()->twitter;
			$data['biografi'] = $dataanggota->row()->biografi;

			$data['provinsi'] = $dataanggota->row()->provinsi;
			$data['kotakab'] = $dataanggota->row()->kotakab;
			$data['nama_fungsi'] = $dataanggota->row()->nama_fungsi;
		}else{
			$data['username'] = $this->session->userdata('username');
			$data['email'] = $this->session->userdata('email');
			$data['nama_lengkap'] = $this->session->userdata('nama');
			$data['no_hp'] = '';
			$data['alamat'] = '';
			$data['foto_pribadi'] = '';
			$data['foto_keluarga'] = '';
			$data['id_provinsi'] = '';
			$data['id_kotakab'] = '';
			$data['jabatan'] = '';
			$data['id_fungsi'] = '';
			$data['instagram'] = '';
			$data['facebook'] = '';
			$data['twitter'] = '';
			$data['biografi'] = '';
			$data['provinsi'] = '';
			$data['kotakab'] = '';
			$data['nama_fungsi'] = '';
		}

		$data['fungsi'] = $this->Model_anantahira->getData('fungsi','id_fungsi')->result();

		$this->load->view('backend/index',$data);
	}

	public function provinsi($value='')
	{
		$data = $this->Model_anantahira->getData('provinsi','id_provinsi')->result();
		echo json_encode($data);
	}

	public function kotakab($value='')
	{
		$propinsi_id = $this->uri->segment(4);
		$where = array('id_provinsi' => $propinsi_id);
		$data = $this->Model_anantahira->getWhere('kotakab',$where)->result();
		echo json_encode($data);
	}

	public function ubah_profile()
	{
		$this->load->view('backend/form/ubah_profile');
	}
	public function view_profile()
	{
		$this->load->view('backend/data/view_profile');
	}
	public function berita()
	{
		$this->load->view('backend/data/berita');
	}
	public function kategori_berita()
	{
		$this->load->view('backend/data/kategori_berita');
	}
	public function fungsi()
	{
		$this->load->view('backend/data/fungsi');
	}
	public function data_admin()
	{
		$this->load->view('backend/data/admin');
	}

	public function AddDataKeanggotaan()
	{
		
		$data = array(
			'id_admin' => $this->session->userdata('id_admin'), 
			'nama_lengkap' => $this->input->post('nama_lengkap'), 
			'alamat' => $this->input->post('alamat'), 
			'no_hp' => $this->input->post('no_hp'), 
			'email' => $this->input->post('email'), 
			'foto_pribadi' => $this->uploadFoto('foto_pribadi'), 
			'foto_keluarga' => $this->uploadFoto('foto_keluarga'), 
			'id_fungsi' => $this->input->post('fungsi'), 
			'id_provinsi' => $this->input->post('provinsi'), 
			'id_kabkota' => $this->input->post('kotakab'), 
			'jabatan' => $this->input->post('jabatan'), 
			'instagram' => $this->input->post('instagram'), 
			'facebook' => $this->input->post('facebook'), 
			'twitter' => $this->input->post('twitter'), 
			'biografi' => $this->input->post('biografi'), 
		);

		if ($this->Model_anantahira->insert('anggota',$data)) {
			$this->session->set_userdata(array('foto' => $data['foto_pribadi']));
			$this->session->set_flashdata('success','ya');
			$this->session->set_userdata(array('kd_anggota' => 'true'));
			redirect('admin/home');
		}else{
			redirect('admin/home');
		}

	}


	public function UpdateDataKeanggotaan()
	{

		$foto_pribadi = $_FILES['foto_pribadi']['name'];
		$foto_keluarga = $_FILES['foto_keluarga']['name'];

		$where = array(
			'id_anggota' => $this->uri->segment(4)
		);

		$data = array(
			'id_admin' => $this->session->userdata('id_admin'), 
			'nama_lengkap' => $this->input->post('nama_lengkap'), 
			'alamat' => $this->input->post('alamat'), 
			'no_hp' => $this->input->post('no_hp'), 
			'email' => $this->input->post('email'), 
			'foto_pribadi' => ($foto_pribadi == '') ? $this->input->post('foto_pribadi') : $this->uploadFoto('foto_pribadi'), 
			'foto_keluarga' => ($foto_keluarga == '') ? $this->input->post('foto_keluarga') : $this->uploadFoto('foto_keluarga'),
			'id_fungsi' => $this->input->post('fungsi'), 
			'id_provinsi' => $this->input->post('provinsi'), 
			'id_kabkota' => $this->input->post('kotakab'), 
			'jabatan' => $this->input->post('jabatan'), 
			'instagram' => $this->input->post('instagram'), 
			'facebook' => $this->input->post('facebook'), 
			'twitter' => $this->input->post('twitter'), 
			'biografi' => $this->input->post('biografi'), 
		);

		if ($foto_pribadi != '') {
			unlink('./assets/backend/img/'.$this->input->post('foto_pribadi'));
		}

		if ($foto_keluarga != '') {
			unlink('./assets/backend/img/'.$this->input->post('foto_keluarga'));
		}

		if ($this->Model_anantahira->update('anggota',$data,$where)) {
			$this->session->set_userdata(array('foto' => $data['foto_pribadi']));
			$this->session->set_flashdata('success_edit','ya');
			$this->session->set_userdata(array('kd_anggota' => 'true'));
			redirect('admin/home');
		}else{
			redirect('admin/home');
		}
	}


	public function uploadFoto($name)
	{
		$nama_file = '';

		$file 			= $_FILES[$name]['name'];
		$pisah 			= explode(".",$file);
		$ext 			= end($pisah);
		$rename 		= date("YmdHis");
		$nama_file 		= $rename.".".$ext;

		$config['upload_path']	 = './assets/backend/img';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['file_name']  	 = $nama_file;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->upload->do_upload($name)) {
			return $nama_file = $config['file_name'];
		}else{
			echo 'gagal upload foto, silahkan kembali';
		}
	}
}