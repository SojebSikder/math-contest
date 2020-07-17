<?php 
include "inc/header.php";

$db = new Database();
$format = new Format();
?>
<link rel="stylesheet" href="css/login.css">

<?php
if (isset($_SESSION['name'])) {
  Format::jumpTo("profile.php", "Your already have an account");
}

$userId = uniqid(true);

if(isset($_POST['submit']))
{
  $name     = $format->Stext($_POST['username']);
  $email    = $format->Stext($_POST['email']);
  $pass     = $format->Stext($_POST['pass1']);
  $userip   = $_SERVER['REMOTE_ADDR'];
  $passmd5  = $format->Spsk($pass);
  $usertype = 'user';
  $status   = 'active';

 //Cheaking user name and email
 //GEt submitted answere
 $queryGetName = "SELECT * FROM register";
 $GetName = $db->select($queryGetName);

 if($GetName)
 {
  $isHaveUsername = false;
  $isHaveEmail = false;

  while($GetNameName = $GetName->fetch_assoc())
    {
        $username  = $GetNameName['user_name'];
        $useremail = $GetNameName['user_login'];
        // end code for getting submitted answreev

        if($name == $username){
          echo "<center><span class='text-danger float-center'>Try with another username.</span></center>";
          $isHaveUsername = true;
        }
        elseif($email == $useremail){
          echo "<center><span class='text-danger float-center'>Try with another Email Address.</span></center>";
          $isHaveEmail = true;
        }
      /*  else{

          $query = "INSERT INTO register(user_id,user_login,user_name,user_pass,user_email,user_status,display_name,ipadd,type)
          VALUES('$userId','$email','$name','$passmd5','$email','$status','$name','$userip','$usertype')";

          $read =$db->insert($query);
          if($read)
          {
            Format::jumpTo("login.php", "Account Created Successfully. Please Login");
          }
        } */
    }if(($isHaveUsername = false) &&  ($isHaveEmail = false)){
        $query = "INSERT INTO register(user_id,user_login,user_name,user_pass,user_email,user_status,display_name,ipadd,type)
        VALUES('$userId','$email','$name','$passmd5','$email','$status','$name','$userip','$usertype')";

        $read =$db->insert($query);
        if($read){
          Format::jumpTo("login.php", "Account Created Successfully. Please Login");
        }
      }else{
         Format::jumpTo("register.php", "Account not Created Successfully. Please try again","error");
      }
  }
  

}
?>


<div class="m-justify">
<div class="m-card">
<div class="m-card-body">

<form class="form-signin" action="" method="POST">


      <h3 class="m-center">Register</h3>
      <p class="m-center">It's free!</p>
      <span id="availability"></span>

    <div class="m-input-group">
      <input type="text" name="username" id="inputUsername" class="text-dark m-form-control" required autofocus>
      <label>Username</label>
    </div>

    <div class="m-input-group">
      <input type="email" name="email" id="inputEmail" class="text-dark m-form-control" required>
      <label>Email address</label>
    </div>

    <div class="m-input-group">
      <input type="password" name="pass1" id="password" class="text-dark m-form-control" required>
      <label>Password</label>
    </div>

    
    <input class="float-left" id="psk" type="checkbox" onclick="showPass()">
    <label class="float-left" for="psk">Show Password</label>

      <p class="float-right">Already have an account? <a href="signup.php">Login</a></p>
      <button class="m-btn waves-effect m-btn-primary m-btn-block" name="submit" type="submit">Register</button>

    </form>
    
  </div>
</div>
</div>

<?php include "inc/footer.php"; ?>

<script>

function showPass() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }


//check user name
$(document).ready(function() {
  $('#inputUsername').blur(function(){
    var username = $(this).val();

    if(username == ""){

    }else{
      $.ajax({
        url:"check.php",
        method:"POST",
        data:{user_name:username},
        dataType:"text",
        success:function(html){
          $('#availability').html(html);
        }

    });

    }

  });

  //check email
  $('#inputEmail').blur(function(){
    var useremail = $(this).val();
      $.ajax({
        url:"check.php",
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
