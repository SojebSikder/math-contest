<?php
include "inc/header.php";
include "classes/WinMat.php";
include "classes/Post.php";

$db = new Database();
$format = new Format();

$username = $_SESSION['ins_name'];
$userlogin = $_SESSION['ins_login'];

//delete blog
if($userlogin){

    if(isset($_REQUEST['del'])){
        $id = $_REQUEST['del'];

        $del = $db->delete("DELETE FROM blog_post WHERE blog_id = '$id' AND blog_author= '$username' AND user_email = '$userlogin' ");

        if($del){
            Format::jumpTo("blog_list.php", "deleted");
        }else{
            Format::jumpTo("blog_list.php", "not deleted :(");
        }

    }
}else{
    Format::jumpTo("blog_list.php", "Your not eligible :(");
}
//end delete
?>

<table class="table table-responsive table-dark table-hover">
    <tr>
        <th>SL</th>
        <th>Title</th>
        <th>Description</th>
        <th>Status</th>
        <th>Created at</th>
        <th>Action</th>
    </tr>

<?php
    

    $getBlog = $db->select("SELECT * FROM blog_post WHERE blog_author= '$username' AND user_email = '$userlogin' ORDER BY id DESC ");
?>
<?php if($getBlog): ?>
<?php $i = 0; ?>
<?php while($row = $getBlog->fetch_assoc()): ?>
<?php $i++; ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['blog_title']; ?></td>
        <td><?php echo $format->Stext(Format::textShorten($row['blog_description'])); ?></td>
        <td><?php echo $row['blog_status']; ?></td>
        <td><?php echo $row['created_at']; ?></td>
        <td><a href="blog_edit.php?edit=<?php echo $row['blog_id']; ?>">Edit</a> | <a href="?del=<?php echo $row['blog_id']; ?>">Delete</a></td>

    </tr>
    <?php endwhile ?>
<?php else: ?>
<?php endif ?>

</table>




<?php include "inc/footer.php"; ?>