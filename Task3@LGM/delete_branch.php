<?php
   include "include/connection.php";
   $cid=$_GET['uid'];
   $sql="DELETE FROM branch WHERE id={$cid}";
   if (mysqli_query($con, $sql)) {
        header("location:branch.php");
    } else {
        echo "<div class='alert alert-danger'>Query Failled</div>";
    }
?>