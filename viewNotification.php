<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
require_once('config/conn.php');
require_once('helpers/Format.php');
require_once('lib/Database.php');

$format = new Format();
$db     = new Database();

$q = $format->Stext(intval($_GET['q']));


$sql    = "SELECT * FROM notifications WHERE id = '$q'";
$result = $db->select($sql);

if($result){
    $row = $result->fetch_assoc();
    $msg   = $row['message'];
    $title = $row['type'];
    $name  = $row['user_name'];
    $date  = Format::formatDate($row['date']);
    

    echo "<div class='card'>";
    echo "<span class='badge badge-dark'><i>$date</i></span>";
    echo "<h3>$msg</h3>";
    echo "</div>";

    $db->update("UPDATE notifications SET status='read' WHERE id='$q' ");
}

?>
</body>
</html>