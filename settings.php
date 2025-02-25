<?php
include "inc/header.php";
include "classes/User.php";

$db = new Database();
$format = new Format();
?>

<?php
if (!isset($_SESSION['login'])) {
    header("location: login.php?msg=Login First");
  }

if(isset($_POST['submit'])){
    if((isset($_POST['oldpsk'])) || (isset($_POST['newpsk']))){

        $userEmail = $_SESSION['login'];
        
        $getPsk = $db->select("SELECT * FROM register WHERE user_email='$userEmail'");
        $pskRow = $getPsk->fetch_assoc();

        $oldpsk = $format->Spsk($_POST['oldpsk']);
        $psk = $format->Spsk($_POST['newpsk']);

        if($oldpsk == $pskRow['user_pass']){

            $pskExe = $db->update("UPDATE register SET user_pass='$psk' WHERE user_email='$userEmail'");

            if($pskExe){
                echo "<a class='alert alert-success'>Password Change successfully</a>";
            }
        }else{

            echo "<a class='alert alert-danger'>Your old password error :(</a>";
        }
    }else{
        echo "<a class='alert alert-danger'>Enter all field</a>";
    }
    
}

if(isset($_POST['delete'])){
    $dl = deleteAccountByEmail($_SESSION['login']);

    if($dl){
        Format::jumpTo("logout.php", "Acoount deleted...");
    }else{
        Format::jumpTo("settings.php", "Something went wrong");
    }
}

?>


 <form method="post" action="">
<div class="container">
    <div class="row">  
                 
       

        <div class="m-justify col-xs-6 col-sm-3">
            <div class="m-card">
                <div class="m-card-body">
                
                    <h3>Change Password</h3>  

                    <div class="m-input-group">
                        <input name="oldpsk" type="text" autocomplete="off" class="m-form-control text-dark"/>
                        <label>Old Password</label>
                    </div>

                    <div class="m-input-group">
                        <input name="newpsk" type="text" autocomplete="off" class="m-form-control text-dark" />
                        <label>New Password</label>
                    </div>
                                    
                        <input class="m-btn waves-effect" type="submit" name="submit" Value="Update" />


                </div>
            </div>
        </div>



        <div class="m-justify col-xs-6 col-sm-3">
            <div class="m-card">
                <div class="m-card-body">

            <h4>Account</h4>
            <hr>

            <input class="m-btn waves-effect" type="submit" name="delete" value="Delete Account">
        

            </div>
           </div>
        </div>

        

    </div>
</div>

</form>


<?php include "inc/footer.php"; ?>