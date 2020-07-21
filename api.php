<?php
include "config/conn.php";
include "lib/Database.php";
include "helpers/Format.php";

class API{
    private $db;
    private $format;
    private $address;

    function __construct(){
        $this->db = new Database();
        $this->format = new Format();
        
        $this->address = "http://localhost/math-contest/";
    }

    public function  Select($id){
        $id = $this->format->Stext($id);
        $users = array();
        $data = $this->db->select("SELECT * FROM register WHERE id=$id");

        if($data){

            while ($output = $data->fetch_assoc()) {
                $users = array(
                    'id' => $output['id'],
                    'user_name' => $output['user_name'],
                    'user_email' => $output['user_email']

                );
            }
            return json_encode($users);
        }else{
            echo "perameter wrong";
        }
    } // end function


    public function  fetchProblem($id){
        $id = $this->format->Stext($id);
        $users = array();
        $data = $this->db->select("SELECT * FROM post WHERE id=$id");

        if($data){

            while ($output = $data->fetch_assoc()) {
                $users = array(
                    'id' => $output['id'],
                    'post_title' => $output['post_title'],
                    'post_content' => $output['post_content'],
                    'post_image' => $this->address.$output['post_image'],
                    'post_author' => $output['post_author']
                );
            }
            return json_encode($users);
        }else{
            echo "perameter wrong";
        }
    } // end function


}



if(isset($_REQUEST['id']) != null){

    if($_REQUEST['id'] != null){
    
        $id = $_REQUEST['id'];
        $API = new API();
        header('Content-Type: application/json');
        echo $API->Select($id);
    }
    else{
        echo "something went wrong";
    }
}


if(isset($_REQUEST['fetchmath']) != null){

    if($_REQUEST['fetchmath'] != null){
    
        $id = $_REQUEST['fetchmath'];
        $API = new API();
        header('Content-Type: application/json');
        echo $API->fetchProblem($id);
    }
    else{
        echo "something went wrong";
    }
}



?>