<?php
include "config/conn.php";
include "lib/Database.php";
include "helpers/Format.php";
include "classes/WinMat.php";

session_start();
$db = new Database();
$format = new Format();
$winmat = new WinMat();
//for makeWinning
echo "id ". $_SESSION['ins_id'];
if(isset($_SESSION['ins_id'])){


    if(isset($_REQUEST["user_name"])){

        $user            = $format->Stext($_REQUEST["user_name"]);
        $cat             = $format->Stext($_REQUEST['cat']);

        $querycheck      = "SELECT * FROM answere WHERE user_unique_id='$user'";
        $name            = $db->select($querycheck)->fetch_assoc();

        $Winnerid        = $name['user_unique_id'];
        $WinnerProblemId = $name['ans_linkid'];  
        $winnerMakerID   = $_SESSION['ins_id'];

        $Check = $winmat->MakeWinner($Winnerid, $WinnerProblemId, $winnerMakerID, $cat);


    if($Check){
        echo "<span class='alert alert-danger'>X Not Successfully Set Winner</span>";
    }
    else{
        header("Location: instructor-panel.php?msg=".urlencode('Winner declare Successfully.'));

        echo "<span class='alert alert-success'>Successfully Set Winner</span>";
    }

    }else{
        echo "Something went wrong";
    }



    //for cancel winning
    if(isset($_REQUEST["user_name_can"]) && isset($_REQUEST["can"]) ){

        $user            = $format->Stext($_REQUEST["user_name_can"]);
        $cat             = $format->Stext($_REQUEST['cat']);

        $querycheck      = "SELECT * FROM answere WHERE user_unique_id='$user'";
        $name            = $db->select($querycheck)->fetch_assoc();

        $Winnerid        = $name['user_unique_id'];
        $WinnerProblemId = $name['ans_linkid'];
        $winnerMakerID   = $_SESSION['ins_id'];

        $Check = $winmat->MakeLooser($Winnerid, $WinnerProblemId, $cat);


    if($Check){
        echo "<span class='alert alert-danger'>X Not Successfully Set Winner</span>";
    }
    else{
        header("Location: instructor-panel.php?msg=".urlencode('Winner declare Successfully.'));

        echo "<span class='alert alert-success'>Successfully Set Winner</span>";
    }

    } else{
        echo "Something went wrong";
    }
}else {
    echo "You have to be instructor for declare winning!";
}



?>