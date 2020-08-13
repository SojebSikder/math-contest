<?php
include "inc/header.php";
$db = new Database();
$format = new Format();

if (!isset($_SESSION['ins_login'])) {
  Format::jumpTo("instructor.php","Login First");
}

if(isset($_POST['uploadFile'])){

//for image uploading
    $photoname = $_FILES['coverPhoto']['name'];
    $tmp_name  = $_FILES['coverPhoto']['tmp_name'];

    $location="assets/images/blog/$photoname";
    $new_name = $location.time()."-".rand(1000, 9999)."-".$photoname;
    move_uploaded_file($tmp_name, $new_name); 

//end image uploading

$uid = uniqid(true);
$user_id = $_SESSION['ins_id'];

$exe = $db->insert("INSERT INTO blog_file(file_id, file_url, user_id) VALUES('$uid', '$new_name', '$user_id')");

$showLink = false;
    if($exe){
        echo true;
    }else{
        Format::jumpTo("file_upload.php", "Something wrong :(");
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">

<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                File Uploader
                <small>Upload file and get link</small>
              </h3>
              File-Url: <h3 id="blogName">
              <?php 
              $add = "https://mathcontest.ml/";
              if(isset($showLink)){
                  echo $add.$new_name;
              }
              
                    ?></h3>
<br>
<br>
              Upload Cover Photo (*jpg, *png): <label class="m-btn waves-effect m-btn-info" for="profile_input">Browse...</label>
                    <input class="m-hidden" type="file" name="coverPhoto" id="profile_input">
                    <br>
                    <input type="submit" name="uploadFile" class="m-btn waves-effect m-btn-block" value="Upload File and get link">

                    <img class="left-block img-thumbnail" id="profile_img">

 

              </p>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->

     
    </section>
</form>


<script>
//handling image view
$(document).on('change', '#profile_input', function(){
  var file = $('#profile_input')[0].files[0];
  if(file){
    var reader = new FileReader();
    reader.onload = function(e){
      //set value of the input for profile picture
      $('#profile_input').attr('value', file.name);
      //display the image
      $('#profile_img').attr('src', e.target.result);
    };
    reader.readAsDataURL(file);
  }
});

//end handling image view

</script>


<?php include "inc/footer.php"; ?>