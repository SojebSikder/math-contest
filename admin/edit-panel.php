<style>
   
label {
   cursor: pointer;
   /* Style as you please, it will become the visible UI component. */
}

#img ,#savebtn{
   opacity: 0;
   position: absolute;
   z-index: -1;
}
</style>

<?php 
include "inc/header.php";
//include "helpers/Format.php";

$format = new Format();

?>
<link rel="stylesheet" href="css/login.css">

<?php
$db = new Database();
if (!isset($_SESSION['ins_login'])) {
   header("location: instructor.php?msg=Login First");
}

$editID=$format->Stext($_REQUEST['editID']);

if($editID == null){
  header("location: index.php");
}

//for displaying cetegory
$queryCat = "SELECT * FROM category";
$GetDataCat =$db->select($queryCat);
//end for displaying cetegory
$author = $_SESSION['ins_name'];
//for displaying info
$queryPost = "SELECT * FROM post WHERE problem='$editID' And post_author='$author'";
$GetDataPost =$db->select($queryPost)->fetch_assoc();

//end for displaying info


//insert problem to database
if(isset($_POST['submitP']))
{
  //For image upload
    $photoname = $_FILES['img']['name'];
    $tmp_name  = $_FILES['img']['tmp_name'];
    $location="admin/img/post_image/$photoname";
    $new_name = $location.time()."-".rand(1000, 9999)."-".$photoname;
    move_uploaded_file($tmp_name,$new_name); 
  //end for image uploading

  $author = $_SESSION['ins_name'];
  $title = $format->Stext($_POST['title']);
  $content = $format->Stext($_POST['content']);
  $cat = $format->Stext($_POST['cat']);
  $ans = $format->Stext($_POST['ans']);

  $query = "UPDATE post SET post_title='$title',post_content='$content',category='$cat',post_ans='$ans',post_image='$new_name'
            Where problem='$editID' AND post_author='$author'";

$read =$db->update($query);

header("Location: instructor-panel.php?msg=Edited Successfully.");

}

?>


<div class="container-fluid">
    <div class="container-fluid">
    	<div class="col">
    		
    	</div>
    </div>


    
    <form action="" method="post" enctype="multipart/form-data">

<div class="container-fluid">
<div class="row">

 <div class="col-xs-12 col-md-2">


 <div class="list-group">
    <a data-toggle="collapse" data-target="#viewMath" href="#" class="list-group-item ">View Problems</a>
    <a data-toggle="collapse" data-target="#addMath" href="#" class="list-group-item">Add Problem</a>
  </div>



 </div>
</form>

 <div class="col-xs-12 col-md-10 container-fluid bg-secondary text-white rounded" style="padding-top:20px;padding-bottom:70px">
 <h2>Manage Here</h2>
 <hr>

 <form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">

    <div id="" class="">
    <h3>Edit Math Problem</h3>

      <div class="form-group">
          <label for="id">Problem ID(Auto Generate):</label>
          <input name="problemid" readonly type="text" value="<?php  echo $GetDataPost['problem']; ?>" id="id">
        </div>

      <div class="form-group">
        <label for="usr">Title:</label>
        <input name="title" value="<?php  echo $GetDataPost['post_title']; ?>" type="text" class="form-control" id="usr">
      </div>

      <div class="form-group">
        <label for="content">Content:</label>
        <textarea name="content" type="text" class="form-control" id="content"><?php  echo $GetDataPost['post_content']; ?></textarea>
      </div>

      <div class="form-group">
        <label for="cat">Category:</label>
          <select name="cat" id="cat">
          <?php  //displaying category
          while($listN = $GetDataCat->fetch_assoc())
                   {
                        //echo "<option value='user: {$listN['user_name']}'>";
                        echo "<option value='{$listN['cat_name']}'>{$listN['cat_name']}</option>";
                   }
                    ?>
          </select>
      </div>

     <p> <img class="left-block float-right img-thumbnail" style="max-width: 50%;height: 10rem;" src="<?php  echo $GetDataPost['post_image']; ?>" alt=""></p>



      <div class="form-group">
        <label class="btn btn-primary" for="img">Browse..</label>
        <input name="img" type="file" id="img">
      </div>


      <div class="form-group">
        <label for="ans">Enter Answere:</label>
        <input name="ans" value="<?php  echo $GetDataPost['post_ans']; ?>" type="text" class="form-control" id="ans">

          <p class="text-dark">
              <ul>Example:
              <li>-1234.56 is a valid answer</li>
              <li>-1,234.56 & -1 234,56 are not valid answers</li>
              </ul>
          </p>

      </div>

    <br>
    <input type="submit" name="submitP" value="Submit" class="btn btn-primary">
        <button class="btn btn-info" type="reset">Cancel</button>
  </div>


  

 
  
    <!--end code for left panel -->

    <p></p>
    <p></p>
       
   
 </form>
 

  </div>

</div>
</div>
        
<?php include "inc/footer.php";?>