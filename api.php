<?php
include "config/conn.php";
include "lib/Database.php";



if(isset($_REQUEST['id'])){
    if($_REQUEST['id'] != null){

        class API{
            function  Select($id){
                $db = new Database();
                $users = array();
                $data = $db->select("SELECT * FROM register WHERE id=$id");

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
            }
        }

    }
    
}else{

    class API{
        function  Select(){
            $db = new Database();
            $users = array();
            $data = $db->select("SELECT * FROM register");

            while ($output = $data->fetch_assoc()) {
                $users = array(
                    'id' => $output['id'],
                    'user_name' => $output['user_name'],
                    'user_email' => $output['user_email']
                );
            }
            return json_encode($users);
        }
    }

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

else{
    $API = new API();
    header('Content-Type: application/json');
    echo $API->Select();
}


?>