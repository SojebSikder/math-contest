<?php 
include "inc/header.php";
include "lib/Editor.php";
?>

<?php
    $editor = new Editor();
    $format = new Format();

    $filename = "filename";

    $files = "No File Selected";

    $content = "No content";
    

//For opening file

    if(isset($_POST['openfile'])){
        //upload photo
        $photoname = $_FILES['file']['name'];
        $tmp_name  = $_FILES['file']['tmp_name'];

        $location="file_temp/$photoname";
        $new_name = $location.time()."-".rand(1000, 9999)."-".$photoname;
        move_uploaded_file($tmp_name,$new_name); 

        $filename = $new_name;

        $content = $_POST['content'];
    
        $files = $editor->GetContent($new_name);
    }
//End For opening file

/*
if(isset($_POST['saveContent'])){
        
    $content = $format->Stext($_POST['content']);
    $file = $editor->SaveContent($filename, $content);

    echo "file save successfully";
}
*/
?>

<h3>Web File Editor</h3>

<h2 id="suc">working</h2>

<div class="container">
    <div class="row">

    <form action="" method="post" enctype="multipart/form-data">
        
        <div class="card-header">
            <input type="file" name="file">
            <input class="btn btn-secondary" type="submit" name="openfile" value="Open">
        </div>


    <textarea name="content" class="form-control" style="height:auto; width:auto;" cols="120" rows="20"><?php
        echo $files; ?></textarea>
    <input class="btn btn-primary" id="saveContent" name="saveContent" onclick="javascript:showUser(<?php echo $filename; ?>, <?php echo $content; ?>)" type="button" value="Save">
    </form>

    </div>
</div>


<script>
//ajax code here


    function showUser(str, content) {
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("suc").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","savefile.php?q="+str+"&c="+content, true);
            xmlhttp.send();
        }
    }
</script>


<?php 
include "inc/footer.php";
?>