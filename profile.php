<?php include "inc/header.php";
$db = new Database();
$format = new Format();

$user = $format->Stext(isset($_REQUEST['user']));

if (!(isset($_REQUEST['user']) || isset($_SESSION['login']))){
   header("location: login.php?msg=Login First");
}

?>

<?php

//for other users
if($user){
    $OtherUsername = $format->Stext($_REQUEST['user']);

    $queryOther = "SELECT * FROM register WHERE user_name='$OtherUsername'";
     $GetDataPr =$db->select($queryOther);
    if($GetDataPr){
        $GetDataPr = $GetDataPr->fetch_assoc();
    }else{
        header("location: index.php?error=profile not found");
    }
    
}
else{
    //Get data
    $username = $_SESSION['name'];
    $userlogin = $_SESSION['login'];
    $queryPr = "SELECT * FROM register WHERE user_name='$username' AND user_login='$userlogin'";
    $GetDataPr =$db->select($queryPr)->fetch_assoc();
// </>
}

//end that


if(isset($_POST['submit'])){

    if(isset($userlogin)){

        $userip=$_SERVER['REMOTE_ADDR'];
        //$passmd5 =md5($pass);
        $usertype='user';
        $status='active';
        $egt = $GetDataPr['user_email'];

        $city    =$format->Stext($_POST['city']);
        $state   =$format->Stext($_POST['state']);
        $country =$format->Stext($_POST['country']);
        $bio     =$format->Stext($_POST['bio']);
        $date    =$format->Stext($_POST['dob']);

        $query = "UPDATE register SET 
        user_city='$city',user_state='$state',
        user_country='$country',
        user_bio='$bio',
        user_date='$date',
        ipadd='$userip' 
        where user_email='$egt'";

        $read =$db->update($query);
        if($read)
        {
            Format::jumpTo("profile.php","Profile Info Save Successfully.");
        }
    } 
    else{
        header("Location: profile.php?user=$OtherUsername&msg=".urlencode('Login First'));
    }
}

//for updating photo
if(isset($_POST['savephoto'])){

    if(isset($userlogin)){
    //upload photo
        $photoname = $_FILES['photo']['name'];
        $tmp_name  = $_FILES['photo']['tmp_name'];

        $location="img/profile/$photoname";
        $new_name = $location.time()."-".rand(1000, 9999)."-".$photoname;
        move_uploaded_file($tmp_name, $new_name); 

        $dbs = new Database();
        $querys = "UPDATE register SET user_image='$new_name' WHERE user_name='$username' AND user_login='$userlogin'";
        $reads =$dbs->update($querys);
        if($reads)
        {
            header("Location: profile.php?msg=".urlencode('Profile Photo Save Successfully.'));
        }

    }else{
        header("Location: profile.php?user=$OtherUsername&msg=".urlencode('Login First'));
    }

}
//</>}




?>


 <form action="" method="post" enctype="multipart/form-data">

<div class="container-fluid">
<div class="row">

 <div class="col-xs-12 col-md-2">
    <p><img class="left-block img-thumbnail" src="<?php echo $GetDataPr['user_image']?>" alt=""></p>

    <?php 

        if($user){

        }else if($userlogin){
    ?>
    <label class="btn btn-primary" for="upload-photo">Browse...</label>
    <input type="file" class="m-hidden" name="photo" id="upload-photo"/>

    <label class="btn btn-info" for="savebtn">Update Photo</label>
    <input class="btn btn-info m-hidden" value="Save" type="submit" name="savephoto" id="savebtn"/>
        <?php 
        }
        ?>
            <?php 

            if($user){

            }else if($userlogin){
            ?>

            <div class="card">
                <div class="card-header">
                    Your Stats
                </div>
                <div class="card-body">              
                    Points : <?php

                    //getting sensitive data
                    if(isset($userlogin)){

                        $querys   = "SELECT * FROM register WHERE user_login = '$userlogin'";
                        $GetDatas = $db->select($querys)->fetch_assoc();

                        $user_id = $GetDatas['user_id'];

                        $points = $db->select("SELECT * FROM leaderboard WHERE user_id='$user_id'");

                        if($points){

                            $getPoint = $points->fetch_assoc();
                            echo $getPoint['points'];
                        }

                    }
                    //end getting sensitive data
                    
                    ?> <br>

                </div>
            </div>

            <?php 
            }
            ?>
            

 </div>
</form>

 <div class="col-xs-12 col-md-10 container-fluid bg-secondary text-white rounded" style="padding-top:70px;padding-bottom:70px">
 <h2><?php echo $GetDataPr['user_name']?>'s profile</h2>

 <form action="" method="post" enctype="multipart/form-data">



        <div class="m-input-group">
        <input <?php
            if($user){
                echo "disabled='disabled'";
            }else{
                echo "enabled";
            }
        
        ?> type="date" class="m-form-control" id="dob" name="dob" value="<?php echo $GetDataPr['user_date']?>" class="hasDatepicker">
        <label>Date</label>
      </div>



        <div class="m-input-group">
        <input <?php
            if($user){
                echo "disabled='disabled'";
            }else{
                echo "enabled";
            }
        
        ?> type="text" class="m-form-control" name="city" id="city" value="<?php echo $GetDataPr['user_city']?>">
         <label>City</label>
        </div>



        <div class="m-input-group">
        <input <?php
            if($user){
                echo "disabled='disabled'";
            }else{
                echo "enabled";
            }
        
        ?> type="text" class="m-form-control" name="state" id="region" value="<?php echo $GetDataPr['user_state']?>">
            <label>State/Province</label>
        </div>



        <div class="m-input-group">
        <input <?php
            if($user){
                echo "disabled='disabled'";
            }else{
                echo "enabled";
            }
        ?>  type="text" class="m-form-control" name="country" id="country" value="<?php echo $GetDataPr['user_country']?>">
            <label>Country</label>
        </div>



        <div class="m-input-group">
        <textarea <?php
            if($user){
                echo "disabled='disabled'";
            }else{
                echo "enabled";
            }
        ?>  class="m-form-control" rows="8" cols="50" id="mytextarea" name="bio"><?php echo $GetDataPr['user_bio']?></textarea>
    
            <label>About</label>
        </div>


    <p></p>
    <p></p>
        <?php 
            if($user){

            }else if($userlogin){
        ?>
        <input type="submit" name="submit" value="Update" class="btn btn-primary" name="update_bio">
        <button class="btn btn-info" href="profile.php">Cancel</button>
        <?php 
        }
        ?>
   
 </form>
 

  </div>

</div>
</div>



<?php include "inc/footer.php"; ?>
