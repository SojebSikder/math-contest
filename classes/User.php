<?php
include_once './lib/Database.php';
include_once './helpers/Format.php';

$db = new Database();
$format = new Format();


function getUserById($id){
    global $db, $format;

    $result = $db->select("SELECT * FROM register WHERE user_id='$id' ");
    return $result->fetch_assoc()['user_name'];
}

function getUserByEmail($email){
    global $db, $format;

    $result = $db->select("SELECT * FROM register WHERE user_email='$email' ");
    return $result->fetch_assoc()['user_name'];
}

function getUIDByEmail($email){
    global $db, $format;

    $result = $db->select("SELECT * FROM register WHERE user_email='$email' ");
    return $result->fetch_assoc()['user_id'];
}

function getImageByEmail($email){
    global $db, $format;

    $result = $db->select("SELECT * FROM register WHERE user_email='$email' ");
    return $result->fetch_assoc()['user_image'];
}


function deleteAccountByEmail($email){
    global $db;

    $imageUrl = getImageByEmail($email);
    unlink($imageUrl);

    $result = $db->delete("DELETE FROM register WHERE user_email='$email' ");

    if($result){
        return true;
    }else{
        return false;
    }
}

//Instructor

function getInsUserByEmail($email){
    global $db, $format;

    $result = $db->select("SELECT * FROM instructor WHERE ins_email='$email' ");
    return $result->fetch_assoc()['ins_name'];
}


function getInsUIDByEmail($email){
    global $db, $format;

    $result = $db->select("SELECT * FROM instructor WHERE ins_email='$email' ");
    return $result->fetch_assoc()['ins_user_id'];
}

function getInsImageByEmail($email){
    global $db, $format;

    $result = $db->select("SELECT * FROM instructor WHERE ins_email='$email' ");
    return $result->fetch_assoc()['user_image'];
}


function deleteInsAccountByEmail($email){
    global $db;

    $imageUrl = getInsImageByEmail($email);
    unlink($imageUrl);

    $result = $db->delete("DELETE FROM instructor WHERE ins_email='$email' ");

    if($result){
        return true;
    }else{
        return false;
    }
}

?>