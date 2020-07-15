<?php
include_once './lib/Database.php';
include_once './helpers/Format.php';

$db = new Database();
$format = new Format();


function getPost($id, $rowname){
    global $db;

    $result = $db->select("SELECT * FROM post WHERE problem ='$id'");

    if($result){
        $row =  $result->fetch_assoc();
        return $row[$rowname];
    }

}



?>