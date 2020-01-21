<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class MY_Controller extends CI_Controller {
        var $general;
    	function __construct()
        {
        	parent::__construct();
            $this->load->database();
            $this->general=$this->Fungsi->getsetting();
        }
        function render_page($content, $data = NULL){
            $data=array(
                'header'=>$this->load->view('include/head', $data, TRUE),
                'isi'=>$this->load->view($content, $data, TRUE),
                'footer'=>$this->load->view('include/foot', $data, TRUE)
            );
            $this->load->view('include/main', $data);
        }
    }