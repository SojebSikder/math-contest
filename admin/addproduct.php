<?php include "header.php"; ?>
<?php include "sidebar.php";?>

<?php 
$db = new Database();
$format = new Format();

if(isset($_POST['postProduct'])){

    $name = $format->Stext($_POST['name']);
    $price = $format->Stext($_POST['price']);
    $qnty = $format->Stext($_POST['qnty']);
    $desc = $format->Stext($_POST['desc']);

    $UId = uniqid(true);


//upload photo
    $photoname = $_FILES['photo']['name'];
    $tmp_name  = $_FILES['photo']['tmp_name'];

    $location="../img/product/$photoname";
    $rnd = time()."-".rand(1000, 9999);
    $rnds = $location.$rnd;
    $new_name = $rnds."-".$photoname;
    move_uploaded_file($tmp_name,$new_name);

    $add = "img/product/$photoname".$rnd."-".$photoname;

//upload file
     $filename = $_FILES['file']['name'];
     $tmp_name_file  = $_FILES['file']['tmp_name'];
 
     $location_file="../assets/file/$filename";

     $rnds_file = $location_file.$rnd;
     $new_name_file = $rnds_file."-".$filename;
     move_uploaded_file($tmp_name_file, $new_name_file);
 
     $addFile = "assets/file/$filename".$rnd."-".$filename;


    $db->insert("INSERT INTO product(product_id ,name, price, qnty, description, image, url) 
        VALUES('$UId' ,'$name', '$price', '$qnty', '$desc', '$add', '$addFile')");

}

?>

<div class="grid_10">
		
        <div class="box round first grid">
            <h2>Add New Product</h2>
            <div class="block">         
             <form action="" method="POST" enctype="multipart/form-data">

             <div class="m-justify-md">

            <div class="m-card">

            <div class="m-card-body">
                
                <div class="m-input-group">
                    <input name="name" type="text" class="m-form-control text-dark" required>
                    <label>Name</label>
                </div>

                <div class="m-input-group">
                    <input name="price" type="text" class="m-form-control text-dark" required>
                    <label>Price</label>
                </div>

                <div class="m-input-group">
                    <input name="qnty" type="number" class="m-form-control text-dark" required>
                    <label>Quantity</label>
                </div>

                <div class="m-input-group">
                    <textarea name="desc" type="text" class="m-form-control text-dark" required></textarea>
                    <label>Description</label>
                </div>

                <div>
                   Upload Cover (*jpg, *png): <label class="m-btn waves-effect m-btn-info" for="upload-photo">Browse Cover...</label>
                    <input class="m-hidden" type="file" name="photo" id="upload-photo">
                </div>

        

                <hr>
                <div>
                    Upload File(*pdf): <label class="m-btn waves-effect m-btn-info" for="upload-file">Browse File...</label>
                    <input class="m-hidden" type="file" name="file" id="upload-file">
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