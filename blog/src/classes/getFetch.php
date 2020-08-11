<?php
include_once "lib/Database.php";

    

    //define('DBINFO', 'mysql:host=localhost;dbname=contest');
   //define('DBUSER','root');
   // define('DBPASS','');

     $host   =DB_HOST;
     $user   =DB_USER;
     $pass   =DB_PASS;
     $dbname =DB_NAME;

    function fetchAll($query){
        $db = new Database();
        $data = $db->select($query);//->fetch_assoc();
        return $data->fetch_assoc();
        //$con = new PDO($host, $user, $pass);
       // $stmt = $con->query($query);
        //return $stmt->fetchAll();
    }
    function performQuery($query){
        $con = new PDO($host, $user, $pass);
        $stmt = $con->prepare($query);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }


     function sendNotification($message,$username='all',$type='info'){
    /*this method return all record which status is Publish from the table name that we pass as parameter*/
          $db = new Database();
          //$queryup = "$query";
          $queryup = "INSERT INTO notifications (user_name, type, message,status,date)
          VALUES ('$username', '$type', '$message','unread',CURRENT_TIMESTAMP)";
              
          $readup =$db->insert($queryup,"success","sendNotification.php");
        //for username

    }

     function viewCategory($id)
	{
		$query = mysqli_query($this->conn,"SELECT * FROM articles WHERE status='Publish' AND cat_id = $id");
		return mysqli_fetch_all($query,MYSQLI_ASSOC);
	}
  

?>