<!--footer-->
<?php 
$db = new Database();
$format = new Format();

$sql     = "SELECT * FROM web";
$aboutus = $db->select($sql);
if($aboutus){
  $info      = $aboutus->fetch_assoc();
  $contactInfo = $format->Stext($info['contact_us'],"<br>");
}
?>

<br>
<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 footer-info">
          <h3>Math Contest</h3>
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
          <p>_______________________________________</p>
          <form action="" accept="" method="post">
            <input type="email" name="email" id="" placeholder="E-Mail"><input type="submit" value="Subscribe">
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

<?php 
ob_end_flush();
?>