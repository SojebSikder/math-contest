<?php include "inc/header.php"; ?>

<div class="container-fluid">
  <div id="section1" class="container-fluid bg-dark text-white rounded" style="padding-top:70px;padding-bottom:70px">
  <center><h1>Welcome to The Math Contest</h1></center>
  <p>Hello welcome to the math contest. Here you find many math challanges!.</p>

  <div class="alert alert-dark">
  <center>

<!--
          <div class="m-dropdown">
            <span>Mouse over me</span>
            <div class="m-dropdown-content">
              <p>Hello World!</p>
            </div>
        </div>
-->
    <h2>Solve Problems</h2>
    <?php
      if(($GetDatawCon) || ($GetDataCon) )
      {
        ?>

<a href="problem.php?CategoryID=Daily Math Challenge&LinkID=<?php echo $GetData['problem']; ?>"><span  class ="m-btn waves-effect"><strong>Daily Math Challange</strong></span></a>
<a href="problem.php?CategoryID=Weekly Math Challenge&LinkID=<?php echo $GetDataw['problem']; ?>"><span  class ="m-btn waves-effect"><strong>Weekly Math Challange</strong></span></a>

<!--
  <a href="problem.php?CategoryID=Daily Math Challenge&LinkID=<?php echo $GetData['problem']; ?>"><span class="border border-secondary"><strong>Daily Math Challange</strong></span></a>
  <a href="problem.php?CategoryID=Weekly Math Challenge&LinkID=<?php echo $GetDataw['problem']; ?>"><span class="border border-secondary"><strong>Weekly Math Challange</strong></span></a>
-->
  </center>
  <?php
       }
       else{
         echo "Currently no problem have submitted";
       }
  ?>
  </div>

  <ul>
  <li><strong>Daily Math Challange</strong>: New problem will apear everyday 10pm Central</li>
  <li><strong>Weekly Math Challange</strong>: New problem will apear every thursday 10pm Central</li>
  </ul>

  <h3>How it works!</h3>
  <ul>
  <li>To submit an answere to a problem, you must <a href="register.php"><strong>register a account</strong></a></li>
  <li>You can earn daily & weekly points. </li>
  </ul>

  <h3>Rules! (You need to know)</h3>
  <ul>
  <li>You need to have a account </li>
  <li>If you play Daily Math Category you will get 2 points</li>
  <li>If you play Weekly Math Category you will get 5 points</li>
  </ul>

</div>
<br>
<div id="section1" class="container-fluid bg-dark text-white rounded" style="padding-top:70px;padding-bottom:70px">
  <center><h1>Are you an Instructor!</h1></center>
  <p>If you are a teacher or a math nerd then you can create math contest from here!.</p>

  <div class="alert alert-dark">
  <center>
    <h2>Begin from here</h2>
  <a href="instructor.php"><span class="m-btn waves-effect"><strong>Login as a instructor</strong></span></a>
  <a href="instructor-register.php"><span  class ="m-btn waves-effect"><strong>Register as a instructor</strong></span></a>
  </center>
  </div>

  

  <h3>How it works!</h3>
  <ul>
  <li>To create math contest problem , you must <a href="instructor-register.php"><strong>register a account as a instructor</strong></a></li>
  <li>Your created contest problem will be live after you submit your contest problem from <a href="instructor-panel.php"><strong>Instructor Panel</strong></a></li>
  </ul>

</div>




</div>



<?php include "inc/footer.php"; ?>