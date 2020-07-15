<?php
    include_once './lib/Database.php';
    include_once './helpers/Format.php';
?>

<?php
class WinMat{
    private $db;
    private $format;

    public function __construct(){
        $this->db = new Database();
        $this->format = new Format();
    }
    public function MakeWinner($UserID, $ProblemID, $winnerMakerID, $cat){

        $UserID        = $this->format->Stext($UserID);
        $ProblemID     = $this->format->Stext($ProblemID);
        $winnerMakerID = $this->format->Stext($winnerMakerID);

        if(empty($UserID) || empty($ProblemID)){
            $loginmsg = "Data must not be empty !";
            return $loginmsg;
        }else{
            $query = "INSERT INTO winner_list(problem_id, winner_id, winner_maker_id, ans_cat) VALUES('$ProblemID','$UserID', '$winnerMakerID', '$cat')";
            $read  = $this->db->insert($query);
            if($read != false){
                //header("Location:instructor-panel.php?msg=Done");
            }else{
                $loginmsg = "Something have a problem!";
                return $loginmsg;
            }
        }
    }

    public function MakeLooser($UserID, $ProblemID, $cat){
        $UserID        = $this->format->Stext($UserID);
        $ProblemID     = $this->format->Stext($ProblemID);

        if(empty($UserID) || empty($ProblemID)){
            $loginmsg = "Data must not be empty !";
            return $loginmsg;
        }else{
            $query = "DELETE FROM winner_list WHERE ans_cat='$cat' AND problem_id='$ProblemID' AND winner_id='$UserID'";
            $read  = $this->db->delete($query);
            if($read != false){
                //header("Location:instructor-panel.php?msg=Done");
            }else{
                $loginmsg = "Something have a problem!";
                return $loginmsg;
            }
        }
    }

    public function addPoints($UserID){
        $UserID        = $this->format->Stext($UserID);
        
        if(empty($UserID)){
            $loginmsg = "Data must not be empty !";
            return $loginmsg;
        }else{
            $query = "INSERT INTO leaderboard() VALUES() ";
            $read  = $this->db->insert($query);
            if($read != false){
                //header("Location:instructor-panel.php?msg=Done");
            }else{
                $loginmsg = "Something have a problem!";
                return $loginmsg;
            }
        }
    }

    public function subPoints(){
        
    }

}

?>