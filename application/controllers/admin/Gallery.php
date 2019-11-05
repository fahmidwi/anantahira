<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

  function __construct()
	{
		parent::__construct();
		$this->load->model('Model_anantahira');
  }
    
  public function index()
  {
    if (!$this->session->userdata('status_log')) {
      redirect('admin/login/logout');
    }

    $perpage = 10;
    $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    
    paginationPage($perpage,'admin/Gallery/index','gallery');

    $data['gallery'] = $this->Model_anantahira->getGallery($data['page'],$perpage)->result();

    $data['pagination'] = $this->pagination->create_links();
    $this->load->view('backend/data/gallery',$data);
  }

  public function tambah()
  {
    if (!$this->session->userdata('status_log')) {
      redirect('admin/login/logout');
      return;
    }
    $this->load->view('backend/form/tambah_gallery');
  }

  public function prosestambah()
  {
    $jumfile 			= count($_FILES['gallery']['name']);
    $nameFile = 'gallery';
    $locFile = './assets/img/gallery/';
    $fileNameFormat = "GALLERY_";
    $add = $this->MultiUpload($jumfile,$nameFile,$locFile,$fileNameFormat);
    if ($add) {
      redirect('admin/Gallery');
    }else{
      echo json_encode(array('msg' => 'gagal upload'));
    }
  }


  public function MultiUpload($jumfile,$nameFile,$locFile,$fileNameFormat) //Params Butuh nilai: Jumlah file, name inputan file, lokasi upload './assets/lampiran_kreditChecking'
  {
    for($i = 0; $i < $jumfile; $i++){
      $_FILES['file']['name']     = $_FILES[$nameFile]['name'][$i];
      $_FILES['file']['type']     = $_FILES[$nameFile]['type'][$i];
      $_FILES['file']['tmp_name'] = $_FILES[$nameFile]['tmp_name'][$i];
      $_FILES['file']['error']     = $_FILES[$nameFile]['error'][$i];
      $_FILES['file']['size']     = $_FILES[$nameFile]['size'][$i] / 2;

      $file 			= $_FILES[$nameFile]['name'][$i];
      $pisah 			= explode(".",$file);
      $ext 			= end($pisah);
      $rename 		= date("YmdHis") + $i;
      $nama_file 		= $rename.$i.".".$ext;

      $config['upload_path']	 = $locFile;
      $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
      $config['file_name']  	 = $fileNameFormat.$nama_file;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if($this->upload->do_upload('file')){
        $data = array('upload_data' => $this->upload->data());
        
        $this->resize($data['upload_data']['file_name']);
        
        $namaFile = $data['upload_data']['file_name'];
        $data_input = array(
          'gambar_gallery' => $namaFile,
          'id_admin' => $this->session->userdata('id_admin'),
          'upload_date' => date('Y-m-d H:i:s')
        );
        $this->Model_anantahira->insert('gallery',$data_input);              
      }else{
        return false;
      }
    }
      return true;
  }

  public function edit()
  {
    $id = $this->uri->segment(4);
    if ($this->session->userdata('status_log')) {
        $data['gallery'] = $this->Model_anantahira->getWhere('gallery',array('id_gallery' => $id))->row();
        $this->load->view('backend/form/edit_gallery',$data);
    } else {
        redirect('admin/login','refresh');
    }
  }

  public function prosesedit($id)
  {
      $file = $_FILES['gallery']['name'];

      $file 			= $_FILES['gallery']['name'];
      $pisah 			= explode(".",$file);
      $ext 			= end($pisah);
      $rename 		= date("YmdHis");
      $nama_file 		= $rename.".".$ext;

      $config['upload_path']	 = './assets/img/gallery/';
      $config['allowed_types'] = 'jpg|jpeg|png';
      $config['file_name']  	 = 'GALLERY_'.$nama_file;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if($this->upload->do_upload('gallery')){
        $datagallery = $this->Model_anantahira->getWhere('gallery',array('id_gallery' => $id))->row();
        if ($datagallery->gambar_gallery != '') {
          unlink('./assets/img/gallery/'.$datagallery->gambar_gallery);
        }
        $data = $this->upload->data();
        $this->resize($data['file_name']);

        $data = array(
          'gambar_gallery' => $data['file_name'],
          'id_admin' => $this->session->userdata('id_admin'),
          'upload_date' => date('Y-m-d H:i:s')
        );

        $this->Model_anantahira->update('gallery',$data,array('id_gallery' => $id));
        $this->session->set_flashdata('success','Data berhasil di ubah');
        redirect('admin/Gallery');
      }  
  }

  public function hapus($id)
  {
    $datagallery = $this->Model_anantahira->getWhere('gallery',array('id_gallery' => $id))->row();
    if ($datagallery->gambar_gallery != '') {
      unlink('./assets/img/gallery/'.$datagallery->gambar_gallery);
    }

    $this->Model_anantahira->delete('gallery',array('id_gallery' => $id));
    $this->session->set_flashdata('success','Data berhasil di hapus');
    redirect('admin/Gallery','refresh');
  }

  public function resize($filename)
  {
    $config['image_library']='gd2';
    $config['source_image']='./assets/img/gallery/'.$filename;
    $config['maintain_ratio']= TRUE;
    $config['quality']= '70%';
    $config['width']= 350;
    $config['new_image']= './assets/img/gallery/'.$filename;

    $this->load->library('image_lib', $config);
    $this->image_lib->initialize($config);
    $this->image_lib->resize();
    return $this->image_lib->clear();
  }
}