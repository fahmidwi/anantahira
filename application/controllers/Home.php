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
	
		$data['nasional'] = $this->Model_anantahira->getWhere('berita',array('jenis_berita' => 'nasional'))->result();
		$data['breaking_news'] = $this->db->limit(5,0)->order_by('id_berita','DESC')->get('berita')->result();

		$data['fresh_berita'] = $this->Model_anantahira->getBerita(0,1)->row();
		$data['fresh_berita_2'] = $this->Model_anantahira->getBerita(1,2)->result();
		
		$data['popular_news'] = $this->Model_anantahira->popularNews()->result();
		$data['tentang_kami'] = $this->Model_anantahira->getData('tentang_kami','id_tentang_kami')->row();

		$data['categories'] = $this->Model_anantahira->getData('kategori_berita','id_kategori')->result();
		$data['cat'] = $this->Model_anantahira->getDataCat(0,null)->result();
		$data['monthpopulars'] = $this->Model_anantahira->monthPopulars()->result();

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

	public function gallery()
	{
		$data['data_cat'] = $this->Model_anantahira->getDataCat(0,7)->result();
		$data['more_cat'] = $this->Model_anantahira->getDataCat(0,null)->result();
		$data['jum_data_cat'] = $this->Model_anantahira->getDataCat(0,null)->num_rows();
		$data['tentang_kami'] = $this->Model_anantahira->getData('tentang_kami','id_tentang_kami')->row();
		$data['cat'] = $this->Model_anantahira->getDataCat(0,null)->result();
		
		$perpage = 8;
		$totalrows = $this->db->count_all('gallery');
		paginationPageFrontEnd($perpage,'home/gallery/page/',$totalrows);
		$start = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['gallery'] = $this->Model_anantahira->getDataPage('gallery', $perpage, $start,'id_gallery')->result();
		$data['pagination'] = $this->pagination->create_links();
		
		$this->load->view('frontend/gallery', $data);
	}
}
