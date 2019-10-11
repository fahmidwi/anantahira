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

    $k = $this->input->get('keyword');

    $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    
    $perpage = 15;
    
    paginationPage($perpage,'admin/Keanggotaan/index','anggota');

    $data['anggota'] = $this->Model_anantahira->getDataPage('anggota', $perpage , $data['page'],'id_anggota')->result();
    $data['pagination'] = $this->pagination->create_links();
    
    $this->load->view('backend/data/anggota',$data);
	}
}