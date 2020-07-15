<?php
include "header.php";
include "sidebar.php";
include "../classes/Web.php";

$db = new Database();
$format = new Format();


if(isset($_POST['submit'])){
    $email   = $format->Stext($_POST['email']);
    $address = $format->Stext($_POST['address']);

    $db->insert("UPDATE web SET email = '$email', address = '$address'");
}

//add social network
if(isset($_POST['add'])){
    $title   = $format->Stext($_POST['linktitle']);
    $link = $format->Stext($_POST['link']);
    
    $db->insert("INSERT INTO tb_link(title, link) VALUES('$title', '$link')");
}

//delete social network
if(isset($_REQUEST['delnet'])){
    $delnet   = $format->Stext($_REQUEST['delnet']);
    
    net_deleteById($delnet);

    header("Location: basic_setting.php");
}

?>



<div class="grid_10">


    <div class="box round first grid">
    <h2>Basic</h2>
    <div class="block sloginblock">
        

 <div class="container">
    <div class="row">


        <div class="m-justify col-xs-6 col-sm-3">
            <div class="m-card">
                <div class="m-card-body">

            <h4>Web Info</h4>
        
            <form method="post" action="">

            <div class="m-input-group">
            <a>Email Address:</a>
                <input value="<?php echo web('email'); ?>" type="email" class="text-dark m-form-control" name="email" placeholder="Email Address">
            </div>

            <div class="m-input-group">
                <a>Address:</a>
                <textarea class="text-dark m-form-control" name="address" placeholder="Address"><?php echo web('address'); ?></textarea>
            </div>

            <input class="m-btn waves-effect" type="submit" name="submit" value="Save">

            </div>
           </div>
        </div>




        <div class="m-justify col-xs-6 col-sm-3">
            <div class="m-card">
                <div class="m-card-body">

        

            <h4>Social Network Links</h4>

            <div class="m-input-group">
                <input type="text" class="text-dark m-form-control" placeholder="Title" name="linktitle">
            </div>
           
            <div class="m-input-group">
                <input type="text" class="text-dark m-form-control" placeholder="link" name="link">
            </div>

            <input class="m-btn waves-effect" type="submit" name="add" value="Add">
        </form>
        <hr>
            <ul>
                <?php 
                $s = tb_all_link();
                if($s){
                    
                
                while ($rowlink =$s->fetch_assoc() ) {
                 ?>
                <li><a href="<?php echo $rowlink['link'];?>"><?php echo $rowlink['title'];?></a> <a href="?delnet=<?php echo $rowlink['id']; ?>">[Delete]</a></li>
            <?php }
                }
                ?>
            </ul>

            
            
            </div>
           </div>
        </div>

    </div>
 </div>




</div>
</div>
</div>



<?php include "footer.php";?>