<?php 
class Page404 extends CI_Controller 
{
 public function __construct() 
 {
    parent::__construct(); 
 } 

 public function index() 
 { 
    $this->output->set_status_header('404'); 
    $this->load->view('notfoundpage');//loading in custom error view
 } 
} 