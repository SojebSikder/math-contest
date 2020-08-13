<?php
require_once("src/config/conn.php");
require_once("src/lib/Database.php");
require_once("src/classes/Blog.php");
require_once("src/helpers/Format.php");
require_once("src/classes/Web.php");
?>

 <!-- header -->
 <!DOCTYPE html>
<html lang="en">
  <head>
    <title>Articles | <?php echo web('web_title'); ?></title>

    <link rel="icon" href="../assets/images/logo/icon.png" type="image/png" sizes="16x16">

    <meta name="description" content="Math Corner blog articles by Math Corner">
    <meta name="keywords" content="math, Corner, blog, articles, by Math Corner, sojebsikder, math corner,">
    <meta name="author" content="sojebsikder">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
  <!--END header -->
<?php require_once("templates/navbar.php"); ?>
    
    <div class="hero-wrap js-fullheight" style="background-image: url('../assets/images/');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-12 ftco-animate">
          	<h2 class="subheading">Hello! Welcome to</h2>
          	<h1 class="mb-4 mb-md-0"><?php echo web("web_title");?> blog</h1>
          	<div class="row">
          		<div class="col-md-7">
          			<div class="text">
	          			<p>A None-Profit Organization For Develop Mathematic Skill.</p>
	          			<div class="mouse">
										<a href="#" class="mouse-icon">
											<div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
										</a>
									</div>
								</div>
          		</div>
          	</div>
          </div>
        </div>
      </div>
    </div>

   	<section class="ftco-section bg-light">
      <div class="container">
        <div class="row d-flex">

        <?php if(getPost()): ?>
					<?php foreach (getPost() as $row): ?>
            <?php
						$linkbyId ="blog-single.php?id={$row['id']}";
            //$linkbyName ="blog-single.php?id={$row['blog_id']}&name={$row['blog_name']}";
            $linkbyName ="article/{$row['blog_id']}/".urlencode($row['blog_name']);
						?>

          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">

            <?php if($row['image']): ?>
              <a href="<?php echo $linkbyName; ?>" class="block-20" style="background-image: url('../<?php echo $row['image']; ?>');">
            <?php else: ?>
              <a href="<?php echo $linkbyName; ?>" class="block-20" style="background-image: url('../assets/images/default/avatar.png');">
            <?php endif ?>

              <a href="<?php echo $linkbyName; ?>" class="block-20" style="background-image: url('<?php echo $row['image']; ?>');">
              </a>
              <div class="text p-4 float-right d-block">
              	<div class="topper d-flex align-items-center">
              		<div class="one py-2 pl-3 pr-1 align-self-stretch">
              			<span class="day"><?php echo Format::formatOnlyDate($row['blog_date']); ?></span>
              		</div>
              		<div class="two pl-0 pr-3 py-2 align-self-stretch">
              			<span class="yr"><?php echo Format::formatOnlyYear($row['blog_date']); ?></span>
              			<span class="mos"><?php echo Format::formatOnlyMonth($row['blog_date']); ?></span>
              		</div>
              	</div>
              	<h3 class="heading mb-3"><a href="<?php echo $linkbyName; ?>"><?php echo $row['blog_title']; ?></a></h3>
                <p><?php echo Format::textShorten($row['blog_description']); ?></p>
                <p><a href="<?php echo $linkbyName; ?>" class="btn-custom"><span class="ion-ios-arrow-round-forward mr-3"></span>Read more</a></p>
              </div>
            </div>
          </div>

          <?php endforeach ?>
    					<?php else: ?>
						<?php endif ?>


        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php require_once("templates/footer.php"); ?>
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>