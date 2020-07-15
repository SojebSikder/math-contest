<?php
include "../helpers/Format.php";
include "../classes/Web.php";


$aboutus = $db->select("SELECT * FROM web");
if($aboutus){
  $info        = $aboutus->fetch_assoc();
  $contactInfo = $format->Stext($info['contact_us'],"<br>");
}



define("TITLE", "Blog");
define("ADDRESS", $contactInfo);

$url="http://".$_SERVER["HTTP_HOST"]."/Math Contest";

define("root", "..");

?>