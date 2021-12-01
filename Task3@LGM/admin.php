<?php

if (!isset($_SESSION)) {
    session_start();
}
include "include/connection.php";

if (!isset($_SESSION['login'])) {
    header("location:login.php");
}
?>
<?php include "include/header.php"?>
<?php include "include/sidebar.php"?>
  
  <section class="home-section">
      <div class="text text-center" style="width:100%;text-align:center">Welcome <?php echo $_SESSION['name']?></div>

    </section>
  
  <script src="javascript/main.js">
  
  </script>
</body>
</html>
