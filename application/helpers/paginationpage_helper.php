<?php 
if (!function_exists('paginationPage')) {
  function paginationPage($perpage,$siteurl,$tabel)
  {
      $CI =& get_instance();
      //konfigurasi pagination
      $config['base_url'] = site_url($siteurl); //site url
      $config['total_rows'] = $CI->db->count_all($tabel); //total row
      $config['per_page'] = $perpage;  //show record per halaman
      $config["uri_segment"] = 4;  // uri parameter
      $choice = $config["total_rows"] / $config["per_page"];
      $config["num_links"] = floor($choice);
  
      // Membuat Style pagination untuk BootStrap v4
      $config['first_link']       = 'First';
      $config['last_link']        = 'Last';
      $config['next_link']        = '<i class="fas fa-angle-right"></i><span class="sr-only">Next</span>';
      $config['prev_link']        = '<i class="fas fa-angle-left"></i><span class="sr-only">Previous</span>';
      $config['full_tag_open']    = ' <nav aria-label="..."><ul class="pagination justify-content-end mb-0">';
      $config['full_tag_close']   = '</ul></nav>';
      $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
      $config['num_tag_close']    = '</span></li>';
      $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
      $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
      $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
      $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['prev_tagl_close']  = '</span>Next</li>';
      $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
      $config['first_tagl_close'] = '</span></li>';
      $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['last_tagl_close']  = '</span></li>';
  
      return $CI->pagination->initialize($config);
  }
}