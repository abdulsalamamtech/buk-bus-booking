<?php 
$id = $_SESSION["login"]; 
$checker = 0;     
$sql = "SELECT * FROM `wallet`";
$result = mysqli_query($conn,$sql);
 while($row = mysqli_fetch_assoc($result)){
     if($row["student_id"] == $id){
        $checker = 1;
         ?>
         <h4><strong><i class="fas fa-naira-sign" area-hidden="true"></i>₦ <?php echo $row['Amount'];
         $_SESSION["amount"] = $row['Amount'];
         ?> </strong></h4>  
    <?php
      }
       
     }
     if($checker == 0){
        header("location:./helper/create_wallet.php");
     }
 ?>