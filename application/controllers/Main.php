<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	// public function index()
	// {

	// 	$this->load->view('includes/head');
	// 	$this->load->view('includes/header');
	// 	$this->load->view('includes/main');
	// 	$this->load->view('includes/footer');
	// }

	
	public function view($page = 'home')
	{

		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		$this->load->view('pages/'.$page);
	
	}

		public function blogview(){
			$this->load->view('blog/index');
		}

		public function error_page(){
			$this->load->view('404');
		}



}
