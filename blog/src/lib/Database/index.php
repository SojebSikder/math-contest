<?php 

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

include "MySQLAdapter.php";
include "Dbase.php";

    $mysql = new MySQLAdapter();
    $db = new Dbase($mysql);

    $query = "SELECT * FROM winner_list";

    $data = $db->select($query)->fetch_array();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hello how are you <?php echo $data['winner_id'];?></h1>
</body>
</html>