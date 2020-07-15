<?php
//include_once './lib/Database.php';
//include_once './helpers/Format.php';

$db = new Database();
$format = new Format();


//Fetching web table data
function web($value){
    global $db, $format;

    $value = $format->Stext($value);

    $sql = "SELECT * FROM web";
    $exe = $db->select($sql);

    if($exe){
        $exeFetch = $exe->fetch_assoc();
        return $exeFetch[$value];
    }else{
        return "Something went wrong :(";
    }
     
}
//End Fetching web table data


//visitor track
function getVisitor($data = false){
    global $db;

    //adding new visitor
    $visitor_ip = $_SERVER['REMOTE_ADDR'];

    //checking if visitor is unique
    $query  = "SELECT * FROM visitor WHERE ip='$visitor_ip'";
    $result = $db->select($query);

    $total_visitor = mysqli_num_rows($result);
    
    
    if($total_visitor < 1) {
        $query  = "INSERT INTO visitor(ip) values('$visitor_ip')";
        $result = $db->select($query);
    }

    //retriving visitor
    $query  = "SELECT * FROM visitor";
    $result = $db->select($query);
    //checking query error

    if(!$result){
        echo "Retriving Query Erro<br>";
    }
    $total_visitor = mysqli_num_rows($result);

    if($data == true){
        return $total_visitor;
    }
    

} //end visitor code



//Fetching tb_link table data
function tb_link($name, $value){
    global $db, $format;

    $name = $format->Stext($name);
    $value = $format->Stext($value);

    $sql = "SELECT * FROM tb_link WHERE title='$name' ";
    $exe = $db->select($sql);

    if($exe){
        $exeFetch = $exe->fetch_assoc();
        return $exeFetch[$value];
    }else{
        return false;
    }
     
}

function tb_all_link(){
    global $db;

    $sql = "SELECT * FROM tb_link";
    $exe = $db->select($sql);

    if($exe){
            return $exe;
    }else{
        return false;
    }
     
}

function net_deleteById($id){
    global $db, $format;

    $id = $format->Stext($id);

    $sql = "DELETE FROM tb_link WHERE id='$id'";
    $exe = $db->delete($sql);

    if($exe){
            return true;
    }else{
        return false;
    }

}
//End Fetching tb_link table data





?>