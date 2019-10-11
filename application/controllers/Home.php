<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __contruct()
	{
		parent::__contruct();
		$this->load->model('Model_anantahira');
	}

	public function index()
	{
		$data['data_cat'] = $this->Model_anantahira->getDataCat(0,7)->result();
		$data['more_cat'] = $this->Model_anantahira->getDataCat(0,null)->result();
		$data['jum_data_cat'] = $this->Model_anantahira->getDataCat(0,null)->num_rows();
	
		$data['breaking_news'] = $this->Model_anantahira->getBerita(0,null)->result();

		$data['fresh_berita'] = $this->Model_anantahira->getBerita(0,1)->row();
		$data['fresh_berita_2'] = $this->Model_anantahira->getBerita(1,2)->result();
		
		$data['popular_news'] = $this->Model_anantahira->popularNews()->result();
		$data['tentang_kami'] = $this->Model_anantahira->getData('tentang_kami','id_tentang_kami')->row();

		$data['categories'] = $this->Model_anantahira->getData('kategori_berita','id_kategori')->result();
		$data['cat'] = $this->Model_anantahira->getDataCat(0,null)->result();

		//print_r($data['popular_news']);die();
		$this->load->view('index',$data);
	}

	public function about()
	{
		$data['data_cat'] = $this->Model_anantahira->getDataCat(0,7)->result();
		$data['more_cat'] = $this->Model_anantahira->getDataCat(0,null)->result();
		$data['jum_data_cat'] = $this->Model_anantahira->getDataCat(0,null)->num_rows();
		$data['tentang_kami'] = $this->Model_anantahira->getData('tentang_kami','id_tentang_kami')->row();
		$data['cat'] = $this->Model_anantahira->getDataCat(0,null)->result();

		$this->load->view('frontend/about', $data);
	}
	
	public function categories()
	{
		$data['data_cat'] = $this->Model_anantahira->getDataCat(0,7)->result();
		$data['more_cat'] = $this->Model_anantahira->getDataCat(0,null)->result();
		$data['jum_data_cat'] = $this->Model_anantahira->getDataCat(0,null)->num_rows();

		$data['breaking_news'] = $this->Model_anantahira->getBerita(0,null)->result();
	
		$data['categories'] = $this->Model_anantahira->getData('kategori_berita','id_kategori')->result();


		$nama_kategori = str_replace('-', ' ', ucwords($this->uri->segment(3)));

		$data['data_spesifik'] = $this->Model_anantahira->NewsFromCat($nama_kategori, 0, 4)->result();
		$data['cat'] = $this->Model_anantahira->getDataCat(0,null)->result();

		$this->load->view('frontend/catagories-post',$data);
	}
	
	public function detail_berita()
	{
		$data['data_cat'] = $this->Model_anantahira->getDataCat(0,7)->result();
		$data['more_cat'] = $this->Model_anantahira->getDataCat(0,null)->result();
		$data['jum_data_cat'] = $this->Model_anantahira->getDataCat(0,null)->num_rows();

		$data['breaking_news'] = $this->Model_anantahira->getBerita(0,null)->result();

		$id_berita = $this->uri->segment(3);
		
		$data['berita'] = $this->Model_anantahira->detailBerita($id_berita)->row();
		$this->db->update('berita',array('view' => $data['berita']->view + 1), array('id_berita' => $id_berita));
		$jum = $this->Model_anantahira->detailBerita($id_berita)->num_rows();
		if ($jum == 0) {
			redirect(base_url('notpon'));
		}
		$data['categories'] = $this->Model_anantahira->getData('kategori_berita','id_kategori')->result();


		$nama_kategori = $data['berita']->nama_kategori;
		$data['relasi'] = $this->Model_anantahira->NewsFromCat($nama_kategori, 0, 4)->result();

		$data['cat'] = $this->Model_anantahira->getDataCat(0,null)->result();
		$this->load->view('frontend/single-post',$data);
	}
	
	public function morecategories()
	{
		$data['data_cat'] = $this->Model_anantahira->getDataCat(0,7)->result();
		$data['more_cat'] = $this->Model_anantahira->getDataCat(0,null)->result();
		$data['jum_data_cat'] = $this->Model_anantahira->getDataCat(0,null)->num_rows();
		
		$data['cat'] = $this->Model_anantahira->getDataCat(0,null)->result();
		
		$this->load->view('frontend/morecategories',$data);
	}

	public function search()
	{
		
		$headnews = $this->input->get('keyword');
		
		$data['data_cat'] = $this->Model_anantahira->getDataCat(0,7)->result();
		$data['more_cat'] = $this->Model_anantahira->getDataCat(0,null)->result();
		$data['jum_data_cat'] = $this->Model_anantahira->getDataCat(0,null)->num_rows();
		$data['categories'] = $this->Model_anantahira->getData('kategori_berita','id_kategori')->result();
		
		$data['headnews'] = $headnews;
		$data['result_search'] = $this->Model_anantahira->SeachAllNews($headnews,0,4)->result();
		$data['jum'] = $this->Model_anantahira->SeachAllNews($headnews,0,4)->num_rows();

		$data['cat'] = $this->Model_anantahira->getDataCat(0,null)->result();
		$this->load->view('frontend/result_search',$data);
	}
}
