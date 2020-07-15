<?php
ob_start();
//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//require_once(__DIR__.'/_path/_of/_filename.php');
session_start();

include "./config/web.php";

//echo root;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="icon" href="<?php echo root; ?>/img/icon.png" type="image/png" sizes="16x16">

    <meta name="description" content="The Math Contest Blog.">
    <meta name="keywords" content="sojebsoft, sojebsoft download, math, contest">
    <meta name="author" content="Sojeb Sikder">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<!--bootstrap file link -->
  <link rel="stylesheet" href="<?php echo root; ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo root; ?>/css/footer.css">
  <script src="<?php echo root; ?>/js/jquery.min.js"></script>
  <script src="<?php echo root; ?>/js/popper.min.js"></script>
  <script src="<?php echo root; ?>/js/bootstrap.min.js"></script>
  <script src="<?php echo root; ?>/js/init.js"></script>
  <link rel="stylesheet" href="<?php echo root; ?>/css/login.css">

<!--material file link -->
  <link rel="stylesheet" href="<?php echo root; ?>/css/material/material.css">
  <script src="<?php echo root; ?>/css/material/material.js"></script>
  
<!--</>-->

  
 <title><?php echo TITLE;?></title>
</head>

<body>




<div class="jumbotron text-center bg-white text-black" style="margin-bottom:0; background: url(<?php echo root; ?>/img/wallpaper.png);">
  <h1 class="text-light"><?php echo TITLE;?></h1>
  <p class="text-light"></p>
</div>


<nav class="navbar navbar-expand-sm bg-dark navbar-info sticky-top">
  <!-- Brand -->
  <a class="navbar-brand" href="index.php"><?php echo TITLE;?></a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
    </li>


    

    <!-- Dropdown -->

    <li class="nav-item">
      <a class="nav-link" href="../contact.php">Contact Us</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="../about.php">About</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="../index.php">Back to contest</a>
    </li>
   

 
  </ul>


</nav>
<br>