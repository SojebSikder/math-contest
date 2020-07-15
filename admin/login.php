<?php 
session_start();
include '../config/conn.php';
include '../lib/Database.php';
include '../helpers/Format.php';

$db = new Database();
$format = new Format();
//$al = new Adminlogin();

if(isset($_POST['submit']))
{
	$email = $format->Stext($_POST['username']);
	$pass  = $format->Spsk($_POST['pass1']);

	//$loginChk = $al->Adminlogin($email, $pass);
	$status='active';
	$role='admin';
	$query = "SELECT * FROM instructor WHERE ins_login='$email' AND ins_pass='$pass' AND ins_status='$status' AND ins_role='$role'";
	$read = $db->select($query);

	if($read != false){

		$value = $read->fetch_assoc();

		$_SESSION['admin_login'] = $value['ins_login'];
		$_SESSION['admin_id'] = $value['ins_user_id'];
		$_SESSION['admin_name'] = $value['ins_name'];

		Format::jumpTo("index.php","");

	}else{
		echo "Username or Password not match !";
	}

	
}



?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
</head>
<body>
<div class="container">
	<section id="content">

		<form action="" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username">
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="pass1">
			</div>
			<div>
				<input type="submit" name="submit" value="Log in">
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Math Contest</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>