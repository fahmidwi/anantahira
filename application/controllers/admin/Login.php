<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
      $this->load->model('Model_anantahira','mdananta');
  }

	public function index()
	{
    if ($this->session->userdata('status_log')) {
        redirect('admin/home','refresh');
    } else {
      $this->load->view('backend/login');
    }
  }
  
  public function actLogin()
  {
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $dataLog = array(
          'username' => $username,
          'password' => md5($password),
      );

      $dataLog = $this->mdananta->getWhere('admin',$dataLog);

      if ($dataLog->num_rows() == 1) {
          $dataSess = $dataLog->row();
          
          $ang = $this->mdananta->getWhere('anggota',array('id_admin' => $dataSess->id_admin));
          
          $kd = ($ang->num_rows() == 1) ? 'true' : 'false';
          $foto = ($ang->num_rows() == 1) ? $ang->row()->foto_pribadi : 'user.png';
          
          $dataSess = array(
            'id_admin' => $dataSess->id_admin, 
            'nama' => $dataSess->nama_lengkap, 
            'email' => $dataSess->email,
            'username' => $dataSess->username, 
            'password' => $dataSess->password, 
            'level_akses' => $dataSess->level_akses,
            'status_log' => true,
            'kd_anggota' => $kd, //kd_anggota = kelengkapan data anggota
            'foto' => $foto
          );

          $this->session->set_userdata($dataSess);
          redirect('admin/home');
      } else {
          $this->session->set_flashdata('pesan', 'Username dan password salah!!');
          redirect('admin/Login');
      }
      

  }

  public function Logout()
  {
      $this->session->unset_userdata(array(
          'id_user', 
          'nama', 
          'email',
          'username', 
          'password', 
          'status_akses',
          'level_akses',
          'status_log'
      ));
      $this->session->sess_destroy();
      redirect('admin/login','refresh');
      
  }

  public function register()
  {
      $this->load->view('backend/register');
  }


  public function prosesRegistrasi()
  {
    $secretkey = '6LfQObwUAAAAAHyplLskG0YzZLA9fYGJXi7Kov_z';
    $response = $this->input->post('g-recaptcha-response');
    $res = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretkey.'&response='.$response);
    $res = json_decode($res);
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
      echo 'gagal';
    }
  }

  public function cekusername()
  {
    $key = $this->uri->segment(4);
    $res = $this->db->get_where('admin',array('username' => $key))->num_rows();
    echo json_encode($res);
  }

}