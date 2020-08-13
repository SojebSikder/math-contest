<?php include "inc/header.php"; ?>
<link rel="stylesheet" href="css/login.css">
<style>
   
label {
   cursor: pointer;
   /* Style as you please, it will become the visible UI component. */
}

#upload-photo ,#savebtn{
   opacity: 0;
   position: absolute;
   z-index: -1;
}

</style>

<?php

$db = new Database();
$format = new Format();

$add = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//!isset($_SESSION['name'],$_SESSION['login']) ||
if (!(isset($_SESSION['name'], $_SESSION['login']) || isset($_SESSION['ins_name'], $_SESSION['ins_login']))) {
  header("location: login.php?reurl=".$add);
}


if(isset($_SESSION['name'], $_SESSION['login']))
{
    $username  = $_SESSION['name'];
    $userlogin = $_SESSION['login'];
}
elseif(isset($_SESSION['ins_name'], $_SESSION['ins_login']))
{
    $username  = $_SESSION['ins_name'];
    $userlogin = $_SESSION['ins_login'];
}

//Get data
    $cat  = $format->Stext($_REQUEST['CategoryID']);
    $link = $format->Stext($_REQUEST['LinkID']);

     //If available link and ccat
     if($cat == null)
     {
        header("location: index.php");
     }
     elseif($cat == null)
     {
        header("location: index.php");
     }
     elseif($link == null)
     {
        header("location: index.php");
     }
     elseif($link == null)
     {
        header("location: index.php");
     }
     //End that link and cat avality

    
    $query   = "SELECT * FROM post where category ='$cat' AND problem ='$link'";
    $GetData = $db->select($query)->fetch_assoc();

// </>
//Sensitive Data
    $querys   = "SELECT * FROM register WHERE user_login = '$userlogin'";
    $GetDatas = $db->select($querys)->fetch_assoc();
// </>
 
  $email        = $format->Stext($GetDatas['user_email']);
  $userid       = $format->Stext($GetDatas['id']);
  $username     = $format->Stext($GetDatas['user_name']);
  $userimage    = $format->Stext($GetDatas['user_image']);
  $userloginss  = $format->Stext($GetDatas['user_login']);
  $userUniqueID = $format->Stext($GetDatas['user_id']);
  

  $usertype = 'user';
  $userip   = $_SERVER['REMOTE_ADDR'];


if(isset($_POST['submit']))
{
    $ans = $format->Stext($_POST['ans']);

    $queryCheck   = "SELECT * FROM post where category = '$cat' AND problem = '$link'";
    $GetDataCheck = $db->select($queryCheck)->fetch_assoc();

    if(!($GetDataCheck['post_ans'] == $ans))
    {
        echo "<script type='text/javascript'>";
        echo "$(document).ready(function(){";
        echo "$('#notToast').toast('show')";
        echo "});";
        echo "</script>";

//insert data to submitted
        $querySubmitted = "INSERT INTO submitted(user_unique_id, user_ans, user_email, ip, ans_cat, ans_linkid)
        VALUES('$userUniqueID', '$ans', '$email', '$userip','$cat','$link')";
    
        $readpostSubmit = $db->insert($querySubmitted);
//End submitted data

    }
    else if($GetDataCheck['post_ans'] == $ans){

    $querypost = "INSERT INTO answere(user_unique_id,user_ans,user_email,user_id,user_name,user_image,user_login,user_type,ipadd,ans_cat,ans_linkid)
    VALUES('$userUniqueID','$ans','$email',$userid,'$username','$userimage','$userloginss','$usertype','$userip','$cat','$link')";

    $readpost = $db->insert($querypost);

    echo "<script type='text/javascript'>";
    echo "$(document).ready(function(){";
    echo "$('#toast').toast('show')";
    echo "});";
    echo "</script>";


//insert data to submitted table
    $querypost = "INSERT INTO submitted(user_unique_id, user_ans, user_email, ip, ans_cat, ans_linkid)
    VALUES('$userUniqueID', '$ans', '$email', '$userip','$cat','$link')";

    $readpost = $db->insert($querypost);
//End submitted data


//Insert points to leaderboard
      $checkUserExist = $db->select("SELECT * FROM leaderboard WHERE user_email ='$email'");

      if($checkUserExist){
        $UserExistRow = $checkUserExist->fetch_assoc();

        if(mysqli_num_rows($checkUserExist) > 0){

          if($cat == "Daily Math Challenge"){
            $points = $UserExistRow['points'] + 2;

          }elseif ($cat == "Weekly Math Challenge") {
            $points = $UserExistRow['points'] + 5;
          }
          
          $incPoint = $db->update("UPDATE leaderboard SET points = '$points' WHERE user_email ='$email'");
        }
      } else{

        if($cat == "Daily Math Challenge"){
          $points =  2;

        }elseif ($cat == "Weekly Math Challenge") {
          $points =  5;
        }
      
        $incPoint = $db->insert("INSERT INTO leaderboard(user_email, user_id, points) 
        VALUES('$email', '$userUniqueID', '$points') ");
      }
//End Insert points to leaderboard
    }
}
?>


<?php include "inc/sidebar.php"; ?>

 <div class="col-xs-12 col-md-10 container-fluid bg-dark text-white rounded" style="padding-top:70px;padding-bottom:70px">
 
 <h2>Answere Submission</h2>
 <h2><?php echo $GetData['post_title']?></h2>
 <p><?php echo $GetData['category']?> - <?php echo Format::formatDate($GetData['post_date']);?></p>
 <p>Posted By - <?php echo $GetData['post_author'];?></p>
<hr>
<p class="text-secondary">
<?php echo $username;?>, welcome to Math Contest! Submit your numeric-only answer below (no brackets, commas, parentheses, spaces) — round to 2 (two) decimal places. If your answer is 0 (zero), enter 0</p>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">

    <div class="card text-primary">
        <div class="card-body">
        
        <p><?php echo $GetData['post_content']?></p>

        </div>
        </div>


    </div>
    <div class="form-group">
        <p><img class="left-block float-right img-thumbnail" style="max-width: 50%;height: 30rem;" src="<?php echo $GetData['post_image']?>" alt=""></p><br>
    </div>

              <?php
              $bool;
              $queryGetTemp   = "SELECT * FROM post where category = '$cat' AND problem = '$link'";
              $GetDataGetTemp = $db->select($queryGetTemp)->fetch_assoc();

              $queryGetUserAns   = "SELECT * FROM answere where user_email='$userlogin' AND ans_cat = '$cat' AND ans_linkid = '$link'";
              $GetDataGetUserAns = $db->select($queryGetUserAns);

              if($GetDataGetUserAns){
                while ($getAns = $GetDataGetUserAns->fetch_assoc()) {
                  if($getAns['user_ans'] == $GetDataGetTemp['post_ans'])
                  {
                    $bool = true;
                  }else {
                    $bool = false;
                  }
                }
              
              
              if($bool == true){
                echo "<a class='text-danger alert alert-primary'>You have answered already</a>";
              }
              elseif($bool == false){
              ?>
              Answere : 
              <div class="m-input-group">
                <input name="ans" autocomplete="off" class="m-form-control" style="width:50%;" type="text">
                <label>Enter your answere</label>
              </div>

              <input id="myBtn" type="submit" name="submit" value="Submit Answere" class="m-btn waves-effect">
        <?php 
              }
            }else{
              ?>
              
              Answere : 
              <div class="m-input-group">
                <input name="ans" autocomplete="off" class="m-form-control" style="width:50%;" type="text">
                <label>Enter your answere</label>
              </div>
              
              <input id="myBtn" type="submit" name="submit" value="Submit Answere" class="m-btn waves-effect">
            
          <?php }  ?>

</form>

<!--Tooltip -->
<div id="toast" class="toast" data-autohide="false">
    <div class="toast-header">
      <strong class="mr-auto text-success">Answere Submitted successfully</strong>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
    </div>
  </div>
<!--End Tooltip -->

<!--Tooltip -->
<div id="notToast" class="toast" data-autohide="false">
    <div class="toast-header">
      <strong class="mr-auto text-danger">Answere not Submitted</strong>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
    </div>
  </div>
<!--End Tooltip -->




<p class="text-dark">
<ul>Example:
<li>-1234.56 is a valid answer</li>
<li>-1,234.56 & -1 234,56 are not valid answers</li>
</ul>
</p>


  </div>
 

</div>
</div>


<?php include "inc/footer.php"; ?>
