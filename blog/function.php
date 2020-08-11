<?php 
require_once("src/config/conn.php");
require_once("src/lib/Database.php");
$db = new Database();

// If the user clicked submit on comment form...
if (isset($_POST['comment_posted'])) {

	if(isset($_SESSION['name'])){

		$uniqid = uniqid(true);
		
		global $db;
		// grab the comment that was submitted through Ajax call
		$comment_text = $_POST['comment_text'];

		// insert comment into database
		$sql = "INSERT INTO blog_comments (post_id, user_id, body, created_at, updated_at, comment_id) 
			VALUES ('$post_id', '$user_id', '$comment_text', now(), null, '$uniqid')";
		$result = $db->insert($sql);
		// Query same comment from database to send back to be displayed
		$inserted_id = $db->insert_id;
		$getid = $db->select("SELECT * FROM blog_comments WHERE id='$inserted_id' ")->fetch_assoc();

		$comment_id = $getid['comment_id'];

		$res = $db->select("SELECT * FROM blog_comments WHERE comment_id='$comment_id' ");
		$inserted_comment = $res->fetch_assoc();
		// if insert was successful, get that same comment from the database and return it
		if ($result) {
			$comment = "<div class='comment clearfix'>
						<img src='profile.png' alt='' class='profile_pic'>
						<div class='comment-details'>
							<span class='comment-name'>" . getUsernameById($inserted_comment['user_id']) . "</span>
							<span class='comment-date'>" . date('F j, Y ', strtotime($inserted_comment['created_at'])) . "</span>
							<p>" . $inserted_comment['body'] . "</p>
							<a class='reply-btn' href='#' data-id='{$inserted_comment['comment_id']}'>reply</a>
						</div>
						<!-- reply form -->
						<form action='blog-single.php' class='reply_form clearfix' id='comment_reply_form_" . $inserted_comment['comment_id'] . "' data-id='" . $inserted_comment['comment_id'] . "'>
							<textarea class='form-control' name='reply_text' id='reply_text' cols='30' rows='2'></textarea>
							<button class='btn btn-primary btn-xs pull-right submit-reply'>Submit reply</button>
						</form>
					</div>";
			$comment_info = array(
				'comment' => $comment,
				'comments_count' => getCommentsCountByPostId(1)
			);
			echo json_encode($comment_info);
			exit();
		} else {
			echo "error";
			exit();
		}
	}
	
}
// If the user clicked submit on reply form...
if (isset($_POST['reply_posted'])) {

	if(isset($_SESSION['name'])){

		global $db;
		// grab the reply that was submitted through Ajax call
		$reply_text = $_POST['reply_text']; 
		$comment_id = $_POST['comment_id']; 
		// insert reply into database
		$sql = "INSERT INTO blog_reply (user_id, comment_id, body, created_at, updated_at) 
			VALUES ('$user_id', '$comment_id', '$reply_text', now(), null)";
		$result = $db->insert($sql);
		//$inserted_id = $db->insert_id;

		$res = $db->select("SELECT * FROM blog_reply WHERE comment_id = '$comment_id' ");
		$inserted_reply = $res->fetch_assoc();
		// if insert was successful, get that same reply from the database and return it
		if ($result) {
			$reply = "<div class='comment reply clearfix'>
						<img src='profile.png' alt='' class='profile_pic'>
						<div class='comment-details'>
							<span class='comment-name'>" . getUsernameById($inserted_reply['user_id']) . "</span>
							<span class='comment-date'>" . date('F j, Y ', strtotime($inserted_reply['created_at'])) . "</span>
							<p>" . $inserted_reply['body'] . "</p>					
						</div>
					</div>";
			echo $reply;
			exit();
		} else {
			echo "error";
			exit();
		}

	}else{
		exit("Please login!");
	}
}


// deleting reply
if (isset($_POST['reply_delete'])) {

	if(isset($_SESSION['name'])){

		global $db;
		$comment_id = $_POST['comment_id']; 

		$sql = "DELETE FROM blog_reply WHERE comment_id = '$comment_id'";
		$result = $db->delete($sql);

		if ($result) {
			$reply = "Deleted...";
			echo $reply;
			exit();
		} else {
			echo "error";
			exit();
		}

	}else{
		exit("Please login!");
	}
}


// deleting comment
if (isset($_POST['reply_c_delete'])) {

	if(isset($_SESSION['name'])){

		global $db;
		$comment_id = $_POST['comment_id']; 

		$sql = "DELETE FROM blog_comments WHERE comment_id = '$comment_id'";
		$result = $db->delete($sql);

		if ($result) {
			$reply = "Comment Deleted...";
			echo $reply;
			exit();
		} else {
			echo "error";
			exit();
		}

	}else{
		exit("Please login!");
	}
}