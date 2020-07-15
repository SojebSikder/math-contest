<?php include "inc/header.php"; ?>
<link rel="stylesheet" href="css/login.css">

<?php
  $db = new Database();
  $format = new Format();

if (isset($_SESSION['ins_login'])) {
  Format::jumpTo("instructor.php",'Your already have an account');
}

$userId=uniqid(true);

if(isset($_POST['submit']))
{


 $name=$format->Stext($_POST['username']);

  $name     = $format->Stext($_POST['username']);
  $email    = $format->Stext($_POST['email']);
  $userip   = $_SERVER['REMOTE_ADDR'];
  $passmd5  = $format->Spsk($_POST['pass1']);
  $usertype ='instructor';
  $status   ='deactive';

//Cheaking user name and email
 //GEt submitted answere
    $queryGetName = "SELECT * FROM instructor";
    $GetName = $db->select($queryGetName);

    

  if($GetName)
    {
    $isHaveUsername = false;
    $isHaveEmail = false;

    while($GetNameName = $GetName->fetch_assoc())
      {
            $username  = $GetNameName['ins_name'];
            $useremail = $GetNameName['ins_login'];
            // end code for getting submitted answreev

          if($name == $username)
          {
            echo "<center><span class='text-danger float-center'>Try with another username.</span></center>";
            $isHaveUsername = true;
          }
          elseif($email == $useremail)
          {
            echo "<center><span class='text-danger float-center'>Try with another Email Address.</span></center>";
            $isHaveEmail = true;
          }
         /* else{

            $query = "INSERT INTO instructor(ins_user_id,ins_login,ins_name,ins_pass,ins_email,ins_status,ins_display_name,ipadd,ins_type)
            VALUES('$userId','$email','$name','$passmd5','$email','$status','$name','$userip','$usertype')";

            $read =$db->insert($query);
            if($read)
            {
              Format::jumpTo("instructor.php",'Account Created Successfully. Please Login');
            }

          } */
      }
      if(($isHaveUsername = true) &&  ($isHaveEmail = true)){
          $query = "INSERT INTO instructor(ins_user_id,ins_login,ins_name,ins_pass,ins_email,ins_status,ins_display_name,ipadd,ins_type)
          VALUES('$userId','$email','$name','$passmd5','$email','$status','$name','$userip','$usertype')";

          $read =$db->insert($query);
          if($read)
          {
            Format::jumpTo("instructor.php",'Account Created Successfully. Please Login');
          }
      }

    }

}

?>


<div class="m-justify">
<div class="m-card">
<div class="m-card-body">


<form class="form-signin" action="" method="POST">

      <h1 class="h3 mb-3 font-weight-normal">Register as a Instructor</h1>
      <p>You can't login with instructor account until Admin aprove your account. <br>
      Contact Admin for aprove you ID</p>
      
      <span id="availability"></span>

    <div class="m-input-group">
      <input type="text" name="username" id="inputUsername" class="m-form-control text-dark" required autofocus>
      <label for="inputUsername">Username</label>
    </div>
     
      

  <div class="m-input-group">
    <input type="email" name="email" id="inputEmail" class="m-form-control text-dark" required>
    <label for="inputEmail">Email address</label>
  </div>

     

  <div class="m-input-group">
    <input type="password" name="pass1" id="password" class="m-form-control text-dark" required>
    <label for="inputPassword">Password</label>
  </div>

  <input class="float-left" id="psk" type="checkbox" onclick="showPass()">
    <label class="float-left" for="psk">Show Password</label>

 
      <p class="float-right">Already have an account? <a href="signup.php">Login</a></p>
      <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Register</button>
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
          url:"ins-check.php",
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
