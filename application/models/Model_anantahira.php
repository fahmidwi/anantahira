<?php 
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

Class Model_anantahira extends CI_model{
  
  
  public function getData($table, $id)
  {
    $this->db->order_by($id,'DESC');
    return $this->db->get($table);
  }
  
  public function getWhere($table,$where)
  {
      return $this->db->get_where($table,$where);
  }

  public function insert($table,$data)
  {
    return $this->db->insert($table,$data);
  }

  public function update($table,$data,$where)
  {
    return $this->db->update($table,$data,$where);
  }

  public function getDataPage($table, $limit, $start,$id)
  { 
    $this->db->order_by($id,'DESC');
    return $this->db->get($table, $limit, $start);
  }

  public function getDataCat($mulai, $berenti)
  {
    $this->db->limit($berenti,$mulai);
    $this->db->order_by('id_kategori','ASC');
    return $this->db->get('kategori_berita');
  }

  public function getBerita($mulai, $berenti)
  {

    return $this->db->select('berita.*,kategori_berita.nama_kategori,admin.nama_lengkap')
                    ->from('berita')
                    ->join('kategori_berita','berita.id_kategori = kategori_berita.id_kategori')
                    ->join('admin','berita.id_admin = admin.id_admin')
                    ->limit($berenti,$mulai)
                    ->order_by('berita.id_berita','DESC')
                    ->get();
  }

  public function detailBerita($id)
  {

    return $this->db->select('berita.*,kategori_berita.nama_kategori,admin.nama_lengkap')
                    ->from('berita')
                    ->join('kategori_berita','berita.id_kategori = kategori_berita.id_kategori')
                    ->join('admin','berita.id_admin = admin.id_admin')
                    ->where(array('berita.id_berita' => $id))
                    ->get();
  }

  public function popularNews()
  {

    return $this->db->select('berita.*,kategori_berita.nama_kategori,admin.nama_lengkap')
                    ->from('berita')
                    ->join('kategori_berita','berita.id_kategori = kategori_berita.id_kategori')
                    ->join('admin','berita.id_admin = admin.id_admin')
                    ->limit(6,0)
                    ->order_by('view','DESC')
                    ->get();
  }

  public function NewsFromCat($nama_kategori,$mulai,$perhal)
  {

    return $this->db->select('berita.*,kategori_berita.nama_kategori,admin.nama_lengkap')
                    ->from('berita')
                    ->join('kategori_berita','berita.id_kategori = kategori_berita.id_kategori')
                    ->join('admin','berita.id_admin = admin.id_admin')
                    ->like('kategori_berita.nama_kategori', $nama_kategori)
                    ->limit($perhal,$mulai)
                    ->order_by('berita.id_berita','DESC')
                    ->get();
  }

  public function SeachAllNews($headnews,$mulai,$perhal)
  {

    return $this->db->select('berita.*,kategori_berita.nama_kategori,admin.nama_lengkap')
                    ->from('berita')
                    ->join('kategori_berita','berita.id_kategori = kategori_berita.id_kategori')
                    ->join('admin','berita.id_admin = admin.id_admin')
                    ->like('berita.headnews', $headnews)
                    ->limit($perhal,$mulai)
                    ->order_by('berita.id_berita','DESC')
                    ->get();
  }

  public function register($data)
  {
    $this->db->insert('admin',$data);
    $id = $this->db->insert_id();
    return $id;
  }

  public function getAnggotaData($id)
  {
    return $this->db->select('*, kotakab.name AS kotakab, provinsi.name AS provinsi')
                ->from('anggota')
                ->join('admin', 'anggota.id_admin = admin.id_admin')
                ->join('provinsi', 'anggota.id_provinsi = provinsi.id_provinsi')
                ->join('kotakab', 'anggota.id_kabkota = kotakab.id_kotakab')
                ->join('fungsi', 'anggota.id_fungsi = fungsi.id_fungsi')
                ->where(array('anggota.id_admin' => $id))
                ->get();
  }
}