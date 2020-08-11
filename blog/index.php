<?php
require_once("src/config/conn.php");
require_once("src/lib/Database.php");
require_once("src/classes/Blog.php");
require_once("src/helpers/Format.php");
require_once("src/classes/Web.php");
?>

<?php require_once("templates/header.php"); ?>
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

   	<section class="ftco-section">
   		<div class="container">
   			<div class="row">
   				<div class="col-md-12">

				   <?php if(getPost()): ?>
					<?php foreach (getPost() as $row): ?>

					<?php
						$linkbyId ="blog-single.php?id={$row['id']}";
						//$linkbyName ="blog-single.php?id={$row['blog_id']}&name={$row['blog_name']}";
						$linkbyName ="article/{$row['blog_id']}/{$row['blog_name']}";
					?>

   					<div class="case">
   						<div class="row">
   							<div class="col-md-6 col-lg-6 col-xl-8 d-flex">

							   <?php if($row['image']): ?>
								<a href="<?php echo $linkbyName; ?>" class="img w-100 mb-3 mb-md-0" style="background-image: url(../<?php echo $row['image']; ?>);"></a>
							   <?php else: ?>
								<a href="<?php echo $linkbyName; ?>" class="img w-100 mb-3 mb-md-0" style="background-image: url(../assets/images/default/avatar.png);"></a>
							   <?php endif ?>
   								
   							</div>
   							<div class="col-md-6 col-lg-6 col-xl-4 d-flex">
   								<div class="text w-100 pl-md-3">
   									<span class="subheading"><?php echo $row['blog_category']; ?></span>
   									<h2><a href="<?php echo $linkbyName; ?>"><?php echo $row['blog_title']; ?></a></h2>
   									<ul class="media-social list-unstyled">
			                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
			              </ul>
   									<div class="meta">
   										<p class="mb-0"><a href="#"><?php echo Format::formatDate($row['blog_date']); ?></a></p>
   									</div>
   								</div>
   							</div>
   						</div>
   					</div>

					   <?php endforeach ?>
    					<?php else: ?>
						<?php endif ?>


   				</div>
   			</div>
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