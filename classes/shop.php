<?php
//include_once './lib/Database.php';
//include_once './helpers/Format.php';

$db = new Database();
$format = new Format();


function getProductPriceById($id){
    global $db, $format;
    $id = $format->Stext($id);

    $result = $db->select("SELECT * FROM orders_detail WHERE product_id='$id' ");
    return $result->fetch_assoc()['price'];
}



?>