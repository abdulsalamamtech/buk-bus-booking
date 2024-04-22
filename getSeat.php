<?php
require_once("helper/db_connection.php");
session_start();

if(isset($_POST["id"])){
    $id = $_POST["id"];
    $sql= "SELECT * FROM `bus` WHERE busName = '$id'";
    $result = mysqli_query($conn,$sql);
    echo json_encode(mysqli_fetch_assoc($result));
}
?>