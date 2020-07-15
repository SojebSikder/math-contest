<?php
include "inc/header.php";

$db = new Database();
$format = new Format();


?>




    <div class="m-justify">
        <div class="m-card">
            <div class="m-card-body">
           <form method="post" enctype="multipart/form-data"> 

           <input class="m-btn m-sb-triggar" value="show" type="button">
           <div class="m-snackbar">
                Hello im snackbar
           </div>



                <h3>JSON File </h3>
                <hr>
                <label class="m-btn" for="fl">Browse</label>
                <input id="fl" class="m-hidden" type="file" name="jsonFile">

                <label class="m-btn" for="sb">Import</label>
                <input class="m-hidden" id="sb" type="submit" value="import" name="btnimport">

        
            </form>  
            </div>
        </div> 
    </div>



    <div class="m-justify">
        <div class="m-card">
            <div class="m-card-body">

                <table class="table">
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Description</th>
                    </tr>

                <?php

                    if(isset($_POST['btnimport'])){

                        copy($_FILES['jsonFile']['tmp_name'], 'jsonFiles/'.$_FILES['jsonFile']['name']);
                        $data = file_get_contents('jsonFiles/'.$_FILES['jsonFile']['name']);
                        $product = json_decode($data);
                        
                    
                    foreach($product as $pr) {
                        //$db->insert("INSERT INTO product(name, price, qnty, description) 
                        //VALUES('$pr->name', $pr->price, $pr->qnty, '$pr->description')");
       
                    ?>
                    <tr>
                        <td><?php echo $pr->name ."<br>"; ?></td>
                        <td><?php echo $pr->price ."<br>"; ?></td>
                        <td><?php echo $pr->qnty ."<br>"; ?></td>
                        <td><?php echo $pr->description ."<br>"; ?></td>
                    </tr>
                <?php }
                    }?>
                
                </table>

            </div>
        </div> 
    </div>


<?php include "inc/footer.php"; ?>