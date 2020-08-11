<?php
//include_once './lib/Database.php';
//include_once './helpers/Format.php';

$db = new Database();
$format = new Format();

session_start();

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

function getUIDByName($name){
    global $db;

    $result = $db->select("SELECT * FROM register WHERE user_name='$name' ");
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

function getUserInfoById($id, $row){
    global $db;

    $result = $db->select("SELECT * FROM register WHERE user_id = '$id' ");
    return $result->fetch_assoc()[$row];
}


//Instructor

function getInsUserById($id){
    global $db;

    $result = $db->select("SELECT * FROM instructor WHERE ins_user_id='$id' ");
    return $result->fetch_assoc()['ins_name'];
}


function getInsUserByEmail($email){
    global $db, $format;

    $result = $db->select("SELECT * FROM instructor WHERE ins_email='$email' ");
    return $result->fetch_assoc()['ins_name'];
}

function getInsUIDByName($name){
    global $db;

    $result = $db->select("SELECT * FROM instructor WHERE ins_name='$name' ");
    return $result->fetch_assoc()['ins_user_id'];
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


function getInsUserInfoById($id, $row){
    global $db;

    $result = $db->select("SELECT * FROM instructor WHERE ins_user_id = '$id' ");
    return $result->fetch_assoc()[$row];
}

//set session values
if(isset($_SESSION['ins_name'])){
    $ins_name = $_SESSION['ins_name'];
}
if(isset($_SESSION['ins_login'])){
    $ins_login = $_SESSION['ins_login'];
}
if(isset($_SESSION['ins_id'])){
    $ins_id = $_SESSION['ins_id'];
}else{
    $ins_id = "";
}


if(isset($_SESSION['name'])){
    $user_name = $_SESSION['name'];
}
if(isset($_SESSION['login'])){
    $user_login = $_SESSION['login'];
}
if(isset($_SESSION['id'])){
    $user_id = $_SESSION['id'];
}else{
    $user_id = "";
}


?>