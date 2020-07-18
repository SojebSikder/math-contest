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
    $keywords = $format->Stext($_POST['keywords']);

    $UId = uniqid(true);


//upload photo
    $photoname1 = $_FILES['photo1']['name'];
    $photoname2 = $_FILES['photo2']['name'];
    $photoname3 = $_FILES['photo3']['name'];

    $tmp_name1  = $_FILES['photo1']['tmp_name'];
    $tmp_name2  = $_FILES['photo2']['tmp_name'];
    $tmp_name3  = $_FILES['photo3']['tmp_name'];

    $location1 = "../img/product/$photoname1";
    $location2 = "../img/product/$photoname2";
    $location3 = "../img/product/$photoname3";

    $rnd = time()."-".rand(1000, 9999);

    $rnds1 = $location1.$rnd;
    $rnds2 = $location2.$rnd;
    $rnds3 = $location3.$rnd;

    $new_name1 = $rnds1."-".$photoname1;
    $new_name2 = $rnds2."-".$photoname2;
    $new_name3 = $rnds3."-".$photoname3;

    move_uploaded_file($tmp_name1,$new_name1);
    move_uploaded_file($tmp_name2,$new_name2);
    move_uploaded_file($tmp_name3,$new_name3);

    $add1 = "img/product/$photoname1".$rnd."-".$photoname1;
    $add2 = "img/product/$photoname2".$rnd."-".$photoname2;
    $add3 = "img/product/$photoname3".$rnd."-".$photoname3;


//upload file
     $filename = $_FILES['file']['name'];
     $tmp_name_file  = $_FILES['file']['tmp_name'];
 
     $location_file="../assets/file/$filename";

     $rnds_file = $location_file.$rnd;
     $new_name_file = $rnds_file."-".$filename;
     move_uploaded_file($tmp_name_file, $new_name_file);
 
     $addFile = "assets/file/$filename".$rnd."-".$filename;


    $db->insert("INSERT INTO product(product_id ,name, price, qnty, description, image, image2, image3, url, meta_keywords) 
        VALUES('$UId' ,'$name', '$price', '$qnty', '$desc', '$add1', '$add2', '$add3', '$addFile', '$keywords')");

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
                    <textarea name="desc" class="m-form-control text-dark" required></textarea>
                    <label>Description</label>
                </div>

                <div class="m-input-group">
                    <textarea name="keywords" class="m-form-control text-dark"></textarea>
                    <label>Keywords</label>
                </div>

                <div>
                   Upload Cover1 (*jpg, *png): <label class="m-btn waves-effect m-btn-info" for="upload-photo1">Browse Cover1</label>
                    <input class="m-hidden" type="file" name="photo1" id="upload-photo1">
                    <br>
                    Upload Cover2 (*jpg, *png): <label class="m-btn waves-effect m-btn-info" for="upload-photo2">Browse Cover2</label>
                    <input class="m-hidden" type="file" name="photo2" id="upload-photo2">
                    <br>
                    Upload Cover3 (*jpg, *png): <label class="m-btn waves-effect m-btn-info" for="upload-photo3">Browse Cover3</label>
                    <input class="m-hidden" type="file" name="photo3" id="upload-photo3">
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