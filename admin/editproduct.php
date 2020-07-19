<?php 
include "header.php"; 
include "sidebar.php";


$db = new Database();
$format = new Format();

$editID = $format->Stext($_REQUEST['edit']);
if($editID == null){
    Format::jumpTo("viewproduct.php","");
  }


//for displaying info
$queryProduct = "SELECT * FROM product WHERE product_id='$editID'";
$GetProduct =$db->select($queryProduct)->fetch_assoc();
//end for displaying info


if(isset($_POST['postProduct'])){

    $name = $format->Stext($_POST['name']);
    $price = $format->Stext($_POST['price']);
    $qnty = $format->Stext($_POST['qnty']);
    $desc = $format->Stext($_POST['desc']);
    $keywords = $format->Stext($_POST['keywords']);

    $db->update("UPDATE product SET name ='$name', price ='$price', qnty='$qnty', description='$desc', meta_keywords='$keywords' 
    WHERE product_id='$editID'");
}


if(isset($_POST['saveCat'])){

    $cat = $format->Stext($_POST['prcat']);

    $db->update("UPDATE product SET category='$cat' WHERE product_id='$editID'");
}



if(isset($_POST['postCover'])){
    //upload photo
    $photoname = $_FILES['photo']['name'];
    $tmp_name  = $_FILES['photo']['tmp_name'];

    $location="../img/product/$photoname";
    $rnd = time()."-".rand(1000, 9999);
    $rnds = $location.$rnd;
    $new_name = $rnds."-".$photoname;
    move_uploaded_file($tmp_name,$new_name);

    $add = "img/product/$photoname".$rnd."-".$photoname;

    $db->update("UPDATE product SET  image='$add' WHERE product_id='$editID'");
}

if(isset($_POST['postFile'])){
    //upload file
    $filename = $_FILES['file']['name'];
    $tmp_name_file  = $_FILES['file']['tmp_name'];

    $location_file="../assets/file/$filename";

    $rnds_file = $location_file.$rnd;
    $new_name_file = $rnds_file."-".$filename;
    move_uploaded_file($tmp_name_file, $new_name_file);

    $addFile = "assets/file/$filename".$rnd."-".$filename;

    $db->update("UPDATE product SET url ='$addFile' WHERE product_id ='$editID'");

}

?>

<div class="grid_10">
		
        <div class="box round first grid">
            <h2>Add New Product</h2>
            <div class="block">         
             <form action="" method="POST" enctype="multipart/form-data">

             
             <div class="m-justify col-xs-6 col-sm-3">
            <div class="m-card">
                <div class="m-card-body">

            <h4>Category</h4>
            <label for="drop">Category</label> 
                <select name="prcat" id="drop" autocomplete="off">
                    <option value="">Select Category</option>
                    <?php 
                   $productCat = $db->select("SELECT * FROM product_category");

                   if($productCat ){
                       while ($getproductCat = $productCat->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $getproductCat['cat_name'] ?>"><?php echo $getproductCat['cat_name'] ?></option>

                <?php } }?>
                </select>
    
            <input class="m-btn waves-effect" type="submit" name="saveCat" value="Save">

            </div>
           </div>
        </div>


             <div class="m-justify-md">
            <div class="m-card">
            <div class="m-card-body">
                
                <p><img class="m-img m-img-thumbnail" src="<?php echo "../".$GetProduct['image'];?>"></p>
                <div>
                   Upload Cover (*jpg, *png): <label class="m-btn waves-effect m-btn-info" for="upload-photo">Browse Cover...</label>
                    <input class="m-hidden" type="file" name="photo" id="upload-photo">
                </div>

        <input class="m-btn waves-effect m-btn-block" name="postCover" type="submit" value="Save Cover" required>
                <hr>
                <div>
                    Upload File(*pdf): <label class="m-btn waves-effect m-btn-info" for="upload-file">Browse File...</label>
                    <input class="m-hidden" type="file" name="file" id="upload-file">
                </div>
                <hr>

                <input class="m-btn waves-effect m-btn-block" name="postFile" type="submit" value="Save File" required>

            </div>
            </div>
            </div>



             <div class="m-justify-md">

            <div class="m-card">

            <div class="m-card-body">
                
                <div class="m-input-group">
                    <a>Name</a>
                    <input name="name" type="text" value="<?php echo $GetProduct['name'];?>" class="m-form-control text-dark" required>
                </div>

                <div class="m-input-group">
                    <a>Price</a>
                    <input name="price" type="text" value="<?php echo $GetProduct['price'];?>" class="m-form-control text-dark" required>
                </div>

                <div class="m-input-group">
                    <a>Quantity</a>
                    <input name="qnty" type="number" value="<?php echo $GetProduct['qnty'];?>" class="m-form-control text-dark" required>
                </div>

                <div class="m-input-group">
                    <a>Description</a>
                    <textarea name="desc" class="m-form-control text-dark" required><?php echo $GetProduct['description'];?></textarea>
                </div>

                <label><?php echo $GetProduct['category'];?></label>

                <div class="m-input-group">
                    <a>Keywords</a>
                    <textarea name="keywords" class="m-form-control text-dark"><?php echo $GetProduct['meta_keywords'];?></textarea>
                </div>

                <hr>

                <input class="m-btn waves-effect m-btn-block" name="postProduct" type="submit" value="Post" required>



            </div>
                </div>
                
            </div>
            </form>


            </div>
        </div>
    </div>



<?php include "footer.php"; ?>