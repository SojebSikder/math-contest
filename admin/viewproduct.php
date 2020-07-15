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
            <h2>View Products</h2>
            <div class="block"> 

             <form action="" method="POST" enctype="multipart/form-data">

                <div class="m-input-group">
                    <input type="text" class="m-form-control">
                    <label>Search</label>
                </div>
                
                <table class="table table-border table-dark table-responsive">

                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Url</th>
                        <th>Action</th>
                    </tr>

                <?php 
                    $getorders = $db->select("SELECT * FROM product");
                    if($getorders){
                        while ($orderRow = $getorders->fetch_assoc()) {   
                ?>
                    <tr>
                        <td><?php echo $orderRow['product_id'];?></td>
                        <td><?php echo $orderRow['name'];?></td>
                        <td><?php echo $orderRow['price'];?></td>
                        <td><?php echo $orderRow['description'];?></td>
                        <td><img class="m-img m-img-thumbnail" src="../<?php echo $orderRow['image'];?>" alt=""></td>
                        <td><?php echo $orderRow['url'];?></td>
                        <td><a href="">Edit</a>|<a href="?del=<?php echo $orderRow['product_id'];?>">Delete</a></td>
                    </tr>

                <?php   } 
                    } ?>
                
                </table>
            

                </form>
            </div>
        </div>
    </div>


<?php include "footer.php"; ?>