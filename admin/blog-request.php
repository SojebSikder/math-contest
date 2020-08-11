<?php
define('DIR','Math Contest');

include "header.php";
include "sidebar.php";
include("../classes/getFetch.php"); //error

$db = new Database();
$format = new Format();


if(isset($_GET['actionActive'])){
    if(isset($_SESSION['admin_login'])){
    
        $id          = $format->Stext($_GET['actionActive']);
        $queryAction = "UPDATE blog_post SET blog_status = 'Publish' WHERE blog_id = '$id' ";
        $actionRow   = $db->update($queryAction);
        header("Location:?msg=Activated");

    }else{
        echo "Your not eligble :(";
    }
  }

  if(isset($_GET['actionDeactive'])){
    if(isset($_SESSION['admin_login'])){

        $id          = $format->Stext($_GET['actionDeactive']);
        $queryAction = "UPDATE blog_post SET blog_status = 'Unpublish' WHERE blog_id = '$id' ";
        $actionRow   = $db->update($queryAction);
        header("Location:?msg=Deactivated");

    }else{
        echo "Your not eligble :(";
    }
  }

  

  if(isset($_GET['actionDelete'])){
    if(isset($_SESSION['admin_login'])){
    
        $id          = $format->Stext($_GET['actionDelete']);
        $queryAction = "DELETE FROM blog_post WHERE blog_id = '$id' ";
        $actionRow   = $db->update($queryAction);
        header("Location:?msg=Deleted");

    }else{
        echo "Your not eligble :(";
    }
  }

?>


<div class="grid_10">

    <div class="box round first grid">
    <h2>Blog Request</h2>
    <div class="block sloginblock">               
        <form method="POST" action="">
        
    <?php
    //Code for View Math Problems
    $username  = $_SESSION['admin_name'];
    $userlogin = $_SESSION['admin_login'];


    $query = "SELECT * FROM blog_post ORDER BY id DESC";
    $read =$db->select($query);
    if($read)
    {

     ?>
        <table class="table table-responsive table-dark table-hover">
		
		<tr><!--Code for View Instructor User -->
            <th>SL No.</th>
			<th>User_name</th>
            <th>Blog Title</th>
            <th>Blog Description</th>
			<th>User_Status</th>
			<th>User_Id</th>
            <th>Blog Created</th>
            <th>Action</th>
		</tr>

		
		<?php
        $i = 0;
		while($row=$read->fetch_assoc()){
            $i++;
		?>

		
		<tr>
            <td><?php echo $i; ?></td>
		    <td><?php echo $row['blog_author']; ?></td>
            <td><?php echo $row['blog_title']; ?></td>
            <td><?php echo $format->Stext(Format::textShorten($row['blog_description'])); ?></td>
            <td><?php echo $row['blog_status']; ?></td>
            <th><?php echo $row['blog_author_id']; ?></th>
            <td><?php echo Format::formatDate($row['created_at']); ?></td>
            <td><?php
            if($row['blog_status'] == "Publish"){
                echo "<a class='text-danger' href='?actionDeactive={$row['blog_id']}'>Deactive</a>";
            }elseif($row['blog_status'] == "Unpublish"){
                echo "<a class='text-success' href='?actionActive={$row['blog_id']}'>Active</a>";
            }
                
             ?>|
             <a href=''>Edit</a>|
             <a href="?actionDelete=<?php echo $row['blog_id']; ?>">Delete</a>
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