<?php 

class Blog_model extends CI_Model{
	// initialize constructor: allows you to initialize an object's properties upon creation of the object.
	
		public function __construct(){
			$this->load->database();
		}

		public function create_post($data = FALSE){
			return $this->db->insert('blog_post', $data);
		}


		// function to GET data
		public function get_posts(){
			$query = $this->db->get('blog_post');
			return $query->result_array();
		}

		public function delete_post($id){
			$this->db->where('blog_post.id', $id);
			$this->db->delete('blog_post');
			$result = $this->db->affected_rows(); 
			return $result;
		}
		


}
