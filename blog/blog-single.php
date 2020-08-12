<?php
define("BASE", "");
define("URL", "../../");
//load up config file
require_once(BASE."src/config/conn.php");
require_once(BASE."src/lib/Database.php");
require_once(BASE."src/helpers/Format.php");
require_once(BASE."src/classes/User.php");
require_once(BASE."src/classes/Blog.php");
require_once(BASE."src/classes/Web.php");

$db = new Database();
$format = new Format();


if(isset($_REQUEST['id'])){
  $id = Format::Stext($_REQUEST['id']);
}

if(isset($_REQUEST['name'])){
  $name = Format::Stext($_REQUEST['name']);

  $getid = getBlogIdByBlogName($name);
}


if(isset($id) && isset($name)){

  $sql = "SELECT * FROM blog_post WHERE blog_name = '$name' AND blog_id = '$id' AND blog_status = 'Publish'";
  $dataDb = $db->select($sql);

  if($dataDb){
    $dataRow = $dataDb->fetch_assoc();
  }else{
    Format::goto(URL."templates/404.php");
  }

}else{
  Format::goto(URL."templates/404.php");
}

?>

 <!-- header -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $dataRow['blog_title']; ?> | <?php echo web('web_title'); ?></title>

<?php if($dataRow['image']): ?>
    <link rel="icon" href="<?php echo URL; ?>../<?php echo $dataRow['image']; ?>" type="image/png" sizes="16x16">
<?php else: ?>
  <link rel="icon" href="<?php echo URL; ?>../assets/images/logo/icon.png" type="image/png" sizes="16x16">
  <?php endif ?>
    <meta name="description" content="<?php echo Format::textShorten($format->Stext($dataRow['blog_description']));?>">
    <meta name="keywords" content="<?php echo $dataRow['blog_tag']; ?>">
    <meta name="author" content="<?php echo $dataRow['blog_author']; ?>">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo URL; ?>css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>css/animate.css">
    
    <link rel="stylesheet" href="<?php echo URL; ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo URL; ?>css/aos.css">

    <link rel="stylesheet" href="<?php echo URL; ?>css/ionicons.min.css">
    
    <link rel="stylesheet" href="<?php echo URL; ?>css/flaticon.css">
    <link rel="stylesheet" href="<?php echo URL; ?>css/icomoon.css">
    <link rel="stylesheet" href="<?php echo URL; ?>css/style.css">

  </head>
  <body>
  <!--END header -->

<!-- navbar -->
<nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="<?php echo URL; ?>index.php">Math Corner<i> Blog</i></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="<?php echo URL; ?>index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="<?php echo URL; ?>blog.php" class="nav-link">Articles</a></li>
			  <li class="nav-item"><a href="<?php echo URL; ?>../index.php" class="nav-link">Math Corner</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->



    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../assets/images/');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread"><?php echo $dataRow['blog_title']; ?></h1>
           
          </div>
        </div>
      </div>
    </section>

   <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 ftco-animate">
          	<p class="mb-5">
            <?php if($dataRow['image']): ?>
              <img src="<?php echo URL; ?>../<?php echo $dataRow['image']; ?>" alt="" class="img-fluid">
            <?php else: ?>
              <img src="<?php echo URL; ?>../assets/images/default/avatar.png" alt="" class="img-fluid">
            <?php endif ?>
            </p>
            <br>
              <a class="btn btn-primary" href="<?php echo URL; ?>category.php?cat=<?php echo $dataRow['blog_category']; ?>"><?php echo $dataRow['blog_category']; ?></a>
            <br>
            <h2 class="mb-3"><?php echo $dataRow['blog_title']; ?></h2>

            <p><?php echo $dataRow['blog_description']; ?></p>

			<div class="tag-widget post-tag-container mb-5 mt-5">
              <div class="tagcloud">

              <?php if(getBlogTagByPostId($getid)): ?>

              <?php 
                $tag = getBlogTagByPostId($getid);
                $tag = explode(",", $tag);
                foreach ($tag as $tags):
              ?>

                <a href="#" class="tag-cloud-link"><?php echo $tags; ?></a>
                <?php endforeach ?>

              <?php endif ?>
              </div>
            </div>
            
            <div class="about-author d-flex p-4 bg-light">
              <div class="bio mr-5">
                <img src="<?php echo URL; ?>../<?php echo getInsUserInfoById($dataRow['blog_author_id'],"ins_image"); ?>" class="img-fluid mb-4">
              </div>
              <div class="desc">
                <h3><?php echo $dataRow['blog_author']; ?></h3>
                <p><?php echo getInsUserInfoById($dataRow['blog_author_id'],"ins_bio"); ?></p>
              </div>
            </div>


            <div class="pt-5 mt-5">
              <h3 class="mb-5"><?php echo getCommentCountByPostId($dataRow['blog_id']); ?> Comments</h3>
              <ul class="comment-list">


              <?php if(isset($user_name) || isset($ins_name)): ?>

              <form class="clearfix" action="<?php echo URL; ?>comment.php" method="post" id="comment_form">
                <input type="hidden" value="<?php echo $getid; ?>" name="post_id">
                <textarea name="comment_text" required id="comment_text" class="form-control" cols="30" rows="3"></textarea>
                <button class="btn btn-primary btn-sm pull-right" type="submit" name="submitcomment" id="submit_comment">Submit comment</button>
              </form>
<br>
            <?php else: ?>
              <div class="well" style="margin-top: 20px;">
                <h4 class="text-center"><a href="../login.php">Sign in</a> to post a comment</h4>
              </div>
            <?php endif ?>


                <?php if(getCommentByPostID($dataRow['blog_id'])): ?>

                <?php foreach(getCommentByPostID($dataRow['blog_id']) as $getcomments): ?>

                <li class="comment">
                  <div class="vcard bio">

                  <?php if($getcomments['user_type'] == "user"):?>
                        <img src="<?php echo URL; ?>../<?php echo getUserInfoById($getcomments['user_id'], "user_image"); ?>">

                      <?php else: ?>
                        <img src="<?php echo URL; ?>../<?php echo getInsUserInfoById($getcomments['user_id'], "ins_image"); ?>">
                      <?php endif ?>

                  </div>
                  <div class="comment-body">
                    <h3>
                    <?php if($getcomments['user_type'] == "user"){
                      echo getUsernameById($getcomments['user_id']);

                    }elseif($getcomments['user_type'] == "instructor"){
                      echo getInsUserById($getcomments['user_id'])." (instructor)";

                    }elseif($getcomments['user_type'] == "admin"){
                      echo getInsUserById($getcomments['user_id'])." (admin)";
                    }
                      ?></h3>

                    <div class="meta mb-3"><?php echo Format::formatDate($getcomments['created_at']); ?></div>
                    <p><?php echo $getcomments['body']; ?></p>
                    <p><a href="#" class="reply">Reply</a></p>


                    <?php if($getcomments['user_type'] == "user"): ?>

                      <?php if($getcomments['user_id'] == $user_id): ?>
                        <p><a href="<?php echo URL; ?>comment.php?post_id=<?php echo $getid; ?>&del-comment=<?php echo $getcomments['comment_id']; ?>">Delete</a></p>
                      <?php else: ?>
                      <?php endif ?>

                    <?php else: ?>

                      <?php if($getcomments['user_id'] == $ins_id): ?>
                      <p><a href="<?php echo URL; ?>comment.php?post_id=<?php echo $getid; ?>&del-comment=<?php echo $getcomments['comment_id']; ?>">Delete</a></p>
                      <?php else: ?>
                      <?php endif ?>

                    <?php endif ?>


                    <?php if(isset($user_name) || isset($ins_name)): ?>

                    <form action="comment.php" method="post" class="reply_form clearfix" id="comment_reply_form_<?php echo $getcomments['comment_id']; ?>" data-id="<?php echo $getcomments['comment_id']; ?>">
                      <input type="hidden" value="<?php echo $getid; ?>" name="post_id">
                      <input type="hidden" value="<?php echo $getcomments['comment_id']; ?>" name="comment_id">
                      <textarea required class="form-control" name="reply_text" id="reply_text" cols="30" rows="2"></textarea>
                      <button class="btn btn-primary btn-xs pull-right submit-reply" type="submit" name="submitreply">Submit reply</button>
                    </form>
                    <?php else: ?>
                    <?php endif ?>
                  </div>

                  <?php if(getRepliesByCommentId($getcomments['comment_id'])): ?>
                    <?php foreach(getRepliesByCommentId($getcomments['comment_id']) as $reply): ?>

                  <ul class="children">
                    <li class="comment">
                      <div class="vcard bio">

                      <?php if($reply['user_type'] == "user"):?>
                        <img src="<?php echo URL; ?>../<?php echo getUserInfoById($reply['user_id'], "user_image"); ?>">

                      <?php else: ?>
                        <img src="<?php echo URL; ?>../<?php echo getInsUserInfoById($reply['user_id'], "ins_image"); ?>">
                      <?php endif ?>

                        
                      </div>
                      <div class="comment-body">

                      <?php if($reply['user_type'] == "user"):?>

                        <h3><?php echo getUserById($reply['user_id']); ?></h3>
                      <?php elseif($reply['user_type'] == "instructor"): ?>
                        <h3><?php echo getInsUserById($reply['user_id']); ?> (instructor)</h3>
                        <?php elseif($reply['user_type'] == "admin"): ?>
                          <h3><?php echo getInsUserById($reply['user_id']); ?> (admin)</h3>
                          
                      <?php endif ?>

                        <div class="meta mb-3"><?php echo Format::formatDate($reply['created_at']); ?></div>
                        <p><?php echo $reply['body']; ?></p>

                        <?php if($reply['user_type'] == "user"): ?>

                          <?php if($reply['user_id'] == $user_id): ?>
                            <p><a href="<?php echo URL; ?>comment.php?post_id=<?php echo $getid; ?>&del-rep-comment=<?php echo $reply['reply_id']; ?>">Delete</a></p>
                          <?php else: ?>
                          <?php endif ?>

                        <?php else: ?>

                          <?php if($reply['user_id'] == $ins_id): ?>
                          <p><a href="<?php echo URL; ?>comment.php?post_id=<?php echo $getid; ?>&del-rep-comment=<?php echo $reply['reply_id']; ?>">Delete</a></p>
                          <?php else: ?>
                          <?php endif ?>

                        <?php endif ?>
                       
                        
                      </div>
                  </ul>

                    <?php endforeach ?>
                  <?php endif ?>

                </li>
                <?php endforeach ?>
                <?php endif ?>
                
              </ul>
              <!-- END comment-list -->
              
              


            </div>

          </div> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
            <div class="sidebar-box">

            <!-- Advertising -->

            </div>
            <div class="sidebar-box ftco-animate">
              <div class="categories">
                <h3>Categories</h3>

                <?php if(getBlogCategory()): ?>
                <?php foreach (getBlogCategory() as $cat): ?>

                <li><a href="<?php echo URL; ?>category.php?cat=<?php echo $cat['cat_name']; ?>"><?php echo $cat['cat_name']; ?> <span class="ion-ios-arrow-forward"></span></a></li>
                
                <?php endforeach ?>
                <?php endif ?>

              </div>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Recent Blog</h3>

              <?php if(getLatestPost()): ?>
                <?php foreach(getLatestPost() as $latestPost): ?>

              <div class="block-21 mb-4 d-flex">

              <?php if($latestPost['image']): ?>
                <a class="blog-img mr-4" style="background-image: url(<?php echo URL; ?>../<?php echo $latestPost['image']; ?>);"></a>
              <?php else: ?>
                <a class="blog-img mr-4" style="background-image: url(<?php echo URL; ?>../assets/images/default/avatar.png);"></a>
              <?php endif ?>

                <div class="text">
                  <h3 class="heading"><a href="../<?php echo $latestPost['blog_id']; ?>/<?php echo $latestPost['blog_name']; ?>"><?php echo $latestPost['blog_title']; ?></a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> <?php echo Format::formatDate($latestPost['blog_date']); ?></a></div>
                    <div><a href="#"><span class="icon-person"></span> <?php echo $latestPost['blog_author']; ?></a></div>
                    <div><a href="#"><span class="icon-chat"></span> <?php echo getCommentCountByPostId($latestPost['blog_id']); ?></a></div>
                  </div>
                </div>
              </div>

                <?php endforeach ?>
              <?php endif ?>

                <!-- advertising -->
            


          </div>

        </div>
      </div>
    </section> <!-- .section -->



<!-- Footer -->

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
                $linkbyName ="../{$getRecent['blog_id']}/{$getRecent['blog_name']}";
                ?>

              <div class="block-21 mb-4 d-flex">

              <?php if($getRecent['image']): ?>
                <a class="img mr-4 rounded" style="background-image: url(<?php echo URL; ?>../<?php echo $getRecent['image']; ?>);"></a>
              <?php else: ?>
                <a class="img mr-4 rounded" style="background-image: url(<?php echo URL; ?>../assets/images/default/avatar.png);"></a>
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
                <li><a href="<?php echo URL; ?>../about.php" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>About</a></li>
                <li><a href="<?php echo URL; ?>blog.php" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Articles</a></li>
                <li><a href="<?php echo URL; ?>../contact.php" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>Contact</a></li>
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

<!-- End Footer-->
    

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="<?php echo URL; ?>js/jquery.min.js"></script>
  <script src="<?php echo URL; ?>js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo URL; ?>js/popper.min.js"></script>
  <script src="<?php echo URL; ?>js/bootstrap.min.js"></script>
  <script src="<?php echo URL; ?>js/jquery.easing.1.3.js"></script>
  <script src="<?php echo URL; ?>js/jquery.waypoints.min.js"></script>
  <script src="<?php echo URL; ?>js/jquery.stellar.min.js"></script>
  <script src="<?php echo URL; ?>js/owl.carousel.min.js"></script>
  <script src="<?php echo URL; ?>js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo URL; ?>js/aos.js"></script>
  <script src="<?php echo URL; ?>js/jquery.animateNumber.min.js"></script>
  <script src="<?php echo URL; ?>js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?php echo URL; ?>js/google-map.js"></script>
  <script src="<?php echo URL; ?>js/main.js"></script>
    


    <script>
    $(document).on("click",".reply",function(e){
      e.preventDefault();

      var comment_id = $(this).data('id');

      $(this).parent().siblings('form#comment_reply_form_' + comment_id).toggle(500);
    });
    </script>

  </body>
</html>