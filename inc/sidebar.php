<!--<form action="" method="post" enctype="multipart/form-data">-->
<?php
//creatinf object
  $format = new Format();
  $db = new Database();
    
  ?>
<div class="container-fluid">
<div class="row">

 <div class="col-xs-12 col-md-2">
 <div class="col-xs-12 col-md-12 container-fluid bg-dark text-white rounded" style="padding-top:10px;padding-bottom:10px">
    <h4>Last Winner!</h4>
    <hr>
    <div>
    <p>Daily Math Challenge</p>
    <hr>
    <?php 
    $query = "SELECT * FROM winner_list WHERE ans_cat = 'Daily Math Challenge'";
    $GetDataWin =$db->select($query);

    if($GetDataWin){

    while($rowWinner = $GetDataWin->fetch_assoc()){

        $uniqueId = $rowWinner['winner_id'];

        $queryWinner   = "SELECT * FROM answere where ans_cat = 'Daily Math Challenge' AND user_unique_id='$uniqueId'";
        $GetDataWinner = $db->select($queryWinner);

        $rowsWinner = $GetDataWinner->fetch_assoc();
        $un         = $rowsWinner['user_name'];
        echo "<p><a href='profile.php?user=$un'>$un</a></p>";
    }
  }else {
    echo "No Winner had delcare yet!";
  }
    ?>
    <p>Weekly Math Challenge</p>
    <hr>
    <?php 
    $query = "SELECT * FROM winner_list WHERE ans_cat = 'Weekly Math Challenge'";
    $GetDataWin =$db->select($query);

    if($GetDataWin){

    while($rowWinner = $GetDataWin->fetch_assoc()){

        $uniqueId = $rowWinner['winner_id'];

        $queryWinner   = "SELECT * FROM answere where ans_cat = 'Weekly Math Challenge' AND user_unique_id='$uniqueId'";
        $GetDataWinner = $db->select($queryWinner);

        $rowsWinner = $GetDataWinner->fetch_assoc();
        $un         = $rowsWinner['user_name'];
        echo "<p><a href='profile.php?user=$un'>$un</a></p>";
    }
  }else {
    echo "No Winner had delcare yet!";
  }
    ?>
    


    </div>
 </div>
<br>
 <div class="col-xs-12 col-md-12 container-fluid bg-dark text-white rounded" style="padding-top:10px;padding-bottom:10px">
    <h4>Past Problem</h4>
    <hr>
    <div>
    
  <?php
    //Code for View Math Problems
   // $username = $_SESSION['ins_name'];
   // $userlogin = $_SESSION['ins_login'];

    $cat=$format->Stext($_REQUEST['CategoryID']);
    //$link=strip_tags($_REQUEST['LinkID']);
  

    $query = "SELECT * FROM post where category='$cat' ORDER BY id DESC";
    $read  = $db->select($query);

    if($cat == "Daily Math Challenge")
    {
      echo "<p>Problems of Daily Math Challenge</p>";
    }
    elseif($cat == "Weekly Math Challenge")
    {
      echo "<p>Problems of Weekly Math Challenge</p>";
    }

//echo "<div class='card'>";
//echo "<div class='card-body'>";

echo "<div class='card-header'>";
    if(mysqli_num_rows($read) > 0)
    {
      while($row=$read->fetch_assoc()){
    
     ?>
       
    <?php 
     echo "<a class='card-link' href='problem.php?CategoryID={$row['category']}&LinkID={$row['problem']}'> {$row['post_title']} <a><br>";  
    ?>

<?php }
    }?>
    <?php 
    echo "</div>";
    //echo "</div>";
    //echo "</div>";
    ?>
<br>
  <hr>
        <a class="text-danger" href="">See all problems</a>
    </div>
 </div>

 </div>
<!--</form>-->