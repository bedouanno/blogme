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
            $data['posts'] = $this->blog_model->get_posts();
        
            $this->form_validation->set_rules('post_title','Post Title','required');
            $this->form_validation->set_rules('post_content','Post Content');

            if($this->form_validation->run() === FALSE){ 
                $this->load->view('includes/head');
                $this->load->view('includes/siderbar');
                $this->load->view('includes/header');
                $this->load->view('blog/blog-post', $data);
                $this->load->view('includes/footer');
               
            } else { 

                $post_data = array(
                    'post_title' => $this->input->post('post_title'),
                    'post_content' => $this->input->post('post_content')
                );
                $this->blog_model->create_post($post_data);

                redirect('blog/post');
            }
    
        }

        public function delete_post($id){
            $this->blog_model->delete_post($id);
            redirect('blog/post');

        }




}