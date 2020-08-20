<?php
//include_once './lib/Database.php';
//include_once './helpers/Format.php';

class Pagination
{
    private $db;

    function __construct()
    {
        $this->db = new Database();
    }

    public function getPage()
    {
        // adding limits to select query
        $limit = 5;

        // Look for a GET variable page if not found default is 1.
        if (isset($_GET["page"])) {
            $pn = $_GET["page"];
        } else {
            $pn = 1;
        }
        $startFrom = ($pn - 1) * $limit;

        $query = "SELECT * FROM blog_post LIMIT $startFrom , $limit";

        $result = $this->db->select($query);
        return $result;
    }

    public function getAllRecords()
    {
        $query = 'SELECT * FROM blog_post';
        $totalRecords = $this->db->select($query);
        return mysqli_num_rows($totalRecords);
    }
}
?>
