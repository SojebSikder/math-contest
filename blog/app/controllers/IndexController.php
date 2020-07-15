<?php 

class IndexController extends Controller{
	
	public function __construct(){
	 	parent::__construct();
	}

	public function home(){
		$data = array();
		$table = "blog_post";
		$BlogModel = $this->load->model("BlogModel");

		$data['fetch_blog'] = $BlogModel->fetchBlog($table);

	 	$this->load->view("index", $data);
	}

	
	public function comment($id = ""){
		$this->load->view("comment");
	}

}
?>