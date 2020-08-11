<?php
/**
* Format Class
*/
class Format{
    public static $conn;

    function __construct()
    {
       // $db = new Database();
    }
    public static function formatDate($date){
        return date('F j, Y, g:i a', strtotime($date));
    }

    public static function formatOnlyDate($date){
        return date('j', strtotime($date));
    }
    public static function formatOnlyYear($date){
        return date('Y', strtotime($date));
    }
    public static function formatOnlyMonth($date){
        return date('F', strtotime($date));
    }

    public static function textShorten($text, $limit = 400){
        //$msgi = wordwrap(substr($msg, 0, $position),20,"<br>\n"); 
        $text = $text. " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text, ' '));
        $text = $text.".....";
        return $text;
    }

    public static function validation($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public static function title(){
        $path = $_SERVER['SCRIPT_FILENAME'];
        $title = basename($path, '.php');
        //$title = str_replace('_', ' ', $title);
        if ($title == 'index') {
            $title = 'home';
        }elseif ($title == 'contact') {
            $title = 'contact';
        }
        return $title = ucfirst($title);
    }

    public static function Stext($string, $allow = null){
        if($allow == null){
            self::$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
            $text = self::$conn->real_escape_string(htmlspecialchars(strip_tags($string)));
        }else{
            self::$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
            $text = self::$conn->real_escape_string(strip_tags($string, $allow));
        }
        return $text;
    }
    
    public static function jumpTo($url, $msg, $status = "msg" , $time = 0){

        $doc = "<script>function red(){ window.location='$url&?$status=$msg' }; setTimeout('red()', $time);</script>";
        echo $doc;
    }

    public static function goto($url){

        $doc = "<script>function red(){ window.location='$url' }; setTimeout('red()', 0);</script>";
        echo $doc;
    }

    public static function Spsk($string){
        $text = md5(self::Stext($string));
        return $text;
    }

}
?>