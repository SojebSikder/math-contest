<?php 
include "header.php";
include "sidebar.php"; 

$db = new Database();
$format = new Format();


if(isset($_POST['saveCat'])){
    $cat = $format->Stext($_POST['cat']);
    $status = "Publish";

    $db->insert("INSERT INTO category(cat_name, cat_status) 
    VALUES('$cat', '$status')");
}

if(isset($_POST['saveprCat'])){
    $cat = $format->Stext($_POST['prcat']);
    $status = "Publish";

    $db->insert("INSERT INTO product_category(cat_name, cat_status) 
    VALUES('$cat', '$status')");
}


?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>

                 <form action="" method="post">

                 <div class="m-card">
                    <div class="m-card-body">
                    <h3>Post Category</h3>
                    <hr>
                    <div class="m-input-group">
                        <input name="cat" type="text" placeholder="Enter Category Name..." class="m-form-control text-dark">
                    </div>
                    <input type="submit" class="m-btn waves-effect" name="saveCat" Value="Save">
                    </div>
                 </div>
<br>
                 <div class="m-card">
                    <div class="m-card-body">
                    <h3>Product Category</h3>
                    <hr>
                    <div class="m-input-group">
                        <input name="prcat" type="text" placeholder="Enter Category Name..." class="m-form-control text-dark">
                    </div>
                    <input type="submit" class="m-btn waves-effect" name="saveprCat" Value="Save">
                    </div>
                 </div>

                </form>
                    
                </div>
            </div>


        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <div id="site_info">
       <p>
         &copy; Copyright <a href="http://mathcontest.ml">Math Contest</a>. All Rights Reserved.
        </p>
    </div>
</body>
</html>
