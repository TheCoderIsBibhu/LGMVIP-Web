<?php include "include/header.php" ?>
<?php include "include/sidebar.php" ?>

<section class="home-section">
  <div class="text">
    <a href="addres.php" class="btn btn-success">Add Result</a>
  </div>
  <div class="container">
    <table class="table table-striped " style="margin-top: 3rem;" id="tab">
      <thead>
        <tr>
          <th scope="col">Sl No</th>
          <th scope="col">Regd no</th>
          <th scope="col">Operating System</th>
          <th scope="col">Computer Organization</th>
          <th scope="col">DBMS</th>
          <th scope="col">java</th>
          <th scope="col">data science</th>
          <th scope="col">ai</th>
          <th scope="col" style="width: 300px; padding-left: 10px;
  padding-right: 10px;">Action</th>

        </tr>
      </thead>
      <tbody>
        <?php
        include "include/connection.php";
        $sq = "SELECT res_id,res_reg,os,co,java,dbms,ds,ai,(os+co+java+dbms+ds+ai)as total,((os+co+java+dbms+ds+ai)/(70*6) * 100) as per FROM result";
        $res = mysqli_query($con, $sq) or die("query failed");
        if (mysqli_num_rows($res) > 0) {
          $i = 1;
          while ($row = mysqli_fetch_assoc($res)) {
        ?>
            <tr>
              <th scope="row"><?php echo $i++ ?></th>
              <td><?php echo $row['res_reg'] ?></td>
              <td><?php echo $row['os'] ?></td>
              <td><?php echo $row['co'] ?></td>
              <td><?php echo $row['java'] ?></td>
              <td><?php echo $row['dbms'] ?></td>
              <td><?php echo $row['ds'] ?></td>
              <td><?php echo $row['ai'] ?></td>
              <td>
                <a href="resupdate.php?sid=<?php echo $row['res_id'] ?>" class="btn btn-primary">Update</a><br><br>
                <a href="resdlt.php?sid=<?php echo $row['res_id'] ?>" class="btn btn-danger">Delete</a>

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

<script src="javascript/main.js"> </script>

</body>

</html>