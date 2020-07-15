<?php 
include "inc/header.php"; 

$db = new Database();
$format = new Format();
?>
<link rel="stylesheet" href="css/login.css">

<?php
if (isset($_SESSION['name'])) {
    Format::jumpTo("index.php",'');
}

if(isset($_POST['submit']))
{
    $email=$format->Stext($_POST['email']);
    $pass=$format->Spsk($_POST['pass1']);
    $admin="";
    $mem="";
    $status='active';

    $query = "SELECT * FROM instructor WHERE ins_login='$email' AND ins_pass='$pass' AND ins_status='$status'";
    $read =$db->select($query);

    if($read)
    {
        if($row=$read->fetch_assoc()){
            
            $_SESSION['ins_name']  = $row['ins_name'];
            $_SESSION['ins_login'] = $row['ins_login'];
            $_SESSION['ins_id']    = $row['ins_user_id'];

            Format::jumpTo("instructor-panel.php",'Login Successfully.');
        }
        else{
            Format::jumpTo("instructor.php",'Something went wrong.', 'error');  
        }

    }
     else{
            Format::jumpTo("instructor.php",'Something went wrong.', 'error');
        }
    
}

?>

<div class="m-justify">
<div class="m-card">
<div class="m-card-body">

<form class="form-signin" action="" method="POST">
      
      <h1 class="h3 mb-3 font-weight-normal">Sign In as Instructor</h1>

        <div class="m-input-group">
            <input type="email" name="email" id="inputEmail" class="m-form-control text-dark" required autofocus>
            <label for="inputEmail">Email address</label>
        </div>
      
     
        <div class="m-input-group">
            <input type="password" name="pass1" id="inputPassword" class="m-form-control text-dark" required>
            <label for="inputPassword">Password</label>
        </div>
      
      

      <a class="float-left" href="recover.php">Forget Account?</a>
      <p class="float-right">Don't have an account? <a href="instructor-register.php">Register as a Instructor</a></p>
      <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
    </form>

    </div>
</div>
</div>


<?php include "inc/footer.php"; ?>
