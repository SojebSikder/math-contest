<?php include "inc/header.php"; ?>
<link rel="stylesheet" href="css/login.css">

<?php
$format = new Format();
$db = new Database();
//Get data
    $cat  = $format->Stext($_REQUEST['CategoryID']);
    $link = $format->Stext($_REQUEST['LinkID']);


    //If available link and cat
    if($cat == null)
    {
        header("location: index.php");
    }
    elseif($link == null)
    {
        header("location: index.php");
    }

    //End that link and cat ability

    $username = isset($_SESSION['name']);
    
    $query = "SELECT * FROM post where category='$cat' AND problem='$link'";
    $GetData = $db->select($query)->fetch_assoc();

// </>

?>

<style>
   
label {
   cursor: pointer;
   /* Style as you please, it will become the visible UI component. */
}

#upload-photo ,#savebtn{
   opacity: 0;
   position: absolute;
   z-index: -1;
}

</style>

<?php include "inc/sidebar.php"; ?>


 <div class="col-xs-12 col-md-10 container-fluid bg-dark text-white rounded" style="padding-top:70px;padding-bottom:70px">
 <h2><?php echo $GetData['post_title']?></h2>
 <p><?php echo $GetData['category']?> - <?php echo Format::formatDate($GetData['post_date']);?></p>
 <p>Posted By - <?php echo $GetData['post_author'];?></p>
<hr>
    <div class="form-group">

    <div class="card text-primary">
        <div class="card-body">

        <p><?php echo $GetData['post_content']?></p><br>
        
        </div>
        </div>

    </div>

    <div class="form-group">
        <p><img class="left-block float-right img-thumbnail" style="max-width: 50%;height: 30rem;" src="<?php echo $GetData['post_image']?>" alt=""></p><br>
    </div>

    <p></p>
    <p></p>
       <?php echo "<a href='submitanswer.php?CategoryID=$cat&LinkID=$link' class='btn btn-success'>Submit Answere</a>";?>

<br>
<br>
    <p>Immediately after your answere is submitted, your name will be posted here</p>  

    <table style="width: 50%;" class="table table-responsive table-dark table-hover">
  
        <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Status</th>
            <th>Submitted</th>
            <th>Date</th>
        </tr>
 

    <?php
        
        $querySub  = "SELECT * FROM submitted where ans_cat = '$cat' AND ans_linkid = '$link' order by id desc";
        $resultSub = $db->select($querySub);

        if($resultSub)
        {
            $i =0;
          while($submitted = $resultSub->fetch_assoc()){
            $i++;
            
            $user_uniq = $submitted['user_unique_id'];

            $queryData  = "SELECT * FROM register WHERE user_id='$user_uniq'";
            $resultData = $db->select($queryData);
            if($resultData){
                $resultData = $resultData->fetch_assoc();
            }
            

    ?>
   
        <tr>
            <td><?php echo $i ?></td>
            <td><a href="profile.php?user=<?php echo $resultData['user_name']; ?>"><?php echo $resultData['user_name']; ?></a></td>

            <td><a class="text-success">
            <?php
            //Checking answere
            $queryCheck   = "SELECT * FROM post where category = '$cat' AND problem = '$link'";
            $GetDataCheck = $db->select($queryCheck)->fetch_assoc();

            if($submitted['user_ans'] == $GetDataCheck['post_ans']){
                echo "<a class='text-success'>Accepted</a>";
            }
             else{
                echo "<a class='text-danger'>Not Accepted</a>";
             }

             //End checking answere
            ?>
            </a></td>

            <td><?php
             $email = $submitted['user_email'];
             $queryTimes  = "SELECT * FROM submitted where user_email='$email' AND ans_cat = '$cat' AND ans_linkid = '$link' order by id desc";
             $resultTimes = $db->select($queryTimes);

             if($resultTimes){
                echo mysqli_num_rows($resultTimes);
             }
             ?></td>

            <td><?php echo Format::formatDate($submitted['date']); ?></td>
        </tr>
    
 <?php }
    }?>
    </table>
 

  </div>

</div>
</div>



<?php include "inc/footer.php"; ?>
