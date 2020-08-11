<?php
include "inc/header.php";
$db = new Database();
$format = new Format();

if (!isset($_SESSION['ins_login'])) {
  Format::jumpTo("instructor.php","Login First");
}



if(isset($_POST['postBlog'])){

    $allowedTag = '<p>,<u>,<b>,<img>,<h1>,<h2>,<h3>,<h4>,<h5>,<h6>,<a>,
    <div>,<span>,<font>,<style>,<li>,<ul>,<ol>,<i>,<video>,<embad>,
    <audio>,<pre>,<frameset>,<iframe>,<object>,<br>,<dl>,<marquee>,<code>
    ,<svg>,<hr>';

    $author = $_SESSION['ins_name'];
    $author_id = $_SESSION['ins_id'];
    $email = $_SESSION['ins_login'];
    $cat    = $format->Stext($_POST['cat']);
    $title  = $format->Stext($_POST['postTitle']);
    $blog_name = $format->Stext($_POST['blogNameContainer']);
    $tags = $format->Stext($_POST['tags']);
    $blog_id = uniqid(true);

    $desc = $format->Stext($_POST['desc'], $allowedTag);

//for image uploading
    $photoname = $_FILES['coverPhoto']['name'];
    $tmp_name  = $_FILES['coverPhoto']['tmp_name'];

    $location="assets/images/blog/$photoname";
    $new_name = $location.time()."-".rand(1000, 9999)."-".$photoname;
    move_uploaded_file($tmp_name, $new_name); 

//end image uploading

    $sql = "INSERT INTO blog_post(blog_title, blog_description, blog_name, blog_category, blog_id, blog_author_id, blog_tag, blog_author, user_email, image, blog_status) 
      VALUES('$title', '$desc', '$blog_name', '$cat', '$blog_id', '$author_id', '$tags', '$author', '$email', '$new_name', 'Unpublish')";

    $exe = $db->insert($sql);

    if($exe){

    }else{
      Format::jumpTo("post_blog.php","Something wrong. Try to not use tags");
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
                Blog Post
                <small>Write something...</small>
              </h3>
              Title: <input required onkeyup="setName()" id="title" type="text" name="postTitle" placeholder="Write a cool title..."><br>
              <br>
              Blog-Name: <h3 id="blogName"></h3>
              <input type="hidden" id="blogNameContainer" name="blogNameContainer">
              <br>
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
              <br>
              Tags: <input name="tags" type="text" placeholder="books, math problem,...">
<br>
<br>
              Upload Cover Photo (*jpg, *png): <label class="m-btn waves-effect m-btn-info" for="profile_input">Browse...</label>
                    <input class="m-hidden" type="file" name="coverPhoto" id="profile_input">
                    <br>

                    <img class="left-block img-thumbnail" id="profile_img">

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
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>

              </p>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->

      <input type="submit" name="postBlog" class="m-btn waves-effect m-btn-block" value="Post Blog">
    </section>
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