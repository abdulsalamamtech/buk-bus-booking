<?php

$id = $_SESSION["login"];

$sql = "SELECT * FROM `users` WHERE id = '$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if($row["status"] == 1){
    ?>
    <li class="nav-item">
        <a class="nav-link" href="admin_profile.php">My Profile</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="systemconfig.php"> System Config </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="messages.php">Meassages</a>
     </li>
    <li class="nav-item">
       <a class="nav-link" href="users.php">Users</a>
    </li>
    <li class="nav-item">
       <a class="nav-link" href="bookedSeat_admin.php">Booked Seat</a>
    </li>
    <li class="nav-item">
       <a class="nav-link" href="logout.php">Logout</a>
    </li>
    <?php
}
else{
    ?>
     <li class="nav-item">
        <a class="nav-link" href="profile.php">My Profile</a>
    </li>
    
  
    <li class="nav-item">
      <a class="nav-link" href="contact.php">Contact Us</a>
     </li>
    <li class="nav-item">
    <a class="nav-link" href="reserveSeat.php">Reserve a Seat</a>
    </li>
    <li class="nav-item">
     <a class="nav-link" href="bookedSeat.php">Booked History</a>
    </li>
    <li class="nav-item">
     <a class="nav-link" href="wallet.php">Wallet</a>
    </li>
    <li class="nav-item">
       <a class="nav-link" href="logout.php">Logout</a>
    </li>
<?php 
}
?>


