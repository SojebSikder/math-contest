<?php
include "config/conn.php";
include "lib/Database.php";
include "helpers/Format.php";

$db = new Database();
$format = new Format();
//for username
if(isset($_POST["user_name"])){

    $user = $format->Stext($_POST["user_name"]);

    $querycheck = "SELECT * FROM register WHERE user_name='$user'";
    $Check = $db->select($querycheck);
    //mysqli_num_rows($Check) > 0
   if($Check){
       echo "<span class='text-danger'>X Username not available</span>";
   }
   else{
    echo "<span class='text-success'>Username available</span>";
   }

}

//For Email
if(isset($_POST["user_email"])){

    $userEmail = $format->Stext($_POST["user_email"]);

    $queryEmailcheck = "SELECT * FROM register WHERE user_login='$userEmail'";
    $Check = $db->select($queryEmailcheck);
    //mysqli_num_rows($Check) > 0
   if($Check)
   {
       echo "<span class='text-danger'>It look like you already have an account.<br>Please Login</span>";
   }
   else{
    echo "<span class='text-success'></span>";
   }

}


?>