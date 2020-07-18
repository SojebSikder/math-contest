<?php 
include "inc/header.php";

$db = new Database();
$format = new Format();

$id = $format->Stext($_REQUEST['id']);

$product = $db->select("SELECT * FROM product WHERE product_id = '$id' ")->fetch_assoc();

//<p><img class="m-img m-img-thumbnail" src="<?php echo $product['image'];" alt=""></p>
?>




<div class="container">
    <h2 class="text-white">Product details</h2>

    <div class="m-card">
        <div class="m-card-body">
          
            <!--Slideshow start -->
            <div class="slideshow-container">

            <?php if($product['image']){ ?>
                <div class="mySlides ">
                    <div class="numbertext">1/3</div>
                    <img class="m-img m-img-thumbnail" src="<?php echo $product['image'];?>" style="width:100%;max-height: 500px;" alt="">
                    <div class="text">Caption Text</div>
                </div>
            <?php }?>

            <?php if($product['image2']){ ?>
                <div class="mySlides ">
                    <div class="numbertext">2/3</div>
                    <img class="m-img m-img-thumbnail" src="<?php echo $product['image2'];?>" style="width:100%;max-height: 500px;" alt="">
                    <div class="text">Caption Text</div>
                </div>
            <?php }?>

            <?php if($product['image3']){ ?>
                <div class="mySlides ">
                    <div class="numbertext">3/3</div>
                    <img class="m-img m-img-thumbnail" src="<?php echo $product['image3'];?>" style="width:100%;max-height: 500px;" alt="">
                    <div class="text">Caption Text</div>
                </div>
            <?php }?>

                 <!--Next and previus buttons -->
                 <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                 <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>
            <!--The dots and circle -->
            <div style="text-align: center">
                <span class="dot" onclick="currentSlides(2)"></span>
                <span class="dot" onclick="currentSlides(3)"></span>
            </div>

            <!--Slideshow end -->
            <h4><?php echo $product['name']; ?></h4>
            <hr>
                <a class="m-alert m-alert-success">Price: <?php echo $product['price']; ?>TK</a>
            <hr>
            Product Description:<p class="m-box"><?php echo $product['description']; ?></p>
            <input type="button" class="m-btn waves-effect m-btn-success" value="Add to Cart">
        </div>
    </div>
</div>


<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    //Next/previus controls
    function plusSlides(n){
        showSlides(slideIndex += n);
    }

    //thumbnail image controls
    function currentSlide(n){
        showSlides(slideIndex = n);
    }

    function showSlides(n){
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");

        if(n > slides.length){
            slideIndex = 1;
        }

        if(n < 1){
            slideIndex = slides.length;
        }

        for(i = 0; i < slides.length; i++){
            slides[i].style.display = "none";
        }

        for(i = 0; i < dots.length; i++){
            dots[i].className.replace("active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
            
        
    }


</script>


<?php include "inc/footer.php"; ?>