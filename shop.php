<?php
include "inc/header.php";
require "classes/Item.php";

$db = new Database();
$format = new Format();

$productExe = $db->select("SELECT * FROM product ORDER BY id DESC");



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


<div class="m-container">

            <h3 class="text-info">Buy Items here</h3>

            <?php
            if($productExe){

            while ($product = $productExe->fetch_assoc()){

            ?>
            <div class="m-justify">
                <div class="m-card">
                    <div class="m-card-body">
                        <h3><?php echo $product['name']; ?></h3>
                        <hr>
                        <p><img class="m-img m-img-thumbnail" src="<?php echo $product['image'];?>" alt=""></p>
                        <p class="m-box"><?php echo $product['description']; ?></p>
                       <a class="m-alert m-alert-success">Price: <?php echo $product['price']; ?>TK</a>
                       <a class="alert alert-secondary">Stock : <?php echo $product['qnty']; ?></a>

                                     
                       <hr>
                      <a class="m-btn m-btn-block m-btn-success waves-effect" href="?id=<?php echo $product['product_id']; ?>">Add to Cart</a>
                    </div>
                </div>
            </div>

            <?php }
            
        }else{
            echo "<center><h3 class='m-box'>No Item have to buy</h3></center>";
        }
        ?>

</div>


<?php include "inc/footer.php"; ?>
