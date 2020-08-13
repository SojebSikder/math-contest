<?php
  include "inc/header.php";
  $db = new Database();
  $format = new Format();
?>

<?php
if (isset($_SESSION['name'])) {
  header("location: index.php");
}

if(isset($_POST['submit']))
{
    //$name=$format->Stext($_POST['username']);
    $email=$format->Stext($_POST['email']);
    $pass=$format->Spsk($_POST['pass1']);
    $admin="";
    $mem="";
    $status='active';
  

    $query = "SELECT * FROM register WHERE user_login='$email' AND user_pass='$pass' AND user_status='$status'";
    $read =$db->select($query);
  if($read)
  {
    if($row=$read->fetch_assoc()){
        
      $_SESSION['name']=$row['user_name'];
      $_SESSION['login']=$row['user_login'];
      $_SESSION['id']=$row['user_id'];

      if(isset($_REQUEST['reurl'])){
        $url = $_REQUEST['reurl'];
        Format::jumpTo("https://" .$url, "Login Successfully.");
      }else{
        Format::jumpTo("index.php", "Login Successfully.");
      }
      
    }
    else{
      Format::jumpTo("login.php", "Something went wrong.");
      //Format::jumpTo("login.php", "This is Message", "msg" , 1000);
      //header("Location: login.php?error=".urlencode(''));
    }
  }
  else{
    Format::jumpTo("login.php", "Something went wrong.", "error");
    //header("Location: login.php?error=".urlencode(''));
  }

}

?>


<div class="m-container">
 <div class="m-justify"> 
<div class="m-card">
  <div class="m-card-body">

  
<form class="form-signin" action="" method="POST">
 
    <h5 class="m-center">Login</h5>

    <div class="m-input-group">
      <input type="email" name="email" id="inputEmail" class="text-dark m-form-control" required autofocus>
      <label>Email address</label>
    </div>
      
    <div class="m-input-group">
      <input type="password" name="pass1" id="inputPassword" class="text-dark m-form-control" required>
      <label>Password</label>
    </div>

      <a class="float-left" href="recover.php">Forget Account?</a>
      <p class="float-right">Don't have an account? <a href="register.php">Register</a></p>
      <button class="m-btn waves-effect m-btn-primary m-btn-block" name="submit" type="submit">Sign in</button>

    </form>
    
  </div>
</div>
</div>
</div>

<?php include "inc/footer.php"; ?>
