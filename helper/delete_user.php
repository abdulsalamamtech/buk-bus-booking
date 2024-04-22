<?php 
require_once("db_connection.php");
if(isset($_GET['delete'])){
    $id = $_GET["delete"];
    $sql = "DELETE FROM `users` WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        $_SESSION["msg"] = '<div class= "alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>User Deleted Successful</strong>
    </div>';
    header("location:../users.php");

    }else{
        $_SESSION["msg"] = '<div class= "alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Ooops, error occured</strong>
    </div>';
    header("location:../users.php");

    }
}

