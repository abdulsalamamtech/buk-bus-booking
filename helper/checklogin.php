<?php
// session_start();
function check_login(){
    if(strlen($_SESSION['login'])==0){

		$_SESSION["msg"] = '<div class= "alert alert-danger">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Please Login</strong>  <a href="login.php">Login</a>
		</div>';
		header("location:index.php");

	}
}