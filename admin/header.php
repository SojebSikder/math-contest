<?php
ob_start();
session_start();

include "../config/conn.php";
include "../lib/Database.php";
include "../helpers/Format.php";

define("BASE","assets/");

$db = new Database();

if(!isset($_SESSION['admin_login'])) {
    Format::jumpTo("login.php", "Login First");
}

  //Get data dor daily challenge
  if(isset($_SESSION['admin_name'])){
    $username = $_SESSION['admin_name'];
  }
  

  if(isset($_SESSION['admin_login'])){
    $login = $_SESSION['admin_login'];
  }
 
if($login){
    $queryData = "SELECT * FROM instructor where ins_type='instructor' and ins_login='$login'";
  $GetData =$db->select($queryData)->fetch_assoc();
}
  


// </>
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
	 <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>


    <!--bootstrap file link -->
  <link rel="stylesheet" href="../<?php echo BASE;?>css/bootstrap.min.css">
  <link rel="stylesheet" href="../<?php echo BASE;?>css/footer.css">

  <link rel="stylesheet" href="../<?php echo BASE;?>css/login.css">

  <!--material file link -->
  <link rel="stylesheet" href="../<?php echo BASE;?>css/material/material.css">
    

</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft logo">
                    <img src="img/logo1.png" alt="Logo" />
				</div>
				<div class="floatleft middle">
					<h1>Math Contest</h1>
					<p>www.mathcontest.ml</p>
				</div>
                <div class="floatright">
                    <div class="floatleft">
                        <img style="width: 32px;" src="../<?php echo $GetData['ins_image'];?>" alt="Profile Pic" /></div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello, <?php echo $GetData['ins_name']; ?></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard"><a href="index.php"><span>Dashboard</span></a> </li>
                <li class="ic-form-style"><a href=""><span>User Profile</span></a></li>
				<li class="ic-typography"><a href="changepassword.php"><span>Change Password</span></a></li>
				<li class="ic-grid-tables"><a href="inbox.php"><span>Inbox</span></a></li>
                <li class="ic-charts"><a href="all-user.php"><span>All User</span></a></li>
                <li class="ic-charts"><a href="instructor-request.php"><span>Instructor Request</span></a></li>
                <li class="ic-charts"><a href="../index.php"><span>Visit Website</span></a></li>
            </ul>
        </div>
        <div class="clear">
        </div>
