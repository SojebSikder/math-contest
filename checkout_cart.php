<?php
include "inc/header.php";

require "classes/User.php";
require "classes/Item.php";
?>

<?php

//redicting...
if (!(isset($_SESSION['name'], $_SESSION['login']) || isset($_SESSION['ins_name'], $_SESSION['ins_login']))) {
    header("location: login.php");
}

if(!isset($_SESSION['cart'])){
    header("location: shop.php?error=Add to cart first");
}


//getting username
    if(isset($_SESSION['login'])){

        $username = getUserByEmail($_SESSION['login']);
        $useremail = $_SESSION['login'];
        $userid = getUIDByEmail($_SESSION['login']);

    }elseif (isset($_SESSION['ins_name'])) {

        $username = getInsUserByEmail($_SESSION['ins_login']);
        $useremail = $_SESSION['ins_login'];
        $userid = getInsUIDByEmail($_SESSION['ins_login']);
    }


if(isset($_SESSION['cart'])){
    $cart = unserialize(serialize($_SESSION['cart']));
  }

  if(count($cart)){
    
    
    if(isset($_POST['buy'])){

        if(empty($_POST["bnumber"]) && empty($_POST["tnumber"]) && empty($_POST['viaemail'])){
            echo "All field should be fill up";
        }else{

            $number      = $format->Stext($_POST["bnumber"]);
            $Transnumber = $format->Stext($_POST["tnumber"]);
            $via         = $format->Stext($_POST['viaemail']);

        //Bkash Code here
        //end bkash code

        //getting product from session
            $cart = unserialize(serialize($_SESSION['cart']));


            for ($i=0; $i < count($cart); $i++) { 

                $id = $cart[$i]->id;
                $price = $cart[$i]->price;
                $quantity  = $cart[$i]->quantity;

                $name = $cart[$i]->name;
            }

        //Save new order
            if(isset($_SESSION['cart'])){

                $date = date('Y-m-d');
                $db->insert("INSERT INTO orders(product_id, user_id, name, date, status, username, useremail, b_number, b_trans, via) 
                VALUES('$id' ,'$userid', '$name', '$date', 0, '$username', '$useremail', '$number', ' $Transnumber', '$via')");

                $ordersid = mysqli_insert_id($db->link);
            }
        //end save


        //Save order details for new order
            //$cart = unserialize(serialize($_SESSION['cart']));
            for ($i=0; $i < count($cart); $i++) { 

                $id = $cart[$i]->id;
                $price = $cart[$i]->price;
                $quantity  = $cart[$i]->quantity;

                $db->insert("INSERT INTO orders_detail(product_id, orders_id, price, quantity) 
                VALUES('$id', $ordersid, '$price', '$quantity')");
            }

        //Clear all products in cart
            unset($_SESSION['cart']);

        //send message
            $message = "Dear, $username Your order have been place. Wait 1/2 business day for your order ready. After your order ready we will let you know.";
            sendNotification($message,$username);
        //end send message

            Format::jumpTo("shop.php", "Please wait until we verify your tracsection");

        }

    }

}else{
    Format::jumpTo("shop.php");
}

?>
 <form action="" method="post">

 <div class="m-justify-md">
        <div class="m-card">
            <div class="m-card-header">
                <h3>Choose how you want to get product</h3>
            </div>
            <div class="m-card-body">
                 <a>Enter your Email Address</a>
                <div class="m-input-group">
                    <input name="viaemail" value="<?php echo $useremail; ?>" class="m-form-control text-dark" type="email" value="" required>
                    <label>Email</label>
                </div>
                We will send your product via email address

            </div>
        </div>
    </div>



<div class="m-justify">

    <div class="m-card">
            <div class="m-card-header">
                 <h3 class="m-center">Bkash Payment</h3>
            </div>
        <div class="m-card-body">

        <p><img src="assets/images/bkash-white.png" style="background: black; width: 100%;" alt=""></p>

        <h2>Bkash Personal Number : <strong>01833962595</strong></h2>
        <p style="text-align: justify;" class="m-center"><strong>*Please complete your bKash payment at first.*</strong><br>
        Then fill up the form below. Also note that 1.85% bKash "SEND MONEY" <br>
         cost will be added with net price. Total amount you need to send us: <hr>
        </p>
     
            <div class="m-input-group">
                <input type="number" name="bnumber" class="m-form-control text-dark" required>
                <label>Bkash Number</label>
            </div>

            <div class="m-input-group">
                <input type="text" name="tnumber" class="m-form-control text-dark" required>
                <label>Transection ID Number</label>
            </div>

        <hr>
            <p style="text-align: justify;">Your personal data will be used to process yout order, 
             support your experience <br>throughout Math Contest Website, 
             and for other purposes described in our<br> privacty policy</p>

            <input class="m-btn waves-effect m-btn-success" type="submit" value="Confirm Payment" name="buy">
       

        </div>
    </div>
</div>
 </form>
Thanks for buying product. Click <a href="shop.php">here</a> to continue buy product



<?php include "inc/footer.php"; ?>