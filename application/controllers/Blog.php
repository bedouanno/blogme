<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	
	public function index(){

    $data['title'] = 'Home';

	
        $this->load->view('includes/head');
        $this->load->view('includes/siderbar');
        $this->load->view('includes/header');
        $this->load->view('blog/index', $data);
        $this->load->view('includes/footer');

	}


    public function post(){

        $data['title'] = 'Post';
    
        
            $this->load->view('includes/head');
            $this->load->view('includes/siderbar');
            $this->load->view('includes/header');
            $this->load->view('blog/blog-post', $data);
            $this->load->view('includes/footer');
    
        }




}