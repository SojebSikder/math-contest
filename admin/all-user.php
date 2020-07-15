<?php
define('DIR','Math Contest');

include "header.php";
include "sidebar.php";
include("../classes/getFetch.php"); //error

$db = new Database();
$format = new Format();
?>

<?php

if(isset($_GET['actionActive'])){
    if(isset($_SESSION['admin_login'])){
    
        $id          = $format->Stext($_GET['actionActive']);
        $queryAction = "UPDATE register SET user_status = 'active' WHERE user_id = '$id' ";
        $actionRow   = $db->update($queryAction);
        header("Location:?msg=Activated");

    }else{
        echo "Your not eligble :(";
    }
  }

  if(isset($_GET['actionDeactive'])){
    if(isset($_SESSION['admin_login'])){

        $id          = $format->Stext($_GET['actionDeactive']);
        $queryAction = "UPDATE register SET user_status = 'deactive' WHERE user_id = '$id' ";
        $actionRow   = $db->update($queryAction);
        header("Location:?msg=Deactivated");

    }else{
        echo "Your not eligble :(";
    }
  }




  if(isset($_GET['actionDelete'])){
    if(isset($_SESSION['admin_login'])){
    
        $id          = $format->Stext($_GET['actionDelete']);
        $queryAction = "DELETE FROM register WHERE user_id = '$id' ";
        $actionRow   = $db->update($queryAction);
        header("Location:?msg=Deleted");

    }else{
        echo "Your not eligble :(";
    }
  }

?>


<div class="grid_10">

    <div class="box round first grid">
    <h2>All User</h2>
    <div class="block sloginblock">               
        <form method="POST" action="">
        
    <?php
    //Code for View Math Problems
    $username  = $_SESSION['admin_name'];
    $userlogin = $_SESSION['admin_login'];


    $query = "SELECT * FROM register ORDER BY user_status DESC";
    $read =$db->select($query);
    if($read)
    {

     ?>
        <table class="table table-responsive table-dark table-hover">
		
		<tr><!--Code for View Instructor User -->
			<th>User_name</th>
			<th>User_Email</th>
			<th>User_Status</th>
			<th>User_Id</th>
            <th>User_Registered</th>
            <th>Action</th>
		</tr>

		
		<?php

		while($row=$read->fetch_assoc()){

		?>

		
		<tr>
		    <td><?php echo $row['user_name']; ?></td>
			<td><?php echo $row['user_email']; ?></td>
            <td><?php echo $row['user_status']; ?></td>
            <th><?php echo $row['user_id']; ?></th>
            <td><?php echo Format::formatDate($row['user_registered']); ?></td>
            <td><?php
            if($row['user_status'] == "active"){
                echo "<a class='text-danger' href='?actionDeactive={$row['user_id']}'>Deactive</a>";
            }elseif($row['user_status'] == "deactive"){
                echo "<a class='text-success' href='?actionActive={$row['user_id']}'>Active</a>";
            }
                
             ?>|
             <a href=''>Edit</a>|
             <a href="?actionDelete=<?php echo $row['user_id']; ?>">Delete</a>
             </td>

		</tr>

        <?php }
        } ?>
		
		
	</table>

        </form>
    </div>
    </div>
</div>




<?php include "footer.php";?>