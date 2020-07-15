<?php
include "partials/header.php";

?>

<div class="m-container">

<?php 

if(isset($_SESSION['ins_login'])){

?>
<form action="Blog/createpost" method="post">

    <div class="m-justify-md">
        <div class="m-card">
                <div class="m-card-header"></div>

            <div class="m-card-body m-btn-block">

                    <div class="m-input-group">
                        <input type="text" autocomplete="off" class="m-form-control text-dark" name="postTitle">
                        <label>Write something...</label>
                    </div>

                <div class="m-input-group">

                    <textarea class="m-form-control text-dark" name="postDesc"></textarea>
                    <label>Write something...</label>
                </div>
                        
            <hr>
            <input type="submit" name="post" value="Post" class="m-btn m-btn-info waves-effect">
            </div>
        </div>
    </div>
</form>
<?php }?>


<h3>Explore Blogs</h3>

<?php
if($fetch_blog){

while ($blog_row = $fetch_blog->fetch_assoc()){

?>
<div class="m-justify-lg">
    <div class="m-card">
            <div class="m-card-header">
                <h4><?php echo $blog_row['blog_title']; ?></h4>
            </div>
        <div class="m-card-body m-btn-block">

            <p class=""><?php echo $blog_row['blog_description']; ?></p>
            <p><img class="m-img m-img-thumbnail" src="<?php echo $blog_row['blog_image'];?>" alt=""></p>
                      
           <hr>
          <a class="m-btn  m-btn-info waves-effect" href="?id=<?php echo $blog_row['id']; ?>">Comment</a>
          <a class="m-btn  m-btn-info waves-effect" href="?id=<?php echo $blog_row['id']; ?>">Share</a>
        </div>
    </div>
</div>

<?php }

}else{
    echo "<center><h3 class='m-box'>No Blog have to see</h3></center>";
}
?>

</div>


<?php
include "partials/footer.php";
?>