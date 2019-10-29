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
			$data['no_ak'] = $dataanggota->row()->no_ak;
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
			$data['no_ak'] = '';
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
		$data['datanoak'] = $this->Model_anantahira->getData('anggota','id_anggota')->result();

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

	public function cekNoak($noak)
	{
		$getnoak = $this->Model_anantahira->getWhere('anggota', array('no_ak' => $noak));
		if ($getnoak->num_rows() == 1) {
			echo json_encode(array(
				'jum' => $getnoak->num_rows(),
				'no_ak' => $getnoak->row()->no_ak
			));
		}else{
			echo json_encode(array(
				'jum' => $getnoak->num_rows(),
				'no_ak' => ''
			));
		}
	}

	public function AddDataKeanggotaan()
	{
		
		$data = array(
			'id_admin' => $this->session->userdata('id_admin'), 
			'no_ak' => $this->input->post('no_ak'), 
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
			'no_ak' => $this->input->post('no_ak'), 
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
		$rename 		= date("YmdHis") + 1;
		$nama_file 		= $rename.".".$ext;

		$config['upload_path']	 = './assets/backend/img';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['file_name']  	 = $nama_file;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->upload->do_upload($name)) {
			$data = array('upload_data' => $this->upload->data());
        
      $this->resizeGambar($data['upload_data']['file_name']);
			return $nama_file = $data['upload_data']['file_name'];
		}else{
			echo 'gagal upload foto, silahkan kembali';
		}
	}

	public function resizeGambar($filename)
  {
    $config['image_library']='gd2';
    $config['source_image']='./assets/backend/img/'.$filename;
    $config['maintain_ratio']= TRUE;
    $config['quality']= '45%';
    $config['width']= 400;
    $config['new_image']= './assets/backend/img/'.$filename;

		$this->load->library('image_lib', $config);
		$this->image_lib->initialize($config);
    $this->image_lib->resize();
    $this->image_lib->clear();
  }

	public function changepassword()
	{
		if (!$this->session->userdata('status_log')) {
			redirect('admin/login/logout');
		}

		$this->load->view('backend/changepass');
	}

	public function cekoldpass()
	{
		$pass = md5($this->uri->segment(4));
		$data = $this->Model_anantahira->getWhere('admin',array('password' => $pass, 'id_admin' => $this->session->userdata('id_admin')))->num_rows();
		echo json_encode($data);
	}

	public function updatepass()
	{
		$id_admin = $this->uri->segment(4);
		$data = array(
			'password' => md5($this->input->post('newpass'))
		);

		$where = array(
			'id_admin' => $id_admin
		);

		if ($this->Model_anantahira->update('admin',$data,$where)) {
			$this->session->set_flashdata('success_edit','ya');
			redirect('admin/home/changepassword');
		}else{
			$this->session->set_flashdata('gagal','tidak');
			redirect('admin/home/changepassword');
		}
	}
}