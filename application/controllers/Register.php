<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
      $this->load->model('Model_anantahira','mdananta');
  }

  public function index()
  {
    redirect('register/anggota');
  }

  public function anggota()
  {
      $this->load->view('backend/register');
  }

  public function prosesRegistrasi()
  {
    $secretkey = '6LfQObwUAAAAAHyplLskG0YzZLA9fYGJXi7Kov_z';
    $response = $this->input->post('g-recaptcha-response');
    $uri = 'https://www.google.com/recaptcha/api/siteverify?secret='.$secretkey.'&response='.$response;
    
    $arrContextOptions = array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
        ),
    ); 

    $get = file_get_contents($uri,false, stream_context_create($arrContextOptions));
    $res = json_decode($get);
    if ($res->success) {
      $data = array(
        'nama_lengkap' => $this->input->post('nama_lengkap'),
        'email' => $this->input->post('email'),
        'username' => $this->input->post('username'),
        'password' => md5($this->input->post('password')),
        'level_akses' => 'anggota'
      );

      $id = $this->mdananta->register($data);

      $cek = $this->mdananta->getWhere('anggota',array('id_admin' => $id))->num_rows();
      $kd = ($cek == 1) ? 'true' : 'false';
      $dataSess = array(
        'id_admin' => $id, 
        'nama' => $this->input->post('nama_lengkap'), 
        'email' => $this->input->post('email'),
        'username' => $this->input->post('username'), 
        'password' => md5($this->input->post('password')), 
        'level_akses' => 'anggota',
        'status_log' => true,
        'kd_anggota' => $kd,//kd_anggota = kelengkapan data anggota
        'foto' => 'user.png'
      );

      $this->session->set_userdata($dataSess);
      redirect('admin/home');
    }else{
      $this->session->set_flashdata('Gagal','Terjadi masalah captcha, silahkan coba lagi :)');
      redirect('register/anggota');
    }
  }
}