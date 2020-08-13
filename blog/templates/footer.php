<?php
require_once("src/config/conn.php");
require_once("src/lib/Database.php");
require_once("src/classes/Blog.php");
require_once("src/helpers/Format.php");
require_once("src/classes/Web.php");
?>

<footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="logo"><a href="#"><?php echo web("web_title");?> <span>Blog</span></a></h2>
              <p>A None-Profit Organization For Develop Mathematic Skill.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">latest News</h2>

              <?php if(getLatestPost()): ?>
				    	<?php foreach (getLatestPost() as $getRecent): ?>
                <?php
                $linkbyId ="blog-single.php?id={$getRecent['id']}";
                //$linkbyName ="blog-single.php?id={$getRecent['blog_id']}&name={$getRecent['blog_name']}";
                $linkbyName ="article/{$getRecent['blog_id']}/".urlencode($getRecent['blog_name']);
                ?>

              <div class="block-21 mb-4 d-flex">

              <?php if($getRecent['image']): ?>
                <a class="img mr-4 rounded" style="background-image: url(../<?php echo $getRecent['image']; ?>);"></a>
              <?php else: ?>
                <a class="img mr-4 rounded" style="background-image: url(../assets/images/default/avatar.png);"></a>
              <?php endif ?>

	              
	              <div class="text">
	                <h3 class="heading"><a href="<?php echo $linkbyName; ?>"><?php echo $getRecent['blog_title']; ?></a></h3>
	                <div class="meta">
	                  <div><a href="#"></span><?php echo Format::formatDate($getRecent['blog_date']); ?></a></div>
	                  <div><a href="#"></span> <?php echo $getRecent['blog_author']; ?></a></div>
	                </div>
	              </div>
	            </div>

              <?php endforeach ?>
    					<?php else: ?>
						  <?php endif ?>


            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Information</h2>
              <ul class="list-unstyled">
                <li><a href="index.php" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Home</a></li>
                <li><a href="../about.php" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>About</a></li>
                <li><a href="blog.php" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Articles</a></li>
                <li><a href="../contact.php" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Gazipura, Gazipur, Bangladesh</span></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Maintain by <a href="https://sojebsoft.ml" target="_blank">SojebSoft</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>