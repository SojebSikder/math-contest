<?php
include "header.php";
include "sidebar.php";

    $db     = new Database();
    $format = new Format();

//Get web data 
    $username = isset($_SESSION['admin_name']);
    $login = $_SESSION['admin_login'];

    $queryweb   = "SELECT * FROM web";
    $GetDataweb = $db->select($queryweb)->fetch_assoc();
// </>

if(isset($_POST['submit'])){

    $title  = $format->Stext($_POST['title']);
    $slogan = $format->Stext($_POST['slogan']);
      
    $queryup = "UPDATE web SET about_us = '$title', contact_us = '$slogan' where id = 1";  
    $readup  = $db->update($queryup);
} 
    
?>
<div class="grid_10">

    <div class="box round first grid">
    <h2>Update Site About Us and Contact</h2>
    <div class="block sloginblock">               
        <form method="post" action="">
        <h3>Only allowed tag = <a><</a>br<a>></a></h3>

        <label>About Us</label>
        <div class="m-input-group">
            <textarea class="text-dark m-form-control" name="title"><?php echo $GetDataweb['about_us']; ?></textarea>
        </div>
            

        <label>Contact Us</label>
        <div class="m-input-group">
            <textarea class="text-dark m-form-control" name="slogan"><?php echo $GetDataweb['contact_us']; ?></textarea>
        </div>

        <input class="m-btn waves-effect" type="submit" name="submit" value="Update">


        </form>
    </div>
    </div>
</div>
<?php include "footer.php";?>