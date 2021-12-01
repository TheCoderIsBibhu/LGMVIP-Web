<?php
   include "include/connection.php";
   $cid=$_GET['sid'];
   $sql="DELETE FROM student WHERE sid={$cid}";
   if (mysqli_query($con, $sql)) {
        header("location:managestudent.php");
    } else {
        echo "<div class='alert alert-danger'>Query Failled</div>";
    }
?>