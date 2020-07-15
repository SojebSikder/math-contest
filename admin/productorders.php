<?php 
include "header.php"; 
include "sidebar.php";
include "../classes/shop.php";
include "../classes/getFetch.php";

$format = new Format();

if(isset($_REQUEST['id'])){

    $productid = $format->Stext($_REQUEST['id']);
    $useremail = $format->Stext($_REQUEST['username']);
    $transid = $format->Stext($_REQUEST['transID']);

    $getordersinfo = $db->select("SELECT * FROM orders WHERE product_id = '$productid' AND b_trans ='$transid' AND username='$useremail' ");

    if($getordersinfo){
       $rowinfo = $getordersinfo->fetch_assoc();

        $name = $rowinfo['username'] ;
        $message = "Dear, $name Your order process have completed. Please check your email in 10 minutes to get your product";
        $message = $format->Stext($message,"<a>");
        sendNotification($message,$name);

        $db->update("UPDATE orders SET status = 1 
        WHERE product_id='$productid' AND b_trans ='$transid' AND username = '$useremail' ");

        Format::jumpTo("productorders.php", 'done');
    }

}


?>

<div class="grid_10">
		
        <div class="box round first grid">
            <h2>View Orders</h2>
            <div class="block"> 

             <form action="" method="POST" enctype="multipart/form-data">
                
                <div class="m-justify">
                    <div class="m-card">
                    <div class="m-card-body">
                    <h4>Search By TransectionID</h4>

                        <div class="m-input-group">
                            <input type="text" class="m-form-control text-dark">
                            <label>Search</label>
                        </div>

                        <input class="m-btn waves-effect m-btn-block" type="submit" value="Search">

                    </div>
                    </div> 
                </div>
             

                <table class="table table-border table-dark table-responsive">

                    <tr>
                        <th>Status</th>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Buyer</th>
                        <th>bKash Number</th>
                        <th>bKash TransectionID</th>
                        <th>Action</th>
                    </tr>

                <?php 
                    $getorders = $db->select("SELECT * FROM orders ORDER BY status");
                    if($getorders){
                        while ($orderRow = $getorders->fetch_assoc()) {   
                ?>
                    <tr>
                        <td><?php if($orderRow['status'] == 0){
                            echo "<a class='text-danger'>Pending</a>";                            
                        }elseif($orderRow['status'] == 1){
                            echo "<a class='text-success'>Completed</a>";   
                        }?></td>
                        <td><?php echo $orderRow['product_id'];?></td>
                        <td><?php echo $orderRow['name'];?></td>
                        <td><?php echo getProductPriceById($orderRow['product_id']);?>TK</td>
                        <td><?php echo $orderRow['username'];?></td>
                        <td><?php echo $orderRow['b_number'];?></td>
                        <td><?php echo $orderRow['b_trans'];?></td>
                        <td><?php if($orderRow['status'] == 0){?>
                         <a href="?id=<?php echo $orderRow['product_id'];?>&transID=<?php echo $orderRow['b_trans'];?>&username=<?php echo $orderRow['username'];?>">Complete</a></td>
                        <?php                            
                        }elseif($orderRow['status'] == 1){?>

                        <?php }?>
                       
                    </tr>

                <?php   } 
                    } ?>
                
                </table>
            

                </form>
            </div>
        </div>
    </div>


<?php include "footer.php"; ?>