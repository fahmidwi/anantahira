<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keanggotaan extends CI_Controller {

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

    $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    
    $perpage = 15;
    
    paginationPage($perpage,'admin/Keanggotaan/index','anggota');

    $data['anggota'] = $this->Model_anantahira->getDataPage('anggota', $perpage , $data['page'],'no_ak')->result();
    $data['pagination'] = $this->pagination->create_links();
    
    $this->load->view('backend/data/anggota',$data);
  }

  public function onsearch()
	{
		$keyword = $this->input->get('keyword');
    $data['anggota'] = $this->Model_anantahira->searchAnggota($keyword)->result();
    $data['pagination'] = '';
    $this->load->view('backend/data/anggota',$data);
  }
  
  public function blockanggota()
  {
    if (!$this->session->userdata('status_log')) {
      redirect('admin/login/logout');
    }

    $id = $this->uri->segment(4);
    if ($id == '') {
      redirect('admin/Keanggotaan');
    }

    $data = $this->Model_anantahira->getWhere('anggota',array('id_admin' => $id))->row();
    echo $data->foto_pribadi; 
    if ($data->foto_pribadi != '') {
      unlink('./backend/img/'.$data->foto_pribadi);
    }

    if ($data->foto_keluarga != '') {
      unlink('./backend/img/'.$data->foto_keluarga);
    }

		if ($this->Model_anantahira->delete('anggota',array('id_admin' => $id))) {
      $this->Model_anantahira->delete('admin',array('id_admin' => $id));
			$this->session->set_flashdata('success','<strong>Selesai!</strong> Data berhasil di block atau Hapus permanen!</span>');
			redirect('admin/Keanggotaan');
		}else{
			redirect('admin/Keanggotaan');
		}

  }
}