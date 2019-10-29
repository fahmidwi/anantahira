<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

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
	
		$data['categories'] = $this->Model_anantahira->getData('kategori_berita','id_kategori')->result();
		$data['monthpopulars'] = $this->Model_anantahira->monthPopulars()->result();


		$perpage = 4;
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['jum_data'] = $this->Model_anantahira->getBerita(0,null)->num_rows();
    
    paginationPageFrontEnd($perpage,'news/index/page/',$data['jum_data']);

		$data['data_news'] = $this->Model_anantahira->getBerita($page, $perpage)->result();
		$data['pagination'] = $this->pagination->create_links(); 
		
		$data['cat'] = $this->Model_anantahira->getDataCat(0,null)->result();

		$this->load->view('frontend/news-page',$data);
  }
  
  public function nasional()
  {
		$jenis = 'nasional';
    $this->jenisberita($jenis);
  }

  public function internasional()
  {
		$jenis = 'internasional';
    $this->jenisberita($jenis);
  }
  
  public function jenisberita($jenis)
  {
    $data['data_cat'] = $this->Model_anantahira->getDataCat(0,7)->result();
		$data['more_cat'] = $this->Model_anantahira->getDataCat(0,null)->result();
		$data['jum_data_cat'] = $this->Model_anantahira->getDataCat(0,null)->num_rows();

		$data['nasional'] = $this->Model_anantahira->getWhere('berita',array('jenis_berita' => 'nasional'))->result();
		$data['breaking_news'] = $this->db->limit(5,0)->order_by('id_berita','DESC')->get('berita')->result();
	
		$data['categories'] = $this->Model_anantahira->getData('kategori_berita','id_kategori')->result();
		$data['monthpopulars'] = $this->Model_anantahira->monthPopulars()->result();


		$perpage = 4;
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['jum_data'] = $this->Model_anantahira->getJenisNews($jenis, 0,null)->num_rows();
    
    paginationPageFrontEnd($perpage,'news/'.$jenis.'/page/',$data['jum_data']);

		$data['data_news'] = $this->Model_anantahira->getJenisNews($jenis, $page, $perpage)->result();
		$data['pagination'] = $this->pagination->create_links(); 
		
		$data['cat'] = $this->Model_anantahira->getDataCat(0,null)->result();

		$this->load->view('frontend/news-page',$data);
  }
	
	public function categories()
	{
		$data['data_cat'] = $this->Model_anantahira->getDataCat(0,7)->result();
		$data['more_cat'] = $this->Model_anantahira->getDataCat(0,null)->result();
		$data['jum_data_cat'] = $this->Model_anantahira->getDataCat(0,null)->num_rows();

		$data['nasional'] = $this->Model_anantahira->getWhere('berita',array('jenis_berita' => 'nasional'))->result();
		$data['breaking_news'] = $this->db->limit(5,0)->order_by('id_berita','DESC')->get('berita')->result();
	
		$data['categories'] = $this->Model_anantahira->getData('kategori_berita','id_kategori')->result();
		$data['monthpopulars'] = $this->Model_anantahira->monthPopulars()->result();

		$nama_kategori = $this->uri->segment(3);
		$id_kategori  = $this->Model_anantahira->getWhere('kategori_berita', array('urikategori' => $nama_kategori));
		if ($id_kategori->num_rows() == 0) {
			redirect(base_url('notfound'));
		}
		$perpage = 4;
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['jum_data'] = $this->Model_anantahira->NewsFromCat($id_kategori->row()->id_kategori, 0,null)->num_rows();
    
    paginationPageFrontEnd($perpage,'news/categories/'.$this->uri->segment(3).'/',$data['jum_data']);

		$data['data_news'] = $this->Model_anantahira->NewsFromCat($id_kategori->row()->id_kategori, $page, $perpage)->result();
		$data['pagination'] = $this->pagination->create_links(); 
		
		$data['cat'] = $this->Model_anantahira->getDataCat(0,null)->result();

		$this->load->view('frontend/news-page',$data);
	}
	
	public function detail()
	{
		$data['data_cat'] = $this->Model_anantahira->getDataCat(0,7)->result();
		$data['more_cat'] = $this->Model_anantahira->getDataCat(0,null)->result();
		$data['jum_data_cat'] = $this->Model_anantahira->getDataCat(0,null)->num_rows();

		$data['nasional'] = $this->Model_anantahira->getWhere('berita',array('jenis_berita' => 'nasional'))->result();
		$data['breaking_news'] = $this->db->limit(5,0)->order_by('id_berita','DESC')->get('berita')->result();

		$id_berita = $this->uri->segment(3);
		$uriberita = $this->uri->segment(4);
		
		$data['berita'] = $this->Model_anantahira->detailBerita($id_berita,$uriberita)->row();
		$this->db->update('berita',array('view' => $data['berita']->view + 1), array('id_berita' => $id_berita));

		$jum = $this->Model_anantahira->detailBerita($id_berita,$uriberita)->num_rows();
		if ($jum == 0) {
			redirect(base_url('notfound'));
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
		$data['categories'] = $this->Model_anantahira->getData('kategori_berita','id_kategori')->result();
		
		$data['cat'] = $this->Model_anantahira->getDataCat(0,null)->result();
		
		$this->load->view('frontend/morecategories',$data);
	}

	public function ceknullsearch()
	{
		$search = trim($this->input->post('search'));
		if (empty($search)) {
			echo json_encode(array('res' => 'null'));
		}else{
			echo json_encode(array('res' => $search));
		}
	}

	public function onsearch()
	{
		$keyword = $this->input->get('keyword');
		redirect('news/search/'.$keyword);
	}

	public function search()
	{
		$headnews = $this->uri->segment(3);
		$headnews = urldecode($headnews);
		$data['data_cat'] = $this->Model_anantahira->getDataCat(0,7)->result();
		$data['more_cat'] = $this->Model_anantahira->getDataCat(0,null)->result();
		$data['jum_data_cat'] = $this->Model_anantahira->getDataCat(0,null)->num_rows();
		$data['categories'] = $this->Model_anantahira->getData('kategori_berita','id_kategori')->result();
		
		
		$perpage = 4;
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$totalrows = $this->Model_anantahira->SeachAllNews($headnews,0,null)->num_rows();
		paginationPageFrontEnd($perpage,'news/search/'.$headnews.'/',$totalrows);

		$data['headnews'] = $headnews;
		$data['result_search'] = $this->Model_anantahira->SeachAllNews($headnews,$page,$perpage)->result();
		$data['jum'] = $this->Model_anantahira->SeachAllNews($headnews,$page,$perpage)->num_rows();
		$data['pagination'] = $this->pagination->create_links(); 

		$data['cat'] = $this->Model_anantahira->getDataCat(0,null)->result();
		$this->load->view('frontend/result_search',$data);
	}
}
