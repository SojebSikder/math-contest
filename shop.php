<?php
include "inc/header.php";
require "classes/Item.php";

$db = new Database();
$format = new Format();



//Add to cart
if(isset($_GET['id'])){

    $id = $format->Stext($_GET['id']);
    
    $resultExe = $db->select("SELECT * FROM product WHERE product_id = '$id'");
    $product = $resultExe->fetch_assoc();

    $item = new Item();
    $item->id       = $product['product_id'];
    $item->name     = $product['name'];
    $item->price    = $product['price'];
    $item->quantity = 1;

    //Check product is existing in cart
    $index = -1;
    if(isset($_SESSION['cart'])){
        $cart = unserialize(serialize($_SESSION['cart']));
        for ($i = 0; $i < count($cart); $i++) 
            if($cart[$i]->id == $_GET['id']){
                $index = $i;
                break;
            }
    }
        if($index == -1)
            $_SESSION['cart'][] = $item;
        else {
            $cart[$index]->quantity++;
            $_SESSION['cart'] = $cart;
        }

        header("Location:shop.php");

    }
//End add to cart


?>


<div class="container" style="width:95%;">

            <h3 class="text-info">Buy Items here</h3>

<form action="" method="post">
            <div class="m-card">
                <div class="m-card-body">
                 
                <label for="drop">Category</label> 
                <select name="prcat" id="drop" autocomplete="off">
                    <option value="All">All</option>
                    <?php 
                   $productCat = $db->select("SELECT * FROM product_category");

                   if($productCat ){
                       while ($getproductCat = $productCat->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $getproductCat['cat_name'] ?>"><?php echo $getproductCat['cat_name'] ?></option>

                <?php } }?>
                </select>

                <input class="m-btn waves-effect" type="submit" value="ok" name="prcatsubmit">

                </div>
            </div>
</form>

            <?php
            if(isset($_POST['prcatsubmit'])){

                $cat = $format->Stext($_POST['prcat']);
            
                if($cat == "All"){
                    $productExe = $db->select("SELECT * FROM product ORDER BY id DESC");
                }else{
                    $productExe = $db->select("SELECT * FROM product WHERE category='$cat' ORDER BY id DESC");
                }
            
            }else{
                $productExe = $db->select("SELECT * FROM product ORDER BY id DESC");
            }


            if($productExe){

                $count=0;
            while ($product = $productExe->fetch_assoc()){

                if ($count == 0)
                echo "<div class='row'>";

            ?>
            <div class="col-md-3">
            <div class="m-justify-md">
                <div class="m-card">
                    <div class="m-card-body">
                        <p> <strong><?php echo $product['name']; ?></strong></p>
                        <hr>
                        <p><a href="product.php?productID=<?php echo $product['product_id']; ?>"><img class="m-img m-img-thumbnail" src="<?php echo $product['image'];?>" alt=""></a></p>
                        <p class="m-box"><?php echo $product['category']; ?></p>
                        <p class="m-box"><?php echo Format::textShorten($product['description'],100); ?></p>
                       <a class="m-alert m-alert-success">Price: <?php echo $product['price']; ?>TK</a>
         
                       <hr>
                      <a class="m-btn m-btn-block m-btn-success waves-effect" href="?id=<?php echo $product['product_id']; ?>">Add to Cart</a>
                    </div>
                </div>
            </div>
            </div>

            
            <?php
            $count++;
            if($count==4)
            {
                echo "</div>";
                $count=0;
            }

         }
            
        }else{
            echo "<center><h3 class='m-box'>No Item have to buy</h3></center>";
        }
        ?>

</div>


<?php include "inc/footer.php"; ?>
