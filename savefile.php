<?php
include "lib/Editor.php";
$editor = new Editor();

if(isset($_GET['q'])){
    $filename = $_GET['q'];
    $content = $_GET['c'];

    $file = $editor->SaveContent($filename, $content);

    echo "file save successfully";
}else {
    echo "something wrong";
}
?>