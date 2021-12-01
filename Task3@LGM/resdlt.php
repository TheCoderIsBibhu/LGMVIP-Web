<?php
   include "include/connection.php";
   $cid=$_GET['sid'];
   $sql="DELETE FROM result WHERE res_id={$cid}";
   if (mysqli_query($con, $sql)) {
        header("location:result.php");
    } else {
        echo "<div class='alert alert-danger'>Query Failled</div>";
    }
?>