<?php include "include/header.php"?>
<?php include "include/sidebar.php"?>
  
  <section class="home-section">
      
      <div class="container">
        <div class="text">
        <a href="addstudent.php" class="btn btn-success">Add Student</a>
      </div>
        <table class="table table-striped" style="margin-top: 3rem;" id="tab">
        
          <thead>
            <tr>
              <th scope="col">Sl No</th>
              <th scope="col">Name</th>
              <th scope="col">Regd no</th>
              <th scope="col">Email</th>
              <th scope="col">Branch</th>
              <th scope="col" style="width: 400px;">Action</th>


            </tr>
          </thead>
          <tbody>
            <?php
        include "include/connection.php";
        $sq = "SELECT * FROM student LEFT JOIN branch ON student.st_branch=branch.id";
        $res = mysqli_query($con, $sq) or die("query failed");
        if (mysqli_num_rows($res) > 0) {
          $i=1;
          while ($row = mysqli_fetch_assoc($res)) {
        ?>
            <tr>
              <th scope="row"><?php echo $i++ ?></th>
              <td><?php echo $row['st_name'] ?></td>
              <td><?php echo $row['st_reg'] ?></td>
              <td><?php echo $row['st_email'] ?></td>
              <td><?php echo $row['class'] ?></td>
               <td>
                <a href="stupdate.php?sid=<?php echo $row['sid'] ?>" class="btn btn-primary">Update</a><br><br>
                <a href="stdlt.php?sid=<?php echo $row['sid']?>" class="btn btn-danger">Delete</a>

              </td>

            </tr>
            <?php } }?>
             
          </tbody>
        </table>
      </div>
  </section>
  <script src="javascript/jquery.min.js">  </script>
  <script src="javascript/bootstrap.min.js"></script>
 
  <script src="javascript/main.js">  </script>
  

</body>
</html>
