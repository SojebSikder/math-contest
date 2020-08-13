<?php
include "inc/header.php";
include "classes/WinMat.php";
include "classes/Post.php";


$db = new Database();
$format = new Format();

if (!isset($_SESSION['ins_login'])) {
  Format::jumpTo("instructor.php","Login First");
}

$username = $_SESSION['ins_name'];
$userlogin = $_SESSION['ins_login'];

if(isset($_REQUEST['edit'])){
    $id = $_REQUEST['edit'];
}

//get blog
if($userlogin){

    if(isset($_REQUEST['edit'])){
        $id = $_REQUEST['edit'];

        $getBlog = $db->select("SELECT * FROM blog_post WHERE blog_id= '$id' AND blog_author= '$username' AND user_email = '$userlogin' ");


        if($getBlog){
            $row = $getBlog->fetch_assoc();
        }else{
            Format::jumpTo("blog_list.php", "something wrong :(");
        }

    }
}else{
    Format::jumpTo("blog_list.php", "Your not eligible :(");
}
//end get blog


//update blog
if(isset($_POST['postBlog'])){

    $allowedTag = '<p>,<u>,<b>,<img>,<h1>,<h2>,<h3>,<h4>,<h5>,<h6>,<a>,
    <div>,<span>,<font>,<style>,<li>,<ul>,<ol>,<i>,<video>,<embad>,
    <audio>,<pre>,<frameset>,<iframe>,<object>,<br>,<dl>,<marquee>,<code>
    ,<svg>,<hr>';

    $title  = $format->Stext($_POST['postTitle']);
    $blog_name = $format->Stext($_POST['blogNameContainer']);
    $tags = $format->Stext($_POST['tags']);

    $desc = $format->Stext($_POST['desc'], $allowedTag);



    $sql = "UPDATE blog_post SET blog_title = '$title', blog_name = '$blog_name', blog_tag = '$tags',
     blog_description= '$desc' WHERE blog_id ='$id' ";

    $exe = $db->update($sql);

    if($exe){
        Format::goto("blog_edit.php?edit=".$id);
    }else{
      Format::goto("blog_edit.php?edit=".$id);
    }
}
//end update blog


//update category
if(isset($_POST['updateCat'])){

  $cat    = $format->Stext($_POST['cat']);

  $sql = "UPDATE blog_post SET blog_category = '$cat' WHERE blog_id ='$id' ";
  $exe = $db->update($sql);

  if($exe){
      Format::goto("blog_edit.php?edit=".$id);
  }else{
    Format::goto("blog_edit.php?edit=".$id);
  }
}
//end update category


//update cover photo
if(isset($_POST['updateimage'])){

//for image uploading
  $photoname = $_FILES['coverPhoto']['name'];
  $tmp_name  = $_FILES['coverPhoto']['tmp_name'];

  if($photoname){
    $location="assets/images/blog/$photoname";
    $new_name = $location.time()."-".rand(1000, 9999)."-".$photoname;
    move_uploaded_file($tmp_name, $new_name); 
  }else{
    $photoname = null;
  }
  

//end image uploading


  $sql = "UPDATE blog_post SET image = '$new_name' WHERE blog_id ='$id' ";
  $exe = $db->update($sql);

  if($exe){
      Format::goto("blog_edit.php?edit=".$id);
  }else{
    Format::goto("blog_edit.php?edit=".$id);
  }
}
//end update cover photo




?>

<form action="" method="post" enctype="multipart/form-data">
<div class="container-fluid">
<div class="row">


<div class="col-xs-12 col-md-2">

<div class="card">

    <p><img class="left-block img-thumbnail" src="<?php echo $row['image']; ?>" id="profile_img"></p>

     <div class="form-group">

         <p class="text-white">Upload Cover Photo (*jpg, *png):</p>
       
        <label class="m-btn waves-effect m-btn-info" for="profile_input">Browse...</label>
        <input class="m-hidden" type="file" name="coverPhoto" id="profile_input">
         <br>
     </div>
     <input type="submit" name="updateimage" class="m-btn waves-effect" value="Upload Photo">
    </div>
<hr>
    <div class="card card-body">
        <label for="drop">Category</label> 
        <select name="cat" id="drop" autocomplete="off">
            <?php 
            $productCat = $db->select("SELECT * FROM blog_category");

            if($productCat ){
                while ($getproductCat = $productCat->fetch_assoc()) {
            ?>
            <option value="<?php echo $getproductCat['cat_name'] ?>"><?php echo $getproductCat['cat_name'] ?></option>

        <?php } }?>
        </select>
        <br>
        <input type="submit" name="updateCat" class="m-btn waves-effect" value="Update">
    </div>
    <br>
</div>


<div class="col-xs-12 col-md-10 container-fluid rounded">


<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Blog Post Edit
                <hr>
              </h3>
              Title: <input value="<?php echo $row['blog_title']; ?>" required onkeyup="setName()" id="title" type="text" name="postTitle" placeholder="Write a cool title..."><br>
              <br>
              Blog-Name: <h3 id="blogName"><?php echo $row['blog_name']; ?></h3>
              <input type="hidden" id="blogNameContainer" name="blogNameContainer">
              <br>
              <label>Category</label> 
              <h5><?php echo $row['blog_category']; ?></h5>            

              <br>
              <br>
              Tags: <input value="<?php echo $row['blog_tag']; ?>" name="tags" type="text" placeholder="books, math problem,...">
<br>
<br>


              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" title="Remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
                <textarea class="textarea" name="desc" placeholder="Place some text here"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row['blog_description']; ?></textarea>
              </div>

              </p>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->

      <input type="submit" name="postBlog" class="m-btn waves-effect m-btn-block" value="Update Blog">
    </section>

</div>

</div>
</div>
</form>

<script>
function setName(){
  var title = document.getElementById("title");
  var con = document.getElementById("blogName");
  var container = document.getElementById("blogNameContainer");

  var val = title.value;
  var txt = val.split(" ").join("-");

  con.innerHTML = txt; 
  container.value = txt
}
</script>

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


<link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">
<script src="assets/plugins/summernote/summernote-bs4.min.js"></script>

 <script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>




<?php include "inc/footer.php"; ?>