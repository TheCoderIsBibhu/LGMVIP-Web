<?php include "include/header.php" ?>
<?php include "include/sidebar.php" ?>
<section class="home-section">

  <div class="container">
    <div class="text">
      <a href="addbranch.php" class="btn btn-success">Add Branch</a>
    </div>
    <table class="table table-striped " style="margin-top: 3rem;" id="tab">
      <thead>
        <tr>
          <th scope="col">Sl No</th>
          <th scope="col">Branch</th>
          <th scope="col" style="width: 300px; padding-left: 10px;
  padding-right: 10px;">Action</th>



        </tr>
      </thead>
      <tbody>
        <?php
        include "include/connection.php";
        $sq = "SELECT * FROM branch";
        $res = mysqli_query($con, $sq) or die("query failed");
        if (mysqli_num_rows($res) > 0) {
          $i=1;
          while ($row = mysqli_fetch_assoc($res)) {
        ?>
            <tr>
              <th scope="row"><?php echo $i++ ?></th>
              <td><?php echo $row['class'] ?></td>
              <td>
                <a href="update_branch.php?uid=<?php echo $row['id'] ?>" class="btn btn-primary" style="margin-right: 10px;">Update</a><br><br>
                <a href="delete_branch.php?uid=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
                <!-- Trigger/Open The Modal -->
                
              </td>
            </tr>
        <?php }
        } ?>
      </tbody>
    </table>
  </div>
</section>
<script src="javascript/jquery.min.js"> </script>
<script src="javascript/bootstrap.min.js"></script>
<script src="javascript/modal.js"></script>
<script src="javascript/main.js"> </script>

</body>

</html>