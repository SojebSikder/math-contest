<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Admin Register</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">



<?php
session_start();

if (isset($_SESSION['name'])) {
    header("location: index.php");
  }

if(isset($_POST['submit']))
{

	include 'conn.php';
	include "Database.php";

    $email=strip_tags($_POST['username']);
    $pass=strip_tags(md5($_POST['pass1']));
    $admin="";
    $mem="";
  
 // $semail = htmlentities($email, ENT_QUOTES | ENT_HTML5, 'UTF-8');
  //$spass= htmlentities($pass, ENT_QUOTES | ENT_HTML5, 'UTF-8');

$db = new Database();

$query = "SELECT * FROM admin_register WHERE admin_login='$email' AND admin_pass='$pass'";
$read =$db->select($query);

if($row=$read->fetch_assoc()){
    
    $_SESSION['name']=$row['user_name'];
    $_SESSION['login']=$row['user_login'];
    header("Location: index.php?msg=".urlencode('Login Successfully.'));

}
else{
    header("Location: login.php?error=".urlencode('Something went wrong.'));
}

//header("Location: index.php?msg=".urlencode('Account Registered Successfully.'));
}

?>




		<form action="" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="pass1"/>
			</div>
			<div>
				<input type="submit" name="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Math Contest</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>


<script>
//check user name
$(document).ready(function() {
  $('#inputUsername').blur(function(){
    var username = $(this).val();
    $.ajax({
      url:"ins-check.php",
      method:"POST",
      data:{user_name:username},
      dataType:"text",
      success:function(html){
        $('#availability').html(html);
      }


    });

  });

  //check email
  $('#inputEmail').blur(function(){
    var useremail = $(this).val();
    $.ajax({
      url:"ins-check.php",
      method:"POST",
      data:{user_email:useremail},
      dataType:"text",
      success:function(html){
        $('#availability').html(html);
      }


    });

  });

});

</script>
