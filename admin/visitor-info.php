<?php 
include "header.php"; 
include "sidebar.php";


$db = new Database();
$format = new Format();

function getProductById($id, $row){
    global $db;

    $result = $db->select("SELECT * FROM product WHERE product_id='$id' ");
    return $result->fetch_assoc()[$row];
}


if(isset($_REQUEST['del'])){
   $id = $format->Stext($_REQUEST['del']);

   unlink("../".getProductById($id, "image"));
   unlink("../".getProductById($id, "url"));

   $db->delete("DELETE FROM product WHERE product_id = '$id' ");

   Format::jumpTo("viewproduct.php", "Deleted...");
}
?>


<div class="grid_10">
		
        <div class="box round first grid">
            <h2>View Visitor Info</h2>
            <div class="block"> 

             <form action="" method="POST" enctype="multipart/form-data">

                <table class="table table-border table-dark table-responsive">

                    <tr>
                        <th>SL no.</th>
                        <th>IP</th>
                        <th>Action</th>
                    </tr>

                <?php 
                    $getorders = $db->select("SELECT * FROM visitor");
                    if($getorders){
                        $i = 0;
                        while ($orderRow = $getorders->fetch_assoc()) {  
                            $i++; 
                ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $orderRow['ip'];?></td>
                        <td>Block</td>
                    </tr>

                <?php   } 
                    } ?>
                
                </table>
            

                </form>
            </div>
        </div>
    </div>


<?php include "footer.php"; ?>