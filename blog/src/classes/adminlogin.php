<?php
    include '../config/conn.php';
    include '../lib/Session.php';
    //Session::checkSession();
    include_once '../lib/Database.php';
    include_once '../helpers/Format.php';
?>

<?php
class Adminlogin{
    private $db;
    private $format;

    public function __construct(){
        $this->db = new Database();
        $this->format = new Format();
    }
    public function adminLogin($adminUser,$adminPass){
        $adminUser = $this->format->validation($adminUser);
        $adminPass = $this->format->validation($adminPass);

        $adminUser = $this->format->Stext($adminUser);
        $adminPass = $this->format->Stext($adminPass);

        if(empty($adminUser) || empty($adminPass)){
            $loginmsg = "Username or Password must not be empty !";
            return $loginmsg;
        }else{
            $query = "SELECT * FROM instructor WHERE ins_login='$adminUser' AND ins_pass='$adminPass'";
            $read =$this->db->select($query);
            if($read != false){
                $value = $read->fetch_assoc();
                Session::set("ins_login",$value['ins_login']);
                Session::set("ins_id",$value['ins_id']);
                Session::set("ins_name",$value['ins_name']);
                header("Location:index.php");
            }else{
                $loginmsg = "Username or Password not match !";
                return $loginmsg;
            }
        }
    }

}

?>