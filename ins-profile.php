<?php
include "inc/header.php";
$db = new Database();
$format = new Format();
?>
<link rel="stylesheet" href="css/login.css">

<?php
if (!isset($_SESSION['ins_login'])) {
   header("location: instructor.php?msg=Login First");
}

?>

<?php
//Get data
    $username = $_SESSION['ins_name'];
    $userlogin = $_SESSION['ins_login'];
    $queryPr = "SELECT * FROM instructor WHERE ins_name='$username' AND ins_login='$userlogin'";
    $GetDataPr =$db->select($queryPr)->fetch_assoc();

// </>
if(isset($_POST['submit'])){

    $userip=$_SERVER['REMOTE_ADDR'];
    $usertype='instructor';
    $status='active';
    $egt = $GetDataPr['ins_email'];

    $city =$format->Stext($_POST['city']);
    $state =$format->Stext($_POST['state']);
    $country =$format->Stext($_POST['country']);
    $bio =$format->Stext($_POST['bio']);
    $date = $format->Stext($_POST['dob']);

    $query = "UPDATE instructor SET 
    ins_city='$city',ins_state='$state',
    ins_country='$country',
    ins_bio='$bio',
    ins_date='$date',
    ipadd='$userip' 
    where ins_email='$egt'";

    $read =$db->update($query);
    if($read)
    {
        header("Location: ins-profile.php?msg=".urlencode('Profile Info Save Successfully.'));
    }
} 
//for updating photo
if(isset($_POST['savephoto'])){
    //upload photo
    $photoname = $_FILES['photo']['name'];
    $tmp_name  = $_FILES['photo']['tmp_name'];

    $location="img/profile/$photoname";
    $new_name = $location.time()."-".rand(1000, 9999)."-".$photoname;
    move_uploaded_file($tmp_name,$new_name); 

    $dbs = new Database();
    $querys = "UPDATE instructor SET ins_image='$new_name' WHERE ins_name='$username' AND ins_login='$userlogin'";
    $reads =$dbs->update($querys);
    if($reads)
    {
        header("Location: ins-profile.php?msg=".urlencode('Profile Photo Save Successfully.'));
    }
}
//</>}
?>

 <form action="" method="post" enctype="multipart/form-data">

<div class="container-fluid">
<div class="row">

 <div class="col-xs-12 col-md-2">
    <p><img class="left-block img-thumbnail" src="<?php echo $GetDataPr['ins_image']?>" alt=""></p>

    <label class="btn btn-primary" for="upload-photo">Browse...</label>
    <input type="file" class="m-hidden" name="photo" id="upload-photo"/>

    <label class="btn btn-info" for="savebtn">Update Photo</label>
    <input class="btn btn-info m-hidden" value="Save" type="submit" name="savephoto" id="savebtn"/>

 </div>
</form>

 <div class="col-xs-12 col-md-10 container-fluid bg-secondary text-white rounded" style="padding-top:70px;padding-bottom:70px">
 <h2><?php echo $GetDataPr['ins_name']?>'s profile</h2>

 <form action="" method="post" enctype="multipart/form-data">


    <div class="m-input-group">
        <input class="m-form-control" type="date" id="dob" name="dob" value="<?php echo $GetDataPr['ins_date']?>" class="hasDatepicker">
        <label>Date of Birth*</label>
    </div>


    <div class="m-input-group">
        <input class="m-form-control" type="text" name="city" id="city" value="<?php echo $GetDataPr['ins_city']?>">
        <label>City</label>
    </div>

    <div class="m-input-group">
        <input class="m-form-control" type="text" name="state" id="region" value="<?php echo $GetDataPr['ins_state']?>">
        <label>State/Province</label>
    </div>

    <div class="m-input-group">
        <input class="m-form-control" type="text" name="country" id="country" value="<?php echo $GetDataPr['ins_country']?>">
        <label>Country*</label>
    </div>

    <div class="m-input-group">
        <textarea class="m-form-control" rows="8" cols="50" id="mytextarea" name="bio"><?php echo $GetDataPr['ins_bio']?></textarea>
        <label>About Yourself*</label>
    </div>

    <p></p>
    <p></p>
        <input type="submit" name="submit" value="Update" class="btn btn-primary" name="update_bio">
        <button class="btn btn-info" href="profile.php">Cancel</button>
   
 </form>
 

  </div>

</div>
</div>



<?php include "inc/footer.php"; ?>
