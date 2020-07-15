<?php
include "inc/header.php";
require "classes/Item.php";

$db = new Database();
$format = new Format();
?>

<?php

if(isset($_SESSION['cart'])){
    $cart = unserialize(serialize($_SESSION['cart']));
  }

  if(count($cart)){

  }else{
    header("Location: shop.php");
  }



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

    }

    //Delete product in cart
    if(isset($_GET['index'])){
        $cart = unserialize(serialize($_SESSION['cart']));
        unset($cart[$_GET['index']]);
        $cart = array_values($cart);
        $_SESSION['cart'] = $cart;
    }
    

    //Update quantity in cart
    if(isset($_POST['update'])){
        $arrQuality = $_POST['quantity'];

        //Check validate quantity
        $valid = 1;
        for ($i=0; $i < count($arrQuality); $i++)
            if(!is_numeric($arrQuality[$i]) || $arrQuality[$i] < 1){
                $valid = 0;
                break;
            }
            if($valid == 1){
                $cart = unserialize(serialize($_SESSION['cart']));
                for ($i=0; $i < count($cart); $i++){
                    $cart[$i]->quantity = $arrQuality[$i];
                }
                $_SESSION['cart'] = $cart;   
            }
            else
                $error = "Quantity is Invalid";       
    }
?>

<div class="m-container">

    <div class="m-justify">

    <form action="" method="post">
    <table class="table table-border table-dark table-responsive">
        <tr>
            <th>Option</th>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Sub Total</th>
        </tr>
        <?php
        $cart = unserialize(serialize($_SESSION['cart']));
        $s = 0;
        $index = 0;
        for ($i=0; $i < count($cart); $i++) { 
            $s += $cart[$i]->price * $cart[$i]->quantity;
        
        ?>
        <tr>
            <td><a href="cart.php?index=<?php echo $index;?>" onclick="return confirm('Are you sure?')">Delete</a></td>
            <td><?php echo $cart[$i]->id; ?></td>
            <td><?php echo $cart[$i]->name; ?></td>
            <td><?php echo $cart[$i]->price; ?></td>
            <td>
                <input style="width: 50px;" type="text" name="quantity[]" value="<?php echo $cart[$i]->quantity; ?>"> 
                <input class="m-btn-small waves-effect" value="update" name="update" type="submit">
            </td>
            <td><?php echo $cart[$i]->price * $cart[$i]->quantity; ?>TK</td>
        </tr>
        <?php 
        $index ++;
        }
        ?>
        <tr>
            <td colspan = "5" align = "right">Total</td>
            <td align = "left"><?php echo $s; ?>TK</td>
        </tr>

    </table>
    </form>
<br>
<a href="shop.php">Continue Shopping</a>
<a class="float-right" href="checkout_cart.php">Checkout</a>


    </div>
</div>



<?php include "inc/footer.php";?>