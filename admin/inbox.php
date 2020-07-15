<?php
include "header.php";
include "sidebar.php"; 

$db = new Database();
$format = new Format();
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Subject</th>
							<th>Message</th>
							<th>Action</th>
						</tr>
					</thead>
						<?php
						$sql = "SELECT * FROM contact";
						$contact = $db->select($sql);
						if($contact){
							$i = 0;
							while($contactRow = $contact->fetch_assoc())
							{
								$i++;
						?>
					<tbody>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $contactRow['name']; ?></td>
							<td><?php echo $contactRow['email']; ?></td>
							<td><?php echo $contactRow['subject']; ?></td>
							<td><?php echo $contactRow['message']; ?></td>
							<td><a name='get-report' data-toggle='modal' data-target='#myModal' 
							onclick="javascript:showUser(<?php  echo $contactRow['id'];?>)">Show</a> |<a href="">Edit</a> | <a href="">Delete</a></td>
						</tr>

					</tbody>
						<?php }

						} ?>
				</table>
               </div>
            </div>
		</div>
		



        <?php include "footer.php"; ?>