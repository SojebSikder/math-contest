<?php
ob_start();
//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//require_once(__DIR__.'/_path/_of/_filename.php');
session_start();
include 'config/conn.php';
include 'lib/Database.php';
include 'helpers/Format.php';
include './classes/getFetch.php';
include './classes/Web.php';

getVisitor();

define("BASE","assets/");

if(isset($_GET['msg'])){
  echo "<center><span class='alert alert-success m-z'>".$_GET['msg']."</span></center>";
}
if(isset($_GET['error'])){
  echo "<center><span class='alert alert-danger m-z'>".$_GET['error']."</span></center>";
}

  
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="<?php echo BASE;?>images/logo/icon.png" type="image/png" sizes="16x16">

    <meta name="description" content="<?php echo web('description'); ?>">
    <meta name="keywords" content="<?php echo web('keywords'); ?>">
    <meta name="author" content="Sojeb Sikder">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<!--bootstrap file link -->
  <link rel="stylesheet" href="<?php echo BASE;?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo BASE;?>css/footer.css">
  <script src="<?php echo BASE;?>js/jquery.min.js"></script>
  <script src="<?php echo BASE;?>js/popper.min.js"></script>
  <script src="<?php echo BASE;?>js/bootstrap.min.js"></script>
  <script src="<?php echo BASE;?>js/init.js"></script>
  <link rel="stylesheet" href="<?php echo BASE;?>css/login.css">

<!--material file link -->
  <link rel="stylesheet" href="<?php echo BASE;?>css/material/material.css">
  <script src="<?php echo BASE;?>css/material/material.js"></script>
  
<!--</>-->


  
 <title><?php echo web("web_title");?></title>

 <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-88930775-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-88930775-2');
</script>


</head>

<body class="m-parallax">

<?php
// header image
if(!(basename($_SERVER['PHP_SELF']) == "instructor-panel.php" || basename($_SERVER['PHP_SELF']) == "edit-panel.php"))
{
  ?>


<div class="jumbotron text-center bg-white text-black" style="margin-bottom:0; background: url(<?php echo BASE;?>images/cover/wallpaper.png);">
  <h1 class="text-light"><?php echo web("web_title");?></h1>
  <p class="text-light"><?php echo web('web_slogan'); ?></p>
</div>

<?php
}

?>



<nav class="navbar ftco_navbar navbar-expand-lg bg-dark navbar-info sticky-top">

<div class="container">

  <!-- Brand -->
  <a class="navbar-brand" href="index.php"><?php echo web("web_title");?></a>

        <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

<div class="collapse navbar-collapse" id="ftco-nav">

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item dropdown">

      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">

        <?php
        if(isset($_SESSION['name'])){
          echo $_SESSION['name'];
          $username = $_SESSION['name'];

          $notiName = $_SESSION['name'];

        }
        elseif(isset($_SESSION['ins_name']))
        {
          echo $_SESSION['ins_name']; //Instructor username
          $ins_username = $_SESSION['ins_name'];
          $notiName  = $_SESSION['ins_name'];
        }
        else{
          echo "Account";
          $ins_username = null;
          $notiName = null;
        }

        ?></a>

        <div class="dropdown-menu">

        <?php
        if(isset($_SESSION['name'])){
          echo "<a class='dropdown-item' href='profile.php'>Profile</a>";
          echo "<a class='dropdown-item' href='settings.php'>Settings</a>";
          echo "<a class='dropdown-item' href='logout.php'>Logout</a>";
        }elseif(isset($_SESSION['ins_login'])){
          //Instructor Option
          echo "<a class='dropdown-item' href='ins-profile.php'>Instructor Profile</a>";
          echo "<a class='dropdown-item' href='ins-settings.php'>Settings</a>";
          echo "<a class='dropdown-item' href='logout.php'>Logout</a>";
        }else{
          echo "<a class='dropdown-item' href='login.php'>Login</a>";
          echo "<a class='dropdown-item' href='register.php'>Register</a>";
          echo "<hr>";
          echo "<a class='dropdown-item' href='instructor.php'>Login as Instructor</a>";
          echo "<a class='dropdown-item' href='instructor-register.php'>Register as Intrustor</a>";
        }
        ?>

      </div>
    </li>
    
    <?php

  if(isset($_SESSION['ins_login'])){
      echo "<li class='nav-item'><a class='nav-link' href='instructor-panel.php'>Instructor Panel</a></li>";
    }
    ?>

    <?php
//Get data for daily challenge

   // $ins_username= isset($_SESSION['ins_name']);
    $username = isset($_SESSION['name']);
    $db = new Database();
    $query = "SELECT * FROM post where category='Daily Math Challenge' order by id desc";
    $GetDataCon =$db->select($query);

    if($GetDataCon){
      $GetData = $GetDataCon->fetch_assoc();
    }

//Get data for weekly challenge
    $queryw = "SELECT * FROM post where category='Weekly Math Challenge' order by id desc ";
    $GetDatawCon =$db->select($queryw);

    if($GetDatawCon){
      $GetDataw = $GetDatawCon->fetch_assoc();
    }
// </>
?>

    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Contest
      </a>
      <div class="dropdown-menu">
      <?php
      if(($GetDatawCon) || ($GetDataCon) )
      {

      ?>
        <a class="dropdown-item" href="problem.php?CategoryID=Daily Math Challenge&LinkID=<?php echo $GetData['problem'];?>">Daily Math Challenge</a>
        <a class="dropdown-item" href="problem.php?CategoryID=Weekly Math Challenge&LinkID=<?php echo $GetDataw['problem'];?>">Weekly Math Challenge</a>
       <?php
      }
      else{
        echo "Currently no problem have submitted";
      }
       ?>
      </div>
    </li>


    <li class="nav-item">
      <a class="nav-link" href="leaderboard.php">Leaderboard</a>
    </li>

  <?php if(isset($_SESSION['ins_login'])): ?>


    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Blog
      </a>
      <div class="dropdown-menu">

        <a class="dropdown-item" href="blog/">View Blog</a>
        <a class="dropdown-item" href="post_blog.php">Post a Blog</a>
        <a class="dropdown-item" href="blog_list.php">Blog List</a>
        <a class="dropdown-item" href="file_upload.php" target="_blank">File Uploader</a>
        <a class="dropdown-item" href="file_list.php" target="_blank">Your File List</a>

      </div>
    </li>


  <?php else: ?>

    <li class="nav-item">
      <a class="nav-link" href="blog/">Blog</a>
    </li>

  <?php endif ?>

    <li class="nav-item">
      <a class="nav-link" href="shop.php">Shop</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="contact.php">Contact Us</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="about.php">About</a>
    </li>
   

    <!-- Dropdown -->
    <?php
    if((isset($_SESSION['name'])) || (isset($_SESSION['ins_name']))){
      ?>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle float-right" href="#" id="navbardrop" data-toggle="dropdown">
      <span class="glyphicon"></span>Notification<?php
     if($notiName)
     {
                $queryCount = "SELECT * from notifications where status = 'unread' AND user_name='$notiName' ";
                $fetchCount = $db->select($queryCount);//->fetch_assoc();

                if($fetchCount){

                ?>
                <span class="badge badge-light"><?php echo mysqli_num_rows($fetchCount); //count($fetchCount); ?></span>
              <?php
                }
              
               
              }
              ?>
      </a>

      <div class="dropdown-menu" style="overflow-y: scroll;max-height: 300px;">
      <?php
      if($notiName)
      {
                $queryN = "SELECT * from notifications where user_name='$notiName' OR user_name='all' order by date DESC";
                $fetchNoti = $db->select($queryN);//->fetch_assoc();
                 if($fetchNoti){
                     //foreach($fetchNoti as $i){
                       while($i = $fetchNoti->fetch_assoc()){
                        $dt =$i['date'];  
                ?>
              <a style ="<?php
                            if($i['status']=='unread'){
                                echo "font-weight:bold;";
                            }
                         ?>
                         " class="dropdown-item" name='get-report' data-toggle='modal' data-target='#myModal'  onclick="javascript:showUser(<?php  echo $i['id'];?>)">

                <small><i><?php echo Format::formatDate($dt) ?></i></small><br/>
                  <?php 

                  //compressing text
                  $position=30; // Define how many character you want to display.
                  $msg=$i['message']; 
                  $msgi = Format::textShorten($msg, $position);
                  //end compressing
                  
                if($i['type']=='warning'){
                    echo "You receive a warning";
                    echo "<p class='text-danger'>{$msgi}...</p>";
                    echo "<small class='text-dark'>sent to:  <strong> {$i['user_name']} </strong></small>";
                }else if($i['type']=='info'){

                    echo "You receive a message.";
                    echo "<p>{$msgi}...</p>";
                    echo "<small class='text-dark'>sent to: <strong>{$i['user_name']}</strong></small>";
                }
                  
                  ?>
                </a>
              <div class="dropdown-divider"></div>
                <?php
                 }
                }
                 }else{
                     echo "No Message.";
                 }
                 ?>
      </div>
    </li>
    <?php 
    }else{
      
    }
    ?>
    <!--End for dropdown -->


    <?php
    if(isset($_SESSION['cart'])){
      $cart = unserialize(serialize($_SESSION['cart']));
    
    if(count($cart)){
    ?>
      <li class="nav-item">
        <a class="m-btn-large waves-effect" href="cart.php">Cart</a>
      </li>
    <?php } else{
    
    }
  }
    ?>

  </ul>


    </div>
  </div>
</nav>
<br>




        <!---------------------------Start Model--------------- -->
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Notification</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div id="reportModel" class="modal-body">
          Loading...
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>


<!--------------------------------end Model ----------->
<script>
    function showUser(str) {
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("reportModel").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","viewNotification.php?q="+str, true);
            xmlhttp.send();
        }
    }
</script>