<?php include "inc/header.php"; ?>

<?php 
$db = new Database();
$format = new Format();

$sql     = "SELECT * FROM web";
$aboutus = $db->select($sql);
if($aboutus){
  $info      = $aboutus->fetch_assoc();
  $aboutInfo = $format->Stext($info['about_us']);
}
?>

<div class="container-fluid">
  <div id="section1" class="container-fluid bg-dark text-white rounded" style="padding-top:70px;padding-bottom:70px">
  <center><h1>About Us</h1></center>
  <hr class="bg-white">

  <ul>
  <h3><?php echo $aboutInfo; ?></h3>
  </ul>

</div>


</div>


<?php include "inc/footer.php"; ?>
