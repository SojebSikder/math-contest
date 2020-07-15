<?php include "header.php"; 
include "sidebar.php"; 

$db = new Database();
$format = new Format();

if(isset($_GET['del'])){
	$id       = $format->Stext($_GET['del']);
	$queryDel = "DELETE FROM post WHERE problem='$id'";
	$delRow   = $db->delete($queryDel);

	Format::jumpTo("postlist.php", "Deleted");
  }

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                   

<?php
    //Code for View Math Problems
    $username = $_SESSION['admin_name'];
    $userlogin = $_SESSION['admin_login'];


    $query = "SELECT * FROM post order by id desc";
    $read =$db->select($query);
    if($read)
    {
    if(mysqli_num_rows($read) > 0)
    {

     ?>
		<table class="table table-responsive table-dark table-hover">
		<thead>
		<tr><!--Code for View Problem -->
		<th>Problem ID</th>
			<th>Title</th>
			<th>Content</th>
			<th>Image</th>
			<th>Category</th>
			<th>Answere Submitted</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		</thead>
		
		<?php

		while($row=$read->fetch_assoc()){
			$image = $row['post_image'];

			$ans_cat = $row['category'];
			$ans_linkid = $row['problem'];

			//GEt submitted answere
			$querySub ="SELECT * FROM answere WHERE ans_cat='$ans_cat' AND ans_linkid='$ans_linkid'";
			$resultSub =$db->select($querySub);// mysqli_query($conn,$query);
			//checking query error
		
			if($resultSub)
			{
			$total_answere=mysqli_num_rows($resultSub);
			//mysqli_free_result($resultSub);
			}
			else{
			$total_answere =0;
			}

			
			// end code for getting submitted answree

		?>
		<tbody>
		
		<tr>
		<td><?php echo "<a href='problem.php?CategoryID={$row['category']}&LinkID={$row['problem']}'> {$row['problem']} <a>" ?></td>
			<td><?php echo "<a href='problem.php?CategoryID={$row['category']}&LinkID={$row['problem']}'> {$row['post_title']} <a>" ?></td>
			<td><?php echo $row["post_content"]; ?></td>
			<td><?php echo "<img class='rounded img-thumbnail img-fluid' width='100' height='100' src='../$image' alt='Image not available'>";?></td>
			<td><?php echo $row["category"]; ?></td>
			<td><?php
			
				echo $total_answere;
			
			?></td>
			<td> <?php echo "<a href='edit-panel.php?editID={$row['problem']}'>Edit</a>" ?> </td>
			<td><a onclick="return confirm('Are you sure to delete (this cannot be undone)')" href=<?php echo "'?del={$row['problem']}'>Delete</a>";?>
			</td>
		</tr>

		<?php } ?>
		</tbody>
		
	</table>
		<?php 
		} }else{
		echo "No data"; //cheking result data
		}?>


	
               </div>
            </div>
        </div>
	
		<?php include "footer.php"; ?>