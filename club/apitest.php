<?php

header('Access-control-Allow-Origin:*');
header('Content-Type:application/json');
header('Access-control-Allow-Methods:GET');
header('Access-control-Allow-Headers:Content-type,Access-Control-Allow-Headers,Authorization,X-Request-With');
$data = json_decode(file_get_contents("php://input"));
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "club_test2";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$connection) {
    die("Databse connection error!!!");
}
$query = "SELECT * FROM clubs";
$run = mysqli_query($connection,$query);
$clubs = mysqli_fetch_all($run,MYSQLI_ASSOC);
echo json_encode($clubs);
