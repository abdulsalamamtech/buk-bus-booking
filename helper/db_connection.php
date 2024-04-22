<?php
// making connection to the DataBase
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "buk_busbooking";

$conn = mysqli_connect($host,$user,$pass,$db_name);
if(!$conn){
    die("error in conection");
}
?>