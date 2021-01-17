<?php
require "../src/config/conn.php";
require "../src/lib/Database.php";
require "../src/helpers/Format.php";

$db = new Database();
$sql="SELECT * FROM blog_post";
$blog_data = $db->select($sql);

if($blog_data){

	while ( $row = $blog_data->fetch_assoc()) {
		$data["data"] = array(
	        "blog_title" => $row['blog_title'],
	        "blog_description" => $row["blog_description"],
	        "image" => $row['image'],
	        "blog_date" => $row['blog_date'],
	    );
	}

	echo json_encode($data);
}
