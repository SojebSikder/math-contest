<?php include "inc/header.php"; ?>

<div class="container-fluid">
  <div id="section1" class="container-fluid bg-dark text-white rounded" style="padding-top:70px;padding-bottom:70px">
  <center><h1>Contact Us</h1></center>
  <hr class="bg-white">


  <div class="container" >
    <div class="col-md-5" style="float: none; margin: 0 auto;">
      <div class="form-area">
        <form method="post" action="">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> Contact Form</h3>

          <div class="m-input-group">
            <input type="text" class="m-form-control" autocomplete="off" id="name" name="name" required autofocus="">
            <label>Name</label>
          </div>

          <div class="m-input-group">
            <input type="email" class="m-form-control" autocomplete="off" id="email" name="email" required>
            <label>Email</label>
          </div>     

          <div class="m-input-group">
            <input type="Number" class="m-form-control" autocomplete="off" id="mobile" name="mobile">
            <label>Mobile Number</label>
          </div>

          <div class="m-input-group">
            <input type="text" class="m-form-control" autocomplete="off" id="subject" name="subject">
            <label>Subject</label>
          </div>

          <div class="m-input-group">
           <textarea class="m-form-control" type="textarea" id="message" name="message" maxlength="140" rows="7"></textarea>
           <label>Message</label>

           <span class="help-block"><p id="characterLeft" class="help-block">Max Character length : 140 </p></span> 
          </div> 

          <input type="submit" name="submit" id="submit" class="m-btn waves-effect m-btn-block"/>    
        </form>

        
      </div>
    </div>
      
    </div>


  <ul>
    <li><a href="<?php echo tb_link("Facebook", "link"); ?>"><?php echo tb_link("Facebook" ,"title"); ?></a></li>
    <li><strong>E-mail</strong>: <?php echo web("email"); ?></li>
    <li><address><?php echo web("address"); ?></address></li>
  </ul>


</div>

</div>
<?php
//Sending contact
$db = new Database();
$format = new Format();

  if (isset($_POST['submit'])){     
    
    $Name      = $format->Stext($_POST['name']);
    $Email_Id  = $format->Stext($_POST['email']);
    $Mobile_No = $format->Stext($_POST['mobile']);
    $Subject   = $format->Stext($_POST['subject']);
    $Message   = $format->Stext($_POST['message']);


    $query = "INSERT into contact(name, email, mobile, subject, message)
     VALUES('$Name', '$Email_Id', '$Mobile_No', '$Subject', '$Message')";

    $success = $db->insert($query);
    
    if (!$success){
      echo "Something wrong ";
    }
    
  }

?>



<?php include "inc/footer.php"; ?>
