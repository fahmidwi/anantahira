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


  public function cekusername()
  {
    $key = $this->uri->segment(4);
    $res = $this->db->get_where('admin',array('username' => $key))->num_rows();
    echo json_encode($res);
  }

  public function cekemail()
  {
    $key = $this->uri->segment(4);
    $key = str_replace('-','@',$key);
    $res = $this->db->get_where('admin',array('email' => $key))->num_rows();
    echo json_encode($res);
  }

}