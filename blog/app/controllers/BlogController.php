<?php 
include "./config/web.php";
session_start();
class BlogController extends Controller{

	public $format;

	public function __construct(){
		$this->format = new Format();
	 	parent::__construct();
	}

	public function createpost(){
		if(isset($_POST['post'])){
			
			$title = $this->format->Stext($_POST['postTitle']);
			$desc  = $this->format->Stext($_POST['postDesc']);
			$email = $_SESSION['ins_login'];

			$BlogModel = $this->load->model("BlogModel");
			$data = $BlogModel->postBlog($title, $desc, $email);

			if($data){
				Format::jumpTo("../index", "Posted...");
			}else{
				echo "Something went wrong :(";
			}

		}else{
			echo "No request have accept";
		}

	}
}
?>