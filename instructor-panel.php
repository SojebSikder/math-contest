<?php 
include "inc/header.php";
include "classes/WinMat.php";
include "classes/Post.php";
//include "helpers/Format.php";
$db = new Database();
$format = new Format();


if (!isset($_SESSION['ins_login'])) {
  Format::jumpTo("instructor.php","Login First");
}

$author = $_SESSION['ins_name'];


//email function

function sendNewsEmail($title, $description, $cat, $linkid){

  include_once "classes/Email.php"; 
  global $db;
 // $email = array('user1@example.com','user2@example.com',
  //'user3@example.com','user4@example.com','user5@example.com');
  
  $email = array();

  $sql = "SELECT * FROM newsletter ";
  $dataEmail = $db->select($sql);

  if($dataEmail){
    
  
    while($row = $dataEmail->fetch_assoc()) {
    $email = $row['email'];

    $emailId = $db->select("SELECT * FROM newsletter WHERE email ='$email'");

    $url="http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"])."/problem.php?CategoryID=$cat&LinkID=$linkid";

    $message="<html>";
    $message.="<body>";

    $message.="<h1>$title</h1>";
    $message.="<p>$description<p>";

    $message.="<small><a href='$url'>Click to open in browser</a></small>";

    if($emailId){
      $getId = $emailId->fetch_assoc();

      $urlun="http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"])."?unsubcribe={$getId['uid']}";
      $message.="<br><small><a href='$urlun'>Unsubscribe</a></small>";
    }

    $message.="</body>";
    $message.="</html>";

    sendEmail($email,"New Math Problem appear | Math Corner", $message);
    }
  }else{

  }
}

//end email functino

if(isset($_GET['del'])){
  $id       = $format->Stext($_GET['del']);

  $imageUrl = getPost($id, "post_image");
  unlink($imageUrl);

  $queryDel = "DELETE FROM post WHERE problem = '$id' AND post_author = '$author'";
  $delRow   = $db->delete($queryDel);

  Format::jumpTo("instructor-panel.php", "Deleted...");
}

//for displaying cetegory
$queryCat   = "SELECT * FROM category";
$GetDataCat = $db->select($queryCat);
//end for displaying cetegory

//algorithom for problem id auto generating
$problemId = uniqid(true);
//end algorithom

//insert problem to database
if(isset($_POST['submitP']))
{
  //For image upload
    $photoname = $_FILES['img']['name'];
    $tmp_name  = $_FILES['img']['tmp_name'];
    $location  = "img/post_image/$photoname";
    $new_name  = $location.time()."-".rand(1000, 9999)."-".$photoname;
    move_uploaded_file($tmp_name,$new_name); 
  //end for image uploading

  $author  = $_SESSION['ins_name'];
  $title   = $format->Stext($_POST['title']);
  $content = $format->Stext($_POST['content']);
  $cat     = $format->Stext($_POST['cat']);
  $ans     = $format->Stext($_POST['ans']);

  $query = "INSERT INTO post (post_title,post_author,post_content,category,problem,post_ans,post_image)
  VALUES ('$title','$author','$content','$cat','$problemId','$ans','$new_name')";

  $read = $db->insert($query);

  if($read){
    sendNewsEmail($title, Format::textShorten($content), $cat, $problemId);
  }

}

?>



<div class="jumbotron">
  <div class="container-fluid">
    <h1>Hello Instructor!</h1>
    <p>Manage all your Math Problem here</p>
  </div>
</div>

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

    <div id="addMath" class="collapse">
    <h3>Add Math Problem</h3>

      <div class="form-group">
          <label for="id">Problem ID(Auto Generate):</label>
          <input name="problemid" readonly type="text" value="<?php  echo $problemId; ?>" id="id">
        </div>

      <div class="m-input-group">
        <input name="title" type="text" class="m-form-control" id="usr">
        <label>Title:</label>
      </div>

      <div class="m-input-group">
        <textarea name="content" type="text" class="m-form-control" id="content"></textarea>
        <label>Content:</label>
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

      <p><img id="profile_img" class="left-block img-thumbnail"></p>

      <div class="form-group">
        <label class="btn btn-primary" for="profile_input">Browse..</label>
        <input name="img" class="m-hidden" type="file" id="profile_input">
      </div>

      <div class="m-input-group">
       
        <input name="ans" type="text" class="m-form-control" id="ans">
        <label>Enter Answere:</label>
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


  <div id="viewMath" class="collapse">
    <h3>View Math Problem</h3>

    <?php
    //Code for View Math Problems
    $username = $_SESSION['ins_name'];
    $userlogin = $_SESSION['ins_login'];


    $query = "SELECT * FROM post WHERE post_author='$username' order by id desc";
    $read =$db->select($query);
    if($read)
    {
      if(mysqli_num_rows($read) > 0)
      {

      ?>
      <table class="table table-responsive table-dark table-hover">
      <thead>
        <tr><!--Code for View Problem -->
        <th>Problem ID</th>
          <th>Title</th>
          <th>Content</th>
          <th>Image</th>
          <th>Category</th>
          <th>Answere Submitted</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      
      <?php

        while($row = $read->fetch_assoc()){
          $image      = $row['post_image'];

          $ans_cat    = $row['category'];
          $ans_linkid = $row['problem'];

          //Get submitted answere
          $querySub  = "SELECT * FROM answere WHERE ans_cat='$ans_cat' AND ans_linkid='$ans_linkid'";
          $resultSub = $db->select($querySub);
          //checking query error
      
          if($resultSub)
          {
            $total_answere = mysqli_num_rows($resultSub);
          }
          else{
            $total_answere = 0;
          }
          
          // end code for getting submitted answere
      ?>
      <tbody>
      
        <tr>
        <td><?php echo "<a href='problem.php?CategoryID={$row['category']}&LinkID={$row['problem']}'> {$row['problem']} <a>" ?></td>
          <td><?php echo "<a href='problem.php?CategoryID={$row['category']}&LinkID={$row['problem']}'> {$row['post_title']} <a>" ?></td>
          <td><?php echo $row["post_content"]; ?></td>
          <td><?php echo "<img class='rounded img-thumbnail img-fluid' width='100' height='100' src='$image' alt='Image not available'>";?></td>
          <td><?php echo $row["category"]; ?></td>
          <td>
          <a>

          <div class="m-dropdown">
              <span class='border border-secondary'><?php echo $total_answere;?></span>
              <div class="m-dropdown-content">
                <p style="color:black;">
                
                <?php
                $queryInfo ="SELECT * FROM answere WHERE ans_cat='$ans_cat' AND ans_linkid='$ans_linkid'";
                $resultInfo =$db->select($queryInfo);

                if($total_answere > 0)
                {
                    $i=0;
                    while($ch = $resultInfo->fetch_assoc()){
                      $i++;
                      $uname = $ch['user_name'];
                      $Winnerid = $ch['user_unique_id'];
                      $WinnerProblemId =$ch['ans_linkid'];

                      $event = 'return confirm("Are you sure to Declare Winner")';
                      $eventUn = 'return confirm("Are you sure to Remove Winner")';

                      echo "<fieldset style='color: black;border: 1px groove #ddd !important;
                                          padding: 0 1.4em 1.4em 1.4em !important;
                                          margin: 0 0 1.5em 0 !important;
                                          box-shadow: 0px 0px 0px 0px #000;'>";

                      echo "<a href='profile.php?user=$uname'>".$i.")".$ch['user_name'].": ".$ch['user_ans']."</a>"."\n";
                      echo "Email: ".$ch['user_email']."\n";
                      echo "<form action='' method='post'>";

                      //Cheaking winner
                      $queryCheckWinner = "SELECT * FROM winner_list WHERE ans_cat='$ans_cat' AND winner_id='$Winnerid'";
                      $readCheckWinner  = $db->select($queryCheckWinner);

                      if(!(mysqli_num_rows($readCheckWinner) > 0)){
                        echo "<a id='makeWinner' href='makeWin.php?user_name=$Winnerid&cat=$ans_cat' class='m-btn waves-effect' onclick='$event'>Make Winner</a>";
                      }else{
                        echo "<a id='cancelWinner' href='makeWin.php?user_name_can=$Winnerid&cat=$ans_cat&can'  class='btn btn-danger' onclick='$eventUn'>Cancel Winner</a>";
                      }
                      echo "</form>";
                      echo "</fieldset>";

                    }
          
                }else{
                  echo "No Answere Submitted yet";
                }
                
                ?></p>
              </div>
          </div>

          </a>

          </td>
          <td> <?php echo "<a href='edit-panel.php?editID={$row['problem']}'>Edit</a>" ?> </td>
          <td><a onclick="return confirm('Are you sure to delete (this cannot be undone)')" href=<?php echo "'?del={$row['problem']}'>Delete</a>";?>
          </td>
        </tr>

        <?php } ?>
      </tbody>
      
    </table>
    <span id="availability"></span>
      <?php 
      }
  }else{
      echo "No data"; //cheking result data
    }?>
    </div>

 
  
    <!--end code for left panel -->

    <p></p>
    <p></p>
       
   
 </form>
 

  </div>

</div>
</div>

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
        
<?php include "inc/footer.php";?>


<script>
/*
//for winning selection
$(document).ready(function() {
  $('#makeWinner').click(function(){
    //var username = $(this).val();
    var username = document.getElementById("makeWinner").getAttribute("value");
      $.ajax({
        url:"makeWin.php",
        method:"POST",
        data:{user_name:username},
        dataType:"text",
        success:function(html){
          $('#availability').html(html);
        }

    });

  });

});
*/
</script>
