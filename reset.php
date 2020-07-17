<?php
include "inc/header.php"; 

$db = new Database();
$format = new Format();

if (!isset($_GET["code"])) {
	echo "Can't find page";
}

    $ucode = $format->Stext($_GET["code"]);

    $getEmailQuery = "SELECT * FROM ucode WHERE code = '$ucode' ";
    $getEmailData = $db->select($getEmailQuery);

    if ($getEmailData){
        $getEmailData = $getEmailData->fetch_assoc();
    }else{
        echo "No data found";
    }


    

    if (isset($_POST["submit"])) {

        $pass =$format->Spsk($_POST["password"]);
        $email = $getEmailData["email"];
    
        $query = "UPDATE register SET user_pass='$pass' WHERE user_email='$email'";
        $update = $db->update($query);
    
        if ($update){
            $query ="DELETE FROM ucode WHERE code ='$ucode'";
            $psch = $db->delete($query);

            if($psch){
                Format::jumpTo("login.php","Password changed successfully");
            }
            else{
                Format::jumpTo("login.php","Password Not changed successfully");
            }
            
        
        }
        else{
            Format::jumpTo("reset.php","something went wrong");
        }
    }

?>

<form class="form-signin" action="" method="POST">
      
      <h1 class="h3 mb-3 font-weight-normal text-white">Enter new password</h1>

      <label for="inputEmail" class="sr-only">New password</label>
      <input type="text" name="password" id="inputEmail" class="form-control" placeholder="New password" required autofocus>

      <br>
      <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Reset Password</button>
    </form>

<?php include "inc/footer.php"; ?>