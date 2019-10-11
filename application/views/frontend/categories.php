<!-- Single Featured Post -->
<?php foreach ($categories as $res) {
    $id_kategori = $res->id_kategori;
     $berita = $this->db->select('berita.*,kategori_berita.nama_kategori,admin.nama_lengkap')
                    ->from('berita')
                    ->join('kategori_berita','berita.id_kategori = kategori_berita.id_kategori')
                    ->join('admin','berita.id_admin = admin.id_admin')
                    ->where(array('berita.id_kategori' => $id_kategori))
                    ->order_by('view','DESCS')
                    ->get();
    $jum_berita = $berita->num_rows();
    $berita = $berita->row();
  ?>
<?php if ($jum_berita != 0) { ?>
<div class="single-blog-post small-featured-post d-flex">
  <?php $judul = strtolower($berita->headnews);
        $judul = preg_replace('/[^A-Za-z0-9]/', '-', $judul);;
        ?>
  <div class="post-thumb">
    <a href="<?php echo base_url('home/detail_berita/'.$berita->id_berita.'/'.$judul) ?>"><img
        src="<?php echo base_url('assets/img/berita/'.$berita->gambar_berita) ?>" alt=""></a>
  </div>
  <div class="post-data">
    <a href="<?php echo base_url('home/categories/'.str_replace(' ', '-', strtolower($berita->nama_kategori))) ?>"
      class="post-catagory"><?php echo $res->nama_kategori; ?></a>
    <div class="post-meta">
      <a href="<?php echo base_url('home/detail_berita/'.$berita->id_berita.'/'.$judul) ?>" class="post-title">
        <h6><?php echo $berita->headnews; ?></h6>
      </a>
      <p class="post-date"><span><span><?php echo changeDate($berita->create_date) ?></span></p>
    </div>
  </div>
</div>
<?php } ?>
<?php } ?>

</div>