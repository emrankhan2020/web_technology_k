<?php 
echo "success";
function db_conn()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";


    try {

        $conn = new PDO('mysql:host='.$servername.';dbname='.$dbname.';charset=utf8', $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        echo "success";

        // var_dump($conn) ;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $conn;
}
