<?php
include "inc/header.php";
?>


<div class="container text-white rounded">
    <div class="row">


    <table style="width: 100%;" class="table table-responsive table-dark table-hover">
  
        <tr>
            <th>Rank</th>
            <th>Name</th>
            <th>Points</th>
        </tr>
 

    <?php
        
        $querySub  = "SELECT * FROM leaderboard ORDER BY points DESC";
        $resultSub = $db->select($querySub);

        if($resultSub)
        {
            $i =0;
          while($submitted = $resultSub->fetch_assoc()){
            $i++;
            $username = $submitted['user_email'];

            $name = $db->select("SELECT * FROM register WHERE user_email='$username' ")->fetch_assoc();
    ?>
   
        <tr>
            <td><a><?php echo $i;?></a></td>
            <td><a href="profile.php?user=<?php echo $name['user_name'];?>"><?php echo $name['user_name'];?></a></td>
            <td><?php echo $submitted['points'];?></td>
        </tr>
    
 <?php      }
        } 
    ?>
    </table>

    </div>
</div>



<?php
include "inc/footer.php";
?>