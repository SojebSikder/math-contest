<?php
include "inc/header.php";
include "classes/WinMat.php";
include "classes/Post.php";

$db = new Database();
$format = new Format();

$username = $_SESSION['ins_name'];
$userlogin = $_SESSION['ins_login'];
$user_id = $_SESSION['ins_id'];

$add = "https://mathcontest.ml/";

//delete blog
if($userlogin){

    if(isset($_REQUEST['del'])){
        $id = $_REQUEST['del'];

        $del = $db->delete("DELETE FROM blog_file WHERE file_id = '$id' AND user_id = '$user_id' ");

        if($del){
            Format::jumpTo("file_list.php", "deleted");
        }else{
            Format::jumpTo("file_list.php", "not deleted :(");
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
        <th>FIle ID</th>
        <th>File URL</th>
        <th>Action</th>
    </tr>

<?php
    

    $getBlog = $db->select("SELECT * FROM blog_file WHERE user_id = '$user_id' ORDER BY id DESC ");
?>
<?php if($getBlog): ?>
<?php $i = 0; ?>
<?php while($row = $getBlog->fetch_assoc()): ?>
<?php $i++; ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['file_id']; ?></td>
        <td><?php echo $add.$row['file_url']; ?></td>
        <td><a href="?del=<?php echo $row['file_id']; ?>">Delete</a></td>

    </tr>
    <?php endwhile ?>
<?php else: ?>
<?php endif ?>

</table>




<?php include "inc/footer.php"; ?>