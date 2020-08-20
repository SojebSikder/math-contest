<!--footer-->
<?php 
$db = new Database();
$format = new Format();

$sql     = "SELECT * FROM web";
$aboutus = $db->select($sql);
if($aboutus){
  $info        = $aboutus->fetch_assoc();
  $contactInfo = $format->Stext($info['contact_us'],"<br>");
}

$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//for newsletter
if(isset($_POST['newssubmit'])){
  $email = $format->Stext($_POST['news-email']);
  $ip   = $_SERVER['REMOTE_ADDR'];

  $newsletter = $db->insert("INSERT INTO newsletter(email, ip) VALUES('$email' ,'$ip')");

  if($newsletter){
    Format::goto("http://".$url);
  }
}
?>

<br>
<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 footer-info">
          <h3><?php echo web("web_title");?></h3>
          <hr>

        </div>
        <div class="col-lg-2 col-md-6 footer-link">
          <h4>Useful links</h4>
          <ul>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="about.php">About</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 footer-contact">
          <h4>Contact Us</h4>
          <p>
            <?php echo $contactInfo; ?>
          </p>
         
        </div>
        <div class="col-lg-3 col-md-6 footer-newsletter">
          <h4>Our Newsletter</h4>
          <h6>We will let you know new contest and blogs. Subscribe now!</h6>
          <p>_______________________________________</p>
          <form action="" method="post">
            <input type="email" name="news-email" id="" placeholder="E-Mail"><input type="submit" name="newssubmit" value="Subscribe">
          </form>
        </div>
      </div>
    </div>
  </div>
<div class="container">
  <div class="copyright">
    &copy; Copyright <strong>SojebSoft</strong>. All Rights Reserved
  </div>
  <div class="credits">
  Maintain by <a href="http://sojebsoft.ml">SojebSoft</a>
</div>
</div>
</footer>

</body>
</html>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5f12bb4ea45e787d128baa95/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<?php 
ob_end_flush();
?>